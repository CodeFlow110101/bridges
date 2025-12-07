<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Therapy Room Cleanliness</title>
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

        .checklist {
            margin-bottom: 20px;
        }

        .checklist-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 8px;
            background-color: #f9fafb;
            font-size: 13px;
            line-height: 1.5;
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
            max-width: 200px;
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            font-size: 11px;
            color: #666;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Therapy Room Cleanliness Checklist</h1>

        <div class="section">
            <div class="section-title">RECORD INFORMATION</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Name</div>
                    <div class="info-value">{{ $record->name ?? 'N/A' }}</div>
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

        <div class="section">
            <div class="section-title">CLEANLINESS REQUIREMENTS</div>

            <div class="checklist">
                <strong style="font-size: 13px; color: #1f2937;">General Cleanliness:</strong>
                <div class="checklist-item">• Dirty Tissue Disposal: Keep a small tray under the table for dirty tissues.</div>
                <div class="checklist-item">• Toys and Documents: Do not collect toys, documents, or Writing pads on the table. Once used, keep it back in tray. Keep things which are required often.</div>
                <div class="checklist-item">• Sanitizer and Supplies: Ensure sanitizer, alcohol spray, and fresh tissue dispensing box are kept on the table.</div>
                <div class="checklist-item">• Used Materials: Do not keep any dirty or used materials in the box.</div>
                <div class="checklist-item">• Snack Items: Do not keep snack items in the room to avoid rat infestation.</div>
                <div class="checklist-item">• Coffee: Do not drink coffee in the therapy room.</div>
            </div>

            <div class="checklist">
                <strong style="font-size: 13px; color: #1f2937;">Safety and Maintenance:</strong>
                <div class="checklist-item">• Safety Padding: Ensure safety and protection padding is added to corners of wall as well as table are in good condition.</div>
                <div class="checklist-item">• Reporting Damage: If anything is broken, immediately inform about client's name, time, and room number in Super Team.</div>
            </div>

            <div class="checklist">
                <strong style="font-size: 13px; color: #1f2937;">End of Session Protocol:</strong>
                <div class="checklist-item">• Toy Shuffling: At the end of toy shuffling, make sure all toys are in good condition and in place before handing over to the next assigned therapist.</div>
                <div class="checklist-item">• Collect Supplies: Ensure the following items are collected and ready:
                    <ul style="margin-top: 5px; margin-left: 20px;">
                        <li>Notebook</li>
                        <li>Writing pad</li>
                        <li>Timer</li>
                        <li>Token board</li>
                        <li>Clicker (for ABA therapists)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">ACKNOWLEDGEMENT & SIGNATURE</div>
            <div style="padding: 10px; background-color: #f9fafb; border: 1px solid #ddd; margin-bottom: 20px; font-size: 13px; line-height: 1.6;">
                <p>I, the undersigned, have read and understood the cleanliness requirements and agree to comply with them at all times while on duty.</p>
            </div>

            <div class="signature-section">
                <div class="signature-box">
                    @if($record->signature)
                    <img src="data:image/png;base64,{{ $record->signature }}" alt="Signature" class="signature-image" />
                    @endif
                    <strong>{{ $record->name ?? 'Employee Signature' }}</strong>
                </div>
                <div class="signature-box">
                    <p><strong>Date:</strong> @if($record->date){{ \Carbon\Carbon::parse($record->date)->format('d-m-Y') }}@else N/A @endif</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>© 2024 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>

</html>