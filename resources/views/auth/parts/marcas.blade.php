<section class="my-3">
    <div class="container-fluid">
        @include('layouts.general.form', ['buttonADD' => 1, 'form' => 0, 'close' => 1, 'modal' => 1])
        @include('layouts.general.table')
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = [];
    window.pyrus.push({entidad: new Pyrus("marcas"), tipo: "U"});
    window.pyrus.push({entidad: new Pyrus("marcas_txt"), tipo: "U"});
    window.pyrus.push({entidad: new Pyrus("marca_advantage"), tipo: "M", column: "advantage", function: "telefono"});
    addfinish = (data) => {
        if (!data) {
            document.querySelector(`#wrapper-ventaja`).innerHTML = "";
            for(let inst in CKEDITOR.instances) {
                if (!document.querySelector(inst))
                    CKEDITOR.instances[inst].destroy();
            }
        }
    };
    /** ------------------------------------- */
    ventajaFunction = (value = null) => {
        if (value) {
            if (typeof value === "string")
                value = JSON.parse(value);
        }
        const element = window.pyrus.find(x => {
            if (x.entidad.entidad === "marca_advantage")
                return x;
        });
        let target = document.querySelector(`#wrapper-ventaja`);
        let html = "";
        if (window[element.column] === undefined)
            window[element.column] = 0;
        window[element.column] ++;
        html += '<div class="col-12 mt-3 pyrus--element">';
            html += '<div class="pyrus--element__target">';
                html += `<i onclick="remove_( this , 'pyrus--element' )" class="fas fa-times pyrus--element__close"></i>`;
                html += element.entidad.formulario(window[element.column], element.column);
            html += '</div>';
        html += '</div>';
        target.insertAdjacentHTML('beforeend', html);
        element.entidad.editor(window[element.column], element.column);
        element.entidad.show(url_simple, value, window[element.column], element.column);
    };
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init(data => {} );
</script>
@endpush