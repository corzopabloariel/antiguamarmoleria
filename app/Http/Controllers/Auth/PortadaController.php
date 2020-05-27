<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
class PortadaController extends Controller
{
    public $model;
    public function __construct() {
        $this->model = new Slider;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($seccion)
    {
        $data = $this->model->where('section', "por_{$seccion}")->where("elim", 0)->first();
        $data = [
            "view"      => "auth.parts.portada",
            "title"     => "Portada: " . strtoupper($seccion),
            "section"   => "por_{$seccion}",
            "portada"   => $data,
            "buttons" => [],
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
