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
        collect([
            "Hepatitis B",
            "DHA /CDA license",
            "Basic Life Support",
        ])->each(
            fn($name, $id) =>
            MedicalRecordType::updateOrCreate(
                ["id" => $id + 1],
                ["name" => $name]
            )
        );
    }
}
