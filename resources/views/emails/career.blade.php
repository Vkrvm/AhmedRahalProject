<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Career Application</title>
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
            background-color: #e74c3c;
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
            color: #e74c3c;
        }
        .field-value {
            margin-top: 5px;
            padding: 10px;
            background-color: white;
            border-left: 4px solid #e74c3c;
            border-radius: 3px;
        }
        .portfolio-link {
            color: #3498db;
            text-decoration: none;
        }
        .portfolio-link:hover {
            text-decoration: underline;
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
        <h1>New Career Application</h1>
        <p>Rahal Designs Website</p>
    </div>
    
    <div class="content">
        <div class="field">
            <div class="field-label">Full Name:</div>
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
            <div class="field-label">Design Role:</div>
            <div class="field-value">{{ $designRole }}</div>
        </div>
        
        @if($portfolio)
        <div class="field">
            <div class="field-label">Portfolio:</div>
            <div class="field-value">
                <a href="{{ $portfolio }}" class="portfolio-link" target="_blank">{{ $portfolio }}</a>
            </div>
        </div>
        @endif
        
        <div class="field">
            <div class="field-label">Message:</div>
            <div class="field-value">{{ $userMessage }}</div>
        </div>
    </div>
    
    <div class="footer">
        <p>This email was sent from the Rahal Designs career application form.</p>
        <p>Reply directly to this email to respond to the applicant.</p>
    </div>
</body>
</html>
