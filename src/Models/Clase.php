<?php

namespace Scool\Untis\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Clase.
 *
 * @package Scool\Untis\Models
 */
class Clase extends Model
{
    /**
     * Database connection name.
     *
     * @var string
     */
    protected $connection = 'untis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo',
        'nombre',
        'horas_semanales',
        'horas_semanales_grupo',
        'grupo_id',
        'profesor_id',
        'materia_id',
        'aula_id'
        ];

    /**
     * Get the clase grupo.
     */
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    /**
     * Get the clase profesor.
     */
    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    /**
     * Get the clase materia.
     */
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    /**
     * Get the clase aula.
     */
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

}
