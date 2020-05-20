<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poliza extends Model
{
    protected $fillable = [
        'compania',
        'poliza',
        "id_seccion",
        'seccion',
        'cliente',
        'cliente_id',
        'desde',
        'hasta',
        'file',
        'aviso',
        'tipo',
        'elim'
    ];
    protected $casts = [
        'file' => 'array',
        'id_seccion' => 'integer'
    ];

    public function clienteOBJ() {
        return $this->belongsTo('App\Cliente','cliente_id');
    }
}
