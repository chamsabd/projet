<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            
            $table->id();
            $table->string('titre');
            $table->date('date_debut');
            $table->string('description')->nullable();
            $table->date('date_fin');
            $table->foreignId('responsable_id')->constrained()->on('utilisateurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('formateur_id')->nullable()->constrained()->on('utilisateurs')->onDelete('cascade')->onUpdate('cascade')->default(null);
            $table->foreignId('formateurexterne_id')->nullable()->constrained()->on('utilisateurs')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('etat');
            $table->integer('nbr_place');
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
        Schema::dropIfExists('formations');
    }
}
