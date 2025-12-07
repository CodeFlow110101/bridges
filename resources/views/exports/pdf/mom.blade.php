<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Minutes of Meeting</title>
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
        <h1>Minutes of Meeting (MOM)</h1>

        <div class="section">
            <div class="section-title">MEETING INFORMATION</div>
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
                    <div class="info-label">Date of Birth</div>
                    <div class="info-value">
                        @if($record->date_of_birth)
                        {{ \Carbon\Carbon::parse($record->date_of_birth)->format('d-m-Y') }}
                        @else
                        N/A
                        @endif
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">Session Date</div>
                    <div class="info-value">
                        @if($record->session_date)
                        {{ \Carbon\Carbon::parse($record->session_date)->format('d-m-Y') }}
                        @else
                        N/A
                        @endif
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">Meeting Date</div>
                    <div class="info-value">
                        @if($record->meeting_date)
                        {{ \Carbon\Carbon::parse($record->meeting_date)->format('d-m-Y') }}
                        @else
                        N/A
                        @endif
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">Date of MOM</div>
                    <div class="info-value">
                        @if($record->date_of_mom)
                        {{ \Carbon\Carbon::parse($record->date_of_mom)->format('d-m-Y') }}
                        @else
                        N/A
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">MOM DETAILS</div>
            <div class="info-grid">
                <div class="info-item full-width">
                    <div class="info-label">Things to be Followed by Supervisor</div>
                    <div class="info-value">{{ $record->things_to_be_followed_by_supervisor ?? 'N/A' }}</div>
                </div>
                <div class="info-item full-width">
                    <div class="info-label">Things to be Followed by Parent</div>
                    <div class="info-value">{{ $record->things_to_be_followed_by_parent ?? 'N/A' }}</div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">EMAIL INFORMATION</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Email From</div>
                    <div class="info-value">{{ $record->email_from ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Email To</div>
                    <div class="info-value">{{ $record->email_to ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Date of Email Sent</div>
                    <div class="info-value">
                        @if($record->date_of_email_sent)
                        {{ \Carbon\Carbon::parse($record->date_of_email_sent)->format('d-m-Y') }}
                        @else
                        N/A
                        @endif
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">File</div>
                    <div class="info-value">{{ $record->file ?? 'N/A' }}</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>