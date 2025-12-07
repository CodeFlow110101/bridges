<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Consent Form D</title>
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
            max-width: 800px;
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
            grid-template-columns: 1fr 1fr;
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
        <h1>Consent Form D</h1>

        <div class="section">
            <div class="section-title">CLIENT INFORMATION</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Name</div>
                    <div class="info-value">{{ $record->name ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Age</div>
                    <div class="info-value">{{ $record->age ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Gender</div>
                    <div class="info-value">{{ $record->gender ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Parent Name</div>
                    <div class="info-value">{{ $record->parent_name ?? 'N/A' }}</div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">SIGNATURE INFORMATION</div>
            <div class="info-grid">
                <div class="info-item full-width">
                    <div class="info-label">Date and Time</div>
                    <div class="info-value">{{ $record->date_and_time ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Therapist Name</div>
                    <div class="info-value">{{ $record->therapist_name ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Witness Name</div>
                    <div class="info-value">{{ $record->witness_name ?? 'N/A' }}</div>
                </div>
            </div>
        </div>

        <div class="signature-section" style="margin-top: 40px; grid-template-columns: 1fr 1fr 1fr;">
            <div class="signature-box">
                @if($record->signature)
                <img src="data:image/png;base64,{{ $record->signature }}" alt="Client Signature" class="signature-image" />
                @endif
                <strong>Client</strong>
            </div>
            <div class="signature-box">
                @if($record->parent_signature)
                <img src="data:image/png;base64,{{ $record->parent_signature }}" alt="Parent Signature" class="signature-image" />
                @endif
                <strong>Parent</strong>
            </div>
            <div class="signature-box">
                @if($record->therapist_signature)
                <img src="data:image/png;base64,{{ $record->therapist_signature }}" alt="Therapist Signature" class="signature-image" />
                @endif
                <strong>Therapist</strong>
            </div>
        </div>

        <div style="margin-top: 30px;">
            <div class="signature-box">
                @if($record->witness_signature)
                <img src="data:image/png;base64,{{ $record->witness_signature }}" alt="Witness Signature" class="signature-image" />
                @endif
                <strong>Witness</strong>
            </div>
        </div>
    </div>
</body>

</html>