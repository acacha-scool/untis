<?php

namespace Scool\Untis\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Aula.
 *
 * @package Scool\Untis\Models
 */
class Aula extends Model
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
    protected $fillable = ['codigo','nombre'];
}
