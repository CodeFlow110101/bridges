<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>End Service Report</title>
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
        <h1>End Service Report</h1>
        <div>Record for: {{ $record->user?->getFilamentName() ?? ($record->user?->first_name . ' ' . $record->user?->last_name) ?? 'N/A' }}</div>
    </div>

    <div class="section">
        <div class="section-title">User</div>
        <div class="row">
            <div class="col">
                <div class="label">Name</div>
                <div class="value">{{ $record->user?->getFilamentName() ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Email</div>
                <div class="value">{{ $record->user?->email ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Department</div>
                <div class="value">{{ $record->user?->department?->name ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Staff ID</div>
                <div class="value">{{ $record->user?->staff_id ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Responses</div>
        @if($record->responses && $record->responses->count())
        <table>
            <thead>
                <tr>
                    <th style="width:60%">Question</th>
                    <th>Response</th>
                    <th>Completed</th>
                </tr>
            </thead>
            <tbody>
                @foreach($record->responses as $r)
                <tr>
                    <td>{{ $r->question?->text ?? 'Question #' . $r->question_id }}</td>
                    <td>{{ $r->text ?? '' }}</td>
                    <td>{{ $r->is_complete ? 'Yes' : 'No' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="value">No responses recorded.</div>
        @endif
    </div>

    <div class="footer">
        <div>Generated on {{ now()->format('d-m-Y H:i:s') }}</div>
    </div>
</body>

</html>