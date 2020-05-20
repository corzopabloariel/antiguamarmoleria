<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

use App;
use App\Contenido;
use App\Slider;
use App\Empresa;
use App\Cliente;
use App\Staff;
use App\Novedad;
use App\Producto;
use App\Compania;
use App\Cobertura;
use App\Marca;
use App\Familia;
class GeneralController extends Controller
{
    public function __construct() {}

    function section($arr, $item) {
        $search = $item === "home" ? "" : $item;
        for($i = 0; $i < count($arr[auth()->guard('clientAuth')->check() ? 1 : 0]); $i++) {
            if($arr[auth()->guard('clientAuth')->check() ? 1 : 0][$i]["LINK"] == "/{$search}")
                return $arr[auth()->guard('clientAuth')->check() ? 1 : 0][$i];
        }
        return null;
    }
    public function datos( $link = null ) {
        $datos = Empresa::first();
        if( empty( $link ) )
            $link = "home";
        $section = self::section($datos->sections, $link);
        $data = [
            "empresa" => $datos,
            "contenido" => Contenido::where("seccion", $section["FUNCTION"])->first(),
            "slider" => Slider::where("seccion", $section["FUNCTION"])->orderBy("orden")->get(),
            "terminos" => Contenido::where("seccion", "terminos")->first(),
            "metadato" => [
                "description" => "",
                "keywords" => ""
            ],
            "section" => $section,
            "title" => $section["NAME"]
        ];
        if(isset($datos->metadatos[$section["FUNCTION"]])) {
            $data['metadato']['description'] = $datos->metadatos[$section["FUNCTION"]]["description"];
            $data['metadato']['keywords'] = $datos->metadatos[$section["FUNCTION"]]["keywords"];
        }
        return $data;
    }

