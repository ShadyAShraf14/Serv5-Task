<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['name', 'email', 'password', 'otp', 'otp_expires_at'];

    // Cast otp_expires_at to a Carbon instance
    protected $casts = [
        'otp_expires_at' => 'datetime',
    ];
}
