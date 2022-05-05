<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->integer('responsable_id');
            $table->dateTime('date_demande');
            $table->foreignId('formation_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
           // $table->foreignId('responsable_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('client_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
           //respo
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
        Schema::dropIfExists('demandes');
    }
}
