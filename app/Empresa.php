<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";

    protected $fillable = [
        'sections',
        'emails',
        'phones',
        'addresses',
        'social_networks',
        'images',
        'metadata',
        'forms',
        'captcha',
        'headers',
        'attention_schedule'
    ];

    protected $casts = [
        'sections' => 'array',
        'emails' => 'array',
        'phones' => 'array',
        'addresses' => 'array',
        'social_networks' => 'array',
        'images' => 'array',
        'metadata' => 'array',
        'forms' => 'array',
        'captcha' => 'array',
        'headers' => 'array',
        'attention_schedule' => 'string'
    ];
}
