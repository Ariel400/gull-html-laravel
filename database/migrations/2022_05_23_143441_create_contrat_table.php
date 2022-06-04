<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrat', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('id_client')->nullable();
            $table->string('id_agent')->nullable();
            $table->string('type_pret')->nullable();
            $table->string('montant_pret')->nullable();
            $table->string('duree_pret')->nullable();
            $table->string('revenu_mensuel')->nullable();
            $table->string('nbr_enfant')->nullable();
            
            $table->date('debut_emprunt')->nullable();
            $table->date('fin_emprunt')->nullable();
            $table->string('autre_revenu')->nullable();
            $table->string('activite')->nullable();
            $table->string('categorie_socio')->nullable();
            $table->string('contrat_travail')->nullable();
            $table->string('type_logement')->nullable();
            $table->string('addresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('autre_charge_mensuel')->nullable();
            $table->string('loyer_mensuel')->nullable();
            $table->string('status')->default('en attente')->nullable();
            
            $table->string('actif')->default(0);          
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
        Schema::dropIfExists('contrat');
    }
}
