<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_bids', function (Blueprint $table) {
            $table->bigIncrements('post_bid_id');
            $table->integer('post_id');
            $table->integer('truck_driver_id');
            $table->string('truck_number');
            $table->string('bid_amount');
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
        Schema::dropIfExists('post_bids');
    }
}
