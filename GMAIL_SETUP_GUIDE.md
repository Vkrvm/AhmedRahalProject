# Gmail SMTP Setup Guide for Rahal Designs

## ✅ Current Configuration Status

Your `.env` file has been updated with the following Gmail SMTP settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=rahaldesigns.info@gmail.com
MAIL_PASSWORD=YOUR_APP_PASSWORD_HERE
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="rahaldesigns.info@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## 🔧 What You Need to Do

### Step 1: Enable 2-Factor Authentication
1. Go to your Gmail account: `rahaldesigns.info@gmail.com`
2. Go to **Google Account Settings** → **Security**
3. Enable **2-Step Verification** if not already enabled

### Step 2: Generate App Password
1. In Google Account Settings → **Security**
2. Under **2-Step Verification**, click **App passwords**
3. Select **Mail** as the app
4. Generate a new app password
5. Copy the 16-character password (it will look like: `abcd efgh ijkl mnop`)

### Step 3: Update .env File
Replace `YOUR_APP_PASSWORD_HERE` in your `.env` file with the app password you generated:

```env
MAIL_PASSWORD=abcd efgh ijkl mnop
```

**Important:** Remove the spaces from the app password when adding it to the .env file.

### Step 4: Test the Configuration
1. Clear your config cache: `php artisan config:clear`
2. Test the contact form on your website
3. Check if emails are being sent successfully

## 📧 Email Recipients

- **Contact Form** → `rahaldesigns.info@gmail.com`
- **Career Applications** → `rahaldesigns.careers@gmail.com`

## 🚨 Important Notes

1. **No Additional Packages Needed**: Laravel's built-in mail system works with Gmail SMTP out of the box
2. **App Password Required**: You cannot use your regular Gmail password - you must use an app password
3. **Security**: The app password is specific to this application and can be revoked if needed
4. **Backup**: Your original .env file has been backed up as `.env.backup`

## 🔍 Troubleshooting

### If emails are not sending:
1. Verify the app password is correct (no spaces)
2. Check that 2-factor authentication is enabled
3. Clear config cache: `php artisan config:clear`
4. Check Laravel logs: `storage/logs/laravel.log`

### If you get authentication errors:
1. Double-check the app password
2. Make sure 2-factor authentication is enabled
3. Try generating a new app password

## ✅ Ready to Use

Once you complete Step 3 (updating the app password), your email system will be fully functional!

The forms will send emails to:
- Contact inquiries → `rahaldesigns.info@gmail.com`
- Career applications → `rahaldesigns.careers@gmail.com`
