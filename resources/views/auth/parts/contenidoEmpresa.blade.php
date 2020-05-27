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
    window.formAction = "UPDATE";
    window.pyrus = [];
    window.pyrus.push({entidad: new Pyrus("contenido_empresa"), tipo: "U"});
    window.pyrus.push({entidad: new Pyrus("contenido_empresa_vision"), tipo: "U", column: "vision"});
    window.pyrus.push({entidad: new Pyrus("contenido_empresa_mision"), tipo: "U", column: "mision"});

    /** */
    init(data => {
        window.pyrus.forEach(p => {
            switch (p.tipo) {
                case "U":
                    if (p.column) {
                        if (window.data.elementos.data[p.column])
                            p.entidad.show(url_simple, window.data.elementos.data[p.column]);
                    } else
                        p.entidad.show(url_simple, window.data.elementos.data);
                break;
                case "A":
                case "M":
                    if (window.data.elementos.data[p.column])
                        window.data.elementos.data[p.column].forEach(a => {
                            const func = new Function(`${p.function}Function(${JSON.stringify(a)})`);
                            func.call(null);
                        });
                break;
            }
        })
    }, false);
</script>
@endpush