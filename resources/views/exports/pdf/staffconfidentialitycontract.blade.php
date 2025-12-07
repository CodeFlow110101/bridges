<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Staff Confidentiality Contract</title>
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
        <h1>Staff Confidentiality Contract</h1>
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
                <div class="label">Effective Date</div>
                <div class="value">{{ $record->effective_date ? \Carbon\Carbon::parse($record->effective_date)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">License</div>
                <div class="value">{{ $record->license ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Contact Information</div>
        <div class="row">
            <div class="col">
                <div class="label">Phone Number</div>
                <div class="value">{{ $record->phoneno?->number ?? $record->phoneno?->phone ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Phone No (Dubai)</div>
                <div class="value">{{ $record->phonenodubai?->number ?? $record->phonenodubai?->phone ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Emergency Phone Number</div>
                <div class="value">{{ $record->emergencyPhoneNo?->number ?? $record->emergencyPhoneNo?->phone ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Address Information</div>
        <div class="row">
            <div class="col">
                <div class="label">Permanent Address</div>
                <div class="value">{{ $record->permanentAddress?->address_line_1 ?? '' }} {{ $record->permanentAddress?->city ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Temporary Address</div>
                <div class="value">{{ $record->temporaryAddress?->address_line_1 ?? '' }} {{ $record->temporaryAddress?->city ?? '' }}</div>
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
                <div class="label">Position</div>
                <div class="value">{{ $record->first_party_user_position ?? '' }}</div>
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
                <div class="value">{{ $record->second_party_passport_no ?? '' }}</div>
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
    </div>

    <div class="footer">
        <div>Generated on {{ now()->format('d-m-Y H:i:s') }}</div>
    </div>
</body>

</html>