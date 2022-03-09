<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned();
            $table->string('nome_completo');
            $table->decimal('saldo_atual');
            $table->bigInteger('administrador_id')->unsigned();
            $table->timestamps();

            $table->foreign("user_id")->references('id')->on('users');
            $table->foreign("administrador_id")->references('id')->on('administradors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario');
    }
}
