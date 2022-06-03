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
            $table->bigIncrements('id')->unsigned();
            $table->string('nom');
            $table->string('prenom');
            $table->string('genre')->nullable();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->string('telephone')->nullable();
            $table->integer('solde')->default(2000000);
            $table->date('dateNaissance')->nullable();
            $table->string('lieuNaissance')->nullable();
            $table->string('profession')->nullable();
            $table->string('experience')->nullable();
            $table->string('lieuHabitation')->nullable();
            $table->string('siteWeb')->nullable();
            $table->string('email')->nullable();
            $table->boolean('enabled')->default(true);
            $table->softDeletes();
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
