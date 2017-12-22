<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsavelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsavels', function (Blueprint $table) {

            $table->integer('aluno_id')->unsigned()->primary();
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');

            $table->string('nomemae', 255);
            $table->string('cpf', 14);
            $table->date('datapag');

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
        Schema::dropIfExists('responsavels');
    }
}
