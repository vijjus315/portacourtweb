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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://portacouts.staging.co.in/webassets/img/logo.svg" alt="PortaCourts Logo">
        </div>
        <div class="content">
            <h2>Welcome to PortaCourts!</h2>
            <p>Dear {{$name}},</p>
            <p>Welcome to PortaCourts!</p>
            <p>We’re excited to have you on board. As a member of our community, you'll have access to our premium sports flooring solutions and exclusive offers.</p>
            <p>Here’s what you can look forward to:</p>
            <ul>
                <li>Top-quality sports courts designed for ultimate performance.</li>
                <li>Exclusive benefits and promotions to enhance your experience.</li>
                <li>Expert support to assist you with any questions or needs.</li>
            </ul>
            <p>To get started, you can explore our website and check out our latest products and updates. If you need any assistance or have questions, don’t hesitate to contact us at <a href="mailto:support@portacourts.com">support@portacourts.com</a>.</p>
            <p>Thank you for choosing PortaCourts. We look forward to serving you!</p>
            <p>Best regards,<br>The PortaCourts Team</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 PortaCourts. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
