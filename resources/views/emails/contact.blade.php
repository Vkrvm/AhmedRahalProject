<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 0 0 5px 5px;
        }
        .field {
            margin-bottom: 15px;
        }
        .field-label {
            font-weight: bold;
            color: #2c3e50;
        }
        .field-value {
            margin-top: 5px;
            padding: 10px;
            background-color: white;
            border-left: 4px solid #3498db;
            border-radius: 3px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #7f8c8d;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Form Submission</h1>
        <p>Rahal Designs Website</p>
    </div>
    
    <div class="content">
        <div class="field">
            <div class="field-label">Name:</div>
            <div class="field-value">{{ $name }}</div>
        </div>
        
        <div class="field">
            <div class="field-label">Email:</div>
            <div class="field-value">{{ $email }}</div>
        </div>
        
        <div class="field">
            <div class="field-label">Phone:</div>
            <div class="field-value">{{ $phone }}</div>
        </div>
        
        <div class="field">
            <div class="field-label">Branch:</div>
            <div class="field-value">{{ $branch }}</div>
        </div>
        
        <div class="field">
            <div class="field-label">Message:</div>
            <div class="field-value">{{ $userMessage }}</div>
        </div>
    </div>
    
    <div class="footer">
        <p>This email was sent from the Rahal Designs contact form.</p>
        <p>Reply directly to this email to respond to the customer.</p>
    </div>
</body>
</html>
