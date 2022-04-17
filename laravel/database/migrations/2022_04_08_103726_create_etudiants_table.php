<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *s
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
           
            $table->id();
    $table->Integer('responsable_id');
            $table->foreignId('responsable_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
           // $table->foreignId('')->references('responsable_id')->constrained('responsables')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('client_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
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
