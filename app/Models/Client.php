<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Authenticatable
{
    use HasFactory;
    
    protected $fillable = [
        'username', 'password', 'api_token'
    ];

    protected $hidden = [
        'password', 'api_token'
    ];

    // Mutator to hash password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
