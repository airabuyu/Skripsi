<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;



class DashboardController extends Controller
{
    //

    public function index(){


        $exams = Exam::whereMonth('exam_start_dt', date('m'))->get();


        return view('dashboard', compact('exams'));
    }

}
