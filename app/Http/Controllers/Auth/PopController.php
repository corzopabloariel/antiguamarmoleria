<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use App\Pop;
class PopController extends Controller
{
    public $model;
    public function __construct() {
        $this->model = new Pop;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $routes = collect(\App\Empresa::first()->sections)->map(function ($route) {
            return URL::to($route["LINK"]) . "/";
        });
        $routesProductos = collect(\App\Producto::where("elim", 0)->get())->map(function ($route) {
            return URL::to($route->link());
        });
        $routes = $routes->merge($routesProductos);
        $routesMarcas = collect(\App\Marca::where("elim", 0)->get())->map(function ($route) {
            return URL::to($route->link());
        });
        $routes = $routes->merge($routesMarcas);
        $routes = $routes->toArray();
        sort($routes);
        $elements = $this->model;
        if (isset($request->search))
            $elements = $elements->whereRaw( "UPPER(CONCAT_WS(' ',`url`)) LIKE UPPER('%{$request->search}%')" );
        $elements = $elements->orderBy('url')->paginate(15);
        $data = [
            "view" => "auth.parts.pop",
            "title" => "Pop up",
            "routes" => $routes,
            "elementos" => $elements,
            "buttons" => [
                [ "i" => "fas fa-pencil-alt" , "b" => "btn-warning" , "t" => "Editar" ],
                [ "i" => "fas fa-trash-alt" , "b" => "btn-danger" , "t" => "Eliminar" ]
            ],
        ];
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
