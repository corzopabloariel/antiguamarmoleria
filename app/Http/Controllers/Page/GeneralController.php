<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

use App;
use App\Contenido;
use App\Slider;
use App\Empresa;
use App\Faq;
use App\Producto;
use App\Marca;
class GeneralController extends Controller
{
    public function __construct() {}

    function section($arr, $item) {
        $search = $item === "home" ? "" : $item;
        for($i = 0; $i < count($arr); $i++) {
            if($arr[$i]["LINK"] == "/{$search}")
                return $arr[$i];
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
            "contenido" => Contenido::where("section", $section["FUNCTION"])->first(),
            "marcas" => Marca::where("elim", 0)->where("is_destacado", 1)->orderBy("order")->get(),
            "productos_footer" => Marca::where("elim", 0)->orderBy("order")->get(),
            "slider" => Slider::where("section", $section["FUNCTION"])->where("elim" , 0)->orderBy("order")->get(),
            "portada" => Slider::where("section", "por_{$section["FUNCTION"]}")->where("elim" , 0)->first(),
            "terminos" => Contenido::where("section", "terminos")->first(),
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
                $data["elementos"] = Marca::where("elim", 0)->orderBy("order")->get();
            break;
            case "faq":
                $data["elementos"] = Faq::where("elim", 0)->orderBy("order")->get(["title", "title_slug", "sliders", "resume", "answer"]);
            break;
            case "blogs":
                $data["elementos"] = Novedad::orderBy("orden")->simplePaginate(15);
            break;
            case "productos":
                $data["elementos"] = [];
            break;
            case "contacto":
            break;
        }

        return view( 'layouts.main' ,compact( 'data' ) );
    }
    public function marca($title) {
        $data = self::datos("productos");
        $data["view"] = "page.marca";
        $data["lateral"] = Marca::where("elim", 0)->orderBy("order")->get();
        $data["marca"] = Marca::where("title_slug", $title)->where("elim", 0)->first();
        $data["productos"] = $data["marca"]->productos()->whereNull("producto_id")->where("elim", 0)->orderBy("order")->paginate(24);
        $data["title"] = $data["marca"]->title;
        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function producto($title, $query) {
        $aux = explode("/", $query);
        $data = self::datos("productos");
        $data["view"] = "page.marca";
        $data["lateral"] = Marca::where("elim", 0)->orderBy("order")->get();
        $data["marca"] = Marca::where("title_slug", $title)->where("elim", 0)->first();
        if (count($aux) == 1 && strcmp($aux[0], $data["marca"]->content_slug) == 0) {
            $data["productos"] = $data["marca"]->productos()->whereNull("producto_id")->where("elim", 0)->orderBy("order")->paginate(24);
            $data["title"] = $data["marca"]->title . " - " . $data["marca"]->content;
        } else {
            $data["view"] = "page.producto";
            $data["producto"] = $data["marca"]->productos()->where("elim", 0)->where("title_slug", array_pop($aux))->first();
            $data["productos"] = $data["producto"]->productos()->where("elim", 0)->orderBy("order")->paginate(24);
            $data["before"] = $data["producto"]->padres();
            $data["title"] = "";
            foreach ($data["before"] AS $e) {
                if (!empty($data["title"]))
                    $data["title"] .= " - ";
                $data["title"] .= $e->title;
            }
        }
        $data["colores"] = 1;
        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function blog($title, $id) {
        $data = self::datos("novedades");
        $data["blog"] = Novedad::find( $id );
        $data["view"] = "page.blog";
        $data["title"] = "Novedad - {$data["blog"]->titulo}";
        return view( 'layouts.main' ,compact( 'data' ) );
    }
}
