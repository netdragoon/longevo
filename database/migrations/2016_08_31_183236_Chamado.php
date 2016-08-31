<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chamado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 100);
            $table->text('observacao');
            $table->integer('clienteid', false, true);
            $table->integer('pedidoid', false, true);

            $table->foreign('clienteid')->references('id')->on('cliente');
            $table->foreign('pedidoid')->references('id')->on('pedido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chamado');
    }
}
