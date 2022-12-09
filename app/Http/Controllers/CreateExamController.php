<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class CreateExamController extends Controller
{
    //

    public function index(){

        return view('create_exam');
    }

    public function createExam(Request $request)
    {
        // dd($request->all());

        $exam = new Exam();
        $exam->exam_name = $request->exam_name;

        $time = strtotime($request->startdt);

        $newformat = date('Y-m-d H:i:s',$time);


        $time2 = strtotime($request->enddt);

        $newformat2 = date('Y-m-d H:i:s',$time2);


        $exam->exam_start_dt = $newformat;
        $exam->exam_close_dt = $newformat2;
        $exam->module_name = $request->module_name;
        $exam->create_exam_dt = date('Y-m-d H:i:s');

        $exam->save();

        return redirect()->route('question_editor_view')->with(['exam' => $exam] );
    }
}
