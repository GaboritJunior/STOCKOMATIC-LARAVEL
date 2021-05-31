<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagasinProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('magasin_produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id')->nullable();
            $table->unsignedBigInteger('magasin_id')->nullable();
            $table->integer('limiteStockAlerte');
            $table->integer('quantiteStock');
            $table->foreign('produit_id')
                    ->references('id')
                    ->on('produits')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
            $table->foreign('magasin_id')
                    ->references('id')
                    ->on('magasins')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('magasin_produit');
    }
}
