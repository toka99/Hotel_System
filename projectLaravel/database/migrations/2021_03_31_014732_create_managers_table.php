<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //$table->enum('level', [ 'receptionist','admin','manager', 'client'])->default('receptionist');    
            $table->string('national_id')->unique();
            $table->string('email')->unique();
            $table->string('image')->nullable()->default("avatar.png");
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

  
}
