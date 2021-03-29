<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //      Schema::create('receptionists', function (Blueprint $table) {
    //          $table->id();
    //         $table->timestamps();
    //     });
    //  }


    public function up()
    {
        Schema::create('receptionists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //$table->enum('level', [ 'receptionist','admin','manager', 'client'])->default('receptionist');    
            $table->string('national_id')->unique();
            $table->string('email')->unique();
            $table->string('manager_name');
            $table->string('password');
            //$table->BLOOM('image');    ****** IMAGE???????????????????
            $table->rememberToken();
            $table->timestamps();
        });
    }

   
}


