<div class="encabezado py-5">
    <div class="container">
        <h2 class="title--important">Mis polizas</h2>
    </div>
</div>
<div class="wrapper-descarga py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row mt-n3">
                    @php
                    $cliente = auth()->guard('clientAuth')->user();
                    $polizas = $cliente->polizas;
                    $hoy = new DateTime();
                    @endphp
                    @foreach( $polizas AS $p )
                        @php $hasta = new DateTime($p->hasta); @endphp
                        <div class="col-12 poliza mt-3">
                            <div class="p-3 bg-light shadow-sm">
                                <p class="title--important d-flex justify-content-between align-items-center">{{ $p->seccion }} <small class="poliza--number"># {{ $p->poliza }}</small></p>
                                <p class="mt-2">{{ $p->compania }}</p>
                                @php
                                $fechas = "";
                                if (!empty($p->desde))
                                    $fechas .= date("d/m/Y" , strtotime($p->desde));
                                if (!empty($fechas) && !empty($p->hasta))
                                    $fechas .= " - ";
                                if (!empty($p->hasta))
                                    $fechas .= date("d/m/Y" , strtotime($p->hasta));
                                @endphp
                                @if (!empty($fechas))
                                <p class="mt-2">{{ $fechas }}</p>
                                @endif
                                @php
                                $interval = $hasta->diff($hoy);
                                @endphp
                                @if($interval->days >= 0)
                                <p class="mt-2">
                                    <strong>Días restantes:</strong> {{ $interval->days }}
                                </p>
                                @endif
                                @if (!empty($p->file))
                                    <hr/>
                                    <div class="row mt-3n">
                                        @for ($i = 0 ; $i < count($p->file) ; $i ++)
                                        <div class="col-12 col-md-6">
                                            <a href="{{ asset($p->file[ $i ][ 'file' ][ 'i' ]) }}" download class="d-flex poliza--file">
                                                <div class="poliza--icon">
                                                    <i class="fas fa-file-alt"></i>
                                                </div>
                                                <div class="poliza--text d-flex justify-content-between align-items-center w-100">
                                                    {{ empty( $p->file[ $i ][ 'file' ][ 'n' ] ) ? "Ver archivo" : $p->file[ $i ][ 'file' ][ 'n' ] }}
                                                    <i class="fas fa-download"></i>
                                                </div>
                                            </a>
                                        </div>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-4 botones">
                <a class="p-4 d-block bg-light text-uppercase title--important title--important__poliza" href="{{ route('client.cotizacion') }}">cotizar</a>
                <a class="p-4 d-block bg-light mt-3 text-uppercase title--important title--important__poliza" href="mailto:{{$data['contenido']['data']['atencion']['email']}}" target="blank">sufriste un siniestro</a>
            </div>
        </div>
    </div>
</div>