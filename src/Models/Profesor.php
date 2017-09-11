<?php

namespace Scool\Untis\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profesor.
 *
 * @package Scool\Untis\Models
 */
class Profesor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','nombre','departamento','cargo'];

    /**
     * Table name.
     *
     * @var array
     */
    protected $table = "profesores";
}
