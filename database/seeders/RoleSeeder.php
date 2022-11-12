<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            [
                'role_name' => 'Admin',
                'role_code' => 'A',
                'is_active' => '1',
            ],
            [
                'role_name' => 'User',
                'role_code' => 'U',
                'is_active' => '1',
            ]
        ]);
    }
}
