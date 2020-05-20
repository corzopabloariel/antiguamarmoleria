<div class="encabezado py-5">
    <div class="container">
        <h2 class="title--important">Compañías con las que trabajamos</h2>
    </div>
</div>
<div class="companias py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 slick">
                <div id="marcas">
                    @foreach($data["elementos"]["companias"] AS $m)
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="w-100">
                            @include( 'layouts.general.image' , [ 'i' => $m[ 'image' ] , 'n' => $m->name , 'c' => 'compania--image' ] )
                            <p class="text-center mt-2">{{ $m->name }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="encabezado py-5">
    <div class="container">
        <h2 class="title--important">Seleccione una cobertura</h2>
    </div>
</div>
<div class="coberturas pb-5">
    <div class="container">
        <div class="row">
            @foreach($data["elementos"]["coberturas"] AS $p)
                <div class="col-12 col-md-6 mt-4 d-flex align-items-stretch">
                    @php
                    $images = $p->getImage();
                    $img = "";
                    if (!empty($images))
                        $img = asset($images['image']['i']);
                    //color: var(--tooltip-color);
                    @endphp
                    <a href="{{ URL::to('productos/cobertura/' . str_slug( $p['name'] ) . '/' . $p['id']) }}" style="--tooltip-color: {{ $p['color'] }}; background-image: url( {{ $img }} ); min-height: 206px;" class="d-block border w-100 position-relative cobertura">
                        <div class="position-absolute w-100 h-100" style="background-color: {{ $p['color'] }}; mix-blend-mode: multiply; z-index: 1; left: 0; top: 0;"></div>
                        <p class="mb-0 cobertura--title__cobertura text-truncate position-relative d-flex align-items-center" style="--tooltip-color: {{ $p['color'] }}; z-index: 2">
                            @if( !empty( $p['image'] ) )
                            <span class="img-producto bg-white d-inline-block mr-2 rounded-circle border border-white" style="width: 60px; height: 60px;">
                                <img src="{{ asset($p['image'][ 'i' ]) }}" style="width: 58px; height: 58px; filter: {{ $p->hsl }}" />
                            </span>
                            @endif
                            {{ $p->name }}
                        </p>
                        @if( !empty( $p->resumen ) )
                        <div class="mt-3 position-relative" style="z-index: 2">{!! $p->resumen !!}</div>
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push( "scripts" )
<script>
    if( $("#marcas").length ) {
        slickMarcas = $( "#marcas" ).slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            dots: false,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 425,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true
                    }
                }
            ]
        });
        $( "#marcas" ).find(".slick-arrow").remove();
    }
</script>
@endpush