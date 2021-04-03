<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('floor_number');
            $table->string('manager_name')->default('admin');
            $table->timestamps();

        });




    }

    
}
