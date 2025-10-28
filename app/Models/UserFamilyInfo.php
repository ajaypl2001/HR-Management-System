<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFamilyInfo extends Model
{
    use HasFactory;

    protected $table = 'user_family_info'; // Table name

    protected $fillable = [
        'user_id',
        'name',
        'relationship',
        'dob',
        'phone',
    ];

    // Optionally, if you want dob to be automatically cast to a Carbon date object
    protected $casts = [
        'dob' => 'date',
    ];

    /**
     * Relationship: a family info record belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
