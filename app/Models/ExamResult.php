<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;
    protected $table = 'exam_results';
    protected $guarded = ['id'];


    public function users()
    {
        return $this->belongsTo(User::class);
    }


    public function exams()
    {
        return $this->hasMany(Exam::class);
        // ok
    }
}
