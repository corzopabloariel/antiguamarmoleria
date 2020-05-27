<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'order',
        'title',
        'title_slug',
        'resume',
        'answer',
        'sliders',
        'elim'
    ];
    protected $casts = [
        'order' => 'string',
        'title' => 'string',
        'title_slug' => 'string',
        'resume' => 'string',
        'answer' => 'string',
        'sliders' => 'json',
        'elim' => 'boolean'
    ];
}
