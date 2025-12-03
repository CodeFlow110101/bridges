<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Intervention Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.4;
            color: #333;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #333;
            padding-bottom: 15px;
        }

        .header h1 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .header p {
            margin: 5px 0;
            font-size: 10px;
        }

        .section {
            margin-bottom: 25px;
            border: 1px solid #ddd;
            padding: 12px;
            background-color: #f9f9f9;
        }

        .section-title {
            font-size: 13px;
            font-weight: bold;
            color: #fff;
            background-color: #333;
            padding: 8px 12px;
            margin: -12px -12px 12px -12px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 12px;
        }

        .form-group {
            flex: 1;
        }

        .form-label {
            font-weight: bold;
            color: #555;
            font-size: 10px;
            margin-bottom: 3px;
            text-transform: uppercase;
        }

        .form-value {
            background-color: #fff;
            padding: 6px 8px;
            border: 1px solid #ddd;
            min-height: 20px;
            word-wrap: break-word;
        }

        .form-value.empty {
            color: #999;
        }

        .subsection {
            margin: 15px 0 12px 0;
            border-left: 3px solid #333;
            padding-left: 12px;
        }

        .subsection-title {
            font-size: 11px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        table th {
            background-color: #e0e0e0;
            padding: 8px;
            text-align: left;
            font-weight: bold;
            font-size: 10px;
            border: 1px solid #ccc;
        }

        table td {
            padding: 8px;
            border: 1px solid #ddd;
            font-size: 10px;
        }

        .checkbox {
            display: inline-block;
            width: 15px;
            height: 15px;
            border: 1px solid #333;
            margin-right: 5px;
            vertical-align: middle;
        }

        .checkbox.checked::after {
            content: "✓";
            font-weight: bold;
        }

        .full-width {
            width: 100%;
        }

        .page-break {
            page-break-after: always;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            border-top: 1px solid #ddd;
            padding-top: 15px;
            font-size: 9px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Intervention Report</h1>
        <p>Clinical Intervention Record</p>
    </div>

    <!-- Basic Information Section -->
    <div class="section">
        <div class="section-title">Basic Information</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Inquiry Number</div>
                <div class="form-value">{{ $record->inquiry_number ?? '' }}</div>
            </div>
            <div class="form-group">
                <div class="form-label">Date</div>
                <div class="form-value">{{ $record->date ? \Carbon\Carbon::parse($record->date)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Client Name</div>
                <div class="form-value">{{ $record->name ?? '' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-label">Referral Source</div>
                <div class="form-value" style="min-height: 40px;">{{ $record->referral_source ?? '' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-label">Details Discussed</div>
                <div class="form-value" style="min-height: 50px;">{{ $record->details_discussed ?? '' }}</div>
            </div>
        </div>
    </div>

    <!-- Features of Caregiver Section -->
    <div class="section">
        <div class="section-title">Features of Caregiver</div>

        <!-- Parent: Mother (MSL) -->
        <div class="subsection">
            <div class="subsection-title">Parent: Mother (MSL)</div>
            <div class="form-row">
                <div class="form-group">
                    <div class="form-label">Mother - Aspect 1</div>
                    <div class="form-value">
                        @if($record->mother_msl_1)
                        {{ \App\Models\Intervention::mslOptions1()->get($record->mother_msl_1 - 1) ?? $record->mother_msl_1 }}
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label">Mother - Aspect 2</div>
                    <div class="form-value">
                        @if($record->mother_msl_2)
                        {{ \App\Models\Intervention::mslOptions2()->get($record->mother_msl_2 - 1) ?? $record->mother_msl_2 }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Parent: Father (MSL) -->
        <div class="subsection">
            <div class="subsection-title">Parent: Father (MSL)</div>
            <div class="form-row">
                <div class="form-group">
                    <div class="form-label">Father - Aspect 1</div>
                    <div class="form-value">
                        @if($record->father_msl_1)
                        {{ \App\Models\Intervention::mslOptions1()->get($record->father_msl_1 - 1) ?? $record->father_msl_1 }}
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label">Father - Aspect 2</div>
                    <div class="form-value">
                        @if($record->father_msl_2)
                        {{ \App\Models\Intervention::mslOptions2()->get($record->father_msl_2 - 1) ?? $record->father_msl_2 }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Caregiver (MSL) -->
        <div class="subsection">
            <div class="subsection-title">Caregiver (MSL)</div>
            <div class="form-row">
                <div class="form-group">
                    <div class="form-label">Caregiver - Aspect 1</div>
                    <div class="form-value">
                        @if($record->caregiver_msl_1)
                        {{ \App\Models\Intervention::mslOptions1()->get($record->caregiver_msl_1 - 1) ?? $record->caregiver_msl_1 }}
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label">Caregiver - Aspect 2</div>
                    <div class="form-value">
                        @if($record->caregiver_msl_2)
                        {{ \App\Models\Intervention::mslOptions2()->get($record->caregiver_msl_2 - 1) ?? $record->caregiver_msl_2 }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Communication and Caregiver Information -->
        <div class="subsection">
            <div class="subsection-title">Communication & Caregiver Details</div>
            <div class="form-row">
                <div class="form-group">
                    <div class="form-label">Whom to Communicate</div>
                    <div class="form-value">
                        @if($record->communicate_to)
                        {{ \App\Models\Intervention::whomToCommunicateOptions()->get($record->communicate_to - 1) ?? $record->communicate_to }}
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label">Caregiver Name</div>
                    <div class="form-value">{{ $record->caregiver_name ?? '' }}</div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group full-width">
                    <div class="form-label">Caregiver Relationship</div>
                    <div class="form-value" style="min-height: 40px;">{{ $record->caregiver_relationship ?? '' }}</div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group full-width">
                    <div class="form-label">Caregiver Other Information</div>
                    <div class="form-value" style="min-height: 40px;">{{ $record->caregiver_other_info ?? '' }}</div>
                </div>
            </div>
        </div>

        <!-- Relevant Information -->
        <div class="subsection">
            <div class="subsection-title">Caregiver Information Status</div>
            <div class="form-row">
                <div class="form-group">
                    <div class="form-label">Has Relevant Information Given?</div>
                    <div class="form-value">
                        <span class="checkbox {{ $record->has_caregiver_relevant_info ? 'checked' : '' }}"></span>
                        {{ $record->has_caregiver_relevant_info ? 'Yes' : 'No' }}
                    </div>
                </div>
            </div>
            @if($record->has_caregiver_relevant_info)
            <div class="form-row">
                <div class="form-group full-width">
                    <div class="form-label">Relevant Information Details</div>
                    <div class="form-value" style="min-height: 50px;">{{ $record->caregiver_relevant_info ?? '' }}</div>
                </div>
            </div>
            @endif
        </div>

        <!-- First Therapy Session -->
        <div class="subsection">
            <div class="subsection-title">Therapy Session Status</div>
            <div class="form-row">
                <div class="form-group">
                    <div class="form-label">Has Attended First Therapy?</div>
                    <div class="form-value">
                        <span class="checkbox {{ $record->is_first_therapy ? 'checked' : '' }}"></span>
                        {{ $record->is_first_therapy ? 'Yes' : 'No' }}
                    </div>
                </div>
            </div>
            @if($record->is_first_therapy)
            <div class="form-row">
                <div class="form-group">
                    <div class="form-label">Therapy Status Option</div>
                    <div class="form-value">
                        @if($record->if_not_first_therapy)
                        {{ \App\Models\Intervention::notFirstTherapyOptions()->get($record->if_not_first_therapy - 1) ?? $record->if_not_first_therapy }}
                        @endif
                    </div>
                </div>
            </div>
            @if($record->if_not_first_therapy == 4)
            <div class="form-row">
                <div class="form-group full-width">
                    <div class="form-label">Other Therapy Description</div>
                    <div class="form-value" style="min-height: 40px;">{{ $record->if_not_other_first_therapy_description ?? '' }}</div>
                </div>
            </div>
            @endif
            @endif
        </div>
    </div>

    <!-- Payment Option Section -->
    <div class="section">
        <div class="section-title">Payment Option</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Insurance Coverage</div>
                <div class="form-value">
                    @if($record->has_insurance_coverage !== null)
                    {{ \App\Models\Intervention::hasInsuranceCoverageOptions()->get($record->has_insurance_coverage) ?? $record->has_insurance_coverage }}
                    @endif
                </div>
            </div>
        </div>

        @if($record->has_insurance_coverage == 0)
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Insurance Provider Name</div>
                <div class="form-value">{{ $record->insurance_name ?? '' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-label">Insurance Services Covered</div>
                <div class="form-value" style="min-height: 50px;">{{ $record->insurance_services_covered ?? '' }}</div>
            </div>
        </div>
        @elseif($record->has_insurance_coverage == 1)
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-label">Cost of Services (No Insurance)</div>
                <div class="form-value" style="min-height: 50px;">{{ $record->cost_services ?? '' }}</div>
            </div>
        </div>
        @if($record->cost_services_file)
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-label">Cost Services File</div>
                <div class="form-value">{{ $record->cost_services_file ?? '' }}</div>
            </div>
        </div>
        @endif
        @endif
    </div>

    <!-- Therapy Enrolment Section -->
    <div class="section">
        <div class="section-title">Therapy Enrolment</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Therapist Name</div>
                <div class="form-value">{{ $record->therapist_name ?? '' }}</div>
            </div>
            <div class="form-group">
                <div class="form-label">Supervisor Name</div>
                <div class="form-value">{{ $record->supervisor_name ?? '' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Schedule Required?</div>
                <div class="form-value">
                    <span class="checkbox {{ $record->is_schedule ? 'checked' : '' }}"></span>
                    {{ $record->is_schedule ? 'Yes' : 'No' }}
                </div>
            </div>
        </div>

        @if($record->is_schedule)
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Schedule Date & Time</div>
                <div class="form-value">
                    {{ $record->schedule_date_time ? \Carbon\Carbon::parse($record->schedule_date_time)->format('d-m-Y H:i') : '' }}
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">Schedule Supervisor Name</div>
                <div class="form-value">{{ $record->schedule_supervisor_name ?? '' }}</div>
            </div>
        </div>
        @endif
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Generated on {{ now()->format('d-m-Y H:i:s') }}</p>
        <p>This is an automatically generated document. Please verify all information for accuracy.</p>
    </div>
</body>

</html>