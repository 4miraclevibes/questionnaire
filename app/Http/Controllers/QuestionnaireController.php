<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questionnaires = Questionnaire::with('categoryQuestionnaires')->get();
        return view('pages.backend.questionnaires.index', compact('questionnaires'));
    }

    public function create()
    {
        return view('pages.backend.questionnaires.create');
    }   

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $questionnaire = Questionnaire::create($data);
        return redirect()->route('questionnaires.index');
    }

    public function edit($id)
    {
        $questionnaire = Questionnaire::find($id);
        return view('pages.backend.questionnaires.edit', compact('questionnaire'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $questionnaire = Questionnaire::find($id);
        $questionnaire->update($data);
        return redirect()->route('questionnaires.index');
    }

    public function destroy($id)
    {
        $questionnaire = Questionnaire::find($id);
        $questionnaire->delete();
        return redirect()->route('questionnaires.index');
    }
}
