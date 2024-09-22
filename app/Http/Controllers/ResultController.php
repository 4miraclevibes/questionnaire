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

            return [
                'id' => $questionnaireResult->id,  // Added this line
                'user_name' => $questionnaireResult->user->name,
                'category' => $mostCommonCategory ? $mostCommonCategory['category_name'] : 'Tidak ada kategori',
                'category_result' => $categoryResults->map(function ($result) {
                    return $result['category_name'] . ': ' . $result['count'];
                })->implode(', '),
                'score' => $highestScore ?? 'Tidak ada skor'
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