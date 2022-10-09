<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cliente;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('capa')->nullable();
            $table->string('cor_principal', 7);
            $table->string('cor_secundaria', 7);
            $table->string('cor_terciaria', 7);
            $table->string('cor_fonte', 7);
            $table->string('empresa')->nullable();
            $table->string('borda')->nullable();
            $table->timestamps();
        });

        // criar cliente de id 1 com as cores padrões
        Cliente::create([
            'cor_principal' => '#e31616',
            'cor_secundaria' => '#dd6868',
            'cor_terciaria' => '#F4E3B3',
            'cor_fonte' => '#ffffff',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
