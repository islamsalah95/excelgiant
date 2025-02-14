<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ env('APP_Company') }}</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #444;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        /* Header Section */
        .header {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            padding: 25px;
            text-align: center;
            color: white;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .header p {
            font-size: 16px;
            margin-top: 8px;
            font-style: italic;
        }

        /* Content Section */
        .content {
            padding: 25px;
            background-color: #ffffff;
        }

        .content p {
            font-size: 16px;
            margin-bottom: 15px;
            color: #555;
        }

        .content p strong {
            color: #6a11cb;
        }

        /* Footer Section */
        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 15px;
            color: #666;
            font-size: 14px;
        }

        .footer p {
            margin: 0;
        }

        /* Button */
        .button {
            display: inline-block;
            background: #2575fc;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px;
        }

        .button:hover {
            background: #1a5ed3;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .container {
                margin: 10px;
                border-radius: 0;
            }

            .header h1 {
                font-size: 22px;
            }

            .content p {
                font-size: 14px;
            }

            .button {
                font-size: 14px;
                padding: 10px 16px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1>Message Redirect</h1>
            <p><strong>Notice:</strong> {{ $messageContent['replyMessage'] }}</p>
        </div>

        <!-- Content Section -->
        <div class="content">
            <p><strong>Customer Information:</strong></p>
            <p><strong>Name:</strong> {{ $messageContent['name'] }}</p>
            <p><strong>Message:</strong> {{ $messageContent['message'] }}</p>

            <p>Best regards,</p>
            <p style="font-weight: bold;">{{ env('APP_Company') }}</p>
            <p>The {{ env('APP_NAME') }} Team</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
