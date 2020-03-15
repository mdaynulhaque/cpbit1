<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpoolCarBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpool_car_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('carpool_car_id');
            $table->integer('carpool_driver_id');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('destination');
            $table->string('purpose');
            $table->integer('status')->nullable();
            $table->string('comit_st')->nullable();
            $table->timestamps();
        });

    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpool_car_bookings');
    }
}
