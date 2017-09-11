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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','nombre'];
}
