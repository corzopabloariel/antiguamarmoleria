<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use App;
use App\Contenido;
use App\Slider;
use App\Empresa;
use App\Faq;
use App\Producto;
use App\Blog;
use App\Blog_categorias;
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
                $data["elementos"] = [];
                $data["elementos"]["categorias"] = Blog_categorias::where("elim", 0)->orderBy("order")->get(["id", "title", "title_slug"]);
                $data["elementos"]["novedades"] = Blog::where("elim", 0)->orderBy("date")->simplePaginate(16);
            break;
            case "productos":
            break;
            case "presupuesto":
                $arr = [];
                $productos = Producto::where("elim", 0)->get();
                foreach($productos AS $producto) {
                    $arr[] = implode(", ", $producto->padres(1));
                }
                sort($arr);
                $data["productos"] = $arr;
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
            $data["no__zoom"] = 1;
        } else {
            $aux = array_reverse($aux);
            $search = array_shift($aux);
            $data["producto"] = $data["marca"]->productos();
            $data["producto"] = $data["producto"]->select("productos.*");
            for($i = 0; $i < count($aux); $i ++) {
                $title_slug = $aux[$i];
                $data["producto"] = $data["producto"]->join("productos AS p_{$i}", function ($join) use ($title_slug, $i) {
                    $attr = $i == 0 ? "productos" : "p_" . ($i - 1);
                    $join->on("p_{$i}.id", "=", "{$attr}.producto_id")
                        ->where("p_{$i}.title_slug", "LIKE", $title_slug);
                });
            }
            $data["producto"] = $data["producto"]->where("productos.title_slug", $search)->where("productos.elim", 0)->first();
            $data["view"] = "page.producto";
            //$data["producto"] = $data["marca"]->productos()->where("elim", 0)->first();
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

    public function search(Request $request) {
        $data = self::datos("productos");
        $elementos = new Producto;
        $elementos = $elementos->join('marcas', 'productos.marca_id', '=', 'marcas.id');
        if (isset($request->s)) {
            $data["search"] = $request->s;
            $elementos = $elementos->whereRaw( "UPPER(CONCAT_WS( ' ' ,productos.title ,productos.title_slug, productos.characteristics, marcas.title, marcas.title_slug)) LIKE UPPER('%{$request->s}%')" );
        }
        $elementos = $elementos->where("productos.elim", 0);
        $data["total"] = $elementos->count();
        $elementos = $elementos->select("productos.*");
        $elementos = $elementos->orderBy('marcas.order')->orderBy('productos.order')->paginate(24);
        $data["productos"] = $elementos;
        $data["view"] = "page.search";
        $data["title"] = "Buscador - {$request->s}";
        return view('layouts.main' ,compact('data'));
    }

    public function novedades($title) {
        $data = self::datos("novedades");
        $aux = Blog_categorias::where("title_slug", $title)->first();
        $data["elementos"] = [];
        $data["elementos"]["categorias"] = Blog_categorias::where("elim", 0)->orderBy("order")->get(["id", "title", "title_slug"]);
        $data["elementos"]["novedades"] = $aux->blogs()->where("elim", 0)->orderBy("date")->simplePaginate(16);
        $data["categoria"] = $aux;
        $data["view"] = "page.blogs";
        $data["title"] = "Novedad - {$aux->title}";
        return view('layouts.main' ,compact('data'));
    }

    public function novedad($categoria, $title) {
        $data = self::datos("novedades");
        $aux = Blog_categorias::where("title_slug", $categoria)->first();
        $data["elementos"] = [];
        $data["elementos"]["categorias"] = Blog_categorias::where("elim", 0)->orderBy("order")->get(["id", "title", "title_slug"]);
        $data["elementos"]["novedad"] = $aux->blogs()->where("elim", 0)->where("title_slug", $title)->first();
        $data["categoria"] = $aux;
        $data["view"] = "page.blog";
        $data["title"] = "Novedad - {$aux->title}";
        return view('layouts.main' ,compact('data'));
    }
}
