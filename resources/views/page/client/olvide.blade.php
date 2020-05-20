<div class="encabezado py-5">
    <div class="container">
        <h2 class="title--important">Recupere su contraseña</h2>
    </div>
</div>
<div class="wrapper-olvide bg-white py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7">
                @if(!empty($data["cliente"]))
                <form action="" method="post">
                    @csrf
                    <h3>{{$data["cliente"]->nombre}}<small class="ml-2">{{$data["cliente"]->cliente}}</small></h3>
                    <p class="my-3 text-right">Fecha de solicitud: {{date("d/m/Y H:i:s", strtotime($data["cliente"]->updated_at))}}</p>
                    <input type="hidden" name="cliente_id" value="{{$data['cliente']->id}}"/>
                    <input type="hidden" name="tipo" id="tipo" value="ultimo">
                    <label for="pass">Contraseña nueva</label>
                    <div class="input-group">
                        <input required type="text" id="pass" placeholder="Contraseña nueva" name="pass" class="form-control rounded-0 bg-transparent border-top-0 border-left-0 border-primary"/>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary rounded-0" type="button" onclick="mostrar(this);">Ocultar</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-center">
                            <button id="btn-form" class="btn btn-primary btn--element px-5 rounded-pill" type="submit">Cambiar</button>
                        </div>
                    </div>
                </form>
                @else
                <form action="" id="form" onsubmit="event.preventDefault(); buscar(this);" method="post">
                    @csrf
                    <input type="hidden" name="tipo" id="tipo" value="primero">
                    <div id="form-data">
                        <div class="row">
                            <div class="col-12 d-none" id="form-search-alert">
                                Buscando información
                            </div>
                            <div class="col-12" id="form-search">
                                <label for="usuario">Ingrese su DNI o CUIT para buscar la cuenta.</label>
                                <input pattern="[0-9].*" oninvalid="this.setCustomValidity('Sólo números (0-9)')" oninput="this.setCustomValidity('')" placeholder="DNI o CUIT" required type="text" name="usuario" id="usuario" class=" form-control bg-transparent form--input"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-center">
                            <button id="btn-form" class="btn btn-primary btn--element px-5 rounded-pill" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@push( "scripts" )
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    mostrar = function( t ) {
        if( $( t ).closest( '.input-group' ).find( 'input' ).attr( 'type' ) == "text" ) {
            $( t ).text( "Ocultar" );
            $( t ).closest( '.input-group' ).find( 'input' ).attr( 'type' , 'password' );
        } else {
            $( t ).text( "Mostrar" );
            $( t ).closest( '.input-group' ).find( 'input' ).attr( 'type' , 'text' );
        }
    };
    buscar = function( t ) {
        let idForm = t.id;
        let url = t.action;
        let method = t.method;
        let formElement = document.getElementById(idForm);
        if(method == "GET" || method == "get") method = "post";
        let formData = new FormData(formElement);
        if( $( "#tipo" ).val() == "primero" ) {
            $( "#btn-form" ).text( "Buscando" )
            $("#form-search").addClass("d-none");
            $("#form-search-alert").removeClass("d-none");
        } else {
            $( "#btn-form" ).text( "Espere" )
        }
        $( "#btn-form > div" ).removeClass( "d-none" );
        axios({
            method: method,
            url: url,
            data: formData,
            responseType: 'json',
            config: { headers: {'Content-Type': 'multipart/form-data' }}
        })
        .then(function(res) {
            if(parseInt(res.data.status) == 1) {
                if( res.data.s !== undefined ) {
                    alertify.success("Información enviada.");
                    setTimeout(() => {
                        window.location = "{{ route('index') }}";
                        return null;
                    }, 500);
                }
                $( "#tipo" ).val( "segundo" );
                $( "#btn-form" ).text("Solicitar cambio de contraseña");
                let mail = res.data.cliente.email;
                let part_1 = mail.slice(0,5);
                let part_2 = mail.slice(5).replace(/[A-Za-z]/g,'*');
                mail = `${part_1}${part_2}`;

                let h = "";
                h += `<h3>${res.data.cliente.nombre}<small class="ml-2">${res.data.cliente.cliente}</small></h3>`;
                h += `<p>Para reestablecer la contraseña se enviará un correo a la siguiente dirección: ${mail}</p>`;
                h += `<input type="hidden" name="cliente_id" value="${res.data.cliente.id}"/>`;
                /*h += `<label for="pass">Contraseña nueva</label>`;
                h += `<div class="input-group">`;
                    h += `<input required type="text" id="pass" placeholder="Contraseña nueva" name="pass" class="form-control rounded-0 border-top-0 border-left-0 border-primary"/>`;
                    h += `<div class="input-group-append">`;
                        h += `<button class="btn btn-outline-primary rounded-0" type="button" onclick="mostrar(this);">Ocultar</button>`;
                    h += `</div>`;
                h += `</div>`;*/

                $( "#form-data" ).html( h );
            } else {
                $( "#btn-form" ).text( "Buscar" )
                $("#form-search").removeClass("d-none");
                $("#form-search-alert").addClass("d-none");
                alertify.error("Ocurrió un error. Reintente");
            }
        })
        .catch(function(err) {})
        .then(function() {});
    };
</script>
@endpush