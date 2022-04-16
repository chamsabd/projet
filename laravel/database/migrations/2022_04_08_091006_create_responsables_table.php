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

            $table->id();
            $table->string('metier');
            $table->timestamps();
           $table->foreignId('admin_id');
           //$table->foreignId('professeur_id');
           $table->foreign('admin_id')->references ('id')->on('admins')->onDelete('restrict')->onUpdate('restrict') ;
         //  $table->foreign('professeur_id')->references ('id')->on('professeurs')->onDelete('restrict')->onUpdate('restrict')  ;
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
