# Mail Configuration Setup

## For Development/Testing (Current Setup)
The application is currently configured to use the `log` mail driver, which will write emails to the log files instead of actually sending them. This is perfect for development and testing.

## For Production Setup

To enable actual email sending in production, you need to configure your `.env` file with the following settings:

### Option 1: Gmail SMTP (Recommended for your use case)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-gmail@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-gmail@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

### Option 2: Other SMTP Providers
```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"
```

## Gmail Setup Instructions

1. **Enable 2-Factor Authentication** on your Gmail account
2. **Generate an App Password**:
   - Go to Google Account settings
   - Security → 2-Step Verification → App passwords
   - Generate a new app password for "Mail"
   - Use this password in your `.env` file

## Email Recipients

- **Contact Form**: rahaldesigns.info@gmail.com
- **Career Applications**: rahaldesigns.careers@gmail.com

## Testing

To test the email functionality:
1. Fill out the contact or career form on your website
2. Check the `storage/logs/laravel.log` file for the email content (in development)
3. Or check the configured email inbox (in production)

## Current Status

✅ Mail classes created (ContactMail, CareerMail)
✅ Controllers implemented (ContactController, CareerController)
✅ Forms updated with proper validation
✅ Routes configured
✅ Email templates created
✅ Error handling implemented

The system is ready to work! Just configure your mail settings when you're ready to go live.
