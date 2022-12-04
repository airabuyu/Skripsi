<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            QuestionTypeSeeder::class,
            ExamSeeder::class,
            ExamResultSeeder::class,
            ParticipantTestSeeder::class,
            QuestionSeeder::class,
            QuestionAnswersSeeder::class,
        ]);
    }
}
