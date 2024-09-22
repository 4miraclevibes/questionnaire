<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function categoryQuestionnaires()
    {
        return $this->hasMany(CategoryQuestionnaire::class);
    }

    public function questionnaireResults()
    {
        return $this->hasMany(QuestionnaireResult::class);
    }
}
