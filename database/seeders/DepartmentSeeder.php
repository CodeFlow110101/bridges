<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::where('id', 1)->firstOrCreate(["name" => "Speech Therapy"]);
        Department::where('id', 2)->firstOrCreate(["name" => "ABA"]);
        Department::where('id', 3)->firstOrCreate(["name" => "Occupational Therapy"]);
        Department::where('id', 4)->firstOrCreate(["name" => "Physiotherapy"]);
        Department::where('id', 5)->firstOrCreate(["name" => "Psychology"]);
        Department::where('id', 6)->firstOrCreate(["name" => "Readiness Program"]);
        Department::where('id', 7)->firstOrCreate(["name" => "Admin"]);
        Department::where('id', 8)->firstOrCreate(["name" => "Clinic Manager"]);
        Department::where('id', 9)->firstOrCreate(["name" => "Cleaning Staff"]);
        Department::where('id', 10)->firstOrCreate(["name" => "Clinic (MS)"]);
    }
}
