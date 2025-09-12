<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .header img {
            max-width: 200px;
        }
        .content {
            padding: 20px;
            line-height: 1.6;
        }
        .otp {
            display: block;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px dashed #cccccc;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #888888;
        }
        .footer a {
            color: #888888;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://portacouts.staging.co.in/webassets/img/logo.svg" alt="PortaCourts Logo">
        </div>
        <div class="content">
            <p>Dear {{$name}},</p>
            <p>We received a request to reset your password for your PortaCourts account.</p>
            <p>To proceed with resetting your password, please use the following One-Time Password (OTP):</p>
            <div class="otp">[{{$otp}}]</div>
            <p>This OTP is valid for the next 30 minutes. If you did not request a password reset, please ignore this email or contact our support team for assistance.</p>
            <p>If you need further help, don’t hesitate to reach out to us at <a href="mailto:support@portacourts.com">support@portacourts.com</a>.</p>
            <p>Thank you for being a valued member of PortaCourts!</p>
            <p>Best regards,<br>The PortaCourts Team</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 PortaCourts. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
