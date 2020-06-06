<div class="home py-5">
    <div class="container pb-4">
        <h2 class="home--title mb-5"><span>Nuestros productos</span></h2>
        <div class="row mt-n4 justify-content-center">
            @foreach($data["elementos"] AS $marca)
            <div class="col-12 col-md-6 col-lg-4 mt-4 d-flex align-items-center">
                <a href="{{ URL::to($marca->link()) }}" class="d-block w-100">
                @if (empty($marca->logo))
                    <p class="home--marca__title">{{ $marca->title }}</p>
                @else
                    @include( 'layouts.general.image' , [ 'i' => $marca->logo , 'c' => 'home--marca' , 'n' => $marca->title ] )
                @endif
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="contacto--map">
    {!! $data[ "empresa" ]->addresses[ "mapa" ] !!}
</div>