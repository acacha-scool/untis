<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateClasesTable.
 */
class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->unsignedTinyInteger('horas_semanales')->nullable();
            $table->unsignedTinyInteger('horas_semanales_grupo')->nullable();
            $table->unsignedTinyInteger('horas_semanales_profe')->nullable();
            $table->integer('grupo_id')->unsigned();
            $table->integer('profesor_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->integer('aula_id')->unsigned()->nullable();

            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->foreign('profesor_id')->references('id')->on('profesores');
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->foreign('aula_id')->references('id')->on('aulas');

            $table->unique(['codigo', 'grupo_id','profesor_id','materia_id']);

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
        Schema::dropIfExists('clases');
    }
}
