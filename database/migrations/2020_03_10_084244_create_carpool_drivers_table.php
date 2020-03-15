<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpoolDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpool_drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('contact');
            $table->string('license')->nullable();
            $table->string('nid')->nullable();
            $table->string('image');
            $table->string('image_small');

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
        Schema::dropIfExists('carpool_drivers');
    }
}
