<section class="my-3">
    <div class="container-fluid">
        <div class="mb-4">
            @include('page.parts.empresa', ['elemento' => $data['elementos']->data])
        </div>
        @include('layouts.general.form', ['buttonADD' => 0, 'form' => 1, 'close' => 0, 'url' => url('/adm/contenido/'.$data['section'].'/update'), 'modal' => 0])
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = new Pyrus("contenido_empresa", null, src);
    window.pyrus_mision = new Pyrus("contenido_empresa_mision", null, src);
    window.pyrus_vision = new Pyrus("contenido_empresa_vision", null, src);
    window.pyrus_anios = new Pyrus("contenido_empresa_anio", null, src);

    window.ARR_pyrus = [ "pyrus_mision" , "pyrus", "pyrus_vision" ];

    formSubmit = t => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append("ATRIBUTOS",JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple, TIPO: "U" },
                { DATA: window.pyrus_mision.objetoSimple, TIPO: "U", COLUMN: "mision", KEY: "mision" },
                { DATA: window.pyrus_vision.objetoSimple, TIPO: "U", COLUMN: "vision", KEY: "vision" },
                { DATA: window.pyrus_anios.objetoSimple, TIPO: "M", COLUMN: "anio" , TAG : "anio", KEY: "anio" }
            ]
        ));
        formSave(t, formData);
    };
    addAnio = (value = null) => {
        console.log(value)
        if(window.countAnio === undefined)
            window.countAnio = 0;
        window.countAnio ++;
        let html = "";
        html += '<div class="col-12 col-md-4 mt-3 anio">';
            html += '<div class="bg-white p-2 border position-relative overflow-hidden">';
                html += window.pyrus_anios.formulario( window[ `countAnio` ] , `anio` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'anio' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';
        $("#targetAnios > div").append(html);

        window.pyrus_anios.show( CKEDITOR , url_simple , value , window.countAnio , "anio" );
        window.pyrus_anios.editor( CKEDITOR , window.countAnio , "anio" );
    };
    /** ------------------------------------- */
    init = callbackOK => {
        /** */
        let html = "";
        html += window.pyrus.formulario();
        html += `<div class="row mt-4">`;
            html += `<div class="col-12 col-md-6">`;
                html += `<fieldset class="border p-3">`;
                    html += `<legend class="border-bottom">Misión</legend>`
                    html += `${window.pyrus_mision.formulario()}`;
                html += `</fieldset>`;
            html += `</div>`;
            html += `<div class="col-12 col-md-6">`;
                html += `<fieldset class="border p-3">`;
                    html += `<legend class="border-bottom">Visión</legend>`
                    html += `${window.pyrus_vision.formulario()}`;
                html += `</fieldset>`;
            html += `</div>`;
        html += `</div>`;

        html += `<div class="card bg-light mt-3">`;
            html += `<div class="card-body">`;
                html += `<h3 class="card-title"><i class="fas fa-vote-yea mr-3"></i>Años<i onclick="addAnio();" style="cursor:pointer;" class="fas fa-plus-circle text-success ml-3"></i></h3>`;
                html += `<div id="targetAnios">`;
                    html += `<div class="row mt-3n" id="targetAnioRow"></div>`;
                html += `</div>`;
            html += `</div>`;
        html += `</div>`;
        $("#form .container-form").html(html);
        window.pyrus.editor(CKEDITOR);
        window.pyrus_mision.editor(CKEDITOR);
        window.pyrus_vision.editor(CKEDITOR);
        callbackOK.call(this);
    };
    /** */
    init(() => {
        window.pyrus.show(CKEDITOR, url_simple, window.data.elementos.data);
        window.pyrus_mision.show(CKEDITOR, url_simple, window.data.elementos.data.mision);
        window.pyrus_vision.show(CKEDITOR, url_simple, window.data.elementos.data.vision);
        window.data.elementos.data.anio.forEach(a => {addAnio(a);});
    });
</script>
@endpush