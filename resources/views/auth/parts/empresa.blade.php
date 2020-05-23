<section class="my-3">
    <div class="container-fluid">
        <div class="mb-4">
            <h3 class="text-center mb-3">Encabezado de página</h3>
            {{--@include('layouts.general.header', ['elementos' => $data['elementos'], 'link' => 0, 'login' => 0])--}}
            <h3 class="text-center mt-4 mb-3">Pie de página</h3>
            {{--@include('layouts.general.footer', ['elementos' => $data['elementos'], 'link' => 0, 'login' => 0])--}}
        </div>
        @include( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 1 , 'close' => 0, 'url' => url('/adm/empresa/update') , 'modal' => 0 ] )
    </div>
</div>
@push('scripts')
<script>
    window.formAction = "UPDATE";
    window.pyrus = [];
    window.pyrus.push({entidad: new Pyrus("empresa"), tipo: "U"});
    window.pyrus.push({entidad: new Pyrus("empresa_images", null, src), tipo: "U", column: "images"});
    window.pyrus.push({entidad: new Pyrus("empresa_domicilio"), tipo: "U", column: "addresses"});
    window.pyrus.push({entidad: new Pyrus("empresa_captcha"), tipo: "U", column: "captcha"});
    window.pyrus.push({entidad: new Pyrus("empresa_mensaje"), tipo: "U", column: "mensaje"});
    window.pyrus.push({entidad: new Pyrus("empresa_telefono"), tipo: "M", column: "phones", function: "telefono"});
    window.pyrus.push({entidad: new Pyrus("empresa_email"), tipo: "A", column: "emails", function: "email"});

    /** ------------------------------------- */
    telefonoFunction = (value = null) => {
        if (value) {
            if (typeof value === "string")
                value = JSON.parse(value);
        }
        const element = window.pyrus.find(x => {
            if (x.entidad.entidad === "empresa_telefono")
                return x;
        });
        let target = document.querySelector(`#wrapper-telefono`);
        let html = "";
        if (window[element.column] === undefined)
            window[element.column] = 0;
        window[element.column] ++;
        html += '<div class="col-12 col-md-4 mt-3 pyrus--element">';
            html += '<div class="pyrus--element__target">';
                html += `<i onclick="remove_( this , 'pyrus--element' )" class="fas fa-times pyrus--element__close"></i>`;
                html += element.entidad.formulario(window[element.column], element.column);
            html += '</div>';
        html += '</div>';
        target.insertAdjacentHTML('beforeend', html);
        element.entidad.show(url_simple, value, window[element.column], element.column);
    };

    emailFunction = (value = null) => {
        if (value) {
            if (typeof value === "string")
                value = JSON.parse(value);
        }
        const element = window.pyrus.find(x => {
            if (x.entidad.entidad === "empresa_email")
                return x;
        });
        let target = document.querySelector(`#wrapper-email`);
        let html = "";
        if (window[element.column] === undefined)
            window[element.column] = 0;
        window[element.column] ++;
        html += '<div class="col-12 col-md-6 mt-3 pyrus--element">';
            html += '<div class="pyrus--element__target">';
                html += `<i onclick="remove_( this , 'pyrus--element' )" class="fas fa-times pyrus--element__close"></i>`;
                html += element.entidad.formulario(window[element.column], element.column);
            html += '</div>';
        html += '</div>';
        target.insertAdjacentHTML('beforeend', html);
        element.entidad.show(url_simple, {email: value}, window[element.column], element.column, 1);
    };
    /** */
    init(data => {
        window.pyrus.forEach(p => {
            switch (p.tipo) {
                case "U":
                    if (p.column) {
                        if (window.data.elementos[p.column])
                            p.entidad.show(url_simple, window.data.elementos[p.column]);
                    } else
                        p.entidad.show(url_simple, window.data.elementos);
                break;
                case "A":
                case "M":
                    if (window.data.elementos[p.column])
                        window.data.elementos[p.column].forEach(a => eval(`${p.function}Function('${JSON.stringify(a)}')`));
                break;
            }
        })
        /*window.pyrus.show(null, url_simple, window.data.elementos);
        window.pyrusImage.show(null, url_simple, window.data.elementos.images);
        window.pyrusDomicilio.show(null, url_simple , window.data.elementos.domicilio);
        window.pyrusCaptcha.show(null, null, window.data.elementos.captcha);
        window.pyrusMensaje.show(CKEDITOR, null, window.data.elementos.mensaje);
        window.data.elementos.email.forEach(e => {addEmail($("#btnEmail"), e); });
        window.data.elementos.footer.forEach(e => {addText($("#btnText"), e); });
        window.data.elementos.telefono.forEach(t => {addTelefono($("#btnTelefono"), t); });*/
    });
</script>
@endpush