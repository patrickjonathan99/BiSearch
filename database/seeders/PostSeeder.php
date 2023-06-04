<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Post::insert([
            'title' => 'Recruitment 1',
            'topic' => 'Geografi',
            'required_student' => 3,
            'description' => 'Saya mencari orang kompeten yang tertarik di bidang penelitian geografi',
            'due_date' => '2023-03-19',
            'current_student' => 0,
            'status' => 'Ongoing',
            'department_id' => 1,
            'type_id' => 1,
            'lecturer_id' => 1
        ]);
    }
}
