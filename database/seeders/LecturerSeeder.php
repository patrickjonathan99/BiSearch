<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Lecturer::insert([
            'title' => 'Levis Kane',
            'code' => 'D7869',
            'email' => 'levis@binus.ac.id',
            'password' => 'levish123'
        ]);
    }
}
