<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dispute Management Record</title>
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
            line-height: 1.5
        }

        .full-width {
            width: 100%
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
        <h1>Dispute Management Record</h1>
        <div>Employee: {{ $record->user?->getFilamentName() ?? ($record->user?->first_name . ' ' . $record->user?->last_name) ?? 'N/A' }}</div>
    </div>

    <div class="section">
        <div class="section-title">Dispute Information</div>
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
            <div class="col full-width">
                <div class="label">Email to Forward</div>
                <div class="value">{{ $record->email_to_forward ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Concern Details</div>
        <div class="row">
            <div class="col full-width">
                <div class="label">Concern</div>
                <div class="value" style="min-height:60px">{{ $record->concern ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Resolution & Response</div>
        <div class="row">
            <div class="col">
                <div class="label">Addressed Date</div>
                <div class="value">{{ $record->addressed_date ? \Carbon\Carbon::parse($record->addressed_date)->format('d-m-Y') : '' }}</div>
            </div>
            <div class="col">
                <div class="label">Response Date</div>
                <div class="value">{{ $record->response_date ? \Carbon\Carbon::parse($record->response_date)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Responded By</div>
                <div class="value">{{ $record->responded_by ?? '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col full-width">
                <div class="label">Conclusion</div>
                <div class="value" style="min-height:60px">{{ $record->conclusion ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div>Generated on {{ now()->format('d-m-Y H:i:s') }}</div>
        <div>This is an automatically generated document. Please verify all information for accuracy.</div>
    </div>
</body>

</html>