<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_types')->insert([
            [
                'question_type' => 'C001',
                'question_name' => 'CheckBox',
            ],
            [
                'role_name' => 'R001',
                'role_code' => 'Radio Button',
            ]
        ]);
    }
}