    public function index($link = null) {
        if(empty($link) || $link == "index")
            $link = "home";
        $data = self::datos($link);
        $data[ "view" ] = "page.{$data["section"]["FUNCTION"]}";
        switch($data["section"]["FUNCTION"]) {
            case "home":
            break;
            case "blogs":
                $data["elementos"] = Novedad::orderBy("orden")->simplePaginate(15);
            break;
            case "clientes":
                $data[ "elementos" ] = Cliente::where("elim", 0)->orderBy("order")->get();
            break;
            case "productos":
                $data["elementos"] = [];
                $data["elementos"]["companias"] = Compania::where("elim", 0)->orderBy("orden")->get();
                $data["elementos"]["coberturas"] = Producto::orderBy("orden")->get();
            break;
            case "contacto":
                $data["elementos"] = Staff::where("elim", 0)->orderBy("orden")->get();
            break;
        }

        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function producto($title, $id) {
        $data = self::datos("productos");
        $data["view"] = "page.producto";
        $data["producto"] = Producto::find($id);
        $data["coberturas"] = Producto::orderBy("orden")->get();
        $data["title"] = "Cobertura: " . $data["producto"]->name;
        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function blog($title, $id) {
        $data = self::datos("novedades");
        $data["blog"] = Novedad::find( $id );
        $data["view"] = "page.blog";
        $data["title"] = "Novedad - {$data["blog"]->titulo}";
        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function values(Request $request) {
        switch($request->tipo) {
            case "tipo":
                $element = Cobertura::where("is_particular", "LIKE", "%{$request->value}%")->where("elim", 0)->orderBy("orden")->get(["id", "name", "image"])->toArray();
                return json_encode(["element" => $element, "clean" => true, "next" => "cobertura"]);
            case "cobertura":
                switch($request->value) {
                    case 1:
                        $form = [
                            "marca" => [
                                "title" => "Marca",
                                "name" => "marca",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "listener" => "change",
                                "function" => "marca",
                                "required" => "true",
                                "value" => (new AutomovilController)->marcas()
                            ],
                            "anio" => [
                                "title" => "Año",
                                "name" => "anio",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "listener" => "change",
                                "function" => "anio",
                                "required" => "true",
                                "disabled" => true
                            ],
                            "modelo" => [
                                "title" => "Modelo",
                                "name" => "modelo",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "listener" => "change",
                                "function" => "modelo",
                                "required" => "true",
                                "disabled" => true
                            ],
                            "version" => [
                                "title" => "Versión",
                                "name" => "version",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "listener" => "change",
                                "function" => "version",
                                "required" => "true",
                                "disabled" => true
                            ],
                            "gnc" => [
                                "title" => "GNC",
                                "name" => "gnc",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "value" => [
                                    ["id" => "No", "name" => "Sin GNC"],
                                    ["id" => "Menos de 90 litros", "name" => "Menos de 90 litros"],
                                    ["id" => "De 90 a 120 litros", "name" => "De 90 a 120 litros"],
                                    ["id" => "Más de 120 litros", "name" => "Más de 120 litros"]
                                ]
                            ],

                            "provincia" => [
                                "title" => "Provincia",
                                "name" => "provincia",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "listener" => "change",
                                "function" => "provincia",
                                "required" => "true",
                                "value" => \App\Provincia::select("id", "nombre AS name")->orderBy("nombre")->get()
                            ],
                            "localidad" => [
                                "title" => "Localidad",
                                "name" => "localidad",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "disabled" => true
                            ],
                            "cuit" => [
                                "title" => "CUIT",
                                "name" => "cuit",
                                "element" => "input",
                                "class" => "inputmask form-control form-control-lg form--input text-right",
                                "type" => "text",
                                "required" => "true",
                                "pattern" => "[0-9-].*",
                                "validity" => "Solo guión (-) y números (0 - 9)",
                                "data" => [
                                    "data-mask" => "99-99999999-9"
                                ]
                            ],
                            "nombre" => [
                                "title" => "Nombre completo",
                                "name" => "nombre",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "required" => "true",
                                "type" => "text"
                            ],
                            "actividad" => [
                                "title" => "Actividad",
                                "name" => "actividad",
                                "element" => "textarea",
                                "class" => "form-control form-control-lg form--input",
                            ],
                            "email" => [
                                "title" => "Email",
                                "name" => "email",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "required" => "true",
                                "type" => "email"
                            ],
                            "telefono" => [
                                "title" => "Teléfono",
                                "name" => "telefono",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "type" => "phone"
                            ],
                            "edad" => [
                                "title" => "Edad",
                                "name" => "edad",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "min" => 22,
                                "max" => 75,
                                "type" => "number"
                            ]
                        ];
                        $html = [
                            [
                                '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-8">/marca/</div><div class="mt-4 col-12 col-md">/anio/</div>' => ["marca", "anio"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-5">/modelo/</div><div class="mt-4 col-12 col-md-5">/version/</div><div class="mt-4 col-12 col-md-2">/gnc/</div>' => ["modelo", "version", "gnc"]
                            ],
                            [
                                '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/provincia/</div><div class="mt-4 col-12 col-md-6">/localidad/</div>' => ["provincia", "localidad"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/cuit/</div><div class="mt-4 col-12 col-md-6">/nombre/</div>' => ["cuit", "nombre"]
                            ],
                            [
                                '<div class="mt-4 col-12">/actividad/</div>' => ["actividad"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/email/</div><div class="mt-4 col-12 col-md-6">/telefono/</div>' => ["email", "telefono"]
                            ]
                        ];
                        if ($request->usuario) {
                            $html = [
                                [
                                    '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-8">/marca/</div><div class="mt-4 col-12 col-md">/anio/</div>' => ["marca", "anio"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-5">/modelo/</div><div class="mt-4 col-12 col-md-5">/version/</div><div class="mt-4 col-12 col-md-2">/gnc/</div>' => ["modelo", "version", "gnc"]
                                ],
                                [
                                    '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-6">/provincia/</div><div class="mt-4 col-12 col-md-6">/localidad/</div>' => ["provincia", "localidad"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-6">/nombre/</div><div class="mt-4 col-12 col-md-6">/edad/</div>' => ["edad", "nombre"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-6">/email/</div><div class="mt-4 col-12 col-md-6">/telefono/</div>' => ["email", "telefono"]
                                ]
                            ];
                        }
                        return json_encode(["form" => $form, "html" => $html, "clean" => true, "next" => "fin"]);
                    case 5:
                        $form = [
                            "tipo_vivienda" => [
                                "title" => "Tipo de vivienda",
                                "name" => "tipo_vivienda",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "value" => !$request->usuario ? [
                                    ["id" => "Local", "name" => "Local"]
                                ] : [
                                    ["id" => "Casa", "name" => "Casa"],
                                    ["id" => "Departamento", "name" => "Departamento"]
                                ]
                            ],
                            "tipo_asegurado" => [
                                "title" => "Tipo de asegurado",
                                "name" => "tipo_asegurado",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "value" => [
                                    ["id" => "Propietario", "name" => "Propietario"],
                                    ["id" => "Inquilino", "name" => "Inquilino"]
                                ]
                            ],
                            "sup_edificada" => [
                                "title" => "Superficie edificada",
                                "name" => "sup_edificada",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input text-right",
                                "required" => "true",
                                "pattern" => "[0-9.,].*",
                                "validity" => "Solo coma (,), punto (.) y números (0 - 9)",
                                "type" => "text",
                                "help" => "En m<sup>2</sup>"
                            ],
                            "domicilio" => [
                                "title" => "Domicilio",
                                "name" => "domicilio",
                                "element" => "textarea",
                                "class" => "form-control form-control-lg form--input",
                                "help" => "Domicilio completo"
                            ],

                            "provincia" => [
                                "title" => "Provincia",
                                "name" => "provincia",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "listener" => "change",
                                "function" => "provincia",
                                "required" => "true",
                                "value" => \App\Provincia::select('id', 'nombre AS name')->orderBy("name")->get()
                            ],
                            "localidad" => [
                                "title" => "Localidad",
                                "name" => "localidad",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "disabled" => true
                            ],
                            "cuit" => [
                                "title" => "CUIT",
                                "name" => "cuit",
                                "element" => "input",
                                "class" => "inputmask form-control form-control-lg form--input text-right",
                                "type" => "text",
                                "required" => "true",
                                "pattern" => "[0-9-].*",
                                "validity" => "Solo guión (-) y números (0 - 9)",
                                "data" => [
                                    "data-mask" => "99-99999999-9"
                                ]
                            ],
                            "nombre" => [
                                "title" => "Nombre completo",
                                "name" => "nombre",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "required" => "true",
                                "type" => "text"
                            ],
                            "actividad" => [
                                "title" => "Actividad",
                                "name" => "actividad",
                                "element" => "textarea",
                                "class" => "form-control form-control-lg form--input",
                            ],
                            "email" => [
                                "title" => "Email",
                                "name" => "email",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "required" => "true",
                                "type" => "email"
                            ],
                            "telefono" => [
                                "title" => "Teléfono",
                                "name" => "telefono",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "type" => "phone"
                            ],
                            "edad" => [
                                "title" => "Edad",
                                "name" => "edad",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "min" => 22,
                                "max" => 75,
                                "type" => "number"
                            ]
                        ];
                        $html = [
                            [
                                '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-8">/tipo_vivienda/</div><div class="mt-4 col-12 col-md">/sup_edificada/</div>' => ["tipo_vivienda", "sup_edificada"]
                            ],
                            [
                                '<div class="mt-4 col-12">/domicilio/</div>' => ["domicilio"]
                            ],
                            [
                                '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/provincia/</div><div class="mt-4 col-12 col-md-6">/localidad/</div>' => ["provincia", "localidad"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/cuit/</div><div class="mt-4 col-12 col-md-6">/nombre/</div>' => ["cuit", "nombre"]
                            ],
                            [
                                '<div class="mt-4 col-12">/actividad/</div>' => ["actividad"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/email/</div><div class="mt-4 col-12 col-md-6">/telefono/</div>' => ["email", "telefono"]
                            ]
                        ];
                        if ($request->usuario) {
                            $html = [
                                [
                                    '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-4">/tipo_vivienda/</div><div class="mt-4 col-12 col-md-4">/tipo_asegurado/</div><div class="mt-4 col-12 col-md">/sup_edificada/</div>' => ["tipo_vivienda", "sup_edificada", "tipo_asegurado"]
                                ],
                                [
                                    '<div class="mt-4 col-12">/domicilio/</div>' => ["domicilio"]
                                ],
                                [
                                    '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-6">/provincia/</div><div class="mt-4 col-12 col-md-6">/localidad/</div>' => ["provincia", "localidad"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-6">/nombre/</div><div class="mt-4 col-12 col-md-6">/edad/</div>' => ["edad", "nombre"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-6">/email/</div><div class="mt-4 col-12 col-md-6">/telefono/</div>' => ["email", "telefono"]
                                ]
                            ];
                        }
                        $html[] = [
                            '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                        ];
                        return json_encode(["form" => $form, "html" => $html, "clean" => true, "next" => "fin"]);
                    case 7:
                        $form = [
                            "actividad_trabajadores" => [
                                "title" => "Actividad de los trabajadores",
                                "name" => "actividad_trabajadores",
                                "element" => "textarea",
                                "class" => "form-control form-control-lg form--input"
                            ],
                            "cantidad_capitas" => [
                                "title" => "Cantidad de Capitas",
                                "name" => "cantidad_capitas",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "type" => "text",
                            ],
                            "duracion" => [
                                "title" => "Duración del trabajo",
                                "name" => "duracion",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "type" => "text",
                            ],
                            "version" => [
                                "title" => "Versión",
                                "name" => "version",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "listener" => "change",
                                "function" => "version",
                                "required" => "true",
                                "disabled" => true
                            ],
                            "dni_seguro" => [
                                "title" => "DNI del tomador del seguro",
                                "name" => "dni_seguro",
                                "element" => "input",
                                "class" => "inputmask form-control form-control-lg form--input text-right",
                                "type" => "text",
                                "required" => "true",
                                "pattern" => "[0-9].*",
                                "validity" => "Solo números (0 - 9)",
                                "data" => [
                                    "data-mask" => "99999999"
                                ]
                            ],
                            "nombre" => [
                                "title" => "Nombre completo",
                                "name" => "nombre",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "required" => "true",
                                "type" => "text"
                            ],
                            "email" => [
                                "title" => "Email",
                                "name" => "email",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "required" => "true",
                                "type" => "email"
                            ],
                            "telefono" => [
                                "title" => "Teléfono",
                                "name" => "telefono",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "type" => "phone"
                            ]
                        ];
                        $html = [
                            [
                                '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                            ],
                            [
                                '<div class="mt-4 col-12">/actividad_trabajadores/</div>' => ["actividad_trabajadores"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/cantidad_capitas/</div><div class="mt-4 col-12 col-md-6">/duracion/</div>' => ["cantidad_capitas", "duracion"]
                            ],
                            [
                                '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                            ],
                            [
                                '<div class="mt-4 col-12">/nombre/</div>' => ["nombre"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/email/</div><div class="mt-4 col-12 col-md-6">/telefono/</div>' => ["email", "telefono"]
                            ]
                        ];
                        if ($request->usuario) {
                            $html = [
                                [
                                    '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-lg-6">/dni_seguro/</div>' => ["dni_seguro"]
                                ],
                                [
                                    '<div class="mt-4 col-12">/actividad_trabajadores/</div>' => ["actividad_trabajadores"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-6">/cantidad_capitas/</div><div class="mt-4 col-12 col-md-6">/duracion/</div>' => ["cantidad_capitas", "duracion"]
                                ],
                                [
                                    '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                                ],
                                [
                                    '<div class="mt-4 col-12">/nombre/</div>' => ["nombre"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-6">/email/</div><div class="mt-4 col-12 col-md-6">/telefono/</div>' => ["email", "telefono"]
                                ]
                            ];
                        }
                        $html[] = [
                            '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                        ];
                        return json_encode(["form" => $form, "html" => $html, "clean" => true, "next" => "fin"]);
                    case 9:
                        $form = [
                            "tipo_vivienda" => [
                                "title" => "Tipo de vivienda",
                                "name" => "tipo_vivienda",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "value" => !$request->usuario ? [
                                    ["id" => "Local", "name" => "Local"]
                                ] : [
                                    ["id" => "Casa", "name" => "Casa"],
                                    ["id" => "Departamento", "name" => "Departamento"]
                                ]
                            ],
                            "archivo" => [
                                "title" => "Contrato de alquiler",
                                "name" => "archivo",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "type" => "file"
                            ],

                            "provincia" => [
                                "title" => "Provincia",
                                "name" => "provincia",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "listener" => "change",
                                "function" => "provincia",
                                "required" => "true",
                                "value" => \App\Provincia::select('id', 'nombre AS name')->orderBy("name")->get()
                            ],
                            "localidad" => [
                                "title" => "Localidad",
                                "name" => "localidad",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "disabled" => true
                            ],
                            "cuit" => [
                                "title" => "CUIT",
                                "name" => "cuit",
                                "element" => "input",
                                "class" => "inputmask form-control form-control-lg form--input text-right",
                                "type" => "text",
                                "required" => "true",
                                "pattern" => "[0-9-].*",
                                "validity" => "Solo guión (-) y números (0 - 9)",
                                "data" => [
                                    "data-mask" => "99-99999999-9"
                                ]
                            ],
                            "nombre" => [
                                "title" => "Nombre completo",
                                "name" => "nombre",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "required" => "true",
                                "type" => "text"
                            ],
                            "actividad" => [
                                "title" => "Actividad",
                                "name" => "actividad",
                                "element" => "textarea",
                                "class" => "form-control form-control-lg form--input",
                            ],
                            "email" => [
                                "title" => "Email",
                                "name" => "email",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "required" => "true",
                                "type" => "email"
                            ],
                            "telefono" => [
                                "title" => "Teléfono",
                                "name" => "telefono",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "type" => "phone"
                            ],
                            "edad" => [
                                "title" => "Edad",
                                "name" => "edad",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "min" => 22,
                                "max" => 75,
                                "type" => "number"
                            ]
                        ];
                        $html = [
                            [
                                '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-8">/tipo_vivienda/</div><div class="mt-4 col-12 col-md-4">/archivo/</div>' => ["tipo_vivienda", "archivo"]
                            ],
                            [
                                '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/provincia/</div><div class="mt-4 col-12 col-md-6">/localidad/</div>' => ["provincia", "localidad"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/cuit/</div><div class="mt-4 col-12 col-md-6">/nombre/</div>' => ["cuit", "nombre"]
                            ],
                            [
                                '<div class="mt-4 col-12">/actividad/</div>' => ["actividad"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/email/</div><div class="mt-4 col-12 col-md-6">/telefono/</div>' => ["email", "telefono"]
                            ]
                        ];
                        if ($request->usuario) {
                            $html = [
                                [
                                    '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-8">/tipo_vivienda/</div><div class="mt-4 col-12 col-md-4">/archivo/</div>' => ["tipo_vivienda", "archivo"]
                                ],
                                [
                                    '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-6">/provincia/</div><div class="mt-4 col-12 col-md-6">/localidad/</div>' => ["provincia", "localidad"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-6">/nombre/</div><div class="mt-4 col-12 col-md-6">/edad/</div>' => ["edad", "nombre"]
                                ],
                                [
                                    '<div class="mt-4 col-12 col-md-6">/email/</div><div class="mt-4 col-12 col-md-6">/telefono/</div>' => ["email", "telefono"]
                                ]
                            ];
                        }
                        $html[] = [
                            '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                        ];
                        return json_encode(["form" => $form, "html" => $html, "clean" => true, "next" => "fin"]);
                    case 4:
                        $form = [
                            "tipo_vivienda" => [
                                "title" => "Tipo de vivienda",
                                "name" => "tipo_vivienda",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "value" => [
                                    ["id" => "Casa", "name" => "Casa"],
                                    ["id" => "Departamento", "name" => "Departamento"]
                                ]
                            ],
                            "tipo_asegurado" => [
                                "title" => "Tipo de asegurado",
                                "name" => "tipo_asegurado",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "value" => [
                                    ["id" => "Propietario", "name" => "Propietario"],
                                    ["id" => "Inquilino", "name" => "Inquilino"]
                                ]
                            ],
                            "sup_edificada" => [
                                "title" => "Superficie edificada",
                                "name" => "sup_edificada",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input text-right",
                                "required" => "true",
                                "pattern" => "[0-9.,].*",
                                "validity" => "Solo coma (,), punto (.) y números (0 - 9)",
                                "type" => "text",
                                "help" => "En m<sup>2</sup>"
                            ],
                            "domicilio" => [
                                "title" => "Domicilio",
                                "name" => "domicilio",
                                "element" => "textarea",
                                "class" => "form-control form-control-lg form--input",
                                "help" => "Domicilio completo"
                            ],
                            "provincia" => [
                                "title" => "Provincia",
                                "name" => "provincia",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "listener" => "change",
                                "function" => "provincia",
                                "required" => "true",
                                "value" => \App\Provincia::select('id', 'nombre AS name')->orderBy("name")->get()
                            ],
                            "localidad" => [
                                "title" => "Localidad",
                                "name" => "localidad",
                                "element" => "select",
                                "class" => "selectpicker form-control form-control-lg",
                                "disabled" => true
                            ],
                            "nombre" => [
                                "title" => "Nombre completo",
                                "name" => "nombre",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "required" => "true",
                                "type" => "text"
                            ],
                            "email" => [
                                "title" => "Email",
                                "name" => "email",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "required" => "true",
                                "type" => "email"
                            ],
                            "telefono" => [
                                "title" => "Teléfono",
                                "name" => "telefono",
                                "element" => "input",
                                "class" => "form-control form-control-lg form--input",
                                "type" => "phone"
                            ],
                        ];
                        $html = [
                            [
                                '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-4">/tipo_vivienda/</div><div class="mt-4 col-12 col-md-4">/tipo_asegurado/</div><div class="mt-4 col-12 col-md-4">/sup_edificada/</div>' => ["tipo_vivienda", "tipo_asegurado", "sup_edificada"]
                            ],
                            [
                                '<div class="mt-4 col-12">/domicilio/</div>' => ["domicilio"]
                            ],
                            [
                                '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/provincia/</div><div class="mt-4 col-12 col-md-6">/localidad/</div>' => ["provincia", "localidad"]
                            ],
                            [
                                '<div class="mt-4 col-12">/nombre/</div>' => ["nombre"]
                            ],
                            [
                                '<div class="mt-4 col-12 col-md-6">/email/</div><div class="mt-4 col-12 col-md-6">/telefono/</div>' => ["email", "telefono"]
                            ]
                        ];
                        $html[] = [
                            '<div class="mt-4 col-12"><hr/></div>' => ["NADA"]
                        ];
                        return json_encode(["form" => $form, "html" => $html, "clean" => true, "next" => "fin"]);
                }
                break;
        }
    }
}
