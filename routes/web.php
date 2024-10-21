<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryQuestionnaireController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Landing
    Route::get('/quiz', [LandingController::class, 'index'])->name('landing.index');
    Route::post('/', [LandingController::class, 'store'])->name('landing.store');
    Route::get('/result/{questionnaireResult}', [LandingController::class, 'result'])->name('landing.result');
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/userList', [UserController::class, 'userList'])->name('users.userList');
    //Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    //Questionnaires
    Route::get('/questionnaires', [QuestionnaireController::class, 'index'])->name('questionnaires.index');
    Route::get('/questionnaires/create', [QuestionnaireController::class, 'create'])->name('questionnaires.create');
    Route::post('/questionnaires', [QuestionnaireController::class, 'store'])->name('questionnaires.store');
    Route::get('/questionnaires/{questionnaire}/edit', [QuestionnaireController::class, 'edit'])->name('questionnaires.edit');
    Route::put('/questionnaires/{questionnaire}', [QuestionnaireController::class, 'update'])->name('questionnaires.update');
    Route::delete('/questionnaires/{questionnaire}', [QuestionnaireController::class, 'destroy'])->name('questionnaires.destroy');
    //CategoryQuestionnaires
    Route::get('/questionnaires/{questionnaire}/categoryQuestionnaires', [CategoryQuestionnaireController::class, 'index'])->name('categoryQuestionnaires.index');
    Route::get('/questionnaires/{questionnaire}/categoryQuestionnaires/create', [CategoryQuestionnaireController::class, 'create'])->name('categoryQuestionnaires.create');
    Route::post('/questionnaires/{questionnaire}/categoryQuestionnaires', [CategoryQuestionnaireController::class, 'store'])->name('categoryQuestionnaires.store');
    Route::get('/questionnaires/categoryQuestionnaires/{categoryQuestionnaire}/edit', [CategoryQuestionnaireController::class, 'edit'])->name('categoryQuestionnaires.edit');
    Route::put('/questionnaires/categoryQuestionnaires/{categoryQuestionnaire}', [CategoryQuestionnaireController::class, 'update'])->name('categoryQuestionnaires.update');
    Route::delete('/questionnaires/categoryQuestionnaires/{categoryQuestionnaire}', [CategoryQuestionnaireController::class, 'destroy'])->name('categoryQuestionnaires.destroy');
    //Results
    Route::get('/results', [ResultController::class, 'index'])->name('results.index');
});

require __DIR__.'/auth.php';
