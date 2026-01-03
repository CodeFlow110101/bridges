<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Key Performance Indicator</title>
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
        <h1>Key Performance Indicator (KPI)</h1>
        <div>Employee: {{ $record->user?->getFilamentName() ?? '' }}</div>
    </div>

    <div class="section">
        <div class="section-title">Evaluation Details</div>
        <div class="row">
            <div class="col">
                <div class="label">Employee Name</div>
                <div class="value">{{ $record->user?->getFilamentName() ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Date</div>
                <div class="value">{{ $record->date ? \Carbon\Carbon::parse($record->date)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Evaluation Period</div>
                <div class="value">{{ $record->evaluation_period ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Rating</div>
                <div class="value">{{ $record->rating ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Performance Score</div>
                <div class="value">{{ $record->performance_score ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Quarterly Assessments</div>
        <table>
            <thead>
                <tr>
                    <th>Quarter</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Quarter 1</td>
                    <td>{{ $record->quarter_1 ?? '' }}</td>
                </tr>
                <tr>
                    <td>Quarter 2</td>
                    <td>{{ $record->quarter_2 ?? '' }}</td>
                </tr>
                <tr>
                    <td>Quarter 3</td>
                    <td>{{ $record->quarter_3 ?? '' }}</td>
                </tr>
                <tr>
                    <td>Quarter 4</td>
                    <td>{{ $record->quarter_4 ?? '' }}</td>
                </tr>
                <tr>
                    <td>Quarter 5</td>
                    <td>{{ $record->quarter_5 ?? '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Signatures</div>
        <table>
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Signature</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Employee</td>
                    <td><img src="{{ $record->employee_signature ?? '' }}" alt="Employee Signature" style="max-width: 200px; max-height: 80px;"></td>
                </tr>
                <tr>
                    <td>HOD / Supervisor</td>
                    <td><img src="{{ $record->hod_supervisor_signature ?? '' }}" alt="HOD / Supervisor Signature" style="max-width: 200px; max-height: 80px;"></td>
                </tr>
                <tr>
                    <td>HR</td>
                    <td><img src="{{ $record->hrs_signature ?? '' }}" alt="HR Signature" style="max-width: 200px; max-height: 80px;"></td>
                </tr>
                <tr>
                    <td>Director</td>
                    <td><img src="{{ $record->directors_signature ?? '' }}" alt="Director Signature" style="max-width: 200px; max-height: 80px;"></td>
                </tr>
                <tr>
                    <td>HOD / Supervisor (2nd)</td>
                    <td><img src="{{ $record->hod_supervisor_2nd_signature ?? '' }}" alt="HOD / Supervisor (2nd) Signature" style="max-width: 200px; max-height: 80px;"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <div>Generated on {{ now()->format('d-m-Y H:i:s') }}</div>
    </div>
</body>

</html>