<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryQuestionnaire extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'questionnaire_id', 'description', 'status', 'score'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
}
