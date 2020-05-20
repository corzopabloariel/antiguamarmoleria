<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = "provincia";
    protected $fillable = [
        'nombre',
        'codigo31662'
    ];
    protected $casts = [
        'nombre' => 'string',
        'codigo31662' => 'string'
    ];
    public function localidades() {
        return $this->hasMany('App\Localidad');
    }
}
