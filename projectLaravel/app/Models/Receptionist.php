<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    use HasFactory;
    protected $table = "receptionists";

 
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
