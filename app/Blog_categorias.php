<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_categorias extends Model
{
    protected $table = "blog_categorias";

    protected $fillable = [
        'order',
        'title',
        'title_slug',
        'elim'
    ];

    protected $casts = [
        'order' => 'string',
        'title' => 'string',
        'elim' => 'boolean',
    ];

    public function blogs()
    {
        return $this->hasMany('App\Blog' , 'category_id' );
    }

    public function link() {
        return "novedades/" . $this->title_slug;
    }
}
