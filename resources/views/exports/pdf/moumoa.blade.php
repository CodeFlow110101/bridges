<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>MOU / MOA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #333;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px solid #333;
            padding-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 18px;
        }

        .section {
            margin-bottom: 18px;
            padding: 10px;
            border: 1px solid #ddd;
            background: #f9f9f9
        }

        .section-title {
            font-weight: bold;
            background: #333;
            color: #fff;
            padding: 6px 8px;
            margin: -10px -10px 10px -10px
        }

        .row {
            display: flex;
            gap: 16px;
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

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 11px
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
        <h1>MOU / MOA Details</h1>
        <div>Memorandum of Understanding / Agreement record</div>
    </div>

    <div class="section">
        <div class="section-title">General Information</div>
        <div class="row">
            <div class="col">
                <div class="label">Second Party Name</div>
                <div class="value">{{ $record->second_party_name ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Location</div>
                <div class="value">{{ $record->second_party_location ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Date Of Amendment</div>
                <div class="value">{{ $record->date_of_amendment ? \Carbon\Carbon::parse($record->date_of_amendment)->format('d-m-Y') : '' }}</div>
            </div>
            <div class="col">
                <div class="label">Date Of Termination</div>
                <div class="value">{{ $record->date_of_termination ? \Carbon\Carbon::parse($record->date_of_termination)->format('d-m-Y') : '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Set Alert For Renewal</div>
                <div class="value">{{ $record->set_alert_for_renewal ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Branch</div>
                <div class="value">{{ $record->branch ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Contract Validity (Years)</div>
                <div class="value">{{ $record->contract_validity_till_no_of_years ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Contract File</div>
                <div class="value">{{ $record->contract ?? 'Not provided' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Costs</div>
        <table>
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Speech Therapy (School/Contract)</td>
                    <td>{{ $record->speech_therapy_cost ?? '' }}</td>
                </tr>
                <tr>
                    <td>Occupational Therapy</td>
                    <td>{{ $record->occupational_therapy_cost ?? '' }}</td>
                </tr>
                <tr>
                    <td>Behavioural Therapy</td>
                    <td>{{ $record->behavioural_therapy_cost ?? '' }}</td>
                </tr>
                <tr>
                    <td>Psychoeducational Assessment</td>
                    <td>{{ $record->psychoeducational_assessment_cost ?? '' }}</td>
                </tr>
                <tr>
                    <td>Physiotherapy</td>
                    <td>{{ $record->physiotherapy_cost ?? '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <div>Generated on {{ now()->format('d-m-Y H:i:s') }}</div>
        <div>Verify details with original contract documents.</div>
    </div>
</body>

</html>