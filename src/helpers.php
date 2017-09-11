<?php

use Scool\Untis\Models\Aula;
use Scool\Untis\Models\Clase;
use Scool\Untis\Models\Grupo;
use Scool\Untis\Models\Horario;
use Scool\Untis\Models\Materia;
use Scool\Untis\Models\Profesor;
use Scool\Untis\Wrappers\AulasListImport;
use Scool\Untis\Wrappers\ClasesListImport;
use Scool\Untis\Wrappers\GruposListImport;
use Scool\Untis\Wrappers\HorariosListImport;
use Scool\Untis\Wrappers\MateriasListImport;
use Scool\Untis\Wrappers\ProfesoresListImport;

if (! function_exists('untis_todo')) {
    function untis_todo() {
        //Traverse curriculum. It assumes curriculum data is seeded
    }
}

if (! function_exists('first_or_create_aula')) {
    /**
     * Create an aula or return an already existing one.
     *
     * @param $row
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    function first_or_create_aula($row)
    {
        try {
            $aula = Aula::create([
                'codigo' => $row->codigo,
                'nombre' => $row->nombre
            ]);
            return $aula;
        } catch (Illuminate\Database\QueryException $e) {
            return Aula::where([
                ['codigo', '=', $row->codigo]
            ]);
        }
    }
}

if (! function_exists('seed_aulas')) {
    function seed_aulas()
    {
        $excel = App::make('excel');
        $aulas = new AulasListImport(app(),$excel);

        // Loop through all rows
        $aulas->each(function($aula) {
            first_or_create_aula($aula);
        });
    }
}

if (! function_exists('obtainAulaIdByCode')) {
    /**
     * Obtain aula id by code.
     *
     * @param $codigo
     * @return $this
     */
    function obtainAulaIdByCode($codigo)
    {
        if ($codigo) return Aula::where('codigo', strval($codigo))->first()->id;
        return null;
    }
}

if (! function_exists('first_or_create_grupo')) {
    /**
     * Create a grupo or return an already existing one.
     *
     * @param $row
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    function first_or_create_grupo($row)
    {
        try {
            $aulaId = null;
            if ($id = obtainAulaIdByCode($row->aula) ) {
                $aulaId = $id;
            }
            $grupo = Grupo::create([
                'codigo' => $row->codigo,
                'nombre' => $row->nombre,
                'aula_id' => $aulaId
            ]);
            return $grupo;
        } catch (Illuminate\Database\QueryException $e) {
            return Grupo::where([
                ['codigo', '=', $row->codigo]
            ]);
        }
    }
}

if (! function_exists('seed_grupos')) {
    function seed_grupos()
    {
        seed_aulas();
        $excel = App::make('excel');
        $grupos = new GruposListImport(app(),$excel);

        $grupos->each(function($grupo) {
            first_or_create_grupo($grupo);
        });
    }
}

if (! function_exists('first_or_create_profesor')) {
    /**
     * Create a profesor or return an already existing one.
     *
     * @param $row
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    function first_or_create_profesor($row)
    {
        try {
            $profesor = Profesor::create([
                'codigo' => $row->codigo,
                'nombre' => $row->nombre,
                'departamento' => $row->departamento,
                'cargo' => $row->cargo
            ]);
            return $profesor;
        } catch (Illuminate\Database\QueryException $e) {
            return Profesor::where([
                ['codigo', '=', $row->codigo]
            ]);
        }
    }
}

if (! function_exists('seed_profesores')) {
    /**
     * Seed profesores.
     */
    function seed_profesores()
    {
        $excel = App::make('excel');
        $profesores = new ProfesoresListImport(app(),$excel);

        $profesores->each(function($profesor) {
            first_or_create_profesor($profesor);
        });
    }
}

