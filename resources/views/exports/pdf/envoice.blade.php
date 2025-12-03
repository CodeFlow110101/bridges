<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.4;
            color: #333;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #333;
            padding-bottom: 15px;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }
        .header p {
            margin: 5px 0;
            font-size: 10px;
        }
        .invoice-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
        }
        .invoice-meta-item {
            flex: 1;
        }
        .invoice-meta-label {
            font-weight: bold;
            font-size: 10px;
            color: #555;
        }
        .invoice-meta-value {
            font-size: 11px;
            color: #333;
        }
        .section {
            margin-bottom: 25px;
            border: 1px solid #ddd;
            padding: 12px;
            background-color: #f9f9f9;
        }
        .section-title {
            font-size: 13px;
            font-weight: bold;
            color: #fff;
            background-color: #333;
            padding: 8px 12px;
            margin: -12px -12px 12px -12px;
        }
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 12px;
        }
        .form-group {
            flex: 1;
        }
        .form-label {
            font-weight: bold;
            color: #555;
            font-size: 10px;
            margin-bottom: 3px;
            text-transform: uppercase;
        }
        .form-value {
            background-color: #fff;
            padding: 6px 8px;
            border: 1px solid #ddd;
            min-height: 20px;
            word-wrap: break-word;
        }
        .subsection {
            margin: 15px 0 12px 0;
            border-left: 3px solid #333;
            padding-left: 12px;
        }
        .subsection-title {
            font-size: 11px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        table th {
            background-color: #e0e0e0;
            padding: 8px;
            text-align: left;
            font-weight: bold;
            font-size: 10px;
            border: 1px solid #ccc;
        }
        table td {
            padding: 8px;
            border: 1px solid #ddd;
            font-size: 10px;
        }
        .full-width {
            width: 100%;
        }
        .amount {
            text-align: right;
            font-weight: bold;
        }
        .highlight {
            background-color: #fff3cd;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            border-top: 1px solid #ddd;
            padding-top: 15px;
            font-size: 9px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>INVOICE</h1>
        <p>Payment Record & Service Summary</p>
    </div>

    <!-- Invoice Meta Information -->
    <div class="invoice-meta">
        <div class="invoice-meta-item">
            <div class="invoice-meta-label">Invoice Number</div>
            <div class="invoice-meta-value">{{ $record->invoice_number ?? 'N/A' }}</div>
        </div>
        <div class="invoice-meta-item">
            <div class="invoice-meta-label">Invoice Date & Time</div>
            <div class="invoice-meta-value">{{ $record->date_and_time ? \Carbon\Carbon::parse($record->date_and_time)->format('d-m-Y H:i') : '' }}</div>
        </div>
        <div class="invoice-meta-item">
            <div class="invoice-meta-label">Generated On</div>
            <div class="invoice-meta-value">{{ now()->format('d-m-Y H:i:s') }}</div>
        </div>
    </div>

    <!-- Client Information Section -->
    <div class="section">
        <div class="section-title">Client Information</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Client Name</div>
                <div class="form-value">{{ $record->client_name ?? '' }}</div>
            </div>
            <div class="form-group">
                <div class="form-label">Client ID</div>
                <div class="form-value">{{ $record->client_id ?? '' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Department</div>
                <div class="form-value">{{ $record->department?->name ?? '' }}</div>
            </div>
        </div>
        @if($record->other)
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-label">Additional Information</div>
                <div class="form-value" style="min-height: 50px;">{{ $record->other }}</div>
            </div>
        </div>
        @endif
    </div>

    <!-- Service Details Section -->
    <div class="section">
        <div class="section-title">Service Details</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Service</div>
                <div class="form-value">{{ $record->service ?? '' }}</div>
            </div>
            <div class="form-group">
                <div class="form-label">Number of Sessions</div>
                <div class="form-value">{{ $record->no_of_sessions ?? '' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Amount</div>
                <div class="form-value amount">{{ $record->amount ?? '' }}</div>
            </div>
            <div class="form-group">
                <div class="form-label">Validity of Period for Amount Paid</div>
                <div class="form-value">{{ $record->validity_of_period_for_amount_paid ?? '' }}</div>
            </div>
        </div>
    </div>

    <!-- Payment Method Section -->
    <div class="section">
        <div class="section-title">Payment Method</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Payment Method</div>
                <div class="form-value">{{ $record->method ?? '' }}</div>
            </div>
        </div>

        <!-- Payment Details based on Method -->
        <div class="subsection">
            <div class="subsection-title">Payment Information</div>
            
            @if($record->cheque_no)
            <div class="form-row highlight">
                <div class="form-group">
                    <div class="form-label">Cheque Number</div>
                    <div class="form-value">{{ $record->cheque_no }}</div>
                </div>
                <div class="form-group">
                    <div class="form-label">Cheque Date</div>
                    <div class="form-value">{{ $record->cheque_date ? \Carbon\Carbon::parse($record->cheque_date)->format('d-m-Y') : '' }}</div>
                </div>
            </div>
            @endif

            @if($record->bank_transaction_no)
            <div class="form-row highlight">
                <div class="form-group">
                    <div class="form-label">Bank Transaction Number</div>
                    <div class="form-value">{{ $record->bank_transaction_no }}</div>
                </div>
            </div>
            @endif

            @if($record->skiply)
            <div class="form-row">
                <div class="form-group">
                    <div class="form-label">Skiply Reference</div>
                    <div class="form-value">{{ $record->skiply }}</div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Summary Table -->
    <div class="section">
        <div class="section-title">Invoice Summary</div>
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th style="text-align: right; width: 20%;">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Service: {{ $record->service ?? 'N/A' }}</td>
                    <td class="amount">{{ $record->amount ?? '0' }}</td>
                </tr>
                <tr>
                    <td>Number of Sessions</td>
                    <td class="amount">{{ $record->no_of_sessions ?? '0' }}</td>
                </tr>
                <tr style="background-color: #e8e8e8; font-weight: bold;">
                    <td>Total Amount</td>
                    <td class="amount">{{ $record->amount ?? '0' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Comments Section -->
    @if($record->comment)
    <div class="section">
        <div class="section-title">Comments & Notes</div>
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-value" style="min-height: 60px;">{{ $record->comment }}</div>
            </div>
        </div>
    </div>
    @endif

    <!-- Footer -->
    <div class="footer">
        <p>This is an automatically generated invoice. Please verify all information for accuracy.</p>
        <p>Generated on {{ now()->format('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>
