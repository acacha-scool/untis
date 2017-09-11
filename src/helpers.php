<?php

use Scool\Untis\Models\Aula;
use Scool\Untis\Models\Grupo;
use Scool\Untis\Wrappers\AulasListImport;
use Scool\Untis\Wrappers\GruposListImport;
use Scool\Untis\Wrappers\HorariosListImport;

if (! function_exists('untis_todo')) {
    function untis_todo() {
        //Traverse curriculum. It assumes curriculum data is seeded
    }
}

if (! function_exists('seed_aulas')) {
    function seed_aulas()
    {
        $excel = App::make('excel');
        $aulas = new AulasListImport(app(),$excel);

        // Loop through all rows
        $aulas->each(function($row) {
            Aula::create([
                "code" => $row->code,
                "name" => $row->name
            ]);
        });
    }
}

if (! function_exists('seed_grupos')) {
    function seed_grupos()
    {
        $excel = App::make('excel');
        $grupos = new GruposListImport(app(),$excel);

        // Loop through all rows
        $grupos->each(function($row) {
            Grupo::create([
                "code" => $row->code,
                "name" => $row->name
            ]);
            dd($row);
            dump(intval($row->clase));
            dump($row->grupo);
        });
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

//        $results = $horarios->get();
//        dd($results);


        // Loop through all rows
        $horarios->each(function($row) {
//            dd($row);
            dump(intval($row->clase));
            dump($row->grupo);
        });

    }
}

if (! function_exists('seed_new')) {
    function seed_new()
    {
        //TODO
        dump('nothing');
    }
}

if (! function_exists('seed_untis')) {
    function seed_untis() {
        seed_aulas();
        seed_grupos();
        seed_profesores();
        seed_materias();
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