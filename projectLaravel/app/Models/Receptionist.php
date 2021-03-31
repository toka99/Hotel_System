<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Receptionist extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    

    protected $table = "receptionists";
    protected $guard = 'receptionist';
 
    protected $fillable = [
        'name',
        'email',
        'password',
        'national_id',
        'image',
        'manager_name',
    ];
 
    protected $hidden = [
        'remember_token'
    ];
 

     
    public function manager() //foreign key 
    {
        return $this->belongsTo(Manager::class);
    }

    
}
