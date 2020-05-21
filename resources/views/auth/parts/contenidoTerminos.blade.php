<section class="my-3">
    <div class="container-fluid">
        @include( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 1 , 'close' => 0 , 'url' => url('/adm/contenido/' . $data['section'] . '/update') , 'modal' => 0 ] )
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = new Pyrus("terminos", null, src);
    /** */
    init((data) => {
        window.pyrus.show(null, window.data.elementos.data);
    }, false);
</script>
@endpush
