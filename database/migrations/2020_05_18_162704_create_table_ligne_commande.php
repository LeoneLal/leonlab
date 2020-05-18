<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLigneCommande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fiche_id');
            $table->foreign('fiche_id')->references('id')->on('fiches');
            $table->unsignedBigInteger('jeu_id');
            $table->foreign('jeu_id')->references('id')->on('jeux');
            $table->float('prix', 8,2);
            $table->string('code', 255);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lignes');
    }
}
