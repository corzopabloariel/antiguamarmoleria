<div class="home py-5">
    <div class="container pb-4">
        <h2 class="home--title mb-5"><span>Nuestros productos</span></h2>
        <div class="row mt-n4 justify-content-center">
            @foreach($data["elementos"] AS $marca)
            <div class="col-12 col-md-6 col-lg-4 mt-4">
                @if (empty($marca->logo))
                    <p class="home--marca__title">{{ $marca->title }}</p>
                @else
                    @include( 'layouts.general.image' , [ 'i' => $marca->logo , 'c' => 'home--marca' , 'n' => $marca->title ] )
                @endif
                @if(!empty($marca->resume))
                <div class="home--marca__resume" style="--bg: {{$marca->color['color']}}; --txt: {{$marca->color_text['color_text']}};">{!! $marca->resume !!}</div>
                @endif
                <p class="home--marca__link"><a href="{{ URL::to($marca->link()) }}">Ver más</a></p>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="contacto--map">
    {!! $data[ "empresa" ]->addresses[ "mapa" ] !!}
</div>