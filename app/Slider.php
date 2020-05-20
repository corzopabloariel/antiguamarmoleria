<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'orden',
        'texto',
        'image',
        'seccion',
        'elim'
    ];

    protected $casts = [
        'orden' => 'string',
        'texto' => 'string',
        'image' => 'array',
        'elim' => 'boolean'
    ];
}
