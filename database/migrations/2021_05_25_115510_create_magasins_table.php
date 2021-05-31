<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagasinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('magasins', function (Blueprint $table) {
            $table->id();
            $table->string('referenceMagasin');
            $table->string('libelleMagasin')->unique();
            $table->string('slug')->unique();
            $table->string('adresse');
            $table->string('ville');
            $table->integer('CP');
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
        Schema::dropIfExists('magasins');
    }
}
