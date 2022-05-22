<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientesTable extends Migration
{
    public function up()
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('medida');
            $table->float('quantidade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingredientes');
    }
}
