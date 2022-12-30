<?php

namespace App\Exports;

use App\Models\User;
use App\Models\ExamResult;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class ExamResultExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        // $user = ExamResult::with('users')->get();
        // // dd($user);
        // return $user;

        $data = DB::select("SELECT u.name, e.exam_name, s.score
                        FROM users u
                        INNER JOIN exam_results s ON u.id = s.user_id
                        INNER JOIN exams e ON e.id = s.exam_id");


        return collect($data);
    }
}
