<div class="wrapper-contacto bg-white pb-5">
    <div class="mapa">
        {!! $data[ "empresa" ]->domicilio[ "mapa" ] !!}
    </div>
    <div class="info py-5 mt-n2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 d-flex align-items-center">
                    <div class="w-100 d-flex">
                        <div class="icono">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="ml-3 d-flex align-items-center">
                            <div class="w-100">
                                @include( 'layouts.general.domicilio' , [ "dato" => $data[ 'empresa' ]->domicilio , "link" => 0 ] )
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md d-flex align-items-center">
                    <div class="w-100 d-flex">
                        <div class="icono">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="ml-3 d-flex align-items-center">
                            <div class="w-100">
                                @foreach( $data[ 'empresa' ]->telefono AS $t )
                                    @if ($t[ "tipo" ] == "tel")
                                        <p>@include( 'layouts.general.telefono' , [ "dato" => $t ] )</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md d-flex align-items-center">
                    <div class="w-100 d-flex">
                        <div class="icono">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="ml-3 d-flex align-items-center">
                            <div class="w-100">
                                @foreach( $data["empresa"]->email as $e )
                                    <p>@include( 'layouts.general.email' , [ "dato" => $e ] )</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contacto--staff py-5">
        <div class="container">
            <div class="row mt-n4">
                @foreach($data["elementos"] AS $staff)
                <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch mt-4">
                    <div class="bg-light p-3 w-100 staff d-flex align-items-stretch justify-content-between flex-column shadow-sm">
                        <div class="w-100">
                            <p class="staff--nombre">{{ $staff->nombre }}</p>
                            <p class="staff--sector">{{ $staff->sector }}</p>
                        </div>
                        <p class="staff--email mt-3 w-100 text-truncate"><a target="blank" href="mailto: {{ $staff->email }}">{{ $staff->email }}</a></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <p class="contacto--text mb-5">Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.</p>
                <form action="" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
                    <input type="hidden" name="elementos[nombre]" value="Nombre">
                    <input type="hidden" name="elementos[email]" value="Email">
                    <input type="hidden" name="elementos[telefono]" value="Teléfono">
                    <input type="hidden" name="elementos[empresa]" value="Empresa">
                    <input type="hidden" name="elementos[mensaje]" value="Mensaje">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md">
                            <input aria-label="Nombre" placeholder="Nombre (*)" required maxwidth="100" type="text" id="nombre" name="nombre" class="form-control form--input" value="{{ old('nombre') }}">
                        </div>
                        <div class="col-12 col-md">
                            <input aria-label="Email" placeholder="Email (*)" required maxwidth="150" type="email" id="email" name="email" class="form-control form--input" value="{{ old('nombre') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md">
                            <input aria-label="Teléfono" placeholder="Teléfono" type="phone" id="telefono" name="telefono" class="form-control form--input" value="{{ old('telefono') }}">
                        </div>
                        <div class="col-12 col-md">
                            <input aria-label="Empresa" placeholder="Empresa" type="text" id="empresa" name="empresa" class="form-control form--input" value="{{ old('empresa') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <textarea rows="10" aria-label="Mensaje" placeholder="Mensaje (*)" required id="mensaje" name="mensaje" class="form-control form--input"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-primary btn--element px-5 rounded-pill">Enviar</button>
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
    enviar = ( t ) => {
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
                    $(t).find(".form-control").prop( "readonly" , false );
                    if( parseInt( res.data.estado ) ) {
                        $(t).find(".form-control").val( "" );
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