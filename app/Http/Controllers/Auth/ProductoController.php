<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use App\Producto;
class ProductoController extends Controller
{
    public $model;
    public function __construct() {
        $this->model = new Producto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id = null)
    {
        $data = [];
        $data[ "view" ] = "auth.parts.producto";
        $elementos = $this->model;
        $elementos = $elementos->join('marcas', 'productos.marca_id', '=', 'marcas.id');
        if (isset($request->search)) {
            $data["search"] = $request->search;
            $elementos = $elementos->whereRaw( "UPPER(CONCAT_WS( ' ' ,productos.title ,productos.title_slug, productos.characteristics, marcas.title, marcas.title_slug)) LIKE UPPER('%{$request->search}%')" );
        }
        if (!empty($id)) {
            $elementos = $elementos->where("productos.producto_id", $id);
            $data["url_search"] = URL::to("adm/producto/{$id}/elementos");
            $url = route("productos.index");
            $data["url"] = $url;
            $data["producto_id"] = intVal($id);
            $data["breadcrumb"] = "<li class='breadcrumb-item'><a href='{$url}'>Productos</a></li>";
            $elemento = $this->model::find($id);
            $data["marca_id"] = $elemento->marca_id;
            $data["characteristics"] = $elemento->characteristics;
            $aux = $elemento->padres();
            foreach ($aux AS $a) {
                if (strcmp($a->getTable(), "marcas") == 0) {
                    $url = URL::to("adm/productos?search={$elemento->title_slug}");
                    $data["breadcrumb"] .= "<li class='breadcrumb-item'><a href='{$url}'>{$a->title}</a></li>";
                } else {
                    $url = URL::to("adm/producto/{$a->id}/elementos");
                    $data["breadcrumb"] .= "<li class='breadcrumb-item'><a href='{$url}'>{$a->title}</a></li>";
                }
            }
        } else
            $elementos = $elementos->whereNull("productos.producto_id");
        $elementos = $elementos->select("productos.*");
        $elementos = $elementos->orderBy('marcas.order')->orderBy('productos.order')->paginate(15);

        $data[ "title" ] = "Productos";
        $data[ "elementos" ] = $elementos;
        $data[ "buttons" ] = [
            [ "i" => "fas fa-pencil-alt" , "b" => "btn-warning" , "t" => "Editar" ],
            [ "i" => "fas fa-trash-alt" , "b" => "btn-danger" , "t" => "Eliminar" ],
            [ "i" => "far fa-clone" , "b" => "btn-info" , "t" => "Copiar" ]
        ];
        return view('auth.distribuidor',compact('data'));
    }

    public function show() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $data = null)
    {
        return (new AdmController)->store($request, $data, $this->model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->model::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = self::edit($id);
        return self::store($request,$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return (new AdmController)->delete(self::edit($request->id), $this->model->getFillable());
    }
}
