<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

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
        if (!empty($id))
            $elementos = $elementos->where("producto_id", $id);
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
