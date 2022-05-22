<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('empresa')->nullable();
            $table->string('foto')->nullable();
            $table->string('capa')->nullable();
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        //incluir usuario raynder4@gmail.com senha 12345678 timestamps atual
        DB::table('users')->insert(
            ['name' => 'Raynder', 'email' => 'raynder4@gmail.com', 'password' => bcrypt('12345678'), 'created_at' => now(), 'updated_at' => now()]
        );
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
