<section class="my-3">
    <div class="container-fluid">
        <div class="mb-4">
            <h3 class="text-center mb-3">Encabezado de página</h3>
            @include('layouts.general.header', ['elementos' => $data['elementos'], 'link' => 0, 'login' => 0])
            <h3 class="text-center mt-4 mb-3">Pie de página</h3>
            @include('layouts.general.footer', ['elementos' => $data['elementos'], 'link' => 0, 'login' => 0])
        </div>
        @include( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 1 , 'close' => 0, 'url' => url('/adm/empresa/update') , 'modal' => 0 ] )
    </div>
</div>
@push('scripts')
<script>
    window.pyrus = new Pyrus("empresa");
    window.pyrusImage = new Pyrus("empresa_images", null, src);
    window.pyrusDomicilio = new Pyrus( "empresa_domicilio" );
    window.pyrusTelefono = new Pyrus( "empresa_telefono" );
    window.pyrusMensaje = new Pyrus( "empresa_mensaje" );
    window.pyrusText = new Pyrus("empresa_footer");
    window.pyrusEmail = new Pyrus( "empresa_email" );
    window.pyrusCaptcha = new Pyrus( "empresa_captcha" );

    window.ARR_pyrus = [ "pyrusImage" , "pyrusDomicilio" , "pyrusTelefono" , "pyrusEmail" ];

    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );
        let formData = new FormData( formElement );
        formData.append( "ATRIBUTOS", JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple, TIPO: "U"},
                { DATA: window.pyrusImage.objetoSimple, TIPO: "U", COLUMN: "images" },
                { DATA: window.pyrusCaptcha.objetoSimple, TIPO: "U", COLUMN: "captcha" },
                { DATA: window.pyrusMensaje.objetoSimple, TIPO: "U", COLUMN: "mensaje" },
                { DATA: window.pyrusDomicilio.objetoSimple, TIPO: "U", COLUMN: "domicilio" },
                { DATA: window.pyrusTelefono.objetoSimple, TIPO: "M", COLUMN: "telefono" , TAG : "telefono" , KEY : "telefono" },
                { DATA: window.pyrusText.objetoSimple, TIPO: "A", COLUMN: "footer" },
                { DATA: window.pyrusEmail.objetoSimple, TIPO: "A", COLUMN: "email" }
            ]
        ));
        formSave( t , formData );
    };
    /** ------------------------------------- */
    addTelefono = ( t, value = null ) => {
        let target = $( `#wrapper-phone` );
        let html = "";
        if (window[`telefono`] === undefined)
            window[`telefono`] = 0;
        window[ `telefono` ] ++;
        html += '<div class="col-12 col-md-4 mt-3 element">';
            html += '<div class="bg-light p-2 border overflow-hidden position-relative">';
                html += window.pyrusTelefono.formulario( window[ `telefono` ] , `telefono` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'element' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';
        target.append(html);
        window.pyrusTelefono.show( null , url_simple , value , window[ `telefono` ] , `telefono`, 1 );
    };

    addEmail = ( t , value = null ) => {
        let target = $(`#wrapper-email`);
        let html = "";
        if( window[ `email` ] === undefined )
            window[ `email` ] = 0;
        window[ `email` ] ++;
        html += '<div class="col-12 col-md-6 mt-3 element">';
            html += '<div class="bg-light p-2 border position-relative overflow-hidden">';
                html += window.pyrusEmail.formulario( window[ `email` ] , `email` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'element' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';
        target.append( html );
        window.pyrusEmail.show( null , url_simple , { email : value } , window[ `email` ] , `email`, 1 );
    };

    addText = ( t , value = null ) => {
        let target = $(`#wrapper-text`);
        let html = "";
        if( window[ `footer` ] === undefined )
            window[ `footer` ] = 0;
        window[ `footer` ] ++;
        html += '<div class="col-12 col-md-4 mt-3 element">';
            html += '<div class="bg-light p-2 border position-relative overflow-hidden">';
                html += window.pyrusText.formulario( window[ `footer` ] , `footer` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'element' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';
        target.append(html);
        window.pyrusText.editor(CKEDITOR, window[`footer`], "footer");
        window.pyrusText.show(CKEDITOR ,url_simple, {text:value}, window[`footer`], `footer`, 1);
    };
    /** ------------------------------------- */
    init = ( callbackOK ) => {
        form = "";
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Generales</legend>`;
            form += window.pyrus.formulario();
        form += `</fieldset>`;
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Mensajes</legend>`;
            form += window.pyrusMensaje.formulario();
        form += `</fieldset>`;
        /** */
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Logotipos & Favicon</legend>`;
            form += window.pyrusImage.formulario();
        form += `</fieldset>`;
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Domicilio</legend>`;
            form += window.pyrusDomicilio.formulario();
        form += `</fieldset>`;

        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Captcha (Google)</legend>`;
            form += window.pyrusCaptcha.formulario();
        form += `</fieldset>`;
        form += `<div class="row justify-content-center pt-3">`;
            form += `<div class="col-md-3 col-12">`;
                form += `<button id="btnTelefono" type="button" class="btn btn-block btn-dark text-center text-uppercase" onclick="addTelefono( this )">Teléfono<i class="fas fa-plus ml-2"></i></button>`;
            form += `</div>`;
        form += `</div>`;
        form += `<div class="row mt-0" id="wrapper-phone"></div>`;
        form += `<div class="row justify-content-center pt-3 border-top">`;
            form += `<div class="col-md-3 col-12">`;
                form += `<button id="btnEmail" type="button" class="btn btn-block btn-info text-center text-uppercase" onclick="addEmail( this )">Email<i class="fas fa-plus ml-2"></i></button>`;
            form += `</div>`;
        form += `</div>`;
        form += `<div class="row mt-0" id="wrapper-email"></div>`;

        form += `<div class="row justify-content-center pt-3 border-top">`;
            form += `<div class="col-md-3 col-12">`;
                form += `<button id="btnText" type="button" class="btn btn-block btn-info text-center text-uppercase" onclick="addText( this )">Texto<i class="fas fa-plus ml-2"></i></button>`;
            form += `</div>`;
        form += `</div>`;
        form += `<div class="row mt-0" id="wrapper-text"></div>`;

        $("#form .container-form").html( form );
        window.pyrusMensaje.editor( CKEDITOR );
        callbackOK.call( this );
    };
    /** */
    init( () => {
        window.pyrus.show(null, url_simple, window.data.elementos);
        window.pyrusImage.show(null, url_simple, window.data.elementos.images);
        window.pyrusDomicilio.show(null, url_simple , window.data.elementos.domicilio);
        window.pyrusCaptcha.show(null, null, window.data.elementos.captcha);
        window.pyrusMensaje.show(CKEDITOR, null, window.data.elementos.mensaje);
        window.data.elementos.email.forEach(e => {addEmail($("#btnEmail"), e); });
        window.data.elementos.footer.forEach(e => {addText($("#btnText"), e); });
        window.data.elementos.telefono.forEach(t => {addTelefono($("#btnTelefono"), t); });
    });
</script>
@endpush