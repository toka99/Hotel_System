<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $table = "managers";
    
    protected $guard = 'manager';
 
    protected $fillable = [
        'name',
        'email',
        'password',
        'national_id',
        'image',
       
    ];
 
    protected $hidden = [
        'remember_token'
    ];
 
   
}
