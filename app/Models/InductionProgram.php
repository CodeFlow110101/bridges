<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InductionProgram extends Model
{
    use HasFactory;

    // Fillable columns
    protected $fillable = [

        'user_id',
        'job_title',
        'date',
        'signature',
        'hr_name',
        'hr_date',
        'hr_signature',
        'first_party_name',
        'first_party_position',
        'first_party_signature',
        'second_party_name',
        'second_party_passport_number',
        'second_party_current_address',
        'second_party_date',

        // Department
        'df',
        'itc',
        'neoj',
        'sup',
        'gle',

        // Conditions of Employment
        'iohow',
        'trfpeiam',
        'jd',
        'ppoe',
        'btcnaof',
        'riwsiwol',
        'afrlalslel',
        'uauppcrditc',
        'dcglosapcp',
        'dwtpc',
        'mrpomrad',

        // Health & Safety
        'has',
        'iofiap',
        'loffe',
        'apicof',
        'air',
        'faf',
        'lopi',
        'cowatm',
        'afkibfcme',
        'wm',
        'vaab',
        'ic',
        'mipaatt',

        // Conduct
        'pp',
        'dp',
        'cttcatp',
        'con',
        'nc',
        'aog',
        'lrrs',
        'puot',
        'sobc',

        // Facilities
        'pan',
        'wash',

        // Training & Promotion
        'moapo',
        'ears',
        'cpapacoe',

        // Communication
        'super',
        'cam',
        'isegnbce',
        'hc',
        'pcb',

        // Department-specific
        'pay',
    ];

    // Mapping of short column names to full questions
    public static $questionMap = [
        // Department
        'department' => [
            'df' => 'Department function',
            'itc' => 'Introduction to colleagues',
            'neoj' => 'New entrant’s own job',
            'sup' => 'Supervision',
            'gle' => 'General layout - entrances and exits',
        ],

        // Conditions of Employment
        'Conditions to Conditions of Employment' => [
            'iohow' => 'Information on hours of work',
            'trfpeiam' => 'Time recording, finger punching, Email ID, Attendance marking',
            'jd' => 'Job description',
            'ppoe' => 'Probationary periods of employment',
            'btcnaof' => 'Breaking the contract – notice and other formalities',
            'riwsiwol' => 'Reporting in when sick including when on leave',
            'afrlalslel' => 'Arrangements for requesting leave: annual/sick/emergency',
            'uauppcrditc' => 'Uniforms and uniform policy, protective clothing, replacement dress',
            'dcglosapcp' => 'DHA, CDA, guidelines and child protection',
            'dwtpc' => 'Dealing with parents/clients',
            'mrpomrad' => 'Medical records, preparation of records and data',
        ],

        // Health & Safety
        'Health safety to Health and Safety, Security, Fire' => [
            'has' => 'Health and safety information relevant to the department',
            'iofiap' => 'Issuing of fire instructions and procedure',
            'loffe' => 'Location of fire-fighting equipment',
            'apicof' => 'Assembly point in case of fire',
            'air' => 'Accident/incident reporting',
            'faf' => 'First aid facilities',
            'lopi' => 'Loss of personal items',
            'cowatm' => 'Cleanliness of working area, toy management',
            'afkibfcme' => 'Arrangement for keys, ID badges, flash cards, materials',
            'wm' => 'Waste management',
            'vaab' => 'Violence and aggressive behaviour',
            'ic' => 'Infection control',
            'mipaatt' => 'Major incident procedures and actions to take',
        ],

        // Conduct
        'conduct' => [
            'pp' => 'Personal presentation',
            'dp' => 'Disciplinary procedures',
            'cttcatp' => 'Courtesy to the customer and the public',
            'con' => 'Confidentiality',
            'nc' => 'Noise control',
            'aog' => 'Acceptance of gifts',
            'lrrs' => 'Local rules regarding smoking',
            'puot' => 'Private use of telephones',
            'sobc' => 'Standards of Business Conduct',
        ],

        // Facilities
        'facilities' => [
            'pan' => 'Pantry',
            'wash' => 'Washroom',
        ],

        // Training & Promotion
        'training_promotion' => [
            'moapo' => 'Means of advancement, promotion opportunities',
            'ears' => 'Employee appraisal, review systems',
            'cpapacoe' => 'Company policies and procedures and Code of Ethics',
        ],

        // Communication
        'communication' => [
            'super' => 'Supervisors',
            'cam' => 'Communication arrangements - meetings',
            'isegnbce' => 'Information sources, e.g. notice boards, circulars',
            'hc' => 'Handling Complaints',
            'pcb' => 'Parent’s communication book',
        ],

        // Department-specific
        'Department specific to Items Specific to Department' => [
            'pay' => 'Payroll',
        ],
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
