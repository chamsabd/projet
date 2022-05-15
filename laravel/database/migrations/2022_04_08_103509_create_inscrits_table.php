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
           // $table->unsignedBigInteger('client_id');
            $table->date('date_inscrit')->unique(); 

           // $table->foreignId('client_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('formation_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

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
