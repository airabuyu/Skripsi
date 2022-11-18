<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participants')->insert([
            [
                'user_id' => '1',
                'exam_id' => '1',
            ],
            [
                'user_id' => '1',
                'exam_id' => '2',
            ],
            [
                'user_id' => '2',
                'exam_id' => '1',
            ],
            [
                'user_id' => '2',
                'exam_id' => '2',
            ]
        ]);
    }
}
