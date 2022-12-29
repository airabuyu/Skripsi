<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use Illuminate\Support\Facades\Session;

use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\ExamResult;
use Illuminate\Support\Facades\Auth;

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
        for($i=1; $i<=$request->total_question;$i++){
            $arrops = $request->{'options' . $i};

            foreach (array_keys($arrops, "1", true) as $key) {

                unset($arrops[$key-1]);

            }


            $arrops = array_values($arrops);

            $question = new Question();
            $question->question_name = $request->question_name[$i];
            $question->exam_id = $exam->id;



            if($request->{'question_type' . $i} == "checkbox"){
                $question->question_type_id = 1;

            }
            else if($request->{'question_type' . $i} == "radio"){
                $question->question_type_id = 2;
            }

            $question->save();

            $arrayLength = count($arrops);
            $j = 0;
            while ($j < $arrayLength)
            {
                $options = new QuestionAnswer();
                $options->question_id = $question->id;
                $options->question_answer_name = $request->{'names' . $i}[$j];
                $options->is_answer = $arrops[$j];

                $options->save();
                $j++;
            }
        }

        return redirect('exam_list');
    }


    public function duplicateQuestion(Request $request, Exam $exam)
    {
        // dd($request->all());


        $versioning = Exam::where('exam_name', $exam->exam_name)->where('module_name', $exam->module_name)->orderBy('version', 'DESC')->first();

        // dd($versioning);

        $exam2 = new Exam();
        $exam2->exam_name = $exam->exam_name;
        $exam2->module_name = $exam->module_name;
        $exam2->create_exam_dt = date('Y-m-d H:i:s');

        $newVersion = 0.1;
        if($versioning->version != null){
            $newVersion = (float)$versioning->version + 0.1;
        }

        $exam2->version = $newVersion;

        $exam2->save();

        for($i=1; $i<=$request->total_question;$i++){
            $arrops = $request->{'options' . $i};

            foreach (array_keys($arrops, "1", true) as $key) {

                unset($arrops[$key-1]);

            }


            $arrops = array_values($arrops);

            $question = new Question();
            $question->question_name = $request->question_name[$i];
            $question->exam_id = $exam2->id;



            if($request->{'question_type' . $i} == "checkbox"){
                $question->question_type_id = 1;

            }
            else if($request->{'question_type' . $i} == "radio"){
                $question->question_type_id = 2;
            }

            $question->save();

            $arrayLength = count($arrops);
            $j = 0;
            while ($j < $arrayLength)
            {
                $options = new QuestionAnswer();
                $options->question_id = $question->id;
                $options->question_answer_name = $request->{'names' . $i}[$j];
                $options->is_answer = $arrops[$j];

                $options->save();
                $j++;
            }
        }

        return redirect('exam_list');
    }


    public function questionViewer(Request $request, Exam $exam)
    {
        // dd($exam);
        // dd($exam->questions()->count());
        $countQuestions = $exam->questions()->count();

        $exams = Exam::with('questions.questionAnswers')->where('exams.id', $exam->id)->get();
        // dd($exams[0]->questions);
        return view('question_viewer', compact('exams', 'countQuestions'));
    }


    public function viewQuestion(Request $request)
    {
        $exam = Exam::find($request->exam_id);
        // $diff = strtotime($exam->exam_close_dt) - strtotime($exam->exam_start_dt);


        // $newformat = date('Y-m-d H:i:s',time());


        // $time2 = strtotime($request->enddt);
        // dd($newformat);
        // dd($diff);
        return view('question_list', compact('exam'));
    }

    public function submitAnswers(Request $request)
    {
        // dd($request->all());
        // $exam = Exam::find($request->exam_id);
        // dd(count($request->questions));
        // dd($exam);
        $mistakes = 0;
        echo($request->exam_id . "<br>");
        for($i=0; $i<count($request->questions);$i++){
            $arrops = $request->{'options' . $request->questions[$i]};
            // dd($request->questions[$i]);

            foreach (array_keys($arrops, "1", true) as $key) {

                unset($arrops[$key-1]);

            }


            $arrops = array_values($arrops);
            echo($request->questions[$i]);
            echo("<br>");


            $listAnswers = QuestionAnswer::where('question_id', $request->questions[$i])->get();

            echo($listAnswers);
            echo("<br>");
            // dd($listAnswers);

            for($j=0; $j<count($listAnswers);$j++){
                echo($listAnswers[$j]->is_answer . "(" .$listAnswers[$j]->question_answer_name  . ")" . " COMPARE " . $arrops[$j] . "<br>");
                if($listAnswers[$j]->is_answer != $arrops[$j]){

                    $mistakes++;
                    break;
                }
            }
        }

        $examResult = new ExamResult();
        $examResult->user_id = Auth::user()->id;
        $examResult->exam_id = $request->exam_id;
        $examResult->score = (count($request->questions)- $mistakes) / count($request->questions) * 100;

        $examResult->save();



        // dd((count($request->questions)-$mistakes) / count($request->questions) * 100);
        // dd($mistakes);
        // dd($request->user_id);
        return redirect('dashboard');
    }

}
