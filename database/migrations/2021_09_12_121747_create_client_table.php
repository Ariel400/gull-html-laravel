<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('adresse');
            $table->string('date_naissance');
            $table->string('employeur');
            $table->string('numero_compte');
            $table->string('piece');
            $table->string('profession');
            $table->string('salaire');
            $table->string('sexe');
            $table->string('situation_matrimonial');
            $table->string('telephone');
            $table->string('password');
            $table->boolean('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
