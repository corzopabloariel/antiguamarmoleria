<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Marca;
class MarcaController extends Controller
{
    public $model;
    public function __construct() {
        $this->model = new Marca;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $elements = $this->model;
        if (isset($request->search))
            $elements = $elements->whereRaw( "UPPER(CONCAT_WS(' ',`name`)) LIKE UPPER('%{$request->search}%')" );
        $elements = $elements->orderBy('name')->paginate(15);
        $data = [
            "view"      => "auth.parts.marcas",
            "title"     => "Marcas",
            "elementos"   => $elements,
            "buttons" => [
                [ "i" => "fas fa-pencil-alt" , "b" => "btn-warning" , "t" => "Editar" ],
                [ "i" => "fas fa-trash-alt" , "b" => "btn-danger" , "t" => "Eliminar" ]
            ],
        ];
        if (isset($request->search))
            $data["search"] = $request->search;
        return view('auth.distribuidor',compact('data'));
    }

    public function modelos($id) {
        $marca = self::edit($id);
        return $marca->modelos()->orderBy("name")->pluck("name", "id");
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
