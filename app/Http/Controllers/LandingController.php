<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\QuestionnaireResult;
use App\Models\QuestionnaireResultDetail;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $questionnaires = Questionnaire::all();
        return view('pages.frontend.questionnari', compact('questionnaires'));
    }

    public function store(Request $request)
    {
        $questionnaireResult = QuestionnaireResult::create([
            'user_id' => auth()->user()->id,
        ]);

        foreach ($request->input('answers') as $questionnaireId => $answerJson) {
            $answer = json_decode($answerJson, true);
            QuestionnaireResultDetail::create([
                'questionnaire_result_id' => $questionnaireResult->id,
                'questionnaire_id' => $answer['questionnaire_id'],
                'category_questionnaire_id' => $answer['category_questionnaire_id'],
            ]);
        }

        return redirect()->route('results.index');
    }

    public function result(QuestionnaireResult $questionnaireResult)
    {
        return view('pages.frontend.result', compact('questionnaireResult'));
    }
}