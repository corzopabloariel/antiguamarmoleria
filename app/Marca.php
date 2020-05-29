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
        'characteristics',
        'description',
        'features',
        'sliders',
        'advantage',
        'is_destacado',
        'in_background',
        'only_colors',
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
        'characteristics' => 'array',
        'description' => 'string',
        'features' => 'string',
        'sliders' => 'array',
        'advantage' => 'array',
        'is_destacado' => 'boolean',
        'in_background' => 'boolean',
        'only_colors' => 'boolean',
        'elim' => 'boolean'
    ];

    public function link() {
        return 'producto/' . $this->title_slug;
    }

    public function productos()
    {
        return $this->hasMany('App\Producto','marca_id');
    }
}
