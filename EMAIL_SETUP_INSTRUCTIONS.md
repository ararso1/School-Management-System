# Email Setup Instructions for Forgot Password Functionality

This guide will help you configure Gmail SMTP for the Forgot Password feature.

## Prerequisites

- Gmail account: `arasoalisho2@gmail.com`
- Gmail App Password: `sxen rsqe xjkh slrg`

> **Important:** Never use your regular Gmail password in applications. Always use an App Password.
> Learn more: [Google App Passwords](https://support.google.com/accounts/answer/185833)

## Step 1: Update Your .env File

Add or update these variables in your `.env` file located at the root of your project:

```env
# ==============================================
# EMAIL CONFIGURATION FOR GMAIL SMTP
# ==============================================

# Mail Driver
MAIL_MAILER=smtp
MAIL_DRIVER=smtp

# Gmail SMTP Settings
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls

# Gmail Account Credentials
MAIL_USERNAME=arasoalisho2@gmail.com
MAIL_PASSWORD="sxen rsqe xjkh slrg"

# From Email and Name
MAIL_FROM_ADDRESS=arasoalisho2@gmail.com
MAIL_FROM_NAME="Meahidalnur School"
```

## Step 2: Update Database Email Settings

You have two options to update the email settings in the database:

### Option A: Using the Artisan Command (Recommended)

```bash
php artisan email:update-settings
```

This command will:
- Update email settings for all schools in the database
- Configure SMTP settings from your .env file
- Activate SMTP and deactivate PHP mail
- Display a summary of the configuration

### Option B: Using the Database Seeder

```bash
php artisan db:seed --class=UpdateEmailSettingsSeeder
```

## Step 3: Clear Configuration Cache

After updating the .env file and database, clear Laravel's config cache:

```bash
php artisan config:clear
```

Optional: Clear all caches for a fresh start:

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

## Step 4: Test the Forgot Password Functionality

1. Navigate to your login page
2. Click on "Forget Password?" link
3. Enter a valid email address from your system
4. Click "Submit"
5. Check the inbox of the entered email address
6. Click on the reset link in the email
7. Enter and confirm your new password
8. Login with the new password

## Troubleshooting

### Email Not Sending

1. **Check Gmail App Password**: Make sure you're using the App Password, not your regular Gmail password
2. **Enable Less Secure Apps**: If using App Password doesn't work, you may need to enable "Less secure app access" in your Gmail account settings (not recommended)
3. **Check Firewall**: Ensure your server can connect to smtp.gmail.com on port 587
4. **Check Logs**: Look at `storage/logs/laravel.log` for error messages

### Common Errors

**"Could not authenticate"**
- Verify the MAIL_USERNAME and MAIL_PASSWORD are correct
- Make sure you're using the App Password, not your regular password

**"Connection could not be established"**
- Check your internet connection
- Verify MAIL_HOST is set to smtp.gmail.com
- Verify MAIL_PORT is set to 587
- Check if your firewall is blocking outgoing connections on port 587

**"Email setting not found"**
- Make sure you ran the update command (Step 2)
- Check that sm_email_settings table exists in your database
- Verify that your school_id exists in sm_schools table

## Manual Database Configuration (Alternative)

If the automatic methods don't work, you can manually update the database:

```sql
-- Update SMTP settings for school_id = 1 (change if needed)
UPDATE sm_email_settings 
SET 
    from_name = 'School Management System',
    from_email = 'arasoalisho2@gmail.com',
    mail_driver = 'smtp',
    mail_host = 'smtp.gmail.com',
    mail_port = '587',
    mail_username = 'arasoalisho2@gmail.com',
    mail_password = 'sxen rsqe xjkh slrg',
    mail_encryption = 'tls',
    active_status = 1
WHERE 
    school_id = 1 
    AND email_engine_type = 'smtp';

-- Update general settings to use SMTP
UPDATE sm_general_settings 
SET email_driver = 'smtp' 
WHERE school_id = 1;

-- Deactivate PHP mail
UPDATE sm_email_settings 
SET active_status = 0 
WHERE school_id = 1 AND email_engine_type = 'php';
```

## Security Best Practices

1. **Never commit .env file**: The .env file is in .gitignore - keep it that way
2. **Use App Passwords**: Always use Gmail App Passwords instead of your main password
3. **Rotate Passwords**: Change your App Password regularly
4. **Monitor Usage**: Keep an eye on your Gmail sent folder for any suspicious activity

## Email Template Customization

The password reset email template can be customized in the admin panel:
1. Login as Super Admin
2. Navigate to System Settings > Email Template
3. Find "Password Reset" template
4. Customize the subject and body as needed

## Files Modified/Created

1. `database/seeders/UpdateEmailSettingsSeeder.php` - Seeder to update email settings
2. `app/Console/Commands/UpdateEmailSettings.php` - Artisan command for updating settings
3. `EMAIL_SETUP_INSTRUCTIONS.md` - This file

## Support

If you encounter any issues:
1. Check Laravel logs in `storage/logs/laravel.log`
2. Enable debugging in .env: `APP_DEBUG=true`
3. Test email sending using a simple test script
4. Verify your Gmail account is not blocked or suspended

---

**Last Updated:** November 2025

