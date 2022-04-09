<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('id_demande');
            $table->integer('id_responsable');
            $table->integer('id_clients');
            $table->integer('id_formation');
            $table->dateTime('date_demande');
            //$table->foreign('id_formation')->references('id_formation')->on('formations')->onDelete('restrict')->onUpdate('cascade');
           // $table->foreign('id_clients')->references('id_client')->on('clients')->onDelete('restrict')->onUpdate('cascade');
           //respo
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
