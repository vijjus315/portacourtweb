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
        .unsubscribe {
            color: #888888;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://portacouts.staging.co.in/webassets/img/logo.svg" alt="PortaCourts Logo">
        </div>
        <div class="content">
            <h2>Welcome to the PortaCourts Newsletter!</h2>
            <p>Dear {{$name}},</p>
            <p>Thank you for subscribing to the PortaCourts newsletter!</p>
            <p>You’re now signed up to receive the latest news, exclusive offers, and updates about our premium sports flooring solutions. We’re excited to keep you informed about new products, special promotions, and more.</p>
            <p>If you wish to unsubscribe from our newsletter at any time, you can do so by clicking the link below:</p>
            <p><a class="unsubscribe" href="[Unsubscribe Link]">Unsubscribe</a></p>
            <p>In the meantime, feel free to explore our website or contact us at <a href="mailto:support@portacourts.com">support@portacourts.com</a> if you have any questions.</p>
            <p>We appreciate your interest and look forward to staying connected!</p>
            <p>Best regards,<br>The PortaCourts Team</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 PortaCourts. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
