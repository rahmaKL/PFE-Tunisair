<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nombre')->default(0);	
            $table->string('justificatif1')->default('');
            $table->string('justificatif2')->default('');
            $table->string('justificatif3')->default('');
            $table->integer('etat')->default(1);	
            $table->date('date_demande');
            $table->date('date_validation');
            $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users');
            $table->integer('quota_id')->unsigned();
		    $table->foreign('quota_id')->references('id')->on('quotas');
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
        Schema::dropIfExists('demandes');
    }
}
