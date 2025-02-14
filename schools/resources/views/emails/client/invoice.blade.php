<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice from {{ env('APP_NAME') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #007BFF;
        }
        .content {
            margin-bottom: 20px;
        }
        .invoice-details {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .footer {
            text-align: center;
            color: #666;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Invoice from {{ env('APP_NAME') }}</h1>
        </div>
        <div class="content">
            <p>Dear {{ $data['name'] }},</p>
            <p>Thank you for your business! Please find the details of your invoice below:</p>
            
            <div class="invoice-details">
                <p><strong>Invoice Number:</strong> {{ $data['invoice_number'] }}</p>
                <p><strong>Date:</strong> {{ $data['date'] }}</p>
                <p><strong>Amount:</strong> {{ $data['amount'] }} SR</p>
            </div>
            
            <p>{{ $data['content'] }}</p>
            
            <p>If you have any questions, feel free to contact us at {{ env('APP_EMAIL') }}.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
