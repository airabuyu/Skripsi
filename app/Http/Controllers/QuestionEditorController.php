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


    public function viewQuestion(Request $request, Exam $exam)
    {
        return view('question_list', compact('exam'));
    }
}
