<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@careerhub.com'],
            [
                'name' => 'CareerHub Admin',
                'password' => Hash::make('password'),
                'role' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'demo@careerhub.com'],
            [
                'name' => 'CareerHub Demo',
                'password' => Hash::make('password'),
                'role' => 'null',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
