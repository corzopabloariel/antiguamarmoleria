<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\CambioMail;
use App\Cliente;
class ClienteController extends Controller
{
    public $model;
    public function __construct() {
        $this->model = new Cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $elements = $this->model->whereNull("elim");
        if (isset($request->search))
            $elements = $elements->whereRaw( "UPPER(CONCAT_WS(' ',`cuit`,`nrodni`,`cliente`,`nombre`)) LIKE UPPER('%{$request->search}%')" );
        $elements = $elements->orderBy('cliente')->paginate(15);
        $data = [
            "view"      => "auth.parts.clientes",
            "title"     => "Clientes",
            "provincias" => \App\Provincia::orderBy("nombre")->pluck("nombre", "id"),
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

    public function password(Request $request)
    {
        $rules = [
            "pass" => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return json_encode(["error" => 1, "msg" => "Validación incorrecta"]);
        try {
            $cliente = $this->model::find($request->cliente_id);
            $cliente->fill([
                "password" => Hash::make($request->pass)
            ]);
            Mail::to('corzo.pabloariel@gmail.com')->send(new CambioMail($cliente, 1));
            if (count(Mail::failures()) > 0)
                return json_encode(["error" => 1, "msg" => "Error en el envió"]);
        } catch (\Throwable $th) {
            return json_encode(["error" => 1]);
        }
        return json_encode(['success' => true, "error" => 0, "msg" => "Datos modificados. Se notificó al cliente del cambio"]);
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
