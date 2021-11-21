<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->default(0);	
            $table->date('depart')->nullable();
            $table->date('retour')->nullable();
            $table->integer('de')->unsigned();
            $table->foreign('de')->references('id')->on('pays');
            $table->integer('a')->unsigned();
            $table->foreign('a')->references('id')->on('pays');
            $table->date('date_demande')->default(date("Y-m-d"))->nullable();
            $table->date('date_validation')->nullable();
            $table->integer('etat')->default(1);	
            $table->longText('commentaire')->nullable();
            $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('reservations');
    }
}
