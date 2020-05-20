<div class="wrapper-presupuesto">
    <div class="encabezado font-merriweather pt-5 pb-3">
        <div class="container">
            <p>Cotización</p>
        </div>
    </div>
    <div class="container pb-5 pt-3">
        <div id="list-breadcrumb" class="list-breadcrumb d-none mb-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white rounded-0 p-0 mb-0"></ol>
            </nav>
        </div>
        <div class="row justify-content-center pt-4">
            <div class="col-12 col-md-10">
                <form onsubmit="event.preventDefault(); enviar(this)" id="form" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div id="form-tipo">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h4 class="text-center text-uppercase">Seleccione tipo de usuario</h4>
                            </div>
                        </div>
                        <div class="row justify-content-center form-tipo">
                            <div class="col-12 col-md-6" data-tipo="empresa">
                                <div data-toggle="list" class="tipo" data-href="#list-empresa" onclick="select_tipo(this);">
                                    <div class="svg">
                                        <svg><use xlink:href="{{ asset('/images/general/constant.svg')}}#user-professional"></use></svg>
                                    </div>
                                    <h3 class="title font-merriweather text-center">Empresa</h3>
                                </div>
                            </div>
                            <div class="col-12 col-md-6" data-tipo="particular">
                                <div data-toggle="list" class="tipo" data-href="#list-particular" onclick="select_tipo(this);">
                                    <div class="svg">
                                        <svg><use xlink:href="{{ asset('/images/general/constant.svg')}}#user-final"></use></svg>
                                    </div>
                                    <h3 class="title font-merriweather text-center">Particular</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3" id="form-coberturas">
                        <div class="col-12 coberturas">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="d-none" id="list-empresa" role="tabpanel" aria-labelledby="list-empresa-list">
                                    <ul class="list-group list-group-flush list-group-horizontal rounded-0 d-flex flex-wrap" role="tablist">
                                        @foreach( $datos["coberturas"]["0"] AS $p ){{-- PARTICULAR --}}
                                        <div onclick="form(this , '{{ str_slug( $p[ 'name' ] ) }}' , '{{ $p[ 'name' ] }}' , 0)" style="cursor: pointer;" class="py-4 list-group-item rounded-0 text-truncate list-group-item-action" id="list-{{ str_slug( $p[ 'name' ] ) }}-form-0" data-href="#list-{{ str_slug( $p[ 'name' ] ) }}-0">
                                            <img src="{{ asset( $p[ 'image' ] ) }}" alt="Ícono {{ $p[ 'name' ] }}" class="mr-5 d-inline-block">{{ $p[ "name" ] }}
                                        </div>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="d-none" id="list-particular" role="tabpanel" aria-labelledby="list-particular-list">
                                    <ul class="list-group list-group-flush list-group-horizontal rounded-0 d-flex flex-wrap" role="tablist">
                                        @foreach( $datos["coberturas"]["1"] AS $p ){{-- PARTICULAR --}}
                                        <div onclick="form(this , '{{ str_slug( $p[ 'name' ] ) }}' , '{{ $p[ 'name' ] }}' , 1)" style="cursor: pointer;" class="py-4 list-group-item rounded-0 text-truncate list-group-item-action" id="list-{{ str_slug( $p[ 'name' ] ) }}-form-1" data-href="#list-{{ str_slug( $p[ 'name' ] ) }}-1">
                                            <img src="{{ asset( $p[ 'image' ] ) }}" alt="Ícono {{ $p[ 'name' ] }}" class="mr-5 d-inline-block">{{ $p[ "name" ] }}
                                        </div>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-3 d-none" id="form-general"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@push( "scripts" )
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    window.provincias = @json( $datos['provincias'] );
    datos = function( t , motor , tipo ) {
        $("#select-version").addClass( "d-none" );
        let anio = $("#anio").val();
        let bread = null;
        let marca_id = $('input:radio[name="marca"]:checked').val();
        let modelo_id = $('input:radio[name="modelo"]:checked').val();
        let gnc = $('input:radio[name="gnc"]:checked').val();
        let puertas = $('input:radio[name="puerta"]:checked').val();

        b = `<li onclick="pos_breadcrumb(this)" class="breadcrumb-item" aria-current="page" style="cursor: pointer">${motor}<i class="fas fa-times ml-2"></i></li>`;
        window.breadcrumb.push( b );
        $(`#list-breadcrumb`).find("ol").append( b );

        $("#title").text("datos personales");
        let h = "";

        h += `<div class="row">`;
            h += `<div class="col-12 col-md-6">`;
                h += `<select  required data-live-search="true" name="edad" title="Seleccione su edad" id="edad" data-width="100%">`;
                    for( let i = 22 ; i <= 75 ; i++ )
                        h += `<option>${i}</option>`;
                h += `</select>`;
            h += `</div>`;
            h += `<div class="col-12 col-md-6">`;
                h += `<select onchange="localidades( this );" required data-live-search="true" name="provincia_id" title="Seleccione provincia" id="provincia_id" data-width="100%">`;
                for( let x in window.provincias )
                    h += `<option value="${x}">${window.provincias[x]}</option>`;
                h += `</select>`;
            h += `</div>`;
        h += `</div>`;
        h += `<div class="row mt-5 justify-content-center">`;
            h += `<div class="col-12">`;
                h += `<select data-width="100%" data-show-subtext="true" required data-live-search="true" disabled class="" title="Localidad" name="localidad_id" id="localidad_id"></select>`;
            h += `</div>`;
        h += `</div>`;
        h += `<div class="row mt-5 justify-content-center">`;
            h += `<div class="col-12">`;
                h += `<input required class="border-left-0 border-right-0 border-top-0 rounded-0 form-control bg-transparent" type="text" placeholder="Nombre" name="nombre"/>`;
            h += `</div>`;
        h += `</div>`;
        h += `<div class="row mt-5 justify-content-center">`;
            h += `<div class="col-12 col-md-6">`;
                h += `<input required class="border-left-0 border-right-0 border-top-0 rounded-0 form-control bg-transparent" type="email" placeholder="Email" name="email"/>`;
            h += `</div>`;
            h += `<div class="col-12 col-md-6">`;
                h += `<input required class="border-left-0 border-right-0 border-top-0 rounded-0 form-control bg-transparent" type="phone" placeholder="Teléfono" name="telefono"/>`;
            h += `</div>`;
        h += `</div>`;
        h += `<div class="row mt-5 justify-content-end">`;
            h += `<button type="submit" disabled class="btn btn-primary text-uppercase px-5 rounded-pill">enviar</button>`;
        h += `</div>`;
        $("#datos-form").html( h );

        $('select#edad').selectpicker('setStyle');
        $('select#provincia_id').selectpicker('setStyle');
        $('select#localidad_id').selectpicker('setStyle');
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
                $("#localidad_id").prop('disabled', true);
                $('#localidad_id').selectpicker('refresh');

                if( $( `#localidad_id .add` ).length ) {
                    $( `#localidad_id` ).attr( "disabled" , true );
                    $( `#localidad_id .add` ).remove();
                }
                if( res.data.length > 0 ) {
                    res.data.forEach( function( l ) {
                        $( `#localidad_id` ).append( `<option class="add" value="${l.id}" data-subtext="CP: ${l.codigopostal}">${l.nombre}</option>` );
                    } );
                    $("#localidad_id").prop('disabled', false);
                    $('#localidad_id').selectpicker('refresh');
                }
            }
        })
        .catch(function(err) {})
        .then(function() {});
    };
    version = function( t , puerta , tipo ) {
        $("#select-puertas").addClass( "d-none" );
        let anio = $("#anio").val();
        let bread = null;
        let marca_id = $('input:radio[name="marca"]:checked').val();
        let modelo_id = $('input:radio[name="modelo"]:checked').val();
        let gnc = $('input:radio[name="gnc"]:checked').val();
        let puertas_val = $( t ).val();
        let puertas_ = puerta == 0 ? 'SIN ESPECIFICAR' : `${puerta} puertas`;
        b = `<li onclick="pos_breadcrumb(this)" class="breadcrumb-item" aria-current="page" style="cursor: pointer">${puertas_}<i class="fas fa-times ml-2"></i></li>`;
        window.breadcrumb.push( b );
        $(`#list-breadcrumb`).find("ol").append( b );

        $("#search-img").removeClass( "d-none" ).addClass( "d-block" );
        $("#title").removeClass("d-none").text("seleccione versión");
        axios.get(`{{ url('/marca/anio/${anio}/marca/${marca_id}/modelo/${modelo_id}/${gnc}/${puertas_val}') }}`, {
            responseType: 'json'
        })
        .then(function(res) {
            $("#search-img").addClass( "d-none" ).removeClass( "d-block" );
            $("#select-version").html("");
            res.data.forEach( function( m ) {
                h = "";
                h += `<p class="title">${m.motor} <small>${m.combustible}</small></p>`;
                h += `<input name="version" onchange="datos( this , '${m.motor}' , '${tipo}')" type="radio" value="${m.version}" class="d-none"/>`;
                h = `<label class="card" style="cursor: pointer"><div class="card-body text-center">${h}</div></label>`;
                $("#select-version").append( h );
            });
        })
        .catch(function(err) {})
        .then(function() {});
    };
    puertas = function( t , name , tipo ) {
        $("#select-marcas").addClass( "d-none" );
        let anio = $("#anio").val();
        let marca_id = $('input:radio[name="marca"]:checked').val();
        let modelo_id = $('input:radio[name="modelo"]:checked').val();
        let gnc = $( t ).val();
        
        b = `<li onclick="pos_breadcrumb(this)" class="breadcrumb-item" aria-current="page" style="cursor: pointer">${name}<i class="fas fa-times ml-2"></i></li>`;
        window.breadcrumb.push( b );
        $(`#list-breadcrumb`).find("ol").append( b );

        $("#select-gnc").addClass("d-none");
        $("#search-img").removeClass( "d-none" ).addClass( "d-block" );
        $("#title").removeClass("d-none").text("seleccione cantidad de puertas");
        axios.get(`{{ url('/marca/anio/${anio}/marca/${marca_id}/modelo/${modelo_id}/${gnc}') }}`, {
            responseType: 'json'
        })
        .then(function(res) {
            $("#search-img").addClass( "d-none" ).removeClass( "d-block" );
            $("#select-puertas").html("");
            res.data.forEach( function( m ) {
                h = "";
                puertas_ = "";
                if( parseInt(m.puertas) == 0)
                    puertas_ = "SIN ESPECIFICAR";
                else {
                    img = `{{ asset('images/general/doors-${m.puertas}.svg') }}`;
                    puertas_ += `<i class="mr-2" style="width: 48px; background-image: url(${img}); background-repeat: no-repeat; background-position: center;padding: 16px;"></i>`;
                    puertas_ += `${m.puertas} PUERTAS`;
                }
                h += `<p class="title">${puertas_}</p>`;
                h += `<input name="puerta" onchange="version( this , '${m.puertas}' , '${tipo}')" type="radio" value="${m.puertas}" class="d-none"/>`;
                h = `<label class="card" style="cursor: pointer"><div class="card-body text-center">${h}</div></label>`;
                $("#select-puertas").append( h );
            });
        })
        .catch(function(err) {})
        .then(function() {});
    };
    gnc = function( t , name , tipo ) {
        let h = "";
        b = `<li onclick="pos_breadcrumb(this)" class="breadcrumb-item" aria-current="page" style="cursor: pointer">${name}<i class="fas fa-times ml-2"></i></li>`;
        window.breadcrumb.push( b );
        $(`#list-breadcrumb`).find("ol").append( b );

        $("#select-modelos").addClass( "d-none" );
        $("#title").text("¿Tiene gnc?");
        h += `<label class="card" style="cursor: pointer"><div class="card-body text-center py-5 text-uppercase">Si</div><input onchange="puertas( this , 'CON GNC' , '${tipo}' )" type="radio" class="d-none" name="gnc" value="si" /></label>`;
        h += `<label class="card" style="cursor: pointer"><div class="card-body text-center py-5 text-uppercase">no</div><input onchange="puertas( this , 'SIN GNC' , '${tipo}' )" type="radio" class="d-none" name="gnc" value="no" /></label>`;
        $("#select-gnc").html( `<div class="card-deck">${h}</div>` );
    };
    modelos = function( t , name , tipo ) {
        $("#select-marcas").addClass( "d-none" );
        let anio = $("#anio").val();
        let marca_id = $( t ).val();
        b = `<li onclick="pos_breadcrumb(this)" class="breadcrumb-item" aria-current="page" style="cursor: pointer">${name}<i class="fas fa-times ml-2"></i></li>`;
        window.breadcrumb.push( b );
        $(`#list-breadcrumb`).find("ol").append( b );

        $("#search-img").removeClass( "d-none" ).addClass( "d-block" );
        $("#title").text("seleccione modelo");
        axios.get(`{{ url('/marca/anio/${anio}/marca/${marca_id}') }}`, {
            responseType: 'json'
        })
        .then(function(res) {
            $("#search-img").addClass( "d-none" ).removeClass( "d-block" );
            $("#select-modelos").html("");
            res.data.forEach( function( m ) {
                h = "";
                h += `<p class="title">${m.name}</p>`;
                h += `<input name="modelo" onchange="gnc( this , '${m.name}' , '${tipo}')" type="radio" value="${m.id}" class="d-none"/>`;
                h = `<label class="card" style="cursor: pointer"><div class="card-body text-center">${h}</div></label>`;
                $("#select-modelos").append( h );
            });
        })
        .catch(function(err) {})
        .then(function() {});
    };
    marcas = function( t , tipo ) {
        $( t ).parent().addClass( "d-none" );
        let anio = $( t ).val();
        let name = $(t).find( `option[value="${$(t).val()}"]` ).text();

        b = `<li onclick="pos_breadcrumb(this)" class="breadcrumb-item" aria-current="page" style="cursor: pointer">${name}<i class="fas fa-times ml-2"></i></li>`;
        window.breadcrumb.push( b );
        $(`#list-breadcrumb`).find("ol").append( b );

        $("#title").text("seleccione marca");
        $("#search-img").removeClass( "d-none" ).addClass( "d-block" );
        axios.get(`{{ url('/marca/anio/${anio}') }}`, {
            responseType: 'json'
        })
        .then(function(res) {
            $("#search-img").addClass( "d-none" ).removeClass( "d-block" );
            $("#select-marcas").html("");
            res.data.forEach( function( m ) {
                h = "";
                date = new Date();
                if( m.image !== null ) {
                    img = `{{ asset('${m.image}') }}?t=${date.getTime()}`;
                    h += `<img style="width: 70px;" class="d-inline-block" src="${img}"/>`;
                }
                h += `<p class="title">${m.name}</p>`;
                h += `<input name="marca" onchange="modelos( this , '${m.name}' , '${tipo}')" type="radio" value="${m.id}" class="d-none"/>`;
                h = `<label class="card" style="cursor: pointer"><div class="card-body text-center">${h}</div></label>`;
                $("#select-marcas").append( h );
            });
        })
        .catch(function(err) {})
        .then(function() {});
    };
    form = function( t, formulario , name , tipo ) {
        let html = "";
        
        b = `<li onclick="pos_breadcrumb(this)" class="breadcrumb-item" aria-current="page" style="cursor: pointer">${name}<i class="fas fa-times ml-2"></i></li>`;
        window.breadcrumb.push( b );
        $(`#list-breadcrumb`).find("ol").append( b );

        $("#form-coberturas").addClass( "d-none" );
        $("#form-general").removeClass( "d-none" )
        console.log(tipo)
        switch(formulario) {
            case "accidentes-personales":
                html += `<div class="col-12">`;
                    html += `<div class="row mt-3">`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<input name="dni" type="text" class="form-control border-left-0 border-right-0 border-top-0 rounded-0" placeholder="DNI del tomador del seguro"/>`;
                        html += `</div>`;
                    html += `</div>`;
                    html += `<div class="row mt-5">`;
                        html += `<div class="col-12">`;
                            html += `<textarea class="form-control border-left-0 border-right-0 border-top-0 rounded-0" name="domicilio" placeholder="Actividad de los trabajadores"></textarea>`;
                        html += `</div>`;
                    html += `</div>`;
                    html += `<div class="row mt-5">`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<input name="capitas" type="text" class="form-control border-left-0 border-right-0 border-top-0 rounded-0" placeholder="Cantidad de Capitas"/>`;
                        html += `</div>`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<input name="duracion" type="text" class="form-control border-left-0 border-right-0 border-top-0 rounded-0" placeholder="Duración del trabajo"/>`;
                        html += `</div>`;
                    html += `</div>`;
                    html += `<div class="col-12">`;
                        html += `<button type="submit" disabled class="btn btn-primary text-uppercase px-5 rounded-pill">enviar</button>`;
                    html += `</div>`;
                html += `</div>`;
                break;
            case "garantia-de-alquiler":
                html += `<div class="col-12">`;
                    html += `<h4 class="text-center text-uppercase mb-4">Detalles del inmueble</h4>`;
                    html += `<div class="row mt-3">`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<select id="tipo_vivienda" name="tipo_vivienda" data-width="100%" title="Seleccione Tipo de vivienda">`;
                                html += `<option>CASA</option>`;
                                html += `<option>DEPARTAMENTO</option>`;
                            html += `</select>`;
                        html += `</div>`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<div class="input-group">`;
                                html += `<div class="custom-file">`
                                    html += `<input type="file" accept="image/*" class="custom-file-input" id="file" name="file">`;
                                    html += `<label class="custom-file-label" for="file" data-browse="Buscar">Adjuntar contrato de alquiler</label>`;
                                html += `</div>`;
                                html += `<div class="input-group-append">`;
                                    html += `<button type="button" class="btn btn-secondary" type="button" id="">Limpiar</button>`;
                                html += `</div>`;
                            html += `</div>`;
                        html += `</div>`;
                    html += `</div>`;
                    
                    html += `<h4 class="text-center text-uppercase mt-5 mb-4">DATOS PERSONALES</h4>`;
                    
                    html += `<div class="row">`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<select onchange="localidades( this );" required data-live-search="true" name="provincia_id" title="Seleccione provincia" id="provincia_id" data-width="100%">`;
                            for( let x in window.provincias )
                                html += `<option value="${x}">${window.provincias[x]}</option>`;
                            html += `</select>`;
                        html += `</div>`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<select data-width="100%" data-show-subtext="true" required data-live-search="true" disabled class="" title="Localidad" name="localidad_id" id="localidad_id"></select>`;
                        html += `</div>`;
                    html += `</div>`;
                    html += `<div class="row mt-5 justify-content-center">`;
                        html += `<div class="col-12">`;
                            html += `<input required class="border-left-0 border-right-0 border-top-0 rounded-0 form-control bg-transparent" type="text" placeholder="Nombre" name="nombre"/>`;
                        html += `</div>`;
                    html += `</div>`;
                    html += `<div class="row mt-5 justify-content-center">`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<input required class="border-left-0 border-right-0 border-top-0 rounded-0 form-control bg-transparent" type="email" placeholder="Email" name="email"/>`;
                        html += `</div>`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<input required class="border-left-0 border-right-0 border-top-0 rounded-0 form-control bg-transparent" type="phone" placeholder="Teléfono" name="telefono"/>`;
                        html += `</div>`;
                    html += `</div>`;
                    html += `<div class="col-12">`;
                        html += `<button type="submit" disabled class="btn btn-primary text-uppercase px-5 rounded-pill">enviar</button>`;
                    html += `</div>`;
                html += `</div>`;
                break;
            case "hogar":
            case "incendio":
                html += `<div class="col-12">`;
                    html += `<h4 class="text-center text-uppercase mb-4">Detalles del inmueble</h4>`;
                    html += `<div class="row mt-3">`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<select id="tipo_vivienda" name="tipo_vivienda" data-width="100%" title="Seleccione Tipo de vivienda">`;
                                html += `<option>CASA</option>`;
                                html += `<option>DEPARTAMENTO</option>`;
                            html += `</select>`;
                        html += `</div>`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<select id="tipo_asegurado" name="tipo_asegurado" data-width="100%" title="Seleccione Tipo de Asegurado">`;
                                html += `<option>PROPIETARIO</option>`;
                                html += `<option>INQUILINO</option>`;
                            html += `</select>`;
                        html += `</div>`;
                    html += `</div>`;
                    html += `<div class="row mt-5">`;
                        html += `<div class="col-12">`;
                            html += `<textarea class="form-control border-left-0 border-right-0 border-top-0 rounded-0" name="domicilio" placeholder="Domicilio completo"></textarea>`;
                        html += `</div>`;
                    html += `</div>`;
                    html += `<div class="row mt-5">`;
                        html += `<div class="col-12 col-md-6 col-lg-4">`;
                            html += `<input class="form-control border-left-0 border-right-0 border-top-0 rounded-0" name="sup_edificada" placeholder="Superficie edificada"/>`;
                        html += `</div>`;
                    html += `</div>`;

                    html += `<h4 class="text-center text-uppercase mt-5 mb-4">DATOS PERSONALES</h4>`;
                    
                    html += `<div class="row">`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<select onchange="localidades( this );" required data-live-search="true" name="provincia_id" title="Seleccione provincia" id="provincia_id" data-width="100%">`;
                            for( let x in window.provincias )
                                html += `<option value="${x}">${window.provincias[x]}</option>`;
                            html += `</select>`;
                        html += `</div>`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<select data-width="100%" data-show-subtext="true" required data-live-search="true" disabled class="" title="Localidad" name="localidad_id" id="localidad_id"></select>`;
                        html += `</div>`;
                    html += `</div>`;
                    html += `<div class="row mt-5 justify-content-center">`;
                        html += `<div class="col-12">`;
                            html += `<input required class="border-left-0 border-right-0 border-top-0 rounded-0 form-control bg-transparent" type="text" placeholder="Nombre" name="nombre"/>`;
                        html += `</div>`;
                    html += `</div>`;
                    html += `<div class="row mt-5 justify-content-center">`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<input required class="border-left-0 border-right-0 border-top-0 rounded-0 form-control bg-transparent" type="email" placeholder="Email" name="email"/>`;
                        html += `</div>`;
                        html += `<div class="col-12 col-md-6">`;
                            html += `<input required class="border-left-0 border-right-0 border-top-0 rounded-0 form-control bg-transparent" type="phone" placeholder="Teléfono" name="telefono"/>`;
                        html += `</div>`;
                    html += `</div>`;
                    html += `<div class="row mt-5 justify-content-end">`;
                        html += `<div class="col-12">`;
                            html += `<button type="submit" disabled class="btn btn-primary text-uppercase px-5 rounded-pill">enviar</button>`;
                        html += `</div>`;
                    html += `</div>`;

                html += `</div>`;
                break;
            case "automotor":
                html += `<div class="col-12">`;
                    html += `<h4 class="text-center text-uppercase mb-4" id="title">Seleccione año del automotor</h4>`;
                    html += `<div class="d-flex justify-content-center">`;
                        html += `<select onchange="marcas( this , '${tipo}' )" id="anio" name="anio" title="Seleccione año" data-live-search="true">`;
                            html += `<option value="0">0 km</option>`;
                            html += `<option>2019</option>`;
                            html += `<option>2018</option>`;
                            html += `<option>2017</option>`;
                            html += `<option>2016</option>`;
                            html += `<option>2015</option>`;
                            html += `<option>2014</option>`;
                            html += `<option>2013</option>`;
                            html += `<option>2012</option>`;
                            html += `<option>2011</option>`;
                            html += `<option>2010</option>`;
                            html += `<option>2009</option>`;
                            html += `<option>2008</option>`;
                            html += `<option>2007</option>`;
                            html += `<option>2006</option>`;
                            html += `<option>2005</option>`;
                            html += `<option>2004</option>`;
                        html += `</select>`;
                    html += `</div>`;
                html += `</div>`;
                html += `<div class="col-12 mt-3">`;
                    img = `{{ asset('images/general/search.gif') }}`;
                    html += `<img class="w-25 mx-auto d-none" id="search-img" src="${img}"/>`;
                    html += `<div class="card-columns" id="select-marcas"></div>`;
                    html += `<div class="card-columns" id="select-modelos"></div>`;
                    html += `<div id="select-gnc"></div>`;
                    html += `<div class="card-columns" id="select-puertas"></div>`;
                    html += `<div class="card-columns" id="select-version"></div>`;
                html += `</div>`;
                break;
        }
        html += `<div class="col-12 mt-3" id="datos-form"></div>`;
        $("#form-general").html( html );
        $("#form-general").find('select').selectpicker();
    };

    enviar = function( t ) {

    };
    pos_breadcrumb = function( t ) {
        /**
         * 
         */
        let max = $(t).index();console.log(max)
        let aux = [];
        switch( parseInt( max ) ) {
            case 0:
                $( "#form-tipo" ).removeClass( "d-none" );
                $( `#list-breadcrumb` ).addClass( "d-none" );
                $( "#form-general" ).html("");
                $( '.tipo[data-toggle="list"]' ).find( ".active" ).removeClass( "active" );
                $( "#list-empresa,#list-particular" ).addClass( "d-none" );
                $( "#form-coberturas" ).removeClass( "d-none" );
                break;
            case 1:
                $( "#form-coberturas" ).removeClass( "d-none" );
                $( "#form-general" ).html( "" );
                break;
            case 2:
                $("#title").text("seleccione año del automotor");
                $( "#anio" ).parent().removeClass( "d-none" );
                $( "#select-marcas,#select-modelos,#select-puertas" ).removeClass( "d-none" );
                $( "#anio" ).val( "" );
                $( "#select-marcas,#select-modelos,#select-gnc,#select-puertas,#select-version,#datos-form" ).html( "" );
                break;
            case 3:
                $("#title").text("seleccione marca");
                $( "[name=marca]" ).prop( "checked", false );

                $( "#select-marcas,#select-modelos,#select-puertas" ).removeClass( "d-none" );
                $( "#select-modelos,#select-gnc,#select-puertas,#select-version,#datos-form" ).html( "" );
                break;
            case 4:
                $("#title").text("seleccione modelo");
                $( "[name=modelo]" ).prop( "checked", false );

                $( "#select-modelos,#select-gnc,#select-puertas,#select-version" ).removeClass( "d-none" );
                $( "#select-gnc,#select-puertas,#select-version,#datos-form" ).html( "" );
                break;
            case 5:
                $("#title").text("¿tiene gnc?");
                $( "[name=gnc]" ).prop( "checked", false );

                $( "#select-gnc" ).removeClass( "d-none" );
                $( "#select-puertas" ).removeClass( "d-none" );
                $( "#select-puertas,#select-version,#datos-form" ).html( "" );
                break;
            case 6:
                $("#title").text("seleccione cantidad de puertas");
                $( "[name=puerta]" ).prop( "checked", false );

                $( "#select-puertas" ).removeClass( "d-none" );
                $( "#select-version" ).removeClass( "d-none" );
                $( "#select-version" ).html( "" );
                $( "#datos-form" ).html( "" );
                break;
            case 7:
                $("#title").text("seleccione versión");
                $( "[name=version]" ).prop( "checked", false );

                $( "#select-version" ).removeClass( "d-none" );
                $( "#datos-form" ).html( "" );
        }
        $(`#list-breadcrumb`).find( "ol" ).html( "" );
        for( i = 0 ; i < max ; i++ ) {
            aux.push(window.breadcrumb[i]);
            $(`#list-breadcrumb`).find("ol").append( window.breadcrumb[i] );
        }
        
        window.breadcrumb = aux;
    };
    select_tipo = function ( t ) {
        window.tipo = $( t ).data( "href" );
        window.breadcrumb = [];
        console.log(window.tipo)
        $( `#list-breadcrumb , ${window.tipo}` ).removeClass("d-none");
        
        $("#form-tipo").addClass("d-none");
        if(window.tipo == "#list-particular")
            b = '<li onclick="pos_breadcrumb(this)" style="cursor: pointer" class="breadcrumb-item" aria-current="page">Particular<i class="fas fa-times ml-2"></i></li>';
        else
            b = '<li onclick="pos_breadcrumb(this)" style="cursor: pointer" class="breadcrumb-item" aria-current="page">Empresa<i class="fas fa-times ml-2"></i></li>';
        window.breadcrumb.push( b );
        $(`#list-breadcrumb`).find("ol").append( b );
    };
</script>
@endpush