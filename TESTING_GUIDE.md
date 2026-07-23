# Testing Guide: Forgot Password Functionality

## ✅ Setup Complete!

The Gmail SMTP settings have been successfully configured:
- **Host:** smtp.gmail.com
- **Port:** 587
- **Encryption:** TLS
- **Email:** arasoalisho2@gmail.com
- **App Password:** sxen rsqe xjkh slrg (configured)
- **From Name:** Meahidalnur School

## How to Test the Forgot Password Feature

### Step 1: Access the Login Page

1. Open your browser
2. Navigate to your login page:
   ```
   http://localhost/school/login
   ```
   Or your custom URL if different

### Step 2: Click "Forget Password?"

1. On the login page, you'll see a "Forget Password?" link below the login form
2. Click on this link
3. You will be redirected to the password recovery page

### Step 3: Enter Email Address

1. On the recovery page, enter a valid email address that exists in your system
2. To find valid users, you can check your database:
   ```sql
   SELECT id, full_name, email, role_id FROM users WHERE email IS NOT NULL LIMIT 10;
   ```
3. Click the "Submit" button

### Step 4: Check for Success Message

1. After submitting, you should see a **clear success screen** that replaces the form with:
   - ✅ Large heading: "Email Sent Successfully!"
   - ✅ Message: "Success ! Please check your email"
   - ✅ Information: "We've sent a password reset link to your email address"
   - ✅ Reminder: "The link will expire in 24 hours"
   - ✅ Tip: "Please check your spam folder"
   - ✅ Two buttons: "Back to Login" and "Send Another Email"

2. If you see an error message like "Invalid Email, Please try again", the email doesn't exist in your system (the form will remain visible for you to try again)

### Step 5: Check Email Inbox

1. Open the email inbox for the email address you entered
2. Look for an email with subject related to "Password Reset"
3. The email will be sent from: arasoalisho2@gmail.com
4. **Important:** Check your spam/junk folder if you don't see it in the inbox

### Step 6: Click Reset Link

1. Open the password reset email
2. Click on the password reset link in the email
3. You will be redirected to a page where you can enter a new password

### Step 7: Set New Password

1. Enter your new password in the "New Password" field
2. Confirm the password in the "Confirm Password" field
3. Click "Submit"
4. You should see a success message: "Password has been reset successfully"

### Step 8: Login with New Password

1. Go back to the login page
2. Enter your email and the new password you just set
3. Click "Login"
4. You should be successfully logged in

## Quick Test Users

You can test with these default user roles (check your database for actual emails):

```sql
-- Get Super Admin email
SELECT email, role_id FROM users WHERE role_id = 1 LIMIT 1;

-- Get Admin email
SELECT email, role_id FROM users WHERE role_id = 5 LIMIT 1;

-- Get Teacher email
SELECT email, role_id FROM users WHERE role_id = 4 LIMIT 1;
```

## Troubleshooting

### Issue: "Invalid Email, Please try again"
**Solution:** The email doesn't exist in your database. Use a valid user email.

### Issue: Success message shown but no email received
**Possible causes:**
1. **Check spam folder** - Gmail might mark it as spam
2. **Gmail App Password incorrect** - Verify the password is: sxen rsqe xjkh slrg
3. **Internet connection** - Ensure your server can connect to smtp.gmail.com
4. **Gmail account blocked** - Check if the Gmail account has any security restrictions

**Debug steps:**
1. Check Laravel logs:
   ```
   tail -f storage/logs/laravel.log
   ```
   Or on Windows, open: `C:\xampp\htdocs\school\storage\logs\laravel.log`

2. Enable debug mode in `.env`:
   ```
   APP_DEBUG=true
   ```
   Then try again and check for error messages

3. Check if queue is being used:
   ```
   php artisan queue:work
   ```

### Issue: "Connection could not be established"
**Solution:** 
1. Check your firewall settings
2. Verify port 587 is not blocked
3. Ensure XAMPP's Apache/PHP can make outbound connections

### Issue: "Could not authenticate"
**Solution:**
1. Verify the App Password is correct
2. Make sure 2-Step Verification is enabled in Gmail
3. Generate a new App Password at: https://myaccount.google.com/apppasswords

## Email Template Customization

To customize the password reset email:

1. Login as Super Admin
2. Go to: System Settings → Email Template
3. Find "Password Reset" template
4. Customize the subject and body
5. Available variables you can use:
   - `{user_email}` - User's email
   - `{full_name}` - User's full name
   - `{reset_link}` - Password reset link

## Verify Database Settings

To manually verify the email settings in the database:

```sql
SELECT 
    id,
    school_id,
    email_engine_type,
    mail_host,
    mail_port,
    mail_username,
    from_email,
    from_name,
    active_status
FROM sm_email_settings 
WHERE email_engine_type = 'smtp' 
AND active_status = 1;
```

Expected values:
- mail_host: smtp.gmail.com
- mail_port: 587
- mail_username: arasoalisho2@gmail.com
- from_email: arasoalisho2@gmail.com
- from_name: Meahidalnur School
- active_status: 1

## Send Test Email (Optional)

You can create a simple test to verify email sending works:

```php
// Create a file: test-email.php in your project root
<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\Mail;

$to = 'your-test-email@example.com'; // Change this
$subject = 'Test Email from School System';
$message = 'This is a test email to verify SMTP is working.';

try {
    Mail::raw($message, function($mail) use ($to, $subject) {
        $mail->to($to)->subject($subject);
    });
    echo "✅ Test email sent successfully to {$to}\n";
} catch (Exception $e) {
    echo "❌ Failed to send email: " . $e->getMessage() . "\n";
}
```

Run with:
```
C:\xampp\php\php.exe test-email.php
```

## Success Criteria

The forgot password functionality is working correctly if:
1. ✅ User can access the forgot password page
2. ✅ Email address validation works
3. ✅ **Clear success screen appears after submitting** (form is hidden, success message with instructions is shown)
4. ✅ Password reset email is received within 1-2 minutes
5. ✅ Reset link in email works
6. ✅ User can set a new password
7. ✅ User can login with the new password
8. ✅ "Back to Login" and "Send Another Email" buttons work properly

## Support

If you continue to have issues:
1. Check `storage/logs/laravel.log` for detailed error messages
2. Verify Gmail account is active and not suspended
3. Make sure 2-Step Verification is enabled for the Gmail account
4. Try generating a new App Password
5. Test with a different email provider if Gmail blocks the connection

---

**Configuration Date:** November 2025  
**Configured By:** Automated Setup Script  
**Status:** ✅ Ready for Testing

