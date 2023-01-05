<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';
    protected $guarded = ['id'];


    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }

}
