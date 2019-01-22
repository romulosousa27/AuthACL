<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    
    use Notifiable;

    protected $fillable = [
        'name', 'login', 'email', 'password',
    ];

    protected $hidden = [
        'password',
    ];
}
