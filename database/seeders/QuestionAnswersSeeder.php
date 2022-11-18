<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_answers')->insert([
            [
                'question_answer_name' => 'Test1',
                'point_value' => '5',
                'is_answer' => '1',
                'question_id' => '1',
            ],
            [
                'question_answer_name' => 'Test2',
                'point_value' => '5',
                'is_answer' => '0',
                'question_id' => '1',
            ],
            [
                'question_answer_name' => 'Test3',
                'point_value' => '5',
                'is_answer' => '0',
                'question_id' => '1',
            ],
            [
                'question_answer_name' => 'Test4',
                'point_value' => '5',
                'is_answer' => '1',
                'question_id' => '1',
            ],
            [
                'question_answer_name' => 'Test5',
                'point_value' => '3',
                'is_answer' => '0',
                'question_id' => '2',
            ],
            [
                'question_answer_name' => 'Test6',
                'point_value' => '3',
                'is_answer' => '1',
                'question_id' => '2',
            ],
            [
                'question_answer_name' => 'Test7',
                'point_value' => '3',
                'is_answer' => '0',
                'question_id' => '2',
            ],[
                'question_answer_name' => 'Test8',
                'point_value' => '3',
                'is_answer' => '0',
                'question_id' => '2',
            ],
            [
                'question_answer_name' => 'Test9',
                'point_value' => '2',
                'is_answer' => '1',
                'question_id' => '3',
            ],
            [
                'question_answer_name' => 'Test10',
                'point_value' => '2',
                'is_answer' => '0',
                'question_id' => '3',
            ],
            [
                'question_answer_name' => 'Test11',
                'point_value' => '2',
                'is_answer' => '0',
                'question_id' => '3',
            ],
            [
                'question_answer_name' => 'Test12',
                'point_value' => '2',
                'is_answer' => '0',
                'question_id' => '3',
            ],
            [
                'question_answer_name' => 'Test13',
                'point_value' => '5',
                'is_answer' => '1',
                'question_id' => '4',
            ],
            [
                'question_answer_name' => 'Test14',
                'point_value' => '5',
                'is_answer' => '0',
                'question_id' => '4',
            ],
            [
                'question_answer_name' => 'Test15',
                'point_value' => '5',
                'is_answer' => '0',
                'question_id' => '4',
            ],
            [
                'question_answer_name' => 'Test16',
                'point_value' => '5',
                'is_answer' => '1',
                'question_id' => '4',
            ],
            [
                'question_answer_name' => 'Test17',
                'point_value' => '3',
                'is_answer' => '0',
                'question_id' => '5',
            ],
            [
                'question_answer_name' => 'Test18',
                'point_value' => '3',
                'is_answer' => '1',
                'question_id' => '5',
            ],
            [
                'question_answer_name' => 'Test19',
                'point_value' => '3',
                'is_answer' => '0',
                'question_id' => '5',
            ],[
                'question_answer_name' => 'Test20',
                'point_value' => '3',
                'is_answer' => '0',
                'question_id' => '5',
            ],
            [
                'question_answer_name' => 'Test21',
                'point_value' => '2',
                'is_answer' => '1',
                'question_id' => '6',
            ],
            [
                'question_answer_name' => 'Test22',
                'point_value' => '2',
                'is_answer' => '0',
                'question_id' => '6',
            ],
            [
                'question_answer_name' => 'Test23',
                'point_value' => '2',
                'is_answer' => '0',
                'question_id' => '6',
            ],
            [
                'question_answer_name' => 'Test24',
                'point_value' => '2',
                'is_answer' => '0',
                'question_id' => '6',
            ]
        ]);
    }
}