if (! function_exists('first_or_create_materia')) {
    /**
     * Create a materia or return an already existing one.
     *
     * @param $row
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    function first_or_create_materia($row)
    {
        try {
            $profesor = Materia::create([
                'codigo' => $row->codigo,
                'nombre' => $row->nombre,
                'nombre_corto' => $row->nombre_corto,
                'codigo_estudio' => $row->codigo_estudio,
                'estudio' => $row->estudio
            ]);
            return $profesor;
        } catch (Illuminate\Database\QueryException $e) {
            return Materia::where([
                ['codigo', '=', $row->codigo]
            ]);
        }
    }
}

if (! function_exists('seed_materias')) {
    function seed_materias()
    {
        $excel = App::make('excel');
        $materias = new MateriasListImport(app(),$excel);

        $materias->each(function($materia) {
            first_or_create_materia($materia);
        });
    }
}

if (! function_exists('seed_clases')) {
    function seed_clases()
    {
        seed_grupos();
        seed_profesores();
        seed_materias();
        seed_aulas();
        $excel = App::make('excel');
        $clases = new ClasesListImport(app(),$excel);

        $clases->each(function($clase) {
            first_or_create_clase($clase);
        });
    }
}

if (! function_exists('obtainGroupIdByCode')) {
    /**
     * Obtain group id by code.
     *
     * @param $code
     * @return mixed
     */
    function obtainGroupIdByCode($code)
    {
        return Grupo::where('codigo', strval($code))->first()->id;
    }
}

if (! function_exists('obtainProfesorIdByCode')) {
    /**
     * Obtain profesor id by code.
     *
     * @param $code
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    function obtainProfesorIdByCode($code)
    {
        return Profesor::where('codigo', strval($code))->first()->id;
    }
}

if (! function_exists('obtainMateriaIdByCode')) {
    /**
     * Obtain materia id by code
     *
     * @param $code
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    function obtainMateriaIdByCode($code)
    {
        return Materia::where('codigo', strval($code))->first()->id;
    }
}

if (! function_exists('first_or_create_clase')) {
    /**
     * Create a clase or return an already existing one.
     *
     * @param $row
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    function first_or_create_clase($row)
    {
        try {
            $grupoId = obtainGroupIdByCode($row->grupo);
            $profesorId = obtainProfesorIdByCode($row->profesor);
            $materiaId = obtainMateriaIdByCode($row->materia);
            $aulaId = obtainAulaIdByCode($row->aula);

            $clase = Clase::create([
                'codigo' => $row->codigo,
                'horas_semanales' => $row->horas_semanales,
                'horas_semanales_grupo' => $row->horas_semanales_grupo,
                'horas_semanales_profe' => $row->horas_semanales_profe,
                'grupo_id' => $grupoId,
                'profesor_id' => $profesorId,
                'materia_id' => $materiaId,
                'aula_id' => $aulaId
            ]);
            return $clase;
        } catch (Illuminate\Database\QueryException $e) {
            return Materia::where([
                ['codigo', '=', $row->codigo]
            ]);
        }
    }
}

if (! function_exists('obtainClaseIdByCode')) {

    /**
     * Obtain clase id by code.
     *
     * @param $code
     * @return mixed
     */
    function obtainClaseIdByCode($code)
    {
        return Clase::where('codigo', strval($code))->first()->id;
    }
}

if (! function_exists('first_or_create_horario')) {
    /**
     * Create a horario or return an already existing one.
     *
     * @param $row
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    function first_or_create_horario($row)
    {

        try {
            $claseId = obtainClaseIdByCode($row->clase);
            $grupoId = obtainGroupIdByCode($row->grupo);
            $profesorId = obtainProfesorIdByCode($row->profesor);
            $materiaId = obtainMateriaIdByCode($row->materia);
            $aulaId = obtainAulaIdByCode($row->aula);

            $horario = Horario::create([
                'clase_id' => $claseId,
                'grupo_id' => $grupoId,
                'profesor_id' => $profesorId,
                'materia_id' => $materiaId,
                'aula_id' => $aulaId,
                'dia' => strval($row->dia),
                'hora' => strval($row->hora)
            ]);
            return $horario;
        } catch (Illuminate\Database\QueryException $e) {
//            dd($e);
            //TODO no code!!
        }
    }
}

if (! function_exists('seed_horarios')) {
    /**
     * Seed horarios.
     */
    function seed_horarios()
    {
        seed_clases();
        $excel = App::make('excel');
        $horarios = new HorariosListImport(app(),$excel);

        $horarios->each(function($horario) {
            first_or_create_horario($horario);
        });

    }
}

if (! function_exists('seed_untis')) {
    /**
     * Seed untis.
     */
    function seed_untis() {
        seed_aulas();
        seed_grupos();
        seed_profesores();
        seed_materias();
        seed_clases();
        seed_horarios();
    }
}