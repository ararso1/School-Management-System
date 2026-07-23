<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmEmailSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_engine_type',
        'from_name',
        'from_email',
        'mail_driver',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
        'school_id',
        'academic_id',
        'active_status',
    ];
}
