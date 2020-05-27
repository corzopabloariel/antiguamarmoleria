<div class="empresa pb-4">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <h3 class="empresa--title empresa--title__first">{{ $elemento["titulo"] }}</h3>
                <div class="empresa--texto">
                    {!! $elemento["texto"] !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="empresa--mision">
                    <div class="empresa--title d-flex align-items-center">
                        @include('layouts.general.image', [ 'i' => $elemento['mision']['image'], 'n' => $elemento['mision']['titulo'] , 'c' => 'empresa--icono' ] )
                        {{ $elemento['mision']['titulo'] }}
                    </div>
                    <div class="mt-2">
                        {!! $elemento['mision']['texto'] !!}
                    </div>
                </div>
                <div class="empresa--vision">
                    <div class="empresa--title d-flex align-items-center">
                        @include('layouts.general.image', [ 'i' => $elemento['vision']['image'], 'n' => $elemento['vision']['titulo'] , 'c' => 'empresa--icono' ] )
                        {{ $elemento['vision']['titulo'] }}
                    </div>
                    <div class="mt-2">
                        {!! $elemento['vision']['texto'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>