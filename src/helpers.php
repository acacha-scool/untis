<?php

use Scool\Untis\Wrappers\HorariosListImport;

if (! function_exists('untis_todo')) {
    function untis_todo() {
        //Traverse curriculum. It assumes curriculum data is seeded
    }
}

if (! function_exists('seed_grupos')) {
    function seed_grupos()
    {
    }
}

if (! function_exists('seed_profesores')) {
    function seed_profesores()
    {
    }
}

if (! function_exists('seed_materias')) {
    function seed_materias()
    {
    }
}

if (! function_exists('seed_aulas')) {
    function seed_aulas()
    {
    }
}

if (! function_exists('seed_clases')) {
    function seed_clases()
    {
    }
}

if (! function_exists('seed_horarios')) {
    function seed_horarios()
    {
        $excel = App::make('excel');
        $horarios = new HorariosListImport(app(),$excel);

        $results = $horarios->get();
    }
}

if (! function_exists('seed_untis')) {
    function seed_untis() {
        seed_grupos();
        seed_profesores();
        seed_materias();
        seed_aulas();
        seed_clases();
        seed_horarios();
//        $table->increments('id');
//        $table->integer('clase_id')->unsigned();
//        $table->integer('grupo_id')->unsigned();
//        $table->integer('profesor_id')->unsigned();
//        $table->integer('materia_id')->unsigned();
//        $table->integer('aula_id')->unsigned();
//        $table->unsignedTinyInteger('dia');
//        $table->unsignedTinyInteger('hora');
    }
}