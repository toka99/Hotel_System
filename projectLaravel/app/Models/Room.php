<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = "rooms";

 
    protected $fillable = [
        'number',
        'capacity',
        'price',
        'floor_number',
        'manager_name',
        
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

   public function floor() //foreign key 
   {
       return $this->belongsTo(Floor::class);
   }
   
   public function manager() //foreign key 
   {
       return $this->belongsTo(Manager::class);
   }



}
