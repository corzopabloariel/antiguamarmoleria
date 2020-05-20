<div class="modal fade bd-example-modal-sm" id="passModal" role="dialog" aria-labelledby="modalPassLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="modalPassLabel">Cambiar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formPass" onsubmit="event.preventDefault(); changePass(this);" action="" method="post">
                @csrf
                <div class="modal-body">
                    <div id="dato-cliente" class="mb-4">
                        <h3 class="text-center">Hola {{ auth()->guard('clientAuth')->user()["nombre"] }}</h3>
                        <input type="hidden" name="cliente_id" value="{{ auth()->guard('clientAuth')->user()['id'] }}"/>
                    </div>
                    <label for="pass">Contraseña nueva</label>
                    <div class="input-group">
                        <input required type="text" id="pass" placeholder="Contraseña nueva" name="pass" class="form-control form--input rounded-0 border-top-0 border-left-0 border-primary"/>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary rounded-0" type="button" onclick="mostrar(this);">Ocultar</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="submit" class="px-5 text-uppercase btn btn-primary btn--element rounded-pill">CAMBIAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="encabezado py-5">
    <div class="container">
        <h2 class="title--important">Mis datos</h2>
    </div>
</div>
<div class="wrapper-datos bg-white py-5">
    <div class="container">
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="cobertura--titulo__caracteristicas">Dirección</h3>
                            <input disabled type="text" value="{{auth()->guard('clientAuth')->user()['direccion']}}" class="form-control form--input">
                            <input disabled type="text" value="{{ auth()->guard('clientAuth')->user()->provincia->nombre }}" class="form-control form--input mt-3">
                            <input disabled type="text" value="{{ auth()->guard('clientAuth')->user()->localidad->nombre }}" class="form-control form--input mt-3">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="cobertura--titulo__caracteristicas">Teléfonos</h3>
                            <input placeholder="Teléfono 1" type="text" value="{{auth()->guard('clientAuth')->user()['telefono1']}}" name="telefono1" id="telefono1" class="form-control form--input">
                            <input placeholder="Teléfono 2" type="text" value="{{auth()->guard('clientAuth')->user()['telefono2']}}" name="telefono2" id="telefono2" class="form-control form--input mt-3">
                            <input placeholder="Teléfono 3" type="text" value="{{auth()->guard('clientAuth')->user()['telefono3']}}" name="telefono3" id="telefono3" class="form-control form--input mt-3">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="cobertura--titulo__caracteristicas">Correos</h3>
                            <input placeholder="Correo electrónico" type="text" value="{{auth()->guard('clientAuth')->user()['email']}}" name="email" id="email" class="form-control form--input">
                            <input placeholder="Correo electrónico" type="text" value="{{auth()->guard('clientAuth')->user()['email2']}}" name="email2" id="email2" class="form-control form--input mt-3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 row">
                <div class="col-12 d-flex justify-content-center">
                    <button data-toggle="modal" data-target="#passModal" type="button" class="px-5 text-uppercase btn btn-primary btn--element rounded-pill mr-2">cambiar contraseña <i class="fas fa-key ml-3"></i></button>
                    <button type="submit" class="px-5 text-uppercase btn btn-primary btn--element rounded-pill">editar <i class="fas fa-pencil-alt ml-3"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
@push( "scripts" )
<script>
    window.dataFull = @json( auth()->guard('clientAuth')->user() );
    console.log(window.dataFull)
    $( document ).ready( function() {
        $("#provincia_id").val($("#provincia_id").val()).trigger( "change" );
    });
    changePass = function( t ) {
        let idForm = t.id;
        let url = t.action;
        let method = t.method;
        let formElement = document.getElementById(idForm);
        let formData = new FormData(formElement);

        Toast.fire({
            icon: 'warning',
            title: 'Espere, cambiando contraseña'
        });
        axios({
            method: method,
            url: url,
            data: formData,
            responseType: 'json',
            config: { headers: {'Content-Type': 'multipart/form-data' }}
        })
        .then(function(res) {
            if(parseInt(res.data) == 1) {
                document.querySelector("#pass").value = "";
                window.logueado = "0";
                $( "#passModal" ).modal( "hide" );
                Toast.fire({
                    icon: 'success',
                    title: "Contraseña cambiada"
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: "Ocurrió un error en la modificación. Reintente"
                });
            }
        })
        .catch(function(err) {
                Toast.fire({
                    icon: 'error',
                    title: "Ocurrió un error."
                });
        })
        .then(function() {});
    };
    localidades = function( t ) {
        let id = $( t ).val();
        $( t ).attr( "disabled" , true );
        axios.get(`{{ url('/adm/localidades/provincia/${id}') }}`, {
            responseType: 'json'
        })
        .then(function(res) {
            $( t ).removeAttr( "disabled" );
            if( parseInt( res.status ) == 200 ) {
                if( $( `#localidad_id .add` ).length ) {
                    $( `#localidad_id` ).attr( "disabled" , true );
                    $( `#localidad_id .add` ).remove();
                }
                if( res.data.length > 0 ) {
                    res.data.forEach( function( l ) {
                        $( `#localidad_id` ).append( `<option class="add" value="${l.id}">${l.nombre}</option>` );
                    } );
                    $( `#localidad_id` ).removeAttr( "disabled" );
                    if( window.dataFull !== undefined ) {
                        $( `#localidad_id` ).val( window.dataFull.localidad_id );
                        delete window.dataFull;
                    }
                }
            }
        })
        .catch(function(err) {})
        .then(function() {});
    };
</script>
@endpush