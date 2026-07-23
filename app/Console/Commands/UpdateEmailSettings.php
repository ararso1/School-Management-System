<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\SmEmailSetting;

class UpdateEmailSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:update-settings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update email settings in database from .env file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Updating email settings from .env file...');

        // Get configuration from .env
        $fromName = env('MAIL_FROM_NAME', 'Meahidalnur School');
        $fromEmail = env('MAIL_FROM_ADDRESS', 'arasoalisho2@gmail.com');
        $mailHost = env('MAIL_HOST', 'smtp.gmail.com');
        $mailPort = env('MAIL_PORT', '587');
        $mailUsername = env('MAIL_USERNAME', 'arasoalisho2@gmail.com');
        $mailPassword = env('MAIL_PASSWORD', 'sxen rsqe xjkh slrg');
        $mailEncryption = env('MAIL_ENCRYPTION', 'tls');

        // Get all schools
        $schools = DB::table('sm_schools')->get();

        if ($schools->isEmpty()) {
            $this->error('No schools found in database!');
            return 1;
        }

        $this->info('Found ' . $schools->count() . ' school(s)');

        foreach ($schools as $school) {
            $school_id = $school->id;
            $school_name = $school->school_name ?? 'School #' . $school_id;

            // Check if SMTP email setting exists for this school
            $emailSetting = SmEmailSetting::where('school_id', $school_id)
                ->where('email_engine_type', 'smtp')
                ->first();

            if ($emailSetting) {
                // Update existing record
                $emailSetting->update([
                    'from_name' => $fromName,
                    'from_email' => $fromEmail,
                    'mail_driver' => 'smtp',
                    'mail_host' => $mailHost,
                    'mail_port' => $mailPort,
                    'mail_username' => $mailUsername,
                    'mail_password' => $mailPassword,
                    'mail_encryption' => $mailEncryption,
                    'active_status' => 1,
                ]);
                $this->line("✓ Updated SMTP settings for: {$school_name}");
            } else {
                // Create new record
                SmEmailSetting::create([
                    'email_engine_type' => 'smtp',
                    'from_name' => $fromName,
                    'from_email' => $fromEmail,
                    'mail_driver' => 'smtp',
                    'mail_host' => $mailHost,
                    'mail_port' => $mailPort,
                    'mail_username' => $mailUsername,
                    'mail_password' => $mailPassword,
                    'mail_encryption' => $mailEncryption,
                    'school_id' => $school_id,
                    'active_status' => 1,
                ]);
                $this->line("✓ Created SMTP settings for: {$school_name}");
            }

            // Update general settings to use smtp
            $updated = DB::table('sm_general_settings')
                ->where('school_id', $school_id)
                ->update(['email_driver' => 'smtp']);

            if ($updated) {
                $this->line("✓ Updated email driver to SMTP in general settings for: {$school_name}");
            }

            // Deactivate PHP mail if it exists
            $deactivated = SmEmailSetting::where('school_id', $school_id)
                ->where('email_engine_type', 'php')
                ->update(['active_status' => 0]);

            if ($deactivated) {
                $this->line("✓ Deactivated PHP mail for: {$school_name}");
            }

            $this->info("---");
        }

        $this->info('✅ Email settings updated successfully for all schools!');
        $this->newLine();
        $this->info('Configuration Summary:');
        $this->table(
            ['Setting', 'Value'],
            [
                ['Host', $mailHost],
                ['Port', $mailPort],
                ['Encryption', $mailEncryption],
                ['Username', $mailUsername],
                ['From Email', $fromEmail],
                ['From Name', $fromName],
            ]
        );

        $this->newLine();
        $this->info('Next steps:');
        $this->line('1. Clear the config cache: php artisan config:clear');
        $this->line('2. Test the forgot password functionality on your login page');

        return 0;
    }
}

