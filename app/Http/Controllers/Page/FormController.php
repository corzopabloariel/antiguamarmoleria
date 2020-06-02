<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMail;
use App\Mail\PresupuestoMail;

use App;
use App\Empresa;

class FormController extends Controller
{
    public $data;
    public $traducciones;
    public function __construct() {
        $this->data = Empresa::first();
        if (!file_exists("mails"))
            mkdir("mails", 0777, true);
        $filename = public_path() . "/count.txt";
        if (file_exists($filename)) {
            $myfile = fopen("count.txt", "r") or die("Unable to open file!");
            $txt = trim(fgets($myfile)) + 1;
            fclose($myfile);
            $myfile = fopen("count.txt", "w") or die("Unable to open file!");
            fwrite($myfile, $txt);
        } else {
            $myfile = fopen("count.txt", "x+") or die("Unable to open file!");
            $txt = "1\n";
            fwrite($myfile, $txt);
        }
        fclose($myfile);
    }
    public function contacto( Request $request ) {
        $rules = [
            "nombre" => "required|max:100",
            "email" => "required|email|max:150",
            "mensaje" => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return [ "estado" => 0 , "mssg" => "Validación incorrecta"];
        $dataRequest = $request->all();
        unset( $dataRequest[ "_token" ] );
        $email = $this->data->forms[ "contacto" ];

        $captcha = $dataRequest[ "token" ];
        if(!$captcha){
            return [ "estado" => 0 , "mssg" => "Captcha no verificado"];
            exit;
        }
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $this->data->captcha[ 'private' ], 'response' => $captcha);
        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $responseKeys = json_decode($response,true);
        if($responseKeys["success"]) {
            Mail::to( $email )->send( new ContactoMail( $dataRequest ) );
            if( count( Mail::failures() ) > 0 )
                return [ "estado" => 0 , "mssg" => "Error"];
            else {
                unset($dataRequest["token"]);
                unset($dataRequest["elementos"]);
                $file = "contacto-" . date("c") . ".txt";
                $filename = public_path() . "/mails/{$file}";
                $myfile = fopen($filename, "x+") or die("Unable to open file!");
                $txt = json_encode($dataRequest);
                fwrite($myfile, $txt);
                return [ "estado" => 1 , "mssg" => "Formulario enviado"];
            }
        } else {
            return [ "estado" => 0 , "mssg" => "Error"];
        }
    }

    public function presupuesto( Request $request ) {
        $rules = [
            "nombre" => "required",
            "email" => "required|email|max:150",
            "archivo" => "nullable|mimes:jpeg,png,jpg,gif,txt,doc,docx,xls,xlsx,pdf,zip,rar,7zip|max:2048"
        ];
        if (!isset($dataRequest["archivo"]))
            unset($rules["archivo"]);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return [ "estado" => 0 , "mssg" => "Validación incorrecta"];
        $dataRequest = $request->all();
        unset( $dataRequest[ "_token" ] );
        $file = isset($dataRequest["archivo"]) ? $request->file('archivo') : null;
        $email = $this->data->forms["presupuesto"];
        $captcha = $dataRequest[ "token" ];
        if(!$captcha){
            return [ "estado" => 0 , "mssg" => "Captcha no verificado"];
            exit;
        }
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $this->data->captcha[ 'private' ], 'response' => $captcha);
        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $responseKeys = json_decode($response,true);
        if($responseKeys["success"]) {
            Mail::to($email)->send( new PresupuestoMail( $dataRequest , $file ) );
            if( count( Mail::failures() ) > 0 )
                return [ "estado" => 0 , "mssg" => "Error"];
            else {
                unset($dataRequest["token"]);
                unset($dataRequest["elementos"]);
                $file = "presupuesto-" . date("c") . ".txt";
                $filename = public_path() . "/mails/{$file}";
                $myfile = fopen($filename, "x+") or die("Unable to open file!");
                $txt = json_encode($dataRequest);
                fwrite($myfile, $txt);
                return [ "estado" => 1 , "mssg" => "Presupuesto enviado"];
            }
        } else {
            return [ "estado" => 0 , "mssg" => "Error"];
        }
    }
}
