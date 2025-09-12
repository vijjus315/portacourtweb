<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>New Custom Court Request Submitted</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 30px auto;
      background-color: #ffffff;
      border: 1px solid #e0e0e0;
      padding: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    .header {
      text-align: center;
      padding-bottom: 10px;
    }
    .header img {
      max-width: 180px;
    }
    .content {
      font-size: 16px;
      color: #333333;
      line-height: 1.6;
    }
    .footer {
      margin-top: 30px;
      text-align: center;
      font-size: 13px;
      color: #888888;
    }
    ul {
      padding-left: 20px;
    }
    .highlight {
      font-weight: bold;
    }
  </style>
</head>
<body>
<div class="container">
  <!-- <div class="header">
    <img src="https://www.portacourts.com/webassets/img/logo.png" alt="PortaCourts Logo">
  </div> -->
  <div class="content">

    <p>Hello Team,</p>

    <p>A new Custom Court Request has been submitted on the PortaCourts website. Please find the complete details below and take the necessary follow-up action.</p>

    <p><strong>Submitted Details:</strong></p>
    <ul>
      <li><strong>Full Name:</strong> {{$full_name}}</li>
      <li><strong>Email:</strong> {{$email}}</li>
      <li><strong>Phone Number:</strong> {{$phone}}</li>
      <li><strong>Address:</strong> {{$address}}</li>
      <li><strong>Custom Size:</strong> {{$custom_size}}</li>
      <li><strong>Message:</strong><br>{{$description}}</li>
      <li><strong>Submitted On:</strong> {{$submitted_at}}</li>
    </ul>

    <p>Please contact them to confirm requirements and initiate next steps.</p>

    <p>Regards,<br><strong>PortaCourts</strong></p>
  </div>
  <div class="footer">
    <p>&copy; 2025 PortaCourts. All rights reserved.</p>
  </div>
</div>
</body>
</html>
