<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    //

    public function index(){


        $exams = Exam::with('examResults', 'participants')->whereMonth('exam_start_dt', date('m'))->whereYear('exam_start_dt', date('Y'))
        ->where('exam_close_dt', '>=', date('Y-m-d H:i:s'))->get();
        // dd($exams);

        return view('dashboard', compact('exams'));
    }

}
