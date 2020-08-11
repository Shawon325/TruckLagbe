<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostPickDropAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_pick_drop_address', function (Blueprint $table) {
            $table->bigIncrements('post_pick_drop_address_id');
            $table->integer('post_id');
            $table->integer('division_id');
            $table->integer('district_id');
            $table->integer('upzilla_id');
            $table->string('home_address');
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
        Schema::dropIfExists('post_pick_drop_address');
    }
}
