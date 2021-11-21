<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vols', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('de')->unsigned();
            $table->foreign('de')->references('id')->on('pays');
            $table->integer('a')->unsigned();
            $table->foreign('a')->references('id')->on('pays');
            $table->datetime('date')->default(date("Y-m-d"))->nullable();
            $table->float('tarif')->nullable();
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
        Schema::dropIfExists('vols');
    }
}
