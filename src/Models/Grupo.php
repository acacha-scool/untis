<?php

namespace Scool\Untis\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Grupo.
 *
 * @package Scool\Untis\Models
 */
class Grupo extends Model
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
    protected $fillable = ['codigo','nombre','aula_id'];

    /**
     * Get the grupo aula.
     */
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
