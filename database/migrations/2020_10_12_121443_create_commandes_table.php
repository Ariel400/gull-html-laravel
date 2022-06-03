<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('id_client');
            $table->longText('pays');
            $table->longText('ville');
            $table->longText('adresse');
            $table->longText('codebp');
            $table->integer('quantite')->default(0);
            $table->string('montant');
            $table->integer('status')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_client')
                ->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
