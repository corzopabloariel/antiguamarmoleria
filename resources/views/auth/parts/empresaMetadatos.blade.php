<section class="my-3">
    <div class="container-fluid">
        @include( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 0 , 'close' => 1 , 'modal' => 1 ] )
        @include( 'layouts.general.table' )
    </div>
</div>

@push('scripts')
<script>
    window.pyrus = new Pyrus("metadatos");

    /** ------------------------------------- */
    add = (t, seccion = "", data = null) => {
        let btn = $(t);
        let action = `${url_simple}/adm/${window.pyrus.name}/update/${seccion}`;
        let method = "PUT";
        window.formAction = "UPDATE";
        window.elementData = data;
        document.querySelector("#formModalLabel").textContent = "Editar elemento " + seccion.toUpperCase();
        window.pyrus.show(url_simple, data);console.log(seccion)
        document.querySelector(`#${window.pyrus.name}_section`).value = seccion;
        document.querySelector("#form").method = method;
        document.querySelector("#form").action = action;
        $("#formModal").modal("show");
    };
    /** ------------------------------------- */
    edit = (t, seccion) => {
        $( '[data-toggle="tooltip"]' ).tooltip( 'hide' );
        add(null, seccion, window.data.elementos[seccion]);
    };

    init(data => {
        console.log(data)
        data[1].innerHTML = window.pyrus.table([{ NAME:"ACCIONES" , COLUMN: "acciones" , CLASS: "text-center" , WIDTH: "150px" }]);
        window.pyrus.elements("#tabla" , url_simple, window.data.elementos, ["e"]);
        //---------------------
        const spans = document.querySelectorAll(".edit");
        if (spans.length > 0) {
            Array.prototype.forEach.call(spans, span => {
                span.addEventListener("dblclick", editable);
                span.addEventListener("blur", editableSave);
            })
        }
    }, false);
</script>
@endpush