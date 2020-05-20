<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            body {
                font-size: 12px;
                line-height: 17px;
                font-family: "Arial";
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            table td,
            table th {
                padding: .7em
            }
            table thead tr {
                border: 1px solid #333;
                background: #f0f0f0;
            }
            .fecha {
                text-align: right;
            }
            .footer {
                font-size: 10px;
                color: #fafafa;
                background-color: #1e3957;
                line-height: 15px;
                font-family: "Arial";
                text-align: center;
                padding: .7em 0;
            }
            .footer .linea span {
                display: inline-block;
            }
            .footer .linea span + span {
                padding-left: 10px;
            }
        </style>
    </head>
<body>
    @if( $flag )
    <div style="padding: .7em; background-color: #f0f0f0; font-size: 12px; color: #555;">Este mail es identíco al que se envío al cliente</div>
    @endif
    @php
    $Arr_ = [ 1 => "Enero" , 2 => "Febrero" , 3 => "Marzo" , 4 => "Abril" , 5 => "Mayo" , 6 => "Junio" , 7 => "Julio" , 8 => "Agosto" , 9 => "Septiembre" , 10 => "Octubre" , 11 => "Noviembre" , 12 => "Diciembre" ];
    $fecha = date( "d" ) . " de " . $Arr_[ date( "n" ) ] . " de " . date( "Y" );
    @endphp
    <div class="header" style="text-align: right;">
        <div style="background-color: #1f3856;padding: 5px 10px; display: inline-block; width: 197px; height: 56px;">
            <img src="http://ogrady.com.ar/{{$empresa->images[ 'logo' ][ 'i' ]}}" style="width: 100%; display: inline-block" alt="" srcset="">
        </div>
        <p style="text-align: right; margin-top: 10px">{{ $fecha }}</p>
    </div>
    {!! $pdf !!}
    <div class="footer">
        <p class="linea">
            @for( $i = 0 ; $i < count( $empresa->telefono ) ; $i++ )
            <span style="padding-left: 10px; padding-right: 10px;">{{ $empresa->telefono[ $i ][ "visible" ] }}</span>
            @endfor
        </p>
        <p class="linea">
            <span>{{ config('app.name') }}</span>
            <span style="padding-left: 10px; padding-right: 10px;">|</span><span>{{ $empresa->domicilio[ "calle" ] }} {{ $empresa->domicilio[ "altura" ] }} {{ $empresa->domicilio[ "detalle" ] }}</span>
            <span style="padding-left: 10px; padding-right: 10px;">|</span><span>{{ $empresa->domicilio[ "cp" ] }}</span>
            <span style="padding-left: 10px; padding-right: 10px;">|</span><span>{{ $empresa->domicilio[ "provincia" ] }}</span>
            <span style="padding-left: 10px; padding-right: 10px;">|</span><span>{{ $empresa->domicilio[ "pais" ] }}</span>
        </p>
    </div>
</body>
</html>