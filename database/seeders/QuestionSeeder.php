<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'question_name' => 'Apa saja yang?',
                'question_type_id' => '1',
                'exam_id' => '1',
            ],
            [
                'question_name' => 'Apa Yang dimaksud?',
                'question_type_id' => '1',
                'exam_id' => '2',
            ],
            [
                'question_name' => 'yang termasuk ?',
                'question_type_id' => '1',
                'exam_id' => '2',
            ],
            [
                'question_name' => 'Apa saja yang?',
                'question_type_id' => '2',
                'exam_id' => '1',
            ],
            [
                'question_name' => 'Apa Yang dimaksud?',
                'question_type_id' => '2',
                'exam_id' => '2',
            ],
            [
                'question_name' => 'yang termasuk ?',
                'question_type_id' => '2',
                'exam_id' => '2',
            ]
        ]);
    }
}
