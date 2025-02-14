<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to [Your Company]</title>
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
            <p>Dear {{  json_decode($admin->name , true)['en'] }},</p>
            <p>We are excited to welcome you as a new administrator on our platform. Below are your login details:</p>
            <p>
                <strong>Email:</strong> {{ $admin->email }}<br>
                <strong>Password:</strong> {{ $password }}
            </p>
            <p>You can log in to your account using the link below:</p>
            <p><a href="{{router('login')}}" class="button">Login to Your Account</a></p>
            <p>Please make sure to change your password after logging in to ensure your account's security.</p>
            <p>If you have any questions or need assistance, feel free to contact us at [support email or phone number].</p>
            <p>Best regards,</p>
            <p>The {{env('APP_NAME')}} Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{env('APP_NAME')}}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
