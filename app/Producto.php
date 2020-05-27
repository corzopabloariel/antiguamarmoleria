<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";
    protected $fillable = [
        'marca_id',
        'order',
        'title',
        'title_slug',
        'images',
        'characteristics',
        'color',
        'color_text',
        'elim'
    ];
    protected $appends = ['images_total'];

    protected $casts = [
        'marca_id' => 'integer',
        'order' => 'string',
        'title' => 'string',
        'images' => 'array',
        'characteristics' => 'array',
        'color' => 'array',
        'color_text' => 'array',
        'elim' => 'boolean'
    ];
    public function getImagesTotalAttribute() {
        return empty($this->images) ? 0 : count($this->images);
    }
    public function getImage() {
        return empty($this->images) ? null : $this->images[0];
    }
}
