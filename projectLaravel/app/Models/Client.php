<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Client extends Authenticatable
{
    use HasFactory;
  
    use Notifiable;

    protected $table = "clients";
    protected $guard = 'client';
 



    protected $fillable=[
        'name',
        'email',
        'password',
        'gender',
        'country',
        'image',
        'status'
    ];

    protected $hidden = [
        'remember_token'
    ];


    
}

