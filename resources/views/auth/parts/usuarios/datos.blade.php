<section class="mt-3">
    <div class="container-fluid">
        @include( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 1 , 'close' => 0 , 'modal' => 0 ] )
    </div>
</section>
@push( "scripts" )
<script>
    window.pyrus = new Pyrus("usuarios");

    init((data) => {
        document.querySelector("#usuarios_type").closest(".col-12").classList.add("d-none");
        add(null, parseInt(window.data.usuario.id), window.data.usuario);
    }, false);
</script>
@endpush