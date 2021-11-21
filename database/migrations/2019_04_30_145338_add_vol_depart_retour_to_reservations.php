<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVolDepartRetourToReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->integer('vol_depart')->unsigned()->nullable();
            $table->foreign('vol_depart')->references('id')->on('vols');
            $table->integer('vol_retour')->unsigned()->nullable();
            $table->foreign('vol_retour')->references('id')->on('vols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
