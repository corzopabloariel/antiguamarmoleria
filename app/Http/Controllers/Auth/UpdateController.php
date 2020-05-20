<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Localidad;
use App\Provincia;
use App\Cliente;
use App\Poliza;
class UpdateController extends Controller
{
    public $separador = ";";
    public $contenedor = "_txt";

    public function polizas()
    {
        set_time_limit(0);
        $total = 0;
        $property = [
            "compania",
            "poliza",
            "seccion",
            "cliente",
            "nombre",
            "cuit",
            "nrodoc",
            "email",
            "desde",
            "hasta",
            "dias",
            "tipo",
            "id_seccion"
        ];
        DB::beginTransaction();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('polizas')->whereNull( 'elim' )->update( [ 'elim' => 1 ] );
        $filename = public_path() . "/{$this->contenedor}/Polizas.txt";
        if ( file_exists( $filename ) ) {
            $file = fopen( $filename , "r" );
            while(!feof($file)) {
                $row = trim( fgets( $file ) );
                if( empty( $row ) )
                    continue;
                $aux = explode( $this->separador , $row );
                $data = [];
                try {
                    $aux = array_map("self::limpiar", $aux);
                    $data = array_combine($property, $aux);
                    unset($data["nombre"]);
                    unset($data["cuit"]);
                    unset($data["nrodoc"]);
                    unset($data["email"]);
                    $data["desde"] = implode("-",array_reverse(explode("/", $data["desde"])));
                    $data["hasta"] = empty($data["hasta"]) ? null : implode("-",array_reverse(explode("/", $data["hasta"])));
                    $data[ "elim" ] = null;
                    $cliente = CLiente::where( "cliente" , "LIKE" , $data[ "cliente" ] )->first();
                    if ($cliente) {
                        $data[ "cliente_id" ] = $cliente->id;
                        $poliza = Poliza::where( "poliza" , "LIKE" , $data[ "poliza" ] )->first();
                        if (empty($poliza))
                            Poliza::create( $data );
                        else {
                            $data["aviso"] = $poliza->aviso;
                            $data["file"] = $poliza->file;
                            $poliza->fill( $data );
                            $poliza->save();
                        }
                        DB::commit();
                    }
                } catch (\Throwable $th) {
                    dd($data);
                }
            }

            DB::commit();
            DB::table( 'polizas' )->where( 'elim' , 1 )->delete();
            DB::commit();
            fclose($file);
            return 1;
        } else {
            DB::rollback();
            return 0;
        }
    }

    public function limpiar($n)
    {
        $value = trim( preg_replace('/\t+/', '', $n));
        return $value === "" ? NULL : $value;
    }

