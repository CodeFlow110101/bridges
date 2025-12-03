<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Long Term Client Report</title>
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
            font-size: 18px;
            color: #333;
        }

        .header p {
            margin: 5px 0;
            font-size: 10px;
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

        .form-value.empty {
            color: #999;
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

        .full-width {
            width: 100%;
        }

        .file-reference {
            background-color: #e8f4f8;
            padding: 6px 8px;
            border-left: 3px solid #3498db;
            color: #2980b9;
            font-style: italic;
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
        <h1>Long Term Client Report</h1>
        <p>Client Contract & Payment Record</p>
    </div>

    <!-- Client Information Section -->
    <div class="section">
        <div class="section-title">Client Information</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Client Enquiry Cheque Number</div>
                <div class="form-value">{{ $record->enquiry_number ?? '' }}</div>
            </div>
            <div class="form-group">
                <div class="form-label">Client Name</div>
                <div class="form-value">{{ $record->client_name ?? '' }}</div>
            </div>
        </div>
    </div>

    <!-- Documentation Section -->
    <div class="section">
        <div class="section-title">Client Documentation</div>
        <div class="subsection">
            <div class="subsection-title">Client's Letter of Discount</div>
            @if($record->client_letter_of_discount)
            <div class="form-value file-reference">
                📄 File: {{ $record->client_letter_of_discount }}
            </div>
            @else
            <div class="form-value">Not provided</div>
            @endif
        </div>
        <div class="subsection">
            <div class="subsection-title">Reply from Clinical Manager</div>
            @if($record->reply_from_clinical_manager)
            <div class="form-value file-reference">
                📄 File: {{ $record->reply_from_clinical_manager }}
            </div>
            @else
            <div class="form-value">Not provided</div>
            @endif
        </div>
    </div>

    <!-- Communication Timeline Section -->
    <div class="section">
        <div class="section-title">Communication Timeline</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Date When Email from Parent Received</div>
                <div class="form-value">{{ $record->email_recieved_from_parent_date ? \Carbon\Carbon::parse($record->email_recieved_from_parent_date)->format('d-m-Y') : '' }}</div>
            </div>
            <div class="form-group">
                <div class="form-label">Date When Email Replied by Clinic Manager</div>
                <div class="form-value">{{ $record->date_when_email_replied ? \Carbon\Carbon::parse($record->date_when_email_replied)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Email Date When Forwarded</div>
                <div class="form-value">{{ $record->email_date_from_forwarded ? \Carbon\Carbon::parse($record->email_date_from_forwarded)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
    </div>

    <!-- Email & Communication Details Section -->
    <div class="section">
        <div class="section-title">Email & Communication Details</div>
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-label">Email Address Through Which It Was Forwarded</div>
                <div class="form-value" style="min-height: 40px;">{{ $record->email_address_forwarded_through ?? '' }}</div>
            </div>
        </div>
    </div>

    <!-- Conditions & Diagnosis Section -->
    <div class="section">
        <div class="section-title">Clinical Information</div>
        <div class="form-row">
            <div class="form-group full-width">
                <div class="form-label">Brief on Conditions Discussed</div>
                <div class="form-value" style="min-height: 60px;">{{ $record->conditions_discovered ?? '' }}</div>
            </div>
        </div>
    </div>

    <!-- Payment & Contract Section -->
    <div class="section">
        <div class="section-title">Payment & Contract Details</div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Cheque Number</div>
                <div class="form-value">{{ $record->cheque_no ?? '' }}</div>
            </div>
            <div class="form-group">
                <div class="form-label">Cost Mentioned on Cheque</div>
                <div class="form-value">{{ $record->cost_on_cheque ?? '' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <div class="form-label">Number of Months Contract</div>
                <div class="form-value">{{ $record->contract_no_of_months ?? '' }}</div>
            </div>
            <div class="form-group">
                <div class="form-label">Alert to Generate On</div>
                <div class="form-value">{{ $record->alert_to_generate_on ?? '' }}</div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Generated on {{ now()->format('d-m-Y H:i:s') }}</p>
        <p>This is an automatically generated document. Please verify all information for accuracy.</p>
    </div>
</body>

</html>