<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exam_results')->insert([
            [
                'score' => '90',
                'user_id' => '1',
                'exam_id' => '1',
            ],
            [
                'score' => '97',
                'user_id' => '1',
                'exam_id' => '2',
            ],
            [
                'score' => '90',
                'user_id' => '2',
                'exam_id' => '1',
            ],
            [
                'score' => '95',
                'user_id' => '2',
                'exam_id' => '2',
            ]
        ]);
    }
}
