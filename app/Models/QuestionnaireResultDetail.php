<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireResultDetail extends Model
{
    use HasFactory;
    protected $fillable = ['questionnaire_result_id', 'questionnaire_id', 'category_questionnaire_id'];

    public function questionnaireResult()
    {
        return $this->belongsTo(QuestionnaireResult::class);
    }
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
    public function categoryQuestionnaire()
    {
        return $this->belongsTo(CategoryQuestionnaire::class);
    }
}
