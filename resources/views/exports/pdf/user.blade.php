<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>User Details</title>
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
        <h1>User Details</h1>
        <div>{{ $record->getFilamentName() ?? ($record->first_name . ' ' . $record->last_name) ?? 'User' }}</div>
    </div>

    <div class="section">
        <div class="section-title">Basic Information</div>
        <div class="row">
            <div class="col">
                <div class="label">First Name</div>
                <div class="value">{{ $record->first_name ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Last Name</div>
                <div class="value">{{ $record->last_name ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Email</div>
                <div class="value">{{ $record->email ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Date of Birth</div>
                <div class="value">{{ $record->date_of_birth ? \Carbon\Carbon::parse($record->date_of_birth)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Department</div>
                <div class="value">{{ $record->department?->name ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Staff ID</div>
                <div class="value">{{ $record->staff_id ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Phone Numbers</div>
        @if($record->phonenos && $record->phonenos->count())
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($record->phonenos as $p)
                <tr>
                    <td>{{ $p->type ?? 'Phone' }}</td>
                    <td>{{ $p->number ?? $p->phone ?? '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="value">No phone numbers recorded.</div>
        @endif
    </div>

    <div class="section">
        <div class="section-title">Addresses</div>
        @if($record->addresses && $record->addresses->count())
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach($record->addresses as $a)
                <tr>
                    <td>{{ $a->type ?? 'Address' }}</td>
                    <td>{{ trim(($a->address_line_1 ?? '') . ' ' . ($a->address_line_2 ?? '') . ' ' . ($a->city ?? '') . ' ' . ($a->postal_code ?? '')) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="value">No addresses recorded.</div>
        @endif
    </div>

    <div class="footer">
        <div>Generated on {{ now()->format('d-m-Y H:i:s') }}</div>
    </div>
</body>

</html>