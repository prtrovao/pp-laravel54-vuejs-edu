<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentQuestionChoice extends Model
{
    protected $fillable = [
        'question_id',
        'question_choice_id'
    ];
}
