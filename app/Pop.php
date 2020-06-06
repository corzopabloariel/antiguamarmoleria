<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pop extends Model
{
    protected $fillable = [
        "url",
        "images"
    ];

    protected $casts = [
        "url" => "string",
        "images" => "array"
    ];
}
