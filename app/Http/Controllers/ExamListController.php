<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use Carbon\Carbon;

class ExamListController extends Controller
{
    //

    public function index(){
        $exams = Exam::orderBy('updated_at', 'DESC')->get();

        return view('exam_list', compact('exams'));
    }


    public function editExam(Exam $exam){
        // dd($exam);

        $start = Carbon::parse($exam->exam_start_dt)->format('Y-m-d\TH:i');
        $end = Carbon::parse($exam->exam_close_dt)->format('Y-m-d\TH:i');
        // dd($end);


        return view('edit_exam', compact('exam', 'start', 'end'));
    }

    public function updateExam(Request $request){

        // dd($request->all());
        // $start = Carbon::parse($exam->exam_start_dt)->format('Y-m-d\TH:i');
        // $end = Carbon::parse($exam->exam_end_dt)->format('Y-m-d\TH:i');
        $validateData = $request->validate([
            'exam_name' => 'required',
            'module_name' => 'required',
        ]);

        if(strlen($request->exam_name) > 200 || strlen($request->module_name) > 200)
        {
            // dd($request->exam_name);
            return redirect()->back()->with(['fail' => 'fail']);
        }
        
        $exam = Exam::find($request->exam_id);
        // dd($exam);
        $exam->exam_name = $request->exam_name;

        $time = strtotime($request->startdt);

        $newformat = date('Y-m-d H:i:s',$time);


        $time2 = strtotime($request->enddt);

        $newformat2 = date('Y-m-d H:i:s',$time2);

        $today = date("Y-m-d H:i:s");
        if($newformat > $newformat2)
        {
            return redirect()->back()->with(['failday' => 'failday']);
        }

        $exam->exam_start_dt = $newformat;
        $exam->exam_close_dt = $newformat2;
        // dd($exam->exam_close_dt);
        $exam->module_name = $request->module_name;
        $exam->create_exam_dt = date('Y-m-d H:i:s');

        $exam->update();


        return redirect('exam_list')->with(['success' => 'success']);
    }

    public function destroy(Exam $exam){
        Exam::where('id', $exam->id)->delete();

        return back();
    }
}
