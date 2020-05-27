<div class="contacto">
    <div class="banner d-flex align-items-stretch" style="--url: url({{asset(@$data['portada']->image['i'])}})">
        <div class="container d-flex">
            <h3 class="banner--title align-self-end"><span>Contacto</span></h3>
        </div>
    </div>
    <div class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="contacto--form contacto--text">
                        {!! $data["empresa"]->text["contacto"] !!}
                    </div>
                </div>
                <div class="col-12 col-md d-flex align-items-center">
                    <div class="w-100 contacto--data">
                        <div class="d-flex w-100">
                            <i class="footer--icon fas fa-phone-volume"></i>
                            <div class="d-flex align-items-center">
                                <div class="w-100">
                                    @foreach( $data[ 'empresa' ]->phones AS $t )
                                        @if ($t[ "tipo" ] == "tel")
                                            <p>@include( 'layouts.general.telefono' , [ "dato" => $t ] )</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="w-100 d-flex mt-4">
                            <i class="footer--icon far fa-envelope"></i>
                            <div class="d-flex align-items-center">
                                <div class="w-100">
                                    @foreach( $data["empresa"]->emails as $e )
                                        <p>@include( 'layouts.general.email' , [ "dato" => $e ] )</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="contacto--form">
                    <p class="mb-5">Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.</p>
                    <form action="" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
                        <input type="hidden" name="elementos[asunto]" value="Asunto">
                        <input type="hidden" name="elementos[nombre]" value="Nombre y Apellido">
                        <input type="hidden" name="elementos[email]" value="Email">
                        <input type="hidden" name="elementos[telefono]" value="Teléfono">
                        <input type="hidden" name="elementos[empresa]" value="Empresa">
                        <input type="hidden" name="elementos[mensaje]" value="Mensaje">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md">
                                <label for="nombre">Nombre y Apellido (*)</label>
                                <input aria-label="Nombre y Apellido" placeholder="Nombre y Apellido (*)" required maxwidth="100" type="text" id="nombre" name="nombre" class="form-control form--input" value="{{ old('nombre') }}">
                                <label class="mt-4" for="empresa">Empresa</label>
                                <input aria-label="Empresa" placeholder="Empresa" type="text" id="empresa" name="empresa" class="form-control form--input" value="{{ old('empresa') }}">
                            </div>
                            <div class="col-12 col-md">
                                <label for="email">Email (*)</label>
                                <input aria-label="Email" placeholder="Email (*)" required maxwidth="150" type="email" id="email" name="email" class="form-control form--input" value="{{ old('nombre') }}">
                                <label class="mt-4" for="telefono">Teléfono</label>
                                <input aria-label="Teléfono" placeholder="Teléfono" type="phone" id="telefono" name="telefono" class="form-control form--input" value="{{ old('telefono') }}">
                            </div>
                            <div class="col-12 col-md-12 col-lg mt-md-3">
                                <label for="mensaje">Mensaje (*)</label>
                                <textarea rows="5" aria-label="Mensaje" placeholder="Mensaje (*)" required id="mensaje" name="mensaje" class="form-control form--input"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <button class="btn btn-primary button--form button--form__public px-5">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="contacto--map">
        {!! $data[ "empresa" ]->addresses[ "mapa" ] !!}
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