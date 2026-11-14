<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    public function run()
    {
        $user = DB::table('users')
            ->where('email', 'demo@careerhub.com')
            ->first();

        if (!$user) {
            return;
        }

        $companies = DB::table('companies')
            ->where('user_id', $user->id)
            ->get();

        if ($companies->count() < 5) {
            return;
        }

        DB::table('jobs')->insert([
            [
                'user_id' => $user->id,
                'company' => $companies[0]->id,
                'title' => 'Frontend Developer',
                'desc' => 'We are looking for a creative Frontend Developer to build responsive and user-friendly web interfaces.',
                'req' => 'HTML, CSS, JavaScript, Bootstrap and responsive design.',
                'qual' => 'BS Computer Science, IT or related field.',
                'salary' => 'PKR 50,000 - 80,000',
                'perk' => 'Flexible working hours, learning opportunities and professional growth.',
                'about' => 'TechNova Solutions is a modern technology company focused on innovative software solutions.',
                'status' => 'Active',
                'reason' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => $user->id,
                'company' => $companies[1]->id,
                'title' => 'Laravel PHP Developer',
                'desc' => 'Join our development team to create reliable and scalable web applications using Laravel and PHP.',
                'req' => 'PHP, Laravel, MySQL, HTML, CSS and JavaScript.',
                'qual' => 'BS IT, BSCS or equivalent qualification.',
                'salary' => 'PKR 60,000 - 100,000',
                'perk' => 'Mentorship, training and career development opportunities.',
                'about' => 'Digital Edge Technologies develops modern web applications and digital products.',
                'status' => 'Active',
                'reason' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => $user->id,
                'company' => $companies[2]->id,
                'title' => 'UI/UX Designer',
                'desc' => 'We are seeking a UI/UX Designer to design clean, engaging and user-friendly digital experiences.',
                'req' => 'Figma, wireframing, prototyping, typography and responsive design.',
                'qual' => 'Degree in IT, Design, Computer Science or related field.',
                'salary' => 'PKR 45,000 - 75,000',
                'perk' => 'Creative work environment and professional development.',
                'about' => 'InnovateX Labs builds modern digital products with a focus on great user experiences.',
                'status' => 'Active',
                'reason' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => $user->id,
                'company' => $companies[3]->id,
                'title' => 'Junior Web Developer',
                'desc' => 'An excellent opportunity for a junior developer to work on real-world web development projects.',
                'req' => 'Basic knowledge of HTML, CSS, JavaScript, PHP and MySQL.',
                'qual' => 'BSIT, BSCS or currently enrolled in a related degree.',
                'salary' => 'PKR 35,000 - 60,000',
                'perk' => 'Training, mentorship and hands-on project experience.',
                'about' => 'CodeCraft Technologies provides web development and enterprise software solutions.',
                'status' => 'Active',
                'reason' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => $user->id,
                'company' => $companies[4]->id,
                'title' => 'Full Stack Developer',
                'desc' => 'We are hiring a Full Stack Developer to work on both frontend and backend web applications.',
                'req' => 'HTML, CSS, JavaScript, PHP, Laravel and MySQL.',
                'qual' => 'BS Computer Science, IT or Software Engineering.',
                'salary' => 'PKR 70,000 - 120,000',
                'perk' => 'Growth opportunities, collaborative environment and flexible work options.',
                'about' => 'NextGen Software House delivers creative and reliable digital products for businesses.',
                'status' => 'Active',
                'reason' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
