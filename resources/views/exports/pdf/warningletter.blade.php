<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Warning Letter</title>
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
        <h1>Warning Letter</h1>
        <div>Employee: {{ $record->user?->getFilamentName() ?? ($record->user?->first_name . ' ' . $record->user?->last_name) ?? 'N/A' }}</div>
    </div>

    <div class="section">
        <div class="section-title">Letter Information</div>
        <div class="row">
            <div class="col">
                <div class="label">Employee Name</div>
                <div class="value">{{ $record->user?->getFilamentName() ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Date of Issue</div>
                <div class="value">{{ $record->date_of_issue ? \Carbon\Carbon::parse($record->date_of_issue)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Email Address to Respond To</div>
                <div class="value">{{ $record->email_address_to_respond_to ?? '' }}</div>
            </div>
            <div class="col">
                <div class="label">Should Be Completed By</div>
                <div class="value">{{ $record->should_be_completed_by_deadline ? \Carbon\Carbon::parse($record->should_be_completed_by_deadline)->format('d-m-Y') : '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Issue Details</div>

        <div class="row">
            <div class="col full-width">
                <div class="label">Brief Description of the Issue/Concern</div>
                <div class="value" style="min-height:50px">{{ $record->brief_description_of_the_issue_concern ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col full-width">
                <div class="label">Background Information or Events Leading Up to the Problem</div>
                <div class="value" style="min-height:50px">{{ $record->describe_any_relevant_background_information ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col full-width">
                <div class="label">Effects or Consequences of the Problem</div>
                <div class="value" style="min-height:50px">{{ $record->explain_the_effects_or_consequences_of_the_problem ?? '' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Actions Required</div>
        @if($record->actions && $record->actions->count())
        <ol style="margin:10px; padding-left:20px">
            @foreach($record->actions as $action)
            <li style="margin-bottom:8px; line-height:1.5">{{ $action->text ?? '' }}</li>
            @endforeach
        </ol>
        @else
        <div class="value">No actions listed.</div>
        @endif
    </div>

    <div class="section">
        <div class="section-title">Response & Resolution</div>

        <div class="row">
            <div class="col">
                <div class="label">Date When Address Appropriately</div>
                <div class="value">{{ $record->date_when_address_appropriately ? \Carbon\Carbon::parse($record->date_when_address_appropriately)->format('d-m-Y') : '' }}</div>
            </div>
            <div class="col">
                <div class="label">Responded By</div>
                <div class="value">{{ $record->responded_by ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col full-width">
                <div class="label">Response</div>
                <div class="value" style="min-height:50px">{{ $record->response ?? '' }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col full-width">
                <div class="label">Conclusion</div>
                <div class="value" style="min-height:50px">{{ $record->conclusion ?? '' }}</div>
            </div>
        </div>
    </div>

    @if($record->any_document)
    <div class="section">
        <div class="section-title">Attached Document</div>
        <div class="value">📄 {{ $record->any_document }}</div>
    </div>
    @endif

    <div class="footer">
        <div>Generated on {{ now()->format('d-m-Y H:i:s') }}</div>
        <div>This is an automatically generated document. Please verify all information for accuracy.</div>
    </div>
</body>

</html>