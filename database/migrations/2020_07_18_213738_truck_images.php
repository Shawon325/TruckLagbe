<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TruckImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_images', function (Blueprint $table) {
            $table->bigIncrements('truck_image_id');
            $table->unsignedBigInteger('truck_id');
            $table->foreign('truck_id')->references('truck_id')->on('trucks')->onDelete('cascade');
            $table->string('images');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('truck_images');
    }
}
