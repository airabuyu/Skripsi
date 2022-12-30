<?php

namespace App\Exports;

use App\Models\User;
use App\Models\ExamResult;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExamResultExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        $user = ExamResult::with('users')->get();
        dd($user);
        return $user;
    }
}
