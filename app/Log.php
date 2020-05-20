<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'user_id',
        'data'
    ];
    protected $casts = [
        'data' => 'array',
    ];
    
    public function usuario() {
        return $this->belongsTo('App\User');
    }
}
