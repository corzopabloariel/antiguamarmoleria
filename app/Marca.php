<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'order',
        'logo',
        'logo2',
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
        'logo' => 'array',
        'logo2' => 'array',
        'color' => 'array',
        'color_text' => 'array',
        'title' => 'string',
        'title_slug' => 'string',
        'resume' => 'string',
        'description' => 'string',
        'features' => 'string',
        'sliders' => 'array',
        'advantage' => 'array',
        'is_destacado' => 'boolean',
        'elim' => 'boolean'
    ];

    public function link() {
        return 'producto/' . $this->title_slug;
    }

    public function productos()
    {
        return $this->hasMany('App\Producto','producto_id');
    }
}
