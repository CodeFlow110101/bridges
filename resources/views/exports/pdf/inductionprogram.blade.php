<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Induction Program</title>
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
        <h1>Induction Program</h1>
        <div>Employee: {{ $record->user?->getFilamentName() ?? '' }}</div>
    </div>

    <div class="section">
        <div class="section-title">Basic Information</div>
        <div class="row">
            <div class="col">
                <div class="label">Employee Name</div>
                <div class="value">{{ $record->user?->getFilamentName() ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Job Title</div>
                <div class="value">{{ $record->job_title ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Date</div>
                <div class="value">{{ $record->date ? \Carbon\Carbon::parse($record->date)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Department Induction</div>
        <table>
            <thead>
                <tr>
                    <th>Department Area</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Department Facilities</td>
                    <td>{{ $record->df ? 'Completed' : 'Pending' }}</td>
                </tr>
                <tr>
                    <td>IT & Communications</td>
                    <td>{{ $record->itc ? 'Completed' : 'Pending' }}</td>
                </tr>
                <tr>
                    <td>New Employee Orientation</td>
                    <td>{{ $record->neoj ? 'Completed' : 'Pending' }}</td>
                </tr>
                <tr>
                    <td>Supervision</td>
                    <td>{{ $record->sup ? 'Completed' : 'Pending' }}</td>
                </tr>
                <tr>
                    <td>General Learning Experience</td>
                    <td>{{ $record->gle ? 'Completed' : 'Pending' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Conditions of Employment</div>
        <div class="row">
            <div class="col">
                <div class="label">Introduction Overview</div>
                <div class="value">{{ $record->iohow ? 'Completed' : 'Pending' }}</div>
            </div>
            <div class="col">
                <div class="label">Terms of Reference</div>
                <div class="value">{{ $record->trfpeiam ? 'Completed' : 'Pending' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Signatories</div>
        <div class="row">
            <div class="col">
                <div class="label">HR Name</div>
                <div class="value">{{ $record->hr_name ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">HR Date</div>
                <div class="value">{{ $record->hr_date ? \Carbon\Carbon::parse($record->hr_date)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">First Party Name</div>
                <div class="value">{{ $record->first_party_name ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">First Party Position</div>
                <div class="value">{{ $record->first_party_position ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Second Party Name</div>
                <div class="value">{{ $record->second_party_name ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Second Party Date</div>
                <div class="value">{{ $record->second_party_date ? \Carbon\Carbon::parse($record->second_party_date)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div>Generated on {{ now()->format('d-m-Y H:i:s') }}</div>
    </div>
</body>

</html>