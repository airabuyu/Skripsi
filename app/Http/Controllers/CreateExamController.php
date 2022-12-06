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
        $exam->exam_start_dt = $request->startdt;
        $exam->exam_close_dt = $request->enddt;
        $exam->module_name = $request->module_name;
        $exam->create_exam_dt = date('Y-m-d H:i:s');

        $exam->save();

        // $food->ingredients()->attach($request->field_name);


        // return redirect('/question_editor', compact('exam'));
        return redirect()->route('question_editor_view')->with(['exam' => $exam] );
    }
}
