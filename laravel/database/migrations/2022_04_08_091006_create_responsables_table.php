<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {

            $table->id('id_responsable');
            $table->string('metier');
            $table->timestamps();
          // $table->unsignedInteger('id_admin');
          // $table->unsignedInteger('id_professeur');

          // $table->foreign('id_admin')->references ('id_admin')->on('clients')->onDelete('restrict')->onUpdate('restrict') ;
          // $table->foreign('id_professeur')->references ('id_professeur')->on('professeurs')->onDelete('restrict')->onUpdate('restrict')  ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsables');
    }
}
