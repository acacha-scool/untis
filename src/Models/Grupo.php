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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','code'];
}
