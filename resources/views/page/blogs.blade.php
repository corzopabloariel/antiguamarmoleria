<div class="encabezado py-5">
    <div class="container">
        <h2 class="title--important">Novedades</h2>
    </div>
</div>
<div class="blogs py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md">
                <div class="card-columns">
                    @foreach( $data["elementos"] AS $b )
                        @include( 'page.parts.blog' , [ 'elemento' => $b , 'type' => 0 ] )
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">{{ $data["elementos"]->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>