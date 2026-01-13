# Dispute Management

<table style="width: 100%; border-collapse: collapse;">
    <tr style="background-color: #f5f5f5;">
        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Employee Name:</strong></td>
        <td style="padding: 10px; border: 1px solid #ddd;">{{ $warning_letter->user?->getFilamentName() ?? '' }}</td>
    </tr>
    <tr>
        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Date of Issue:</strong></td>
        <td style="padding: 10px; border: 1px solid #ddd;">{{ $warning_letter->date ? \Carbon\Carbon::parse($warning_letter->date)->format('d-m-Y') : '' }}</td>
    </tr>
    <tr style="background-color: #f5f5f5;">
        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Email to Forward:</strong></td>
        <td style="padding: 10px; border: 1px solid #ddd;">{{ $warning_letter->email_to_forward ?? '' }}</td>
    </tr>
    <tr>
        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Concern:</strong></td>
        <td style="padding: 10px; border: 1px solid #ddd;">{{ $warning_letter->concern ?? '' }}</td>
    </tr>
    <tr style="background-color: #f5f5f5;">
        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Addressed Date:</strong></td>
        <td style="padding: 10px; border: 1px solid #ddd;">{{ $warning_letter->addressed_date ? \Carbon\Carbon::parse($warning_letter->addressed_date)->format('d-m-Y') : '' }}</td>
    </tr>
    <tr>
        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Response Date:</strong></td>
        <td style="padding: 10px; border: 1px solid #ddd;">{{ $warning_letter->response_date ? \Carbon\Carbon::parse($warning_letter->response_date)->format('d-m-Y') : '' }}</td>
    </tr>
    <tr style="background-color: #f5f5f5;">
        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Responded By:</strong></td>
        <td style="padding: 10px; border: 1px solid #ddd;">{{ $warning_letter->responded_by ?? '' }}</td>
    </tr>
    <tr>
        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Conclusion:</strong></td>
        <td style="padding: 10px; border: 1px solid #ddd;">{{ $warning_letter->conclusion ?? '' }}</td>
    </tr>
</table>