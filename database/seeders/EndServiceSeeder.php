<?php

namespace Database\Seeders;

use App\Models\EndServiceQuestion;
use App\Models\EndServiceQuestionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EndServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        collect([
            "procedure",
            "recitals"
        ])->each(fn($text, $id) => EndServiceQuestionType::updateOrCreate([
            'id' => $id + 1
        ], [
            "name" => $text,
        ]));

        $procedure_questions = collect([
            'Notice of Resignation Submit a formal resignation letter to your medical Director /Clinic Manager/HOD via email and hard copy.',
            'Acknowledgment of Resignation HR acknowledges receipt of the resignation letter and provides further instructions.',
            'Exit Interview Schedule and conduct an exit interview with HR to discuss reasons for leaving and provide feedback.',
            'Handover of Duties Complete a detailed handover of duties to the supervisor/HOD/successor.',
            'Return of Company Property',
            'ID’s',
            'Flash Cards',
            'Keys',
            'Therapy Resources',
            'Settlement of Accounts: Total Amount',
            'Outstanding payments',
            'Salary',
            'Gratuity',
            'Unused leaves',
            'Clearance Form Obtain and complete a clearance form, getting necessary signatures from relevant departments.',
            'End of Service Benefits Calculation HR calculates end-of-service benefits based on company policy and labor laws.',
            'Cancellation of labor card Cancel the labor card, License under Bridges, and insurance.',
            'Final Settlement Payment Receive final settlement payment, including end-of-service benefits and any remaining dues.',
            'Release Certificate HR issues an experience letter.',
            'Feedback and Follow-up Provide feedback on the resignation process and follow up on any pending issues if needed.',
        ]);

        $procedure_questions->each(fn($text, $id) => EndServiceQuestion::updateOrCreate([
            'id' => $id + 1
        ], [
            "text" => $text,
            "type_id" => 1
        ]));


        collect(
            [
                'What is your primary reason for leaving the company?',
                'How satisfied were you with your job responsibilities?',
                'What did you enjoy most about your job?',
                'What did you enjoy least about your job?',
                'Were your skills and abilities utilized to their fullest potential?',
                'Did you receive adequate support and resources to do your job effectively?',
                'How would you describe the work environment and culture at the company?',
                'Did you feel valued and appreciated as an employee?',
                'Were there opportunities for professional growth and development?',
                'How effective was the communication within your department and across the company?',
                'Were you satisfied with the level of recognition and feedback you received?',
                'Would you consider rejoining the company in the future? Why or why not?',
                'Do you have any suggestions for improving the workplace?',
                'Is there anything else you would like to share about your experience with the company?',
            ]
        )->each(fn($text, $id) => EndServiceQuestion::updateOrCreate([
            'id' => ($id + 1 + $procedure_questions->count())
        ], [
            "text" => $text,
            "type_id" => 2
        ]));
    }
}
