<section class="my-3">
    <div class="container-fluid">
        <div class="mb-4">
            @include('page.parts.home' , ['elementos' => $data['elementos']->data, 'link' => 0])
        </div>
        @include( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 1 , 'close' => 0 , 'url' => url('/adm/contenido/' . $data['section'] . '/update') , 'modal' => 0 ] )
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = new Pyrus("contenido_home", null, src);
    window.pyrus_icono = new Pyrus("contenido_home_icono", null, src);
    window.pyrus_icono_txt = new Pyrus("contenido_home_icono_txt");

    formSubmit = t => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append("ATRIBUTOS",JSON.stringify(
            [
                {DATA: window.pyrus.objetoSimple, TIPO: "U", COLUMN: "atencion" , KEY : "atencion" },
                {DATA: window.pyrus_icono_txt.objetoSimple, TIPO: "U"},
                {DATA: window.pyrus_icono.objetoSimple, TIPO: "M", COLUMN: "iconos" , TAG : "iconos" , KEY : "iconos" }
            ]
        ));
        formSave( t , formData );
    };
    addIcono = (t, value = null) => {
        let target = $(`#targetIconos`);
        let html = "";
        if(window.countIcono === undefined)
            window.countIcono = 0;
        window.countIcono ++;

        html += '<div class="col-12 col-md-4 mt-3 icono">';
            html += `<div class="p-2 border bg-white position-relative">`;
                html += window.pyrus_icono.formulario( window.countIcono , "iconos" );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'icono' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';
        $("#targetIconos > div").append(html);

        window.pyrus_icono.show( CKEDITOR , url_simple , value , window.countIcono , "iconos" );
        window.pyrus_icono.editor( CKEDITOR , window.countIcono , "iconos" );
    };

    /** ------------------------------------- */
    init = callbackOK => {
        /** */
        let html = "";
        html += `<fieldset class="border p-3 bg-white">`;
            html += `<legend class="border-bottom">Atención al cliente</legend>`;
            html += window.pyrus.formulario();
        html += `</fieldset>`;
        html += `<div class="card bg-light mt-5">`;
            html += `<div class="card-body">`;
                html += window.pyrus_icono_txt.formulario();
                html += `<button onclick="addIcono(this);" type="button" class="btn btn-dark text-uppercase px-5 mx-auto mt-5 d-flex align-items-center mb-2">ícono <small class="ml-2">(Ícono + Título + Texto)</small><i class="fas fa-plus ml-2"></i></button>`;
                html += `<div id="targetIconos">`;
                    html += `<div class="row mt-n3" id="targetIconosRow"></div>`;
                html += `</div>`;
            html += `</div>`;
        html += `</div>`;
        $("#form .container-form").html(html);
        window.pyrus.editor( CKEDITOR );
        callbackOK.call(this);
    };
    /** */
    init(() => {
        window.pyrus.show(CKEDITOR, url_simple, window.data.elementos.data.atencion);
        window.pyrus_icono_txt.show(null, null, window.data.elementos.data);
        window.data.elementos.data.iconos.forEach(i => { addIcono(null, i); });
    });
</script>
@endpush
