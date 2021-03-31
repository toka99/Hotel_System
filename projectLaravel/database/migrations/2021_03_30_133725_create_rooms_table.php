<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('number'); 
            $table->unsignedInteger('capacity');
            $table->unsignedInteger('price');
            $table->unsignedInteger('floor_number');
            $table->boolean('is_reserved');
            $table->timestamps();
        });
    }

    
}
