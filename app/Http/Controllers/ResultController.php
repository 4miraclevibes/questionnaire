<?php

namespace App\Http\Controllers;

use App\Models\QuestionnaireResult;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $questionnaireResults = QuestionnaireResult::with('user', 'questionnaireResultDetails.categoryQuestionnaire.category')->get();

        $formattedResults = $questionnaireResults->map(function ($questionnaireResult) {
            $categoryResults = $this->getCategoryResults($questionnaireResult);
            $mostCommonCategory = $categoryResults->first();
            $highestScore = $categoryResults->max('count');
            $averageScore = ($questionnaireResult->user->english_score + $questionnaireResult->user->math_score + $questionnaireResult->user->culture_score + $questionnaireResult->user->tech_score) / 4;

            return [
                'id' => $questionnaireResult->id,  // Added this line
                'user_name' => $questionnaireResult->user->name,
                'category' => $mostCommonCategory ? $mostCommonCategory['category_name'] : 'Tidak ada kategori',
                'category_result' => $categoryResults->map(function ($result) {
                    return $result['category_name'] . ': ' . $result['count'];
                })->implode(', '),
                'score' => $highestScore ?? 'Tidak ada skor',
                'from_school' => $questionnaireResult->user->from_school ?? '-',
                'age' => $questionnaireResult->user->age ?? '-',
                'gender' => $questionnaireResult->user->gender ?? '-',
                'exam_score' => $questionnaireResult->user->exam_score ?? '-',
                'english_score' => $questionnaireResult->user->english_score ?? '-',
                'math_score' => $questionnaireResult->user->math_score ?? '-',
                'culture_score' => $questionnaireResult->user->culture_score ?? '-',
                'tech_score' => $questionnaireResult->user->tech_score ?? '-',
                'school_year' => $questionnaireResult->user->school_year ?? '-',
                'average_score' => $averageScore ?? '-',
                'interview_score' => $questionnaireResult->user->interview_score ?? '-'
            ];
        });

        return view('pages.backend.results.index', compact('formattedResults'));
    }

    private function getCategoryResults($questionnaireResult)
    {
        return $questionnaireResult->questionnaireResultDetails
            ->groupBy(function ($detail) {
                return $detail->categoryQuestionnaire->category_id;
            })
            ->map(function ($group) {
                return [
                    'count' => $group->count(),
                    'category_name' => $group->first()->categoryQuestionnaire->category->name
                ];
            })
            ->sortByDesc('count');
    }
}