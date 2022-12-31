<?php

namespace App\Http\Controllers;

use App\Exports\ExamResultExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ReportController extends Controller
{
    //

    public function index(){


        return view('report');
    }


    public function userExport(){
        // Generate the dynamic pivot query
        // $cols = DB::select("
        //     SELECT exam_name
        //     FROM exams
        //     FOR XML PATH(''), TYPE")
        //     ->value('.', 'NVARCHAR(MAX)'

        // );

        // $cols = str_replace('"', '', $cols);
        // $query = "SELECT *
        //     FROM (
        //     SELECT u.name, e.exam_name, s.score
        //     FROM users u
        //     INNER JOIN exam_results s ON u.id = s.user_id
        //     INNER JOIN exams e ON e.id = s.exam_id
        //     ) p
        //     PIVOT (
        //     SUM(score)
        //     FOR exam_name IN ($cols)
        //     ) AS pivoted_table";

        // // Execute the dynamic pivot query and retrieve the data
        // $data = DB::select($query);

        // // Create a new Excel file and add the data to it
        // $excel = Excel::create('exam_scores', function($excel) use($data) {
        //     $excel->sheet('Sheet 1', function($sheet) use($data) {
        //     $sheet->fromArray($data);
        //     });
        // });



        // return Excel::download($excel, 'report.xlsx');


        // $data = DB::select("SELECT u.name, e.exam_name, s.score
        //                 FROM users u
        //                 INNER JOIN exam_results s ON u.id = s.user_id
        //                 INNER JOIN exams e ON e.id = s.exam_id");

    // Create a new Excel file and add the data to it
    // $excel = Excel::store('exam_scores', function($excel) use($data) {
    //     $excel->sheet('Sheet 1', function($sheet) use($data) {
    //         $sheet->fromArray($data);
    //     });
    // });

    // Create a download response for the Excel file and send it to the client
    // return Response::download($excel, 'exam_scores.xlsx');


        return Excel::download(new ExamResultExport, 'report.xlsx');

    }


}
