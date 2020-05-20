<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "coberturas";
    protected $fillable = [
        'orden',
        'name',
        'image',
        'images',
        'color',
        'hsl',
        'resumen',
        'detalle',
        'caracteristicas'
    ];
    protected $appends = ['images_total'];

    protected $casts = [
        'image' => 'array',
        'images' => 'array'
    ];
    public function getImagesTotalAttribute() {
        return count($this->image);
    }
    public function getImage() {
        if (empty($this->images))
            return null;
        return $this->images[0];
    }
}
