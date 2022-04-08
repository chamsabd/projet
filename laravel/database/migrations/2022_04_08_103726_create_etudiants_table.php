<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
           
            $table->integer('carte_etud')->primary();
            $table->integer('id_clients'); 
            $table->integer('id_responsable'); 
            //$table->foreign('id_responsable')->references('id_responsable')->on('responsables')->onDelete('restrict')->onUpdate('cascade');
            //$table->foreign('id_clients')->references('id_client')->on('clients')->onDelete('restrict')->onUpdate('cascade');
            
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
        Schema::dropIfExists('etudiants');
    }
}
