<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = "reservations";

 
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
   public function setPaidPriceAttribute($value)
   {
       $this -> attributes['paid_price'] = $value * 100;
   }

 //getting price from database converted into dollars
   public function getPaidPriceAttribute($value)

   { 
    return $this ->attributes['paid_price']  / 100;
   }


}


