<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $guarded = ['id'];

    public function questionAnswer()
    {
        return $this->belongsTo(QuestionAnswer::class);
    }

    public function exam()
    {
        return $this->hasOne(Exam::class);
    }

    public function questionType()
    {
        return $this->hasOne(QuestionType::class);
    }
}
