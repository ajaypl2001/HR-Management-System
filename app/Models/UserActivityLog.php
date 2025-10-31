<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivityLog extends Model
{
    protected $table = 'user_activity_logs';

    protected $fillable = [
        'user_name',
        'email',
        'phone_number',
        'status',
        'role_name',
        'modify_user',
        'date_time',
    ];

    public $timestamps = true;
}
