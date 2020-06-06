<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'date',
        'images',
        'title',
        'title_slug',
        'resume',
        'text',
        'category_id',
        'elim'
    ];

    protected $casts = [
        'date' => 'date',
        'images' => 'json',
        'title' => 'string',
        'resume' => 'string',
        'text' => 'string',
        'category_id' => 'integer',
        'elim' => 'boolean'
    ];

    public function image() {
        if (empty($this->images))
            return "";
        return $this->images[0]["image"];
    }

    public function category()
    {
        return $this->belongsTo('App\Blog_categorias' );
    }

    public function link() {
        return "novedad/" . $this->category->title_slug . "/" . $this->title_slug;
    }
}
