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
            $table->id() ;
            $table->string('nom_cours');
            $table->dateTimeTz('duree');
            $table->foreignId('professeur_id');
            $table->foreignId('formation_id');
            $table->timestamps();
            $table->foreign('professeur_id')->references ('id')->on('professeurs')->onDelete('restrict')->onUpdate('restrict') ;
            $table->foreign('formation_id')->references ('id')->on('formations')->onDelete('restrict')->onUpdate('restrict') ;
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
