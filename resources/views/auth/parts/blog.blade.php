<section class="my-3">
    <div class="container-fluid">
        @include( 'layouts.general.form' , [ 'buttonADD' => 1 , 'form' => 1 , 'close' => 1 , 'modal' => 1 , "buttons" => [ [ "i" => "fab fa-elementor" , "t" => "Categorías" , "b" => "btn-primary" , "f" => "categorias" ] ] ])
        @include( 'layouts.general.table', [
            "paginate" => $data["elementos"],
            "form" => [
                "url" => isset($data["url_search"]) ? $data["url_search"] : route("novedades.index"),
                "placeholder" => "Buscar en Título, Resumen y Descripción larga",
                "search" => isset($data["search"]) ? $data["search"] : null
            ]
        ])
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = [];
    window.pyrus.push({entidad: new Pyrus("novedades"), tipo: "U"});
    window.pyrus.push({entidad: new Pyrus("blog_images"), tipo: "M", column: "images", function: "imagen"});
    function addfinish(data) {
        if (!data) {
            const target = document.querySelector(`#wrapper-imagen`);
            if (target)
                target.innerHTML = "";
            return null;
        }
        if (data.images)
            data.images.forEach(a => imagenFunction(a));
    }
    categoriasFunction = t => {
        window.location = `${url_simple}/adm/novedad/categorias`;
    };
    imagenFunction = (value = null) => {
        if (value) {
            if (typeof value === "string")
                value = JSON.parse(value);
        }
        const element = window.pyrus.find(x => {
            if (x.entidad.entidad === "blog_images")
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
        element.entidad.show(url_simple, value, window[element.column], element.column);
    };
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init(
        data => {},
        true,
        true,
        "table",
        true,
        ["e", "d", "c"]
    );
</script>
@endpush