    public function clientes()
    {
        set_time_limit(0);
        $total = 0;
        $property = [
            "cliente",
            "nombre",
            "direccion",
            "localidad",
            "cp",
            "provincia",
            "telefono1",
            "telefono2",
            "telefono3",
            "email",
            "cuit",
            "nrodni"
        ];
        $password = Hash::make( "12345678" );

        DB::beginTransaction();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('clientes')->whereNull( 'elim' )->update( [ 'elim' => 1 ] );
        $filename = public_path() . "/{$this->contenedor}/Clientes.txt";
        if ( file_exists( $filename ) ) {
            $file = fopen( $filename , "r" );
            while(!feof($file)) {
                $row = trim( fgets( $file ) );
                if( empty( $row ) )
                    continue;
                $aux = explode( $this->separador , $row );
                $data = [];
                //try {
                    $aux = array_map("self::limpiar", $aux);
                    $data = array_combine($property, $aux);
                    $data["cp"] = intval( preg_replace( '/[^0-9]+/' , '' , $data["cp"] ) , 10 );
                    $data["nrodoc"] = empty($data["nrodoc"]) ? null : $data["nrodoc"];
                    $data["cuit"] = empty($data["cuit"]) ? null : $data["cuit"];
                    $email = strtolower( $data["email"] );
                    $email = explode("|", $email);
                    $email1 = trim($email[0]);
                    $email2 = isset($email[1]) ? trim($email[1]) : null;
                    $data["email"] = $email1;
                    $data["email2"] = $email2;
                    $data[ "elim" ] = null;
                    $data["provincia_id"] = null;
                    $data["localidad_id"] = null;
                    if (!empty($data[ "provincia" ])) {
                        $provincia = Provincia::where( 'nombre' , 'LIKE' , "{$data[ "provincia" ]}" )->first();
                        if( empty( $provincia ) ) {
                            $provincia = Provincia::create( [
                                'nombre' => $data[ "provincia" ]
                            ] );
                        }
                        if (!empty($data["cp"]) && !empty($data["localidad"])) {
                            $localidad = Localidad::where( "codigopostal" , $data[ "cp" ] )->first();
                            if( empty( $localidad ) ) {
                                if( strcmp( strtoupper( $data[ "provincia" ] ), "CAPITAL FEDERAL") == 0 || strcmp(strtoupper( $data[ "provincia" ] ), "CABA") == 0 || strcmp(strtoupper( $data[ "provincia" ] ), "C.A.B.A.") == 0 )
                                    $data[ "provincia" ] = "Ciudad Autónoma de Buenos Aires (CABA)";
                                $localidad = Localidad::create( [
                                    'nombre' => $data[ "localidad" ],
                                    'codigopostal'  => $data[ "cp" ],
                                    'provincia_id'  => $provincia->id
                                ] );
                            }
                            $data["localidad_id"] = $localidad->id;
                        }
                        $data["provincia_id"] = $provincia->id;
                    }
                    unset($data["provincia"]);
                    unset($data["localidad"]);
                    $cliente = Cliente::where( "cliente" , $data[ "cliente" ] )->first();
                    if( empty( $cliente ) ) {
                        $data["password"] = $password;
                        Cliente::create( $data );
                    } else {
                        $cliente->fill( $data );
                        $cliente->save();
                    }
                    DB::commit();
                /*} catch (\Throwable $th) {
                    dd($data);
                    DB::rollback();
                }*/
            }
            DB::commit();
            DB::table( 'clientes' )->where( 'elim' , 1 )->delete();
            DB::commit();
            fclose($file);
            return 1;
        } else {
            DB::rollback();
            return 0;
        }
    }

    public function automoviles()
    {
        set_time_limit(0);
        $total = 0;
        $property = [
            "marca",
            "modelo",
            "version",
            "combustible",
            "motor",
            "puertas",
            "anio"
        ];
        $type = [
            "STRING",
            "STRING",
            "STRING",
            "STRING",
            "STRING",
            "STRING",
            "STRING"
        ];

        DB::beginTransaction();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('automoviles')->whereNull( 'elim' )->update( [ 'elim' => 1 ] );
        $filename = public_path() . "/{$this->contenedor}/Automoviles.txt";
        if ( file_exists( $filename ) ) {
            $file = fopen( $filename , "r" );
            while(!feof($file)) {
                $row = trim( fgets( $file ) );
                if( empty( $row ) )
                    continue;
                $aux = explode( $this->separador , $row );
                $data = [];
                try {
                    for( $i = 0 ; $i < count( $aux ) ; $i++ ) {
                        $data[ $property[ $i ] ] = trim( preg_replace('/\t+/', '', $aux[ $i ] ) );
                        $data[ $property[ $i ] ] = empty( $data[ $property[ $i ] ] ) ? null : $data[ $property[ $i ] ];
                        //$data[ $property[ $i ] ] = utf8_encode( $data[ $property[ $i ] ] );
                        $data[ $property[ $i ] ] = $data[ $property[ $i ] ] == "NULL" ? null : $data[ $property[ $i ] ];
                    }
                } catch (\Throwable $th) {
                    DB::rollback();
                }
            }
        } else {
            DB::rollback();
            return 0;
        }
    }
}