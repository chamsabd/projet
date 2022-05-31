<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormateurexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formateurexes', function (Blueprint $table) {
            $table->id();
            $table->integer('ncin')->unique();
            $table->string('email')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('specialite');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('formateurexes');
    }
}
