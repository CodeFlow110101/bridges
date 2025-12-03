<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Enquiry Report</title>
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

        .status-yes {
            color: #27ae60;
            font-weight: bold;
        }

        .status-no {
            color: #e74c3c;
            font-weight: bold;
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
        <h1>Enquiry Report</h1>
        <p>Client Enquiry & Follow-up Record</p>
    </div>

    <!-- Client Information Section -->
    <div class="section">
        <div class="section-title">Client Information</div>
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
            <div class="form-group">
                <div class="form-label">School</div>
                <div class="form-value">{{ $record->school ?? '' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Phone No (In Dubai)</div>
                <div class="form-value">{{ $record->phone_no ?? '' }}</div>
            </div>
            <div class="form-group">
                <div class="form-label">Email Address</div>
                <div class="form-value">{{ $record->email ?? '' }}</div>
            </div>
        </div>
    </div>

    <!-- Insurance & Referral Section -->
    <div class="section">
        <div class="section-title">Insurance & Referral Information</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Insurance Covered?</div>
                <div class="form-value">
                    @if($record->is_insurance_covered === 0)
                    <span class="status-yes">Yes</span>
                    @elseif($record->is_insurance_covered === 1)
                    <span class="status-no">No</span>
                    @elseif($record->is_insurance_covered === 2)
                    <span>Unaware</span>
                    @endif
                </div>
            </div>
            @if($record->is_insurance_covered === 0)
            <div class="form-group">
                <div class="form-label">Insurance Name</div>
                <div class="form-value">{{ $record->insurance_name ?? '' }}</div>
            </div>
            @endif
        </div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Referral Source</div>
                <div class="form-value">
                    @if($record->referral_source !== null)
                    {{ \App\Models\Enquiry::referralSourceOptions()[$record->referral_source] ?? $record->referral_source }}
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">Referral Source Name</div>
                <div class="form-value">{{ $record->referral_source_name ?? '' }}</div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="section">
        <div class="section-title">Services Enquired</div>
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-label">Inquired Service</div>
                <div class="form-value">
                    @if($record->inquired_service !== null)
                    {{ \App\Models\Enquiry::enquiredServices()[$record->inquired_service] ?? $record->inquired_service }}
                    @endif
                </div>
            </div>
        </div>
        @if($record->other_service)
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-label">Other Service Details</div>
                <div class="form-value">{{ $record->other_service }}</div>
            </div>
        </div>
        @endif
    </div>

    <!-- History Section -->
    <div class="section">
        <div class="section-title">Client History</div>
        <div class="subsection">
            <div class="subsection-title">Previous Intervention</div>
            <div class="form-row">
                <div class="form-group">
                    <div class="form-label">Has Taken Intervention Before?</div>
                    <div class="form-value">
                        <span class="checkbox {{ $record->has_taken_intervention_before ? 'checked' : '' }}"></span>
                        {{ $record->has_taken_intervention_before ? 'Yes' : 'No' }}
                    </div>
                </div>
            </div>
            @if($record->has_taken_intervention_before)
            <div class="form-row">
                <div class="form-group full-width">
                    <div class="form-label">Intervention Details</div>
                    <div class="form-value" style="min-height: 50px;">{{ $record->intervention_details ?? '' }}</div>
                </div>
            </div>
            @endif
        </div>

        <div class="subsection">
            <div class="subsection-title">Assessment Requirements</div>
            <div class="form-row">
                <div class="form-group">
                    <div class="form-label">Is Assessment Required?</div>
                    <div class="form-value">
                        <span class="checkbox {{ $record->is_assessment_required ? 'checked' : '' }}"></span>
                        {{ $record->is_assessment_required ? 'Yes' : 'No' }}
                    </div>
                </div>
            </div>
            @if($record->is_assessment_required)
            <div class="form-row">
                <div class="form-group full-width">
                    <div class="form-label">Assessment Details</div>
                    <div class="form-value" style="min-height: 50px;">{{ $record->assessment_details ?? '' }}</div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Details Discussed Section -->
    <div class="section">
        <div class="section-title">Details Discussed with Client</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Cost of Service Mentioned</div>
                <div class="form-value">{{ $record->cost_of_service ?? '' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Report Consultation Mentioned?</div>
                <div class="form-value">
                    <span class="checkbox {{ $record->is_report_provided ? 'checked' : '' }}"></span>
                    @if($record->is_report_provided)
                    <span class="status-yes">Yes - Mentioned</span>
                    @else
                    <span class="status-no">No</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Is Client Satisfied?</div>
                <div class="form-value">
                    <span class="checkbox {{ $record->is_client_satisfied ? 'checked' : '' }}"></span>
                    {{ $record->is_client_satisfied ? 'Yes' : 'No' }}
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-label">Other Information</div>
                <div class="form-value" style="min-height: 50px;">{{ $record->other_info ?? '' }}</div>
            </div>
        </div>
    </div>

    <!-- Enquiry Response Section -->
    <div class="section">
        <div class="section-title">Referral & Response</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Date of Enquiry Answered</div>
                <div class="form-value">{{ $record->date_of_enquiry_answered ? \Carbon\Carbon::parse($record->date_of_enquiry_answered)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-label">Description of Response</div>
                <div class="form-value" style="min-height: 60px;">{{ $record->description_of_response ?? '' }}</div>
            </div>
        </div>
    </div>

    <!-- Appointment Section -->
    <div class="section">
        <div class="section-title">Appointment Booking</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Is Appointment Booked?</div>
                <div class="form-value">
                    <span class="checkbox {{ $record->is_appoinment_booked ? 'checked' : '' }}"></span>
                    {{ $record->is_appoinment_booked ? 'Yes' : 'No' }}
                </div>
            </div>
        </div>

        @if($record->is_appoinment_booked)
        <div class="subsection">
            <div class="subsection-title">Appointment Details</div>
            <div class="form-row">
                <div class="form-group">
                    <div class="form-label">Appointment Date & Time</div>
                    <div class="form-value">
                        {{ $record->appoinment_date_and_time ? \Carbon\Carbon::parse($record->appoinment_date_and_time)->format('d-m-Y H:i') : '' }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label">Supervisor Name</div>
                    <div class="form-value">{{ $record->supervisor_name ?? '' }}</div>
                </div>
            </div>
        </div>
        @else
        <div class="subsection">
            <div class="subsection-title">Appointment Not Booked - Details</div>
            <div class="form-row">
                <div class="form-group full-width">
                    <div class="form-label">Details When Appointment Not Booked</div>
                    <div class="form-value" style="min-height: 50px;">{{ $record->details_when_appoinment_not_booked ?? '' }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Session Section -->
    <div class="section">
        <div class="section-title">Session Attendance</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Has Session Been Scheduled?</div>
                <div class="form-value">
                    <span class="checkbox {{ $record->has_scheduled_session ? 'checked' : '' }}"></span>
                    {{ $record->has_scheduled_session ? 'Yes' : 'No' }}
                </div>
            </div>
        </div>

        @if($record->has_scheduled_session)
        <div class="subsection">
            <div class="subsection-title">Scheduled Session Details</div>
            <div class="form-row">
                <div class="form-group">
                    <div class="form-label">Session Date & Time</div>
                    <div class="form-value">
                        {{ $record->session_date_and_time ? \Carbon\Carbon::parse($record->session_date_and_time)->format('d-m-Y H:i') : '' }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label">Supervisor Name</div>
                    <div class="form-value">{{ $record->session_supervisor_name ?? '' }}</div>
                </div>
            </div>
        </div>
        @else
        <div class="subsection">
            <div class="subsection-title">Session Not Scheduled - Details</div>
            <div class="form-row">
                <div class="form-group full-width">
                    <div class="form-label">Details When Session Not Scheduled</div>
                    <div class="form-value" style="min-height: 50px;">{{ $record->details_when_session_not_scheduled ?? '' }}</div>
                </div>
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