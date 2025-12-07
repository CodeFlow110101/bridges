<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Clinical Assessment</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .container {
            padding: 40px;
            max-width: 900px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #1f2937;
            font-size: 24px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            background-color: #1f2937;
            color: white;
            padding: 10px 15px;
            margin-bottom: 15px;
            font-weight: bold;
            font-size: 14px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .info-item {
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #f9fafb;
        }

        .info-label {
            font-weight: bold;
            color: #374151;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .info-value {
            color: #1f2937;
            font-size: 13px;
            word-break: break-word;
        }

        .full-width {
            grid-column: 1 / -1;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Clinical Assessment Report</h1>

        <div class="section">
            <div class="section-title">ASSESSMENT INFORMATION</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Inquiry Number</div>
                    <div class="info-value">{{ $record->inquiry_number ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Client Name</div>
                    <div class="info-value">{{ $record->name ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Assessment Date</div>
                    <div class="info-value">
                        @if($record->date)
                        {{ \Carbon\Carbon::parse($record->date)->format('d-m-Y') }}
                        @else
                        N/A
                        @endif
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">Referral Source</div>
                    <div class="info-value">{{ $record->referral_source ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Caregiver Name</div>
                    <div class="info-value">{{ $record->caregiver_name ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Supervisor's Name</div>
                    <div class="info-value">{{ $record->supervisors_name ?? 'N/A' }}</div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">MATERNAL SENSE OF LOSS (MSL)</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Mother MSL</div>
                    <div class="info-value">{{ $record->mother_msl ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Father MSL</div>
                    <div class="info-value">{{ $record->father_msl ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Caregiver MSL</div>
                    <div class="info-value">{{ $record->caregiver_msl ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Whom MSL</div>
                    <div class="info-value">{{ $record->whom_msl ?? 'N/A' }}</div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">CLINICAL DETAILS</div>
            <div class="info-grid">
                <div class="info-item full-width">
                    <div class="info-label">Discussed</div>
                    <div class="info-value">{{ $record->discussed ?? 'N/A' }}</div>
                </div>
                <div class="info-item full-width">
                    <div class="info-label">Investigation Procedure</div>
                    <div class="info-value">{{ $record->investigation_procedure ?? 'N/A' }}</div>
                </div>
                <div class="info-item full-width">
                    <div class="info-label">Case History</div>
                    <div class="info-value">{{ $record->case_history ?? 'N/A' }}</div>
                </div>
                <div class="info-item full-width">
                    <div class="info-label">Assessment</div>
                    <div class="info-value">{{ $record->assessment ?? 'N/A' }}</div>
                </div>
                <div class="info-item full-width">
                    <div class="info-label">Therapy Enrollment</div>
                    <div class="info-value">{{ $record->therapy_enrollment ?? 'N/A' }}</div>
                </div>
                <div class="info-item full-width">
                    <div class="info-label">Client Revisit Information</div>
                    <div class="info-value">{{ $record->client_revisit_information ?? 'N/A' }}</div>
                </div>
                <div class="info-item full-width">
                    <div class="info-label">Information to be Aware of</div>
                    <div class="info-value">{{ $record->information_to_be_aware_of ?? 'N/A' }}</div>
                </div>
                <div class="info-item full-width">
                    <div class="info-label">Future Reference</div>
                    <div class="info-value">{{ $record->future_reference ?? 'N/A' }}</div>
                </div>
                <div class="info-item full-width">
                    <div class="info-label">Other Information</div>
                    <div class="info-value">{{ $record->other_infomration ?? 'N/A' }}</div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">DOCUMENTATION</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Document Provided</div>
                    <div class="info-value">{{ $record->is_document_provided ? 'Yes' : 'No' }}</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>