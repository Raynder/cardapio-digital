<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GrupoProdutoTable extends Migration
{
    public function up()
    {
        Schema::create('grupo_produto', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('grupo_id');
            $table->unsignedBigInteger('produto_id');
            $table->timestamps();

            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupo_produto');
    }
}
