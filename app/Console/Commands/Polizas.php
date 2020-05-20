<?php

namespace App\Console\Commands;

use App\Http\Controllers\Auth\PolizaController AS pc;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Mpdf\Mpdf;
use App\Mail\PolizaMail;
use App\Mail\ClienteMail;
use App\Mail\AvisoMail;
use App\Empresa;
use App\Poliza;
use App\Log;

class Polizas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verificar:poliza';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía correo a 31 días del vencimiento de las polizas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Mail::to( "corzo.pabloariel@gmail.com" )->send( new AvisoMail( "Inicio de Script - Polizas" ) );
        $files = Poliza::whereNotNull( "hasta" )->whereDate( "hasta" , "<" , date( 'Y-m-d' ) )->get();
        foreach( $files AS $f ) {
            if( !empty( $f->file ) ) {
                for( $i = 0 ; $i < count( $f->file ) ; $i++ ) {
                    $filename = public_path() . "/{$f->file[ $i ][ 'i' ]}";
                    if ( file_exists( $filename ) )
                        unlink( $filename );
                }
            }
        }
        $Arr_polizas_vencer = [];
        $Arr_polizas_vencidas = [];
        $Arr = Poliza::whereNotNull("hasta")->where( "aviso", 1 )->whereNotIn("id_seccion",[2, 5, 6])->orderBy( "hasta" , "DESC" )->get();
        foreach( $Arr AS $a ) {
            $t = self::dias_transcurridos( $a->hasta );
            if($t == 0) {
                $Arr_polizas_vencidas[] = $a;
                $a->fill( [ "aviso" => 2 ] );
                $a->save();
            }
        }
        $empresa = Empresa::first();
        $today = date('Y-m-d');
        Poliza::whereNotNull( "hasta" )->whereDate( "hasta" , "<" , $today)->delete();
        $date = date('Y-m-d', strtotime("{$today} + {$empresa->dias} days"));
        $Arr = Poliza::whereDate("hasta", $date)->whereNull( "aviso" )->whereNotIn("id_seccion",[2, 5, 6])->orderBy( "hasta" , "DESC" )->get();
        foreach( $Arr AS $a ) {
            $t = self::dias_transcurridos( $a->hasta );
            $Arr_polizas_vencer[] = $a;
            $cliente = $a->clienteOBJ;
            if( empty( $cliente ) ) {
                Log::create( [
                    "user_id" => null,
                    "data" => [
                        "action" => "Cliente no encontrado al enviar correo automático",
                        "cliente" => $a->cliente,
                        "poliza" => $a->poliza,
                        "compania" => $a->compania
                    ]
                ] );
            } else {
                $data = [];
                $pdf = $empresa->mensaje[ "end" ];
                $mensaje = isset( $empresa->mensaje[ "end_body" ] ) ? $empresa->mensaje[ "end_body" ] : "";
                $data[ "cliente" ] = $cliente;
                $data[ "poliza" ] = $a;
                $data[ "text" ] = $empresa->mensaje[ "end" ];
                $data[ "pdf" ] = $empresa->mensaje[ "end" ];
                $data[ "pdf" ] = str_replace( "_nombre_" , $data[ "cliente" ]->nombre, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_nrodni_" , $data[ "cliente" ]->nrodni, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_cuit_" , $data[ "cliente" ]->cuit, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_direccion_" , $data[ "cliente" ]->direccion, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_cliente_" , $data[ "cliente" ]->cliente, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_localidad_" , $data[ "cliente" ]->localidad, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_provincia_" , $data[ "cliente" ]->provincia, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_telefono1_" , $data[ "cliente" ]->telefono1, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_telefono2_" , $data[ "cliente" ]->telefono2, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_telefono3_" , $data[ "cliente" ]->telefono3, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_email_" , $data[ "cliente" ]->email, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_email2_" , $data[ "cliente" ]->email2, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_poliza_" , $data[ "poliza" ]->poliza, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_compania_" , $data[ "poliza" ]->compania, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_seccion_" , $data[ "poliza" ]->seccion, $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_desde_" , date( "d/m/Y" , strtotime( $data[ "poliza" ]->desde ) ), $data[ "pdf" ] );
                $data[ "pdf" ] = str_replace( "_hasta_" , date( "d/m/Y" , strtotime( $data[ "poliza" ]->hasta ) ), $data[ "pdf" ] );

                $data[ "text" ] = str_replace( "_nombre_" , $data[ "cliente" ]->nombre, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_nrodni_" , $data[ "cliente" ]->nrodni, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_cuit_" , $data[ "cliente" ]->cuit, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_direccion_" , $data[ "cliente" ]->direccion, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_cliente_" , $data[ "cliente" ]->cliente, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_localidad_" , $data[ "cliente" ]->localidad, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_provincia_" , $data[ "cliente" ]->provincia, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_telefono1_" , $data[ "cliente" ]->telefono1, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_telefono2_" , $data[ "cliente" ]->telefono2, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_telefono3_" , $data[ "cliente" ]->telefono3, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_email_" , $data[ "cliente" ]->email, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_email2_" , $data[ "cliente" ]->email2, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_poliza_" , $data[ "poliza" ]->poliza, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_compania_" , $data[ "poliza" ]->compania, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_seccion_" , $data[ "poliza" ]->seccion, $data[ "text" ] );
                $data[ "text" ] = str_replace( "_desde_" , date( "d/m/Y" , strtotime( $data[ "poliza" ]->desde ) ), $data[ "text" ] );
                $data[ "text" ] = str_replace( "_hasta_" , date( "d/m/Y" , strtotime( $data[ "poliza" ]->hasta ) ), $data[ "text" ] );

                $table = "";
                $table .= "<table style='width:100%'>";
                    $table .= "<thead>";
                        $table .= "<tr>";
                            $table .= "<th style='text-align: left; background-color: #eeeeee;'>Compañía</th>";
                            $table .= "<th style='text-align: left; background-color: #eeeeee;'>Sección</th>";
                            $table .= "<th style='text-align: center; background-color: #eeeeee;'>Póliza</th>";
                            $table .= "<th style='text-align: right; background-color: #eeeeee;'>Vencimiento</th>";
                        $table .= "</tr>";
                    $table .= "</thead>";
                    $table .= "<tbody>";
                        $table .= "<tr>";
                            $table .= "<td style='text-align: left;'>{$data[ "poliza" ]->compania}</td>";
                            $table .= "<td style='text-align: left;'>{$data[ "poliza" ]->seccion}</td>";
                            $table .= "<td style='text-align: center;'>{$data[ "poliza" ]->poliza}</td>";
                            $table .= "<td style='text-align: right;'>" . date( "d/m/Y" , strtotime( $data[ "poliza" ]->hasta ) ) . "</td>";
                        $table .= "</tr>";
                    $table .= "</tbody>";
                $table .= "</table>";
                $data[ "pdf" ] = str_replace( "_tabla_" , $table , $data[ "pdf" ] );
                $data[ "text" ] = str_replace( "_tabla_" , $table , $data[ "text" ] );

                $name = "[{$a->clienteOBJ->cliente}] {$a->clienteOBJ->nombre} __ {$a->poliza} - " . time();
                $a->fill( [ "aviso" => 1 ] );
                $a->save();
                (new pc)->prueba( $data , $name , $empresa , $cliente );
            }
            if( $t == 0 ) {
                $Arr_polizas_vencidas[] = $a;
                $a->fill( [ "aviso" => 1 ] );
                $a->save();
            }
        }

        Mail::to( $empresa->form[ "polizas" ] )->send( new PolizaMail( $Arr_polizas_vencidas , $Arr_polizas_vencer ) );
        Mail::to( "corzo.pabloariel@gmail.com" )->send( new AvisoMail( "Fin de Script - Polizas" ) );
    }

    function dias_transcurridos( $fecha )
    {
        $dias = ( strtotime( $fecha ) - time() ) / 86400;
        $dias = abs( $dias );
        $dias = floor( $dias );
        return $dias;
    }
}
