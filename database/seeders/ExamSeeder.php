<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new \DateTime(); //now
        $date->add(new \DateInterval('PT60M'));//add 60 min / 1 hour
        $dateEnd = new \DateTime();
        $dateEnd->add(new \DateInterval('PT120M'));//add 60 min / 1 hour

        DB::table('exams')->insert([
            [
                'exam_name' => 'LOS Part 1',
                'create_exam_dt' => now(),
                'exam_start_dt' => $date,
                'exam_close_dt' => $dateEnd,
                'module_name' => 'LOS',
                'version' => '1',
            ],
            [
                'exam_name' => 'Finance Part 1',
                'create_exam_dt' => now(),
                'exam_start_dt' => $date,
                'exam_close_dt' => $dateEnd,
                'module_name' => 'FINANCE',
                'version' => '1',
            ]
        ]);
    }
}
