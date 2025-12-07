<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Case Allotment</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .container {
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #1f2937;
            font-size: 24px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            background-color: #1f2937;
            color: white;
            padding: 10px 15px;
            margin-bottom: 15px;
            font-weight: bold;
            font-size: 14px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .info-item {
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #f9fafb;
        }

        .info-label {
            font-weight: bold;
            color: #374151;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .info-value {
            color: #1f2937;
            font-size: 13px;
            word-break: break-word;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Case Allotment</h1>

        <div class="section">
            <div class="section-title">ALLOTMENT DETAILS</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Keyword</div>
                    <div class="info-value">{{ $record->keyword ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Category</div>
                    <div class="info-value">{{ $record->category ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Location</div>
                    <div class="info-value">{{ $record->location ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Assigned To</div>
                    <div class="info-value">{{ $record->user?->name ?? 'N/A' }}</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>