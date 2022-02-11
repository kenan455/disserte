<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redacoes', function (Blueprint $table) {
            $table->id();

            $table->string('autor');

            $table->string('titulo')->nullable();

            $table->string('tema_redacao');

            $table->text('redacao');

            $table->boolean('corrigida');
            

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('nota')->nullable();

            $table->integer('competencia_1')->nullable();

            $table->integer('competencia_2')->nullable();

            $table->integer('competencia_3')->nullable();

            $table->integer('competencia_4')->nullable();

            $table->integer('competencia_5')->nullable();

            $table->text('comentario')->nullable();

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
        Schema::dropIfExists('redacoes');
    }
}
