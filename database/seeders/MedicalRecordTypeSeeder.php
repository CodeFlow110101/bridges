<?php

namespace Database\Seeders;

use App\Models\MedicalRecordType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalRecordTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MedicalRecordType::where('id', 1)->firstOrCreate(["name" => "Hepatitis B"]);
        MedicalRecordType::where('id', 2)->firstOrCreate(["name" => "Health Declaration Certificate"]);
        MedicalRecordType::where('id', 3)->firstOrCreate(["name" => "Basic Life Support"]);
    }
}
