<div class="encabezado py-5">
    <div class="container">
        <h2 class="title--important">Cobertura</h2>
    </div>
</div>
<div class="coberturas coberturas--cobertura py-5">
    <div class="container">
        <ol class="breadcrumb bg-transparent border-0 p-0 m-0">
            <li class="breadcrumb-item breadcrumb--home"><a href="{{ URL::to( '/' ) }}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ URL::to( '/productos' ) }}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $data[ 'producto' ]->name }}</li>
        </ol>
        <div class="row">
            <div class="col-12 col-md-3">
                <button class="btn btn-warning text-uppercase d-block d-sm-none rounded-0 mb-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Coberturas<i class="fas fa-sort-amount-down ml-2"></i>
                </button>
                <div class="sidebar collapse bg-transparent dont-collapse-sm sticky-top" id="collapseExample">
                    <div class="sidebar">
                        @foreach( $data[ "coberturas"] AS $cobertura)
                        @php
                        $url_categoria = URL::to("productos/cobertura/" . str_slug($cobertura->name) . "/" . $cobertura->id)
                        @endphp
                        <h5 class="mb-0 cobertura--menu @if($cobertura->id == $data['producto']->id) active @endif" style="--tooltip-color: {{ $cobertura->color }}" data-parent="#accordionEx">
                            <a href="{{ @$url_categoria }}">
                                {{ $cobertura->name }}
                            </a>
                        </h5>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="row">
                    <div class="col-12 col-md">
                        @include( 'layouts.general.slider' , [ 'slider' => $data["producto"]->images , 'sliderID' => "slider" , "div" => 0, "arrow" => 0 ] )
                    </div>
                    <div class="col-12 col-md">
                        <h2 class="cobertura--nombre" style="color: {{ $data['producto']->color }}">{{ $data["producto"]->name }}</h2>
                        <div class="cobertura--resumen">{!! $data["producto"]->detalle !!}</div>
                    </div>
                </div>
                <div class="row mt-4 pb-5">
                    <div class="col-12 py-3 cobertura--caracteristicas">
                        <h4 class="cobertura--titulo__caracteristicas">Características de nuestras coberturas</h4>
                        <div class="mt-3">{!! $data["producto"]->caracteristicas !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-light py-3 border-top wrapper-solicitar">
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-8 col-lg-5">
                <h3 class="cobertura--titulo__caracteristicas cobertura--titulo__form">Solicitar información</h3>

                <form action="{{ Route('productos.cobertura') }}" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
                    <input type="hidden" name="elementos[nombre]" value="Nombre">
                    <input type="hidden" name="elementos[email]" value="Email">
                    <input type="hidden" name="elementos[mensaje]" value="Mensaje">
                    <input type="hidden" name="elementos[cobertura]" value="Cobertura">
                    @csrf
                    <input type="hidden" name="cobertura" value="{{ $data['producto']->name }}">
                    <div class="row">
                        <div class="col-12 col-md">
                            <input aria-label="Nombre" placeholder="Nombre (*)" required maxwidth="100" type="text" id="nombre" name="nombre" class="form-control form--input" value="{{ old('nombre') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md">
                            <input aria-label="Email" placeholder="Email (*)" required maxwidth="150" type="email" id="email" name="email" class="form-control form--input" value="{{ old('nombre') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <textarea rows="5" aria-label="Mensaje" placeholder="Mensaje (*)" required id="mensaje" name="mensaje" class="form-control form--input"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-primary btn--element px-5 rounded-pill">Consultar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push( "scripts" )
<script src="https://www.google.com/recaptcha/api.js?render={{ $data[ 'empresa' ]->captcha[ 'public' ] }}"></script>
<script>
    enviar = t => {
        let url = t.action;
        let method = t.method;
        let idForm = t.id;
        let formElement = document.getElementById( idForm );
        let formData = new FormData( formElement );
        grecaptcha.ready(function() {
            $( ".form-control" ).prop( "readonly" , true );
            Toast.fire({
                icon: 'warning',
                title: 'Espere, enviando'
            });
            grecaptcha.execute("{{ $data[ 'empresa' ]->captcha[ 'public' ] }}", {action: 'contact'}).then( function( token ) {
                formData.append( "token", token );
                axios({
                    method: method,
                    url: url,
                    data: formData,
                    responseType: 'json',
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                })
                .then((res) => {
                    $( ".form-control" ).prop( "readonly" , false );
                    if( parseInt( res.data.estado ) ) {
                        $( ".form-control" ).val( "" );
                        Toast.fire({
                            icon: 'success',
                            title: res.data.mssg
                        });
                    } else
                        Toast.fire({
                            icon: 'error',
                            title: res.data.mssg
                        });
                })
                .catch((err) => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Ocurrió un error'
                    });
                })
                .then(() => {});
            });
        });
    };
</script>
@endpush