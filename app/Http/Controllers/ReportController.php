<?php

namespace App\Http\Controllers;

use App\Exports\ExamResultExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //

    public function index(){


        return view('report');
    }


    public function userExport(){
        return Excel::download(new ExamResultExport, 'report.xlsx');
    }


}
