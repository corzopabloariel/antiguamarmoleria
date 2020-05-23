<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'order',
        'text',
        'image',
        'section',
        'elim'
    ];

    protected $casts = [
        'order' => 'string',
        'text' => 'string',
        'image' => 'array',
        'elim' => 'boolean'
    ];
}
