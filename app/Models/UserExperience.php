<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
     protected $table = 'user_experiences';

    protected $fillable = [
        'user_id',
        'company_name',
        'location',
        'job_position',
        'period_from',
        'period_to',
    ];
}
