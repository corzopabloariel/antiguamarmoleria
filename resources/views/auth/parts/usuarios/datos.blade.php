<section class="mt-3">
    <div class="container-fluid">
        @include( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 1 , 'close' => 0 , 'modal' => 0 ] )
    </div>
</section>
@push( "scripts" )
<script>
    window.pyrus = new Pyrus("usuarios");

    init = (callbackOK) => {
        /** */
        let h = window.pyrus.formulario();

        $( "#form .container-form" ).html( h );
        $("#usuarios_type").closest(".col-12").addClass("d-none");
        add(null, parseInt(window.data.usuario.id), window.data.usuario);
        callbackOK.call( this , null );
    };
    init( () => {} );
</script>
@endpush