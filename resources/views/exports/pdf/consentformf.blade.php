<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Consent Form F</title>
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

        .signature-section {
            margin-top: 30px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .signature-box {
            border-top: 1px solid #000;
            padding-top: 10px;
            text-align: center;
            font-size: 12px;
        }

        .signature-image {
            max-height: 80px;
            max-width: 150px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Consent Form F</h1>

        <div class="section">
            <div class="section-title">CHILD INFORMATION</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Child Name</div>
                    <div class="info-value">{{ $record->child_name ?? 'N/A' }}</div>
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
                    <div class="info-label">Phone No</div>
                    <div class="info-value">{{ $record->phone_no ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Email</div>
                    <div class="info-value">{{ $record->email ?? 'N/A' }}</div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">AUTHORIZED PERSON INFORMATION</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Authorized Person Name</div>
                    <div class="info-value">{{ $record->authorized_person_name ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Relationship</div>
                    <div class="info-value">{{ $record->authorized_person_relationship ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">ID</div>
                    <div class="info-value">{{ $record->authorized_person_id ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Phone No</div>
                    <div class="info-value">{{ $record->authorized_person_phone_no ?? 'N/A' }}</div>
                </div>
                <div class="info-item full-width">
                    <div class="info-label">Email</div>
                    <div class="info-value">{{ $record->authorized_person_email ?? 'N/A' }}</div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">PARENT/GUARDIAN INFORMATION</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Parent Name</div>
                    <div class="info-value">{{ $record->parent_name ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Relation</div>
                    <div class="info-value">{{ $record->relation ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Date</div>
                    <div class="info-value">
                        @if($record->date)
                        {{ \Carbon\Carbon::parse($record->date)->format('d-m-Y') }}
                        @else
                        N/A
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="signature-section">
            <div class="signature-box">
                @if($record->parent_signature)
                <img src="data:image/png;base64,{{ $record->parent_signature }}" alt="Parent Signature" class="signature-image" />
                @endif
                <strong>Parent/Guardian Signature</strong>
            </div>
        </div>
    </div>
</body>

</html>