<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Automovil;
class AutomovilController extends Controller
{
    public $model;
    public function __construct() {
        $this->model = new Automovil;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $elements = $this->model->select('automoviles.*');
        if (isset($request->search))
            $elements = $elements->whereRaw( "UPPER(CONCAT_WS(' ',`combustible`,`version`,`motor`,`puertas`)) LIKE UPPER('%{$request->search}%')" );
        $elements = $elements->join('marcas', 'marcas.id', '=', 'automoviles.marca_id');
        $elements = $elements->orderBy('marcas.name', 'ASC');
        $elements = $elements->orderBy('automoviles.0km', 'DESC');
        $elements = $elements->orderBy('automoviles.anio', 'DESC');
        $elements = $elements->orderBy('automoviles.version', 'ASC');
        $elements = $elements->paginate(15);
        $data = [
            "view"      => "auth.parts.automovil",
            "title"     => "Automóviles",
            "marcas" => \App\Marca::orderBy('name')->pluck("name", "id"),
            "modelos" => \App\Modelo::orderBy('name')->pluck("name", "id"),
            "elementos"   => $elements,
            "buttons" => [
                [ "i" => "fas fa-pencil-alt" , "b" => "btn-warning" , "t" => "Editar" ],
                [ "i" => "fas fa-trash-alt" , "b" => "btn-danger" , "t" => "Eliminar" ]
            ],
        ];
        $anio_inicio = \App\Empresa::first()->anio_inicio;
        $anio_fin = date("Y");
        $arr = [];
        for ($i = $anio_inicio; $i <= $anio_fin; $i++)
            $arr[] = ["k" => $i, "v" => $i];
        $arr[] = ["k" => 0, "v" => "0 km"];
        $data["anios"] = array_reverse($arr);
        if (isset($request->search))
            $data["search"] = $request->search;
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
        $rule = [
            "DATA" => [
                ["k" => "anio", "v" => "0 km"]
            ],
            "CHANGE" => [
                ["k" => "0km", "v" => 1]
            ]
        ];
        return (new AdmController)->store($request, $data, $this->model, null, 0, $rule);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->model->find($id);
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
