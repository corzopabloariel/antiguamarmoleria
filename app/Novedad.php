<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $table = "novedades";
    protected $fillable = [
        'orden',
        'titulo',
        'data',
        'resume',
        'image'
    ];
    protected $casts = [
        'titulo' => 'string',
        'data' => 'string',
        'resume' => 'string',
        'image' => 'array'
    ];
}
