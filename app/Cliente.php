<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    protected $fillable = [
        'cuit',
        'nrodni',
        'password',
        'cliente',
        'nombre',
        'direccion',
        'provincia_id',
        'localidad_id',
        'telefono1',
        'telefono2',
        'telefono3',
        'email',
        'email2',
        'cambio',
        'elim'
    ];

    public function polizas() {
        return $this->hasMany('App\Poliza');
    }
    public function provincia() {
        return $this->belongsTo('App\Provincia');
    }
    public function localidad() {
        return $this->belongsTo('App\Localidad');
    }
}
