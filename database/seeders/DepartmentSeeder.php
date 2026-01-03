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
        collect([
            "Speech Therapy",
            "ABA",
            "Occupational Therapy",
            "Physiotherapy",
            "Psychology",
            "Readiness Program",
            "Admin",
            "Clinic Manager",
            "Cleaning Staff",
            "Clinic (MS)",
            "Supervisor/HOD",
            "Director",
        ])->each(fn($name, $id) => Department::updateOrCreate(["id" => $id + 1], ["name" => $name]));
    }
}
