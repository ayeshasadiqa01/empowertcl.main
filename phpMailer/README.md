# PHP Mailer Setup for Contact Form

This directory contains the PHP Mailer integration for the contact form. Follow these steps to set up email functionality.

## Setup Instructions

### 1. Configure Email Settings

Edit the `config.php` file and update the following settings:

```php
return [
    'host' => 'smtp.gmail.com', // Your SMTP host
    'username' => 'your-email@gmail.com', // Your email address
    'password' => 'your-app-password', // Your app password
    'port' => 587, // SMTP port
    'encryption' => 'tls', // 'tls' or 'ssl'
    'from_email' => 'your-email@gmail.com', // Sender email
    'from_name' => 'EmpowerTech Consulting LLC', // Sender name
    'to_email' => 'info@empowertcl.com', // Recipient email
    'to_name' => 'EmpowerTech Consulting' // Recipient name
];
```

### 2. Gmail Setup (Recommended)

If using Gmail:

1. **Enable 2-Factor Authentication** on your Gmail account
2. **Generate an App Password**:
   - Go to Google Account settings
   - Security → 2-Step Verification → App passwords
   - Generate a new app password for "Mail"
   - Use this password in the config (NOT your regular Gmail password)

### 3. Other Email Providers

For other providers, update the settings accordingly:

**Outlook/Hotmail:**
```php
'host' => 'smtp-mail.outlook.com',
'port' => 587,
'encryption' => 'tls'
```

**Yahoo:**
```php
'host' => 'smtp.mail.yahoo.com',
'port' => 587,
'encryption' => 'tls'
```

**Custom SMTP:**
```php
'host' => 'your-smtp-server.com',
'port' => 587, // or 465 for SSL
'encryption' => 'tls' // or 'ssl'
```

### 4. Test the Setup

1. Fill out the contact form on your website
2. Submit the form
3. Check if you receive the email at the configured recipient address
4. Check the browser console for any JavaScript errors

### 5. Troubleshooting

**Common Issues:**

1. **"Message could not be sent" error:**
   - Check your email credentials in `config.php`
   - Ensure you're using an app password for Gmail
   - Verify SMTP settings are correct

2. **"Connection timeout" error:**
   - Check if your hosting provider allows SMTP connections
   - Try different ports (587 or 465)
   - Contact your hosting provider if needed

3. **"Authentication failed" error:**
   - Double-check username and password
   - For Gmail, ensure you're using an app password, not your regular password
   - Make sure 2FA is enabled if using Gmail

### 6. Security Notes

- Keep your `config.php` file secure and don't commit it to version control
- Use app passwords instead of regular passwords
- Consider using environment variables for production deployments

### 7. File Structure

```
phpMailer/
├── config.php          # Email configuration
├── contact-mailer.php  # Main mailer class and handler
├── PHPMailer.php       # PHPMailer library
├── SMTP.php           # SMTP library
├── Exception.php      # Exception handling
└── README.md          # This file
```

## Features

- ✅ AJAX form submission (no page reload)
- ✅ Real-time form validation
- ✅ Professional email templates
- ✅ Error handling and user feedback
- ✅ Support for all form fields (name, email, phone, company, service, message)
- ✅ Reply-to functionality
- ✅ HTML and plain text email formats
