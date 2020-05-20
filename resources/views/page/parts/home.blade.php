<div class="home py-5">
    <div class="home--atencion mb-5">
        <div class="container px-5">
            <div class="row">
                <div class="col-12 col-md home--atencion__background" style="background-image: url({{ asset($elementos['atencion']['fondo']['i']) }})">
                    <p class="home--title home--title__atencion">{{ $elementos['atencion']['titulo'] }}</p>
                    {!! $elementos['atencion']['texto'] !!}
                </div>
                <div class="col-12 col-md d-flex align-items-center home--atencion__info home--atencion__icon">
                    <div class="w-100">
                        <p class="mb-2 d-flex align-items-center">{!! $elementos['atencion']['icon'] !!}<span class="ml-2">{{ $elementos['atencion']['telefono'] }}</span></p>
                        <p class="text-truncate d-flex align-items-center"><i class="fas fa-envelope"></i><span class="ml-2">{!! $elementos['atencion']['email'] !!}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home--soluciones">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="home--title home--title__important"><span>{{$elementos['titulo']}}</span></h3>
                </div>
            </div>
            <div class="row">
                @foreach($elementos["iconos"] AS $i)
                <div class="col-12 col-md-4 col-lg-3">
                    @include('layouts.general.image' , [ 'i' => $i['image'], 'n' => $i["titulo"] , 'c' => 'home--image home--image__solucion' ] )
                    <p class="home--title mb-2">{{ $i['titulo'] }}</p>
                    <div>{!! $i['texto'] !!}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>