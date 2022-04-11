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
<<<<<<< HEAD:laravel/database/migrations/2022_04_08_102528_create_inscrits_table.php
            $table->unsignedInteger('id_clients');
            $table->unsignedInteger('id_formation');
            $table->date('date_inscrit'); 
          // $table->primary(['id_clients', 'id_formation', 'date_inscrit']);
           // $table->foreign('id_clients')->references('id_clients')->on('clients')->onDelete('cascade')->onUpdate('cascade');
=======
            $table->unsignedBigInteger('id_clients');
            $table->unsignedInteger('id_formation');
            $table->date('date_inscrit'); 
           $table->unique(['id_clients', 'id_formation', 'date_inscrit']);
            $table->foreign('id_clients')->references('id_clients')->on('clients')->onDelete('cascade')->onUpdate('cascade');
>>>>>>> 47ca99f5f87940008a6a74ab616ca2b8a32fe0a7:laravel/database/migrations/2022_04_08_103509_create_inscrits_table.php
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
