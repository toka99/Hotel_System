<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
    protected $table = "floors";

 
    protected $fillable = [

        'name',
        'floor_number',
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
