<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpoolCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpool_cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('number');
            $table->integer('capacity');
            $table->string('temporary');
            $table->string('image');
            $table->string('image_small');
            $table->string('image2');
            $table->string('image2_small');
            $table->string('image3');
            $table->string('image3_small');
            $table->string('remarks')->nullable();
            $table->dateTime('last_use')->nullable();
            $table->integer('status')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('delete_temp')->default(0);
            $table->integer('delete_by')->nullable();
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
        Schema::dropIfExists('carpool_cars');
    }
}
