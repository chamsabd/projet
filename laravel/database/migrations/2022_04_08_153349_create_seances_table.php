<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id('id_seance');
            $table->string('nom_cours');
            $table->float('duree');
            $table->unsignedInteger('id_professeur');
            $table->unsignedInteger('id_formation');
            $table->timestamps();
           // $table->foreign('id_professeur')->references ('id_professeur')->on('professeurs')->onDelete('restrict')->onUpdate('restrict') ;
           // $table->foreign('id_formation')->references ('id_formation')->on('formations')->onDelete('restrict')->onUpdate('restrict') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seances');
    }
}
