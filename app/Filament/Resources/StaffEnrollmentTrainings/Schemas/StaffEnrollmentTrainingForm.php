<?php

namespace App\Filament\Resources\StaffEnrollmentTrainings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Tables\Columns\TextColumn;

class StaffEnrollmentTrainingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('employee_name')
                    ->required(),
                TextInput::make('highest_qualification'),
                Select::make('department_id')
                    ->required()
                    ->relationship(name: 'department', titleAttribute: 'name')->native(false),
                TextInput::make('supervisor'),
                Repeater::make('statuses')
                    ->relationship()
                    ->deletable(false)
                    ->addable(false)
                    ->default([
                        [
                            "project" => "<h3><strong>Step 1 Trainee Observation and Evaluation Protocol</strong></h3><p>All trainees are required to undergo a 15-day observation period under the supervision of a senior therapist within the department. During this period, the trainee&#039;s role is to observe, engage, and support the senior therapists during sessions. This process ensures that trainees gain practical insights and hands-on experience in a controlled and supportive environment.</p><p>Trainee Responsibilities:</p><p>1. Observation: Carefully observe the techniques, methodologies, and interactions employed by the senior therapist on clients.</p><p>2. Engagement: Actively participate in discussions and activities as directed by the senior therapist.</p><p>Albert Cook</p><p>Active</p><p>3. Support: Provide assistance during therapy sessions as needed, demonstrating an understanding of the therapeutic process.</p><p>Evaluation Procedure: At the end of the 15-day observation period, the senior therapist will complete an evaluation form (Trainee observer form)assessing the trainee&#039;s performance. This process will be repeated with three different senior therapists to ensure a comprehensive trainee evaluation. The average score from these evaluations will determine the trainee&#039;s continuation or termination.</p>"
                        ],
                        [
                            "project" => "The average score from these evaluations will determine the trainee's continuation or termination, After 15 days of observation, if the average score is satisfactory, the trainee will undergo training on the following aspects each day for the next month."
                        ],
                        [
                            "project" => "<h3><strong>3. Introduction to the Assessment Process</strong></h3><p>a) Observation of Consultant Conducting Case History Interviews</p><p>Children in Phase 1 &amp; Phase 2</p><p>o Learn how to effectively observe children during assessments (each phase)</p><p>o Take notes on interview techniques and key information gathering</p><p>Focus on behaviors, communication skills, and interaction patterns appropriate for the child&#039;s developmental\u{A0}level</p> "
                        ],
                        [
                            "project" => "Trainee sheet Phase 1: Procedure to follow during phase 1 of the assessment"
                        ],
                        [
                            "project" => "<h3><strong>Ongoing Support for the Trainee</strong></h3><p>The trainee will receive ongoing support for the next 30 days following the initial 15-day observation phase. During this period, the trainee will</p><p>Continue to observe assessments conducted by the assessor</p><p>Apply the learned aspects in parallel with other training modules</p><p>Be allotted assessment observation opportunities with the assessor to reinforce learning</p><p>Jerry Milton</p><p>Penceg</p><p>This structured approach ensures comprehensive training and practical experience for\u{A0}the\u{A0}trainee.</p> "
                        ],
                        [
                            "project" => "<h3><strong>4. Observation of Experienced Therapists Conducting Interventions</strong></h3><p>Familiarize with: a) Intervention Procedures:</p><p>Understand and follow protocols for therapy sessions.</p><p>b) Session Objectives:</p><p>Grasp the objectives of interventions and strategies tailored to a child&#039;s needs.</p><p>Jerry Milton</p><p>Learn key behavioral management techniques.</p><p>-Token board</p><p>-First-then</p>"
                        ],
                        [
                            "project" => "<p>C) Building Rapport: Observe bonding sessions to learn how to build rapport with clients.</p><p>-Pairing</p>"
                        ],
                        [
                            "project" => "<h3><strong>d) Maintaining Documentation:</strong></h3><p>- Portfolio:</p><p>o Keep thorough records of observations, lesson plans, and excel sheets.</p><p>o Ensure all documents are updated and accessible.</p><p>Jerry Milton</p><p>Pending</p><p>EM</p><p>-Manuscript Book:</p><p>o Maintain for supervisor\u{A0}reference,</p>"
                        ],
                        [
                            "project" => "<p>b) Administration Policies:</p><p>Understand timelines for each report.</p><p>-Administration policies</p><p>Jerry</p><p>a) Creating Lesson Plans</p><p>Learn the basics of creating lesson plans for speech therapy interventions.</p><p>c) Aligning Goals:</p><p>Focus on aligning goals to meet the individual needs of clients through discussions\u{A0}with\u{A0}parents.</p>"
                        ],
                        [
                            "project" => "<p>d) Transfer Procedures:</p><p>Handing Over Sessions:</p><p>o Learn the importance of a cheat sheet and guidelines for sessions in the absence of the existing therapist.</p><p>Jerry Milt</p><p>Guidelines for Newly Assigned Children:</p><p>o Follow the procedures for integrating\u{A0}new\u{A0}clients.</p> "
                        ],
                        [
                            "project" => "<p>5. Ongoing Feedback &amp; Discussion with Supervisor</p><p>Regular Discussions:</p><p>o Schedule regular discussions with the supervisor once every 15 days for the next 4 months.</p><p>o Continue with monthly discussions after 4 months of working as a therapist.</p><p>Addressing Questions and Concerns:</p><p>o Address any questions or concerns during these sessions.</p><p>Receiving Feedback:</p><p>o Receive constructive feedback and guidance from\u{A0}the\u{A0}supervisor.</p>"
                        ]
                    ])
                    ->table([
                        TableColumn::make('Project'),
                        TableColumn::make('Done/Pending')->width('11rem'),
                        TableColumn::make('Date of completion'),
                    ])
                    ->orderColumn(false)
                    ->schema([
                        TextEntry::make('display_project')
                            ->state(fn(Get $get) => $get("project"))
                            ->extraAttributes(["class" => "fi-prose"])
                            ->hiddenLabel()
                            ->html(),
                        Hidden::make('project'),
                        Select::make('status')
                            ->native(false)
                            ->options([
                                'Active',
                                'Completed',
                                'Scheduled',
                                'Pending',
                            ]),
                        DatePicker::make("date_of_completion")->native(false)
                    ])->columnSpanFull()
            ]);
    }
}
