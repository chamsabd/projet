<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscritsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscrits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_clients');
            $table->unsignedInteger('id_formation');
            $table->date('date_inscrit')->unique(); 
            $table->foreign('id_clients')->references('id_clients')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_formation')->references('id_formation')->on('formations')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('inscrits');
    }
}
