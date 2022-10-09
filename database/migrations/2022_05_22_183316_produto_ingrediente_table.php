<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProdutoIngredienteTable extends Migration
{
    public function up()
    {
        Schema::create('produto_ingrediente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('ingrediente_id');
            $table->string('quantidade');
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produto_ingrediente');
    }
}
