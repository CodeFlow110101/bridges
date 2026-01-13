<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Handbook</title>
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
            margin: 0;
            font-size: 18px
        }

        .section {
            margin-bottom: 16px;
            padding: 10px;
            border: 1px solid #ddd;
            background: #f9f9f9
        }

        .signature-box {
            border-top: 1px solid #000;
            padding-top: 10px;
            text-align: center;
            font-size: 12px;
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
        <h1>Handbook</h1>
        <div>Employee: {{ $record->user?->getFilamentName() ?? '' }}</div>
    </div>

    <div class="section">
        <div class="section-title">Employee Information</div>
        <div class="row">
            <div class="col">
                <div class="label">Employee Name</div>
                <div class="value">{{ $record->user?->getFilamentName() ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Probation Period</div>
                <div class="value">{{ $record->probation ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Working Hours</div>
        <div class="row">
            <div class="col">
                <div class="label">Hours of Work 1</div>
                <div class="value">{{ $record->hours_of_work_1 ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Hours of Work 2</div>
                <div class="value">{{ $record->hours_of_work_2 ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">First Party</div>
        <div class="row">
            <div class="col">
                <div class="label">First Party Name</div>
                <div class="value">{{ $record->firstPartyUser?->getFilamentName() ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">First Party Position</div>
                <div class="value">{{ $record->first_party_position ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Contact Details</div>
                <div class="value">{{ $record->contact?->number ?? $record->contact?->phone ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Signature</div>
                <img src="{{ $record->first_party_signature }}" alt="Client Signature" class="signature-image" />
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Second Party</div>
        <div class="row">
            <div class="col">
                <div class="label">Second Party Name</div>
                <div class="value">{{ $record->second_party_name ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Passport Number</div>
                <div class="value">{{ $record->second_party_passport_number ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Current Address</div>
                <div class="value">{{ $record->second_party_current_address ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Date</div>
                <div class="value">{{ $record->second_party_date ? \Carbon\Carbon::parse($record->second_party_date)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
        <div style="margin-top: 30px;">
            <div class="signature-box">
                <div class="label">Signature</div>
                <img src="{{ $record->second_party_signature }}" alt="Client Signature" class="signature-image" />
            </div>
        </div>
    </div>
    </div>

    <div class="footer">
        <div>Generated on {{ now()->format('d-m-Y H:i:s') }}</div>
    </div>
</body>

</html>