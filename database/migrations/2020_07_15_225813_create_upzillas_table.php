<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpzillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upzillas', function (Blueprint $table) {
            $table->bigIncrements('upzilla_id');
            $table->unsignedBigInteger('district_name');
            $table->foreign('district_name')->references('district_id')->on('districts')->onDelete('cascade');
            $table->string('upzilla_name');
            $table->text('description');
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
        Schema::dropIfExists('upzillas');
    }
}
