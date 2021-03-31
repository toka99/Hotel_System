<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reservation extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    

    protected $table = "reservations";
    protected $guard = 'reservation';
 
    protected $fillable = [
        'name',
        'accompany',
        'room_number',
        'paid_price',
    
    ];
 
    protected $hidden = [
        'remember_token'
    ];
 

    
  //setting price into database in cents
   public function setPriceAttribute($value)
   {
       $this -> attributes['price'] = $value * 100;
   }

 //getting price from database converted into dollars
   public function getPriceAttribute($value)

   { 
    return $this ->attributes['price']  / 100;
   }

 

    
}

