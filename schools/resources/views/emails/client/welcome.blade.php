<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{env('APP_NAME')}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to {{env('APP_NAME')}}</h1>
        </div>
        <div class="content">
            <p>Dear {{  $client->name }},</p>
            <p>We are excited to welcome you as a new customer on our platform. Below are your code</p>
            <p>
                <strong>code:</strong> {{ $client->code }}<br>
            </p>
            <p>Best regards,</p>
            <p>The {{env('APP_NAME')}} Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{env('APP_NAME')}}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
