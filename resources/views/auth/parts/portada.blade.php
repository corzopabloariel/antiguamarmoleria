<section class="my-3">
<div class="container-fluid">
        @include( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 1 , 'close' => 0 , 'modal' => 0 ] )
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = new Pyrus("portada");
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init((data) => {
        add(null, window.data.portada ? parseInt(window.data.portada.id) : 0, window.data.portada ? window.data.portada : null);
        document.querySelector(`#${window.pyrus.name}_section`).value = window.data.section;
    }, false);
</script>
@endpush