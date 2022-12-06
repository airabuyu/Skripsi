<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use Illuminate\Support\Facades\Session;

use App\Models\Question;
use App\Models\QuestionAnswer;


class QuestionEditorController extends Controller
{
    //
    public function index(){
        $exam = Session::get('exam');

        return view('question_editor',compact('exam'));
    }


    public function createQuestion(Request $request, Exam $exam)
    {
        // dd($request->all());
        // dd($request->options);
        $arrops = $request->options;
        // dd(count($arrops));

        foreach (array_keys($arrops, "1", true) as $key) {
            unset($arrops[$key-1]);
        }
        $arrops = array_values($arrops);
        // dd($arrops);



        // dd(array_values($arrops));

        $question = new Question();
        $question->question_name = $request->question_name;
        $question->exam_id = $exam->id;

        $question->save();

        $arrayLength = count($arrops);
        $i = 0;
        while ($i < $arrayLength)
        {
            $options = new QuestionAnswer();
            $options->question_id = $question->id;
            $options->question_answer_name = $request->names[$i];
            $options->is_answer = $arrops[$i];

            $options->save();
            $i++;
        }


        return redirect()->back()->with(['exam' => $exam] );
    }
}
