<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Appointment Report / Reminder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #333;
            margin: 20px
        }

        .header {
            text-align: center;
            margin-bottom: 18px;
            border-bottom: 3px solid #333;
            padding-bottom: 10px
        }

        .header h1 {
            margin: 0
        }

        .section {
            margin-bottom: 16px;
            padding: 10px;
            border: 1px solid #ddd;
            background: #f9f9f9
        }

        .section-title {
            font-weight: 700;
            background: #333;
            color: #fff;
            padding: 6px;
            margin: -10px -10px 10px -10px
        }

        .row {
            display: flex;
            gap: 12px;
            margin-bottom: 8px
        }

        .col {
            flex: 1
        }

        .label {
            font-weight: 700;
            font-size: 10px;
            color: #555;
            text-transform: uppercase;
            margin-bottom: 4px
        }

        .value {
            background: #fff;
            border: 1px solid #ddd;
            padding: 6px;
            min-height: 18px
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 9px
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Appointment Report / Reminder</h1>
        <div>Record for: {{ $record->client_name ?? '' }}</div>
    </div>

    <div class="section">
        <div class="section-title">Primary Details</div>
        <div class="row">
            <div class="col">
                <div class="label">Client Name</div>
                <div class="value">{{ $record->client_name ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Inquiry Number</div>
                <div class="value">{{ $record->inquiry_number ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Date & Time</div>
                <div class="value">{{ $record->date_and_time ? \Carbon\Carbon::parse($record->date_and_time)->format('d-m-Y H:i') : '' }}</div>
            </div>
            <div class="col">
                <div class="label">Phone (Dubai)</div>
                <div class="value">{{ $record->phone_no_dubai ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Options & Scheduling</div>
        <div class="row">
            <div class="col">
                <div class="label">Option A - Date & Time</div>
                <div class="value">{{ $record->option_a_date_time ? \Carbon\Carbon::parse($record->option_a_date_time)->format('d-m-Y H:i') : '' }}</div>
            </div>
            <div class="col">
                <div class="label">Option A - Phone</div>
                <div class="value">{{ $record->option_a_phone_no_dubai ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Option B - Multiple Days / Intervention</div>
                <div class="value">{{ $record->option_b_multiple_days_intervention ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Option B - Therapist Date & Time</div>
                <div class="value">{{ $record->option_b_therapist_date_time ? \Carbon\Carbon::parse($record->option_b_therapist_date_time)->format('d-m-Y H:i') : '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Option B - Time Session Booked</div>
                <div class="value">{{ $record->option_b_time_session_booked ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Option B - Department</div>
                <div class="value">{{ $record->option_b_department ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Option C - Time Slots</div>
        @if($record->optionc && $record->optionc->count())
        <table>
            <thead>
                <tr>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Therapists</th>
                </tr>
            </thead>
            <tbody>
                @foreach($record->optionc as $opt)
                <tr>
                    <td>{{ $opt->start_time }}</td>
                    <td>{{ $opt->end_time }}</td>
                    <td>
                        @php
                        $therapists = [];
                        for($i=1;$i<=10;$i++){
                            $k='therapist_name_' .$i;
                            if(!empty($opt->$k)) $therapists[] = $opt->$k;
                            }
                            @endphp
                            {{ implode(', ', $therapists) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="value">No Option C records</div>
        @endif
    </div>

    <div class="section">
        <div class="section-title">Option D - Weekly Availability</div>
        @if($record->optiond && $record->optiond->count())
        <table>
            <thead>
                <tr>
                    <th>Start</th>
                    <th>End</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($record->optiond as $opt)
                <tr>
                    <td>{{ $opt->start_time }}</td>
                    <td>{{ $opt->end_time }}</td>
                    <td>{{ $opt->monday ? 'Yes' : 'No' }}</td>
                    <td>{{ $opt->tuesday ? 'Yes' : 'No' }}</td>
                    <td>{{ $opt->wednesday ? 'Yes' : 'No' }}</td>
                    <td>{{ $opt->thursday ? 'Yes' : 'No' }}</td>
                    <td>{{ $opt->friday ? 'Yes' : 'No' }}</td>
                    <td>{{ $opt->saturday ? 'Yes' : 'No' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="value">No Option D records</div>
        @endif
    </div>

    <div class="section">
        <div class="section-title">Consent & Forms</div>
        <div class="row">
            <div class="col">
                <div class="label">Consent To</div>
                <div class="value">{{ $record->consent_to ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Consent To - Insurance Name</div>
                <div class="value">{{ $record->consent_to_insurance_name ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Form A (School)</div>
                <div class="value">{{ $record->form_a_consent_to_school ? 'Yes' : 'No' }}</div>
            </div>
            <div class="col">
                <div class="label">Form A - Insurance</div>
                <div class="value">{{ $record->form_a_consent_to_school_insurance_name ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Form B (Electronic Transfer)</div>
                <div class="value">{{ $record->form_b_consent_to_electronic_transfer ? 'Yes' : 'No' }}</div>
            </div>
            <div class="col">
                <div class="label">Form B - Insurance</div>
                <div class="value">{{ $record->form_b_consent_to_electronic_transfer_insurance_name ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Form C (Social Media)</div>
                <div class="value">{{ $record->form_c_consent_to_social_media ? 'Yes' : 'No' }}</div>
            </div>
            <div class="col">
                <div class="label">Form C - Insurance</div>
                <div class="value">{{ $record->form_c_consent_to_social_media_insurance_name ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Form D (Medicine)</div>
                <div class="value">{{ $record->form_d_consent_to_medicine ? 'Yes' : 'No' }}</div>
            </div>
            <div class="col">
                <div class="label">Form D - Insurance</div>
                <div class="value">{{ $record->form_d_consent_to_medicine_insurance_name ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Form E (Allow Kid to Dispatch)</div>
                <div class="value">{{ $record->form_e_allow_kid_to_dispatch ? 'Yes' : 'No' }}</div>
            </div>
            <div class="col">
                <div class="label">Form E - Insurance</div>
                <div class="value">{{ $record->form_e_allow_kid_to_dispatch_insurance_name ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Form F (Group)</div>
                <div class="value">{{ $record->form_f_consent_to_group ? 'Yes' : 'No' }}</div>
            </div>
            <div class="col">
                <div class="label">Form F - Insurance</div>
                <div class="value">{{ $record->form_f_consent_to_group_insurance_name ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Form H (Enrolment)</div>
                <div class="value">{{ $record->form_h_consent_to_enrolment ? 'Yes' : 'No' }}</div>
            </div>
            <div class="col">
                <div class="label">Form H - Insurance</div>
                <div class="value">{{ $record->form_h_consent_to_enrolment_insurance_name ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Form G - Related Entries</div>
        @if($record->formg && $record->formg->count())
        <table>
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Form A</th>
                    <th>Form B</th>
                    <th>Form C</th>
                    <th>Form D</th>
                    <th>Form E</th>
                    <th>Form F</th>
                    <th>Form G</th>
                    <th>Form H</th>
                </tr>
            </thead>
            <tbody>
                @foreach($record->formg as $g)
                <tr>
                    <td>{{ $g->client_name }}</td>
                    <td>{{ $g->form_a ? 'Yes' : 'No' }}</td>
                    <td>{{ $g->form_b ? 'Yes' : 'No' }}</td>
                    <td>{{ $g->form_c ? 'Yes' : 'No' }}</td>
                    <td>{{ $g->form_d ? 'Yes' : 'No' }}</td>
                    <td>{{ $g->form_e ? 'Yes' : 'No' }}</td>
                    <td>{{ $g->form_f ? 'Yes' : 'No' }}</td>
                    <td>{{ $g->form_g ? 'Yes' : 'No' }}</td>
                    <td>{{ $g->form_h ? 'Yes' : 'No' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="value">No related Form G entries</div>
        @endif
    </div>

    <div class="footer">
        <div>Generated on {{ now()->format('d-m-Y H:i:s') }}</div>
    </div>
</body>

</html>