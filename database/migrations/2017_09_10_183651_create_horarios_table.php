<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateHorariosTable.
 */
class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clase_id')->unsigned();
            $table->integer('grupo_id')->unsigned();
            $table->integer('profesor_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->integer('aula_id')->unsigned()->nullable();
            $table->unsignedTinyInteger('dia');
            $table->unsignedTinyInteger('hora');

            $table->foreign('clase_id')->references('id')->on('clases');
            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->foreign('profesor_id')->references('id')->on('profesores');
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->foreign('aula_id')->references('id')->on('aulas');

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
        Schema::dropIfExists('horarios');
    }
}
