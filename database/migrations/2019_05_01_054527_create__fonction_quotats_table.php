<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFonctionQuotatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fonctions_quotats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fonction_id')->unsigned()->nullable();
            $table->integer('quota_id')->unsigned()->nullable();
            $table->integer('nombre')->nullable()->default(0);
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
        Schema::dropIfExists('_fonction_quotats');
    }
}
