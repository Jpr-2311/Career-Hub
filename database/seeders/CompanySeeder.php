<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $user = DB::table('users')
            ->where('email', 'demo@careerhub.com')
            ->first();

        if (!$user) {
            return;
        }

        DB::table('companies')->insert([
            [
                'user_id' => $user->id,
                'title' => 'TechNova Solutions',
                'about' => 'A modern technology company providing innovative software and digital solutions.',
                'image' => 'default-company.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user->id,
                'title' => 'Digital Edge Technologies',
                'about' => 'A software development company focused on web applications and digital services.',
                'image' => 'default-company.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user->id,
                'title' => 'InnovateX Labs',
                'about' => 'A growing technology organization building modern products and software solutions.',
                'image' => 'default-company.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user->id,
                'title' => 'CodeCraft Technologies',
                'about' => 'A professional software company specializing in web and enterprise applications.',
                'image' => 'default-company.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user->id,
                'title' => 'NextGen Software House',
                'about' => 'A software house delivering creative and reliable digital products and services.',
                'image' => 'default-company.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
