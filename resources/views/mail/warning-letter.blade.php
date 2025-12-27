<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Warning Letter</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
            color: #000;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
        }

        .signature {
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <p>Dear {{ $warning_letter->user->full_name }},</p>

        <p>
            I hope this message finds you well. I am writing to bring to your attention
            a matter of concern regarding {{ $warning_letter->brief_description_of_the_issue_concern }}.
            It has come to our notice that [provide details about the problem and its implications],
            and this is a matter that requires immediate attention.
        </p>

        <p>
            To provide some context, {{ $warning_letter->describe_any_relevant_background_information }}.
            This situation has led to {{ $warning_letter->explain_the_effects_or_consequences_of_the_problem }},
            which is unacceptable and contrary to our standards.
        </p>

        <p><strong>To address these issues effectively, the following actions are required:</strong></p>

        <ol>
            @foreach($warning_letter->actions as $action)
            <li>Action {{ $loop->iteration }}: {{ $action->text }}</li>
            @endforeach
        </ol>

        <p>
            Please ensure that these actions are completed by {{ $warning_letter->should_be_completed_by_deadline }}.
            Failure to address these issues may result in further disciplinary action.
            It is essential that we work together to resolve these issues promptly
            to uphold our commitment to excellence and professionalism.
        </p>

        <p>
            Should you have any questions or need assistance, feel free to reach out to us at
            {{ $warning_letter->email_address_to_respond_to }}.
        </p>

        <p>
            Thank you for your immediate attention to this matter and your cooperation
            in ensuring that we address these issues effectively.
        </p>

        <div class="signature">
            <p>Sincerely,</p>
            <p>
                [Your Name]<br>
                [Your Position]<br>
                [Company Name]
            </p>
        </div>
    </div>
</body>

</html>