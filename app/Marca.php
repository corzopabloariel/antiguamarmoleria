<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'name',
        'image'
    ];
    protected $casts = [
        'name' => 'string',
        'image' => 'json'
    ];

    public function modelos()
    {
        return $this->hasMany('App\Modelo', 'marca_id');
    }
}
