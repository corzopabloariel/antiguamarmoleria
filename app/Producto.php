<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";
    protected $fillable = [
        'marca_id',
        'producto_id',
        'order',
        'title',
        'title_slug',
        'images',
        'characteristics',
        'color',
        'color_text',
        'elim'
    ];
    protected $appends = ['images_total'];

    protected $casts = [
        'marca_id' => 'integer',
        'producto_id' => 'integer',
        'order' => 'string',
        'title' => 'string',
        'images' => 'array',
        'characteristics' => 'array',
        'color' => 'array',
        'color_text' => 'array',
        'elim' => 'boolean'
    ];
    public function getImagesTotalAttribute() {
        return empty($this->images) ? 0 : count($this->images);
    }
    public function firstImage() {
        return empty($this->images) ? null : $this->images[0];
    }

    public function productos()
    {
        return $this->hasMany('App\Producto','marca_id');
    }

    public function link() {
        $link = "producto";
        $arr = self::padres();
        foreach($arr AS $a)
            $link .= "/{$a->title_slug}";
        return $link;
    }

    public function marca()
    {
        return $this->belongsTo('App\Marca' , 'marca_id');
    }
    public function padre()
    {
        return $this->belongsTo('App\Producto' , 'producto_id');
    }
    public function padresRecursivo($data, &$padres, $only_id) {
        if (empty($data->padre)) {
            if (empty( $only_id))
                $padres[] = $data;
            else
                $padres[] = $data->id;
        } else {
            if (empty($only_id))
                $padres[] = $data;
            else
                $padres[] = $data->id;
            self::padresRecursivo($data->padre, $padres, $only_id);
        }
    }
    public function padres($only_id = null) {
        $padres = [];
        self::padresRecursivo($this, $padres, $only_id);
        $padres[] = $this->marca;
        return array_reverse($padres);
    }
}
