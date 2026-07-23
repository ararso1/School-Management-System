<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\SmEmailSetting;

class UpdateEmailSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * This seeder updates the email settings to use Gmail SMTP
     *
     * @return void
     */
    public function run()
    {
        // Get all schools from sm_schools table
        $schools = DB::table('sm_schools')->pluck('id');

        foreach ($schools as $school_id) {
            // Check if SMTP email setting exists for this school
            $emailSetting = SmEmailSetting::where('school_id', $school_id)
                ->where('email_engine_type', 'smtp')
                ->first();

            if ($emailSetting) {
                // Update existing record
                $emailSetting->update([
                    'from_name' => env('MAIL_FROM_NAME', 'Meahidalnur School'),
                    'from_email' => env('MAIL_FROM_ADDRESS', 'arasoalisho2@gmail.com'),
                    'mail_driver' => 'smtp',
                    'mail_host' => env('MAIL_HOST', 'smtp.gmail.com'),
                    'mail_port' => env('MAIL_PORT', '587'),
                    'mail_username' => env('MAIL_USERNAME', 'arasoalisho2@gmail.com'),
                    'mail_password' => env('MAIL_PASSWORD', 'sxen rsqe xjkh slrg'),
                    'mail_encryption' => env('MAIL_ENCRYPTION', 'tls'),
                    'active_status' => 1,
                ]);
            } else {
                // Create new record
                SmEmailSetting::create([
                    'email_engine_type' => 'smtp',
                    'from_name' => env('MAIL_FROM_NAME', 'Meahidalnur School'),
                    'from_email' => env('MAIL_FROM_ADDRESS', 'arasoalisho2@gmail.com'),
                    'mail_driver' => 'smtp',
                    'mail_host' => env('MAIL_HOST', 'smtp.gmail.com'),
                    'mail_port' => env('MAIL_PORT', '587'),
                    'mail_username' => env('MAIL_USERNAME', 'arasoalisho2@gmail.com'),
                    'mail_password' => env('MAIL_PASSWORD', 'sxen rsqe xjkh slrg'),
                    'mail_encryption' => env('MAIL_ENCRYPTION', 'tls'),
                    'school_id' => $school_id,
                    'active_status' => 1,
                ]);
            }

            // Update general settings to use smtp
            DB::table('sm_general_settings')
                ->where('school_id', $school_id)
                ->update(['email_driver' => 'smtp']);

            // Deactivate PHP mail if it exists
            SmEmailSetting::where('school_id', $school_id)
                ->where('email_engine_type', 'php')
                ->update(['active_status' => 0]);
        }

        echo "Email settings updated successfully for all schools!\n";
    }
}

