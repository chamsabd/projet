<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('id_clients');
            $table->string('specialite'); 
            $table->integer('ncin');
            $table->integer('id_departement')->unsigned(); 
            //$table->foreign('ncin')->references('ncin')->on('utlisateurs')->onDelete('restrict')->onUpdate('cascade');
           // $table->foreign('id_departement')->references('id_dep')->on('departments')->onDelete('restrict')->onUpdate('cascade');;
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
        Schema::dropIfExists('clients');
    }
}
