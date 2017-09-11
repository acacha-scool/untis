<?php

namespace Scool\Untis\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Materia.
 *
 * @package App
 */
class Materia extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','nombre','nombre_corto','codigo_estudio','estudio'];
}
