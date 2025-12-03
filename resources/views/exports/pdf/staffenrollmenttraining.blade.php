<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Staff Enrollment Training</title>
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
        <h1>Staff Enrollment Training</h1>
        <div>Employee: {{ $record->employee_name ?? '' }}</div>
    </div>

    <div class="section">
        <div class="section-title">Basic Details</div>
        <div class="row">
            <div class="col">
                <div class="label">Employee Name</div>
                <div class="value">{{ $record->employee_name ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Highest Qualification</div>
                <div class="value">{{ $record->highest_qualification ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Department</div>
                <div class="value">{{ $record->department?->name ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Supervisor</div>
                <div class="value">{{ $record->supervisor ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Project Statuses</div>
        @if($record->statuses && $record->statuses->count())
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($record->statuses as $s)
                <tr>
                    <td>{{ $s->created_at ? \Carbon\Carbon::parse($s->created_at)->format('d-m-Y') : '' }}</td>
                    <td>{{ $s->status ?? '' }}</td>
                    <td>{{ $s->notes ?? '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="value">No project statuses recorded.</div>
        @endif
    </div>

    <div class="footer">
        <div>Generated on {{ now()->format('d-m-Y H:i:s') }}</div>
        <div>Verify training enrollment and status details.</div>
    </div>
</body>

</html>