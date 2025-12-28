<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class skillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::insert([
            [
                'name' => 'Backend',
                'sub_skills' => 'PHP, Laravel, JavaScript',
                'image' => 'programming.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Design',
                'sub_skills' => 'UI/UX, Figma',
                'image' => 'design.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Frontend',
                'sub_skills' => 'HTML, CSS, JavaScript',
                'image' => 'design.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
