<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    use HasFactory;

    protected $table = 'user_education';

    protected $fillable = [
        'user_id',
        'institution',
        'subject',
        'start_date',
        'end_date',
        'degree',
        'grade',
    ];
 
}
