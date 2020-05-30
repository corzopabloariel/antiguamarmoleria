<section class="my-3">
    <div class="container-fluid">
        @include('layouts.general.form', ['buttonADD' => 1, 'form' => 0, 'close' => 1, 'modal' => 1])
        @include('layouts.general.table', [
            "paginate" => $data["elementos"],
            "form" => [
                "url" => isset($data["url_search"]) ? $data["url_search"] : route("productos.index"),
                "placeholder" => "Buscar por Nombre, Características y Marca",
                "search" => isset($data["search"]) ? $data["search"] : null
            ]
        ])
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = [];
    window.pyrus.push({entidad: new Pyrus("productos"), tipo: "U"});
    window.pyrus.push({entidad: new Pyrus("producto_caracteristicas"), tipo: "M", column: "characteristics", function: "caracteristica"});
    window.pyrus.push({entidad: new Pyrus("producto_images"), tipo: "M", column: "images", function: "imagen"});
    addfinish = data => {
        const marcaTarget = document.querySelector(`#${window.pyrus[0].entidad.name}_marca_id_target`);
        const marca = document.querySelector(`#${window.pyrus[0].entidad.name}_marca_id`);
        const producto = document.querySelector(`#${window.pyrus[0].entidad.name}_producto_id`);
        if (window.data.producto_id)
            producto.value = window.data.producto_id;
        if (window.data.marca_id) {
            marca.value = window.data.marca_id;
            marcaTarget.parentElement.classList.add("d-none");
        }
        const target_1 = document.querySelector(`#wrapper-caracteristica`);
        if (!data) {
            const target_2 = document.querySelector(`#wrapper-imagen`);
            if (target_1)
                target_1.innerHTML = "";
            if (target_2)
                target_2.innerHTML = "";
            if (window.characteristicsArr)
                window.characteristicsArr.forEach(a => caracteristicaFunction(a));
            return null;
        }
        if (target_1)
            target_1.innerHTML = "";
        if (data.images)
            data.images.forEach(a => imagenFunction(a));
        if (data.characteristics)
            data.characteristics.forEach(a => caracteristicaFunction(a));
    };
    elementoFunction = (t, id) => {
        window.location = `${url_simple}/adm/producto/${id}/elementos`;
    };
    /** ------------------------------------- */
    caracteristicaFunction = (value = null) => {
        if (value) {
            if (typeof value === "string")
                value = JSON.parse(value);
        }
        const element = window.pyrus.find(x => {
            if (x.entidad.entidad === "producto_caracteristicas")
                return x;
        });
        let target = document.querySelector(`#wrapper-caracteristica`);
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
        element.entidad.show(url_simple, value, window[element.column], element.column);
    };
    /** ------------------------------------- */
    imagenFunction = (value = null) => {
        if (value) {
            if (typeof value === "string")
                value = JSON.parse(value);
        }
        const element = window.pyrus.find(x => {
            if (x.entidad.entidad === "producto_images")
                return x;
        });
        let target = document.querySelector(`#wrapper-imagen`);
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
        //element.entidad.editor(window[element.column], element.column);
        element.entidad.show(url_simple, value, window[element.column], element.column);
    };
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init(
        data => {
            if (window.data.characteristics)
                window.characteristicsArr = window.data.characteristics;
        },
        true,
        true,
        "table",
        true,
        ["e", "d", "c"],
        [{icon: '<i class="fas fa-clipboard-list"></i>', class: 'btn-dark', title: 'Elementos' , function: 'elemento' }]
    );
</script>
@endpush