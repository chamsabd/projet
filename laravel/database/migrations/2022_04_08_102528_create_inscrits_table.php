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
            $table->integer('id_clients');
            $table->integer('id_formation');
            $table->date('date_inscrit');
            $table->primary(['id_clients', 'id_formation', 'date_inscrit']);
           // $table->foreign('id_clients')->references('id_clients')->on('clients')->onDelete('restrict')->onUpdate('cascade');
           // $table->foreign('id_formation')->references('id_formation')->on('formations')->onDelete('restrict')->onUpdate('cascade');
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
