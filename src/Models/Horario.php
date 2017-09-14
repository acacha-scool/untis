<?php

namespace Scool\Untis\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario.
 *
 * @package Scool\Untis\Models
 */
class Horario extends Model
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
        'clase_id',
        'grupo_id',
        'profesor_id',
        'materia_id',
        'aula_id',
        'dia',
        'hora'
    ];

    /**
     * Get the clase horario.
     */
    public function clase()
    {
        return $this->belongsTo(Grupo::class);
    }

    /**
     * Get the grupo horario.
     */
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    /**
     * Get the profesor horario.
     */
    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    /**
     * Get the materia horario.
     */
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    /**
     * Get the aula horario.
     */
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
