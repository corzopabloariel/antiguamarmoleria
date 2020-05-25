<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'order',
        'logo',
        'color',
        'color_text',
        'title',
        'title_slug',
        'resume',
        'description',
        'features',
        'sliders',
        'advantage',
        'is_destacado',
        'elim'
    ];
    protected $casts = [
        'order' => 'string',
        'logo' => 'json',
        'color' => 'json',
        'color_text' => 'json',
        'title' => 'string',
        'title_slug' => 'string',
        'resume' => 'string',
        'description' => 'string',
        'features' => 'string',
        'sliders' => 'json',
        'advantage' => 'json',
        'is_destacado' => 'boolean',
        'elim' => 'boolean'
    ];
}
