<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background-color: #4caf50;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.5;
            margin: 0 0 20px;
        }
        #reset{  background-color: #4caf50;
            color: #ffffff;
            text-decoration: none;

            display: inline-block;
            padding: 10px 20px;
          
            border-radius: 5px;
            font-weight: bold;
        }
        .reset-button:hover {
            background-color: #3dc043;
        }
        .email-footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Password Reset Request</h1>
        </div>
        <div class="email-body">
            <p>Hello,</p>
            <p>You requested to reset your password. Click the button below to reset your password:</p>
            <p style="text-align: center;">
                <a id="reset" class="reset-button" href="{{ route('reset.password', ['token' => $token]) }}">Reset Password</a>
            </p>
            <p>If you did not request a password reset, please ignore this email or contact support if you have concerns.</p>
            <p>Thank you,<br>The Support Team</p>
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
