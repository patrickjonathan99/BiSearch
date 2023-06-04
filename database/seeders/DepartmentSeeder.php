<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Department::insert([
            'department_name' => 'Accounting'
        ]);

        Department::insert([
            'department_name' => 'Architecture'
        ]);

        Department::insert([
            'department_name' => 'Business Analytics'
        ]);

        Department::insert([
            'department_name' => 'Chinese Literature'
        ]);

        Department::insert([
            'department_name' => 'Civil Engineering'
        ]);

        Department::insert([
            'department_name' => 'Communication - Mass Communication'
        ]);

        Department::insert([
            'department_name' => 'Communication - Marketing Communication'
        ]);

        Department::insert([
            'department_name' => 'Computer Engineering'
        ]);

        Department::insert([
            'department_name' => 'Computer Science'
        ]);

        Department::insert([
            'department_name' => 'Cyber Security'
        ]);

        Department::insert([
            'department_name' => 'Data Science'
        ]);

        Department::insert([
            'department_name' => 'English Literature'
        ]);

        Department::insert([
            'department_name' => 'Game Application and Technology'
        ]);

        Department::insert([
            'department_name' => 'Global Business Marketing'
        ]);

        Department::insert([
            'department_name' => 'Hotel Management (Diploma Program)'
        ]);

        Department::insert([
            'department_name' => 'Information Systems'
        ]);

        Department::insert([
            'department_name' => 'Information Systems Accounting and Auditing'
        ]);

        Department::insert([
            'department_name' => 'Industrial Engineering'
        ]);

        Department::insert([
            'department_name' => 'Interior Design'
        ]);

        Department::insert([
            'department_name' => 'International Relations'
        ]);

        Department::insert([
            'department_name' => 'Japanese Literature'
        ]);

        Department::insert([
            'department_name' => 'Law - Business Law'
        ]);

        Department::insert([
            'department_name' => 'Management'
        ]);

        Department::insert([
            'department_name' => 'Mobile Application and Technology'
        ]);

        Department::insert([
            'department_name' => 'Primary Teacher Education'
        ]);

        Department::insert([
            'department_name' => 'Program Profesi Insinyur'
        ]);

        Department::insert([
            'department_name' => 'Psychology'
        ]);

        Department::insert([
            'department_name' => 'Taxation'
        ]);

        Department::insert([
            'department_name' => 'Tourism'
        ]);

        Department::insert([
            'department_name' => 'Visual Communication Design - Animation'
        ]);

        Department::insert([
            'department_name' => 'Visual Communication Design - Creative Advertising'
        ]);

        Department::insert([
            'department_name' => 'Visual Communication Design - New Media'
        ]);
    }
}
