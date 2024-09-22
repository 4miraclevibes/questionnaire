<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryQuestionnaire;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class CategoryQuestionnaireController extends Controller
{
    public function index(Questionnaire $questionnaire)
    {
        return view('pages.backend.questionnaires.categoryQuestionnaires.index', compact('questionnaire'));
    }

    public function create(Questionnaire $questionnaire)
    {
        $categories = Category::all();
        return view('pages.backend.questionnaires.categoryQuestionnaires.create', compact('questionnaire', 'categories'));
    }

    public function store(Questionnaire $questionnaire, Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);
        $data = $request->only(['description', 'category_id']);
        $data['questionnaire_id'] = $questionnaire->id;
        CategoryQuestionnaire::create($data);
        return redirect()->route('categoryQuestionnaires.index', $questionnaire->id);
    }

    public function edit(CategoryQuestionnaire $categoryQuestionnaire)
    {
        $categories = Category::all();
        return view('pages.backend.questionnaires.categoryQuestionnaires.edit', compact('categoryQuestionnaire', 'categories'));
    }

    public function update(CategoryQuestionnaire $categoryQuestionnaire, Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);
        $data = $request->only(['description', 'category_id']);
        $categoryQuestionnaire->update($data);
        return redirect()->route('categoryQuestionnaires.index', $categoryQuestionnaire->questionnaire_id);
    }

    public function destroy(CategoryQuestionnaire $categoryQuestionnaire)
    {
        $categoryQuestionnaire->delete();
        return redirect()->route('categoryQuestionnaires.index', $categoryQuestionnaire->questionnaire_id);
    }
}
