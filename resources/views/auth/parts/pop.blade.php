<section class="my-3">
    <div class="container-fluid">
        @include( 'layouts.general.form' , [ 'buttonADD' => 1 , 'form' => 0 , 'close' => 1 , 'modal' => 1])
        @include( 'layouts.general.table', [
            "paginate" => $data["elementos"],
            "form" => [
                "url" => isset($data["url_search"]) ? $data["url_search"] : Route("pops.index"),
                "placeholder" => "Buscar en URL",
                "search" => isset($data["search"]) ? $data["search"] : null
            ]
        ])
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = new Pyrus("pops");
    window.pyrus.objeto.ATRIBUTOS.url.DATA = window.data.routes;
    init(data => {});
</script>
@endpush