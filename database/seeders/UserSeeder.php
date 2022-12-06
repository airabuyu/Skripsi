<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'user_name' => 'eric.jatmiko',
                'name' => 'Eric Jatmiko',
                'role_id' => 1,
                'email' => 'eric.jatmiko@ad-ins.com',
                'password' => '$2y$10$rCB.75GWhcWrk3TyTVCVfuLiiN9384p2YK30a4wdAYxSsu2aF52ly',
                'is_active' => '1'
            ],
            [
                'user_name' => 'rio.fr',
                'name' => 'Rio Febrianto',
                'role_id' => 2,
                'email' => 'rio.fr@ad-ins.com',
                'password' => '$2y$10$rCB.75GWhcWrk3TyTVCVfuLiiN9384p2YK30a4wdAYxSsu2aF52ly',
                'is_active' => '1'
            ]
        ]);
    }
}
