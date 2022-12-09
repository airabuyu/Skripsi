<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;


class ExamListController extends Controller
{
    //

    public function index(){
        $exams = Exam::all();

        return view('exam_list', compact('exams'));
    }


    public function destroy(Exam $exam){
        Exam::where('id', $exam->id)->delete();

        return back();
    }
}
