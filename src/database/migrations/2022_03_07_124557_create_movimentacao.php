<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacaos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->enum('tipo_movimentacao', ['entrada', 'saida']);
            $table->decimal("valor");
            $table->string("observacao");
            $table->bigInteger("funcionario_id")->unsigned();
            $table->bigInteger("administrador_id")->unsigned();
            $table->timestamps();

            $table->foreign("funcionario_id")->references('id')->on('funcionarios');
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
        Schema::dropIfExists('movimentacaos');
    }
}
