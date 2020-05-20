<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $fillable = [
        'name',
        'marca_id'
    ];
    protected $casts = [
        'name' => 'string',
        'marca_id' => 'integer'
    ];
}
