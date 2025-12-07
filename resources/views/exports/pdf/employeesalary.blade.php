<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Employee Salary</title>
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
            min-height: 18px;
            text-align: right
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

        td:nth-child(2) {
            text-align: right
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
        <h1>Employee Salary Slip</h1>
        <div>Employee: {{ $record->user?->getFilamentName() ?? '' }}</div>
    </div>

    <div class="section">
        <div class="section-title">Employee & Employment Details</div>
        <div class="row">
            <div class="col">
                <div class="label">Employee Name</div>
                <div class="value" style="text-align:left">{{ $record->user?->getFilamentName() ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Company Name</div>
                <div class="value" style="text-align:left">{{ $record->company_name ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Designation</div>
                <div class="value" style="text-align:left">{{ $record->designation ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Joining Date</div>
                <div class="value" style="text-align:left">{{ $record->joining_date ? \Carbon\Carbon::parse($record->joining_date)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Pay Period</div>
                <div class="value" style="text-align:left">{{ $record->pay_period ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Emergency Contact</div>
                <div class="value" style="text-align:left">{{ $record->emergency_contact_details ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Salary Breakdown</div>
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Basic Salary</td>
                    <td>{{ $record->basic_salary ?? '0' }}</td>
                </tr>
                <tr>
                    <td>HRA</td>
                    <td>{{ $record->hra ?? '0' }}</td>
                </tr>
                <tr>
                    <td>Other Allowances</td>
                    <td>{{ $record->other_allowances ?? '0' }}</td>
                </tr>
                <tr style="background:#e8e8e8; font-weight:bold">
                    <td>Total Earnings</td>
                    <td>{{ $record->total_earnings ?? '0' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Deductions & Advances</div>
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Loss of Pay</td>
                    <td>{{ $record->loss_of_pay_amount ?? '0' }}</td>
                </tr>
                <tr>
                    <td>Advance Deductions</td>
                    <td>{{ $record->advance_deductions ?? '0' }}</td>
                </tr>
                <tr>
                    <td>Other Deductions</td>
                    <td>{{ $record->other_deductions ?? '0' }}</td>
                </tr>
                <tr style="background:#e8e8e8; font-weight:bold">
                    <td>Total Deductions</td>
                    <td>{{ $record->total_deductions ?? '0' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Summary</div>
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total Advance Taken</td>
                    <td>{{ $record->total_advance_taken ?? '0' }}</td>
                </tr>
                <tr>
                    <td>Total Advance Balance</td>
                    <td>{{ $record->total_advance_balance ?? '0' }}</td>
                </tr>
                <tr style="background:#d4edda; font-weight:bold; font-size:12px">
                    <td>Final Salary</td>
                    <td>{{ $record->final_salary ?? '0' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <div>Generated on {{ now()->format('d-m-Y H:i:s') }}</div>
    </div>
</body>

</html>