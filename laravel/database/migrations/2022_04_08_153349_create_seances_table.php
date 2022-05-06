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
            $table->string('nom_seance');
            $table->date('date');
            $table->dateTime('temps_fin');
            $table->dateTime('temps_debut');
           
            $table->foreignId('formation_id');
            $table->timestamps();

            $table->foreign('formation_id')->references ('id')->on('formations')->onDelete('cascade')->onUpdate('cascade') ;

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
