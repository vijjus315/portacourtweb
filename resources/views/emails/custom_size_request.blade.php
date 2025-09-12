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
      font-size: 16px;
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
    .emoji {
      font-size: 18px;
    }
  </style>
</head>
<body>
<div class="container">
  <!-- <div class="header">
    <img src="https://www.portacourts.com/webassets/img/logo.png" alt="PortaCourts Logo">
  </div> -->
  <div class="content">
    <p>Hi {{$full_name}},</p>

    <p>Thank you for submitting your request for a custom court with PortaCourts! <span class="emoji">🎯</span></p>

    <p>Our team has received your details and will review them shortly. One of our experts will reach out to you soon to discuss your project further.</p>

    <p>Here’s a summary of your request:</p>
    <ul>
      <li><strong>🔹 Full Name:</strong> {{$full_name}}</li>
      <li><strong>🔹 Email:</strong> {{$email}}</li>
      <li><strong>🔹 Phone:</strong> {{$phone}}</li>
      <li><strong>🔹 Address:</strong> {{$address}}</li>
      <li><strong>🔹 Custom Size:</strong> {{$custom_size}}</li>
      <li><strong>🔹 Message:</strong><br>{{$description}}</li>
    </ul>

    <p>If you have any additional information or urgent changes, feel free to reach out to us at 
      <a href="mailto:support@portacourts.com">support@portacourts.com</a>.
    </p>

    <p>Thanks again for choosing PortaCourts – we're excited to help you build your perfect play space! 
      <span class="emoji">🏀🏐🎾</span>
    </p>

    <p>Best regards,<br><strong>The PortaCourts Team</strong></p>
  </div>
  <div class="footer">
    <p>&copy; 2025 PortaCourts. All rights reserved.</p>
  </div>
</div>
</body>
</html>
