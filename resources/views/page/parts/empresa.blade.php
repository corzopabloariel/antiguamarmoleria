<div class="empresa">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3 class="title">{{ $elemento["titulo"] }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 empresa--texto">
                {!! $elemento["texto"] !!}
            </div>
        </div>
    </div>
    <div class="empresa--mision_vision py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="empresa--title d-flex align-items-center">
                        @include('layouts.general.image', [ 'i' => $elemento['mision']['image'], 'n' => $elemento['mision']['titulo'] , 'c' => 'empresa--icono' ] )
                        {{ $elemento['mision']['titulo'] }}
                    </div>
                    <div class="mt-2">
                        {!! $elemento['mision']['texto'] !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
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
    <div class="empresa--anios py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center timeline-cd">
                    <div class="p-3" style="overflow-x: auto;">
                        <ol class="d-flex m-0">
                            @for( $i = 0 ; $i < count( $elemento[ "anio" ] ) ; $i++ )
                                <li class="d-inline-block timeline-container  @if( $i == 0 ) selected @endif">
                                    <a onclick="event.preventDefault(); change(this);" href="{{ $elemento[ 'anio' ][ $i ][ 'order' ] }}">{{ $elemento[ 'anio' ][ $i ][ 'order' ] }}</a>
                                </li>
                            @endfor
                        </ol>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center timeline-cd mt-4" id="timeline-text">
                    <ul class="d-flex m-0 w-100 d-flex justify-content-center">
                        @for( $i = 0 ; $i < count( $elemento[ "anio" ] ) ; $i++ )
                            <li class="timeline-container @if( $i == 0 ) selected @endif" id="a_{{$elemento['anio'][$i]['order']}}">
                                @if( !empty( $elemento[ 'anio' ][ $i ]['texto'] ) )
                                <div class="my-3 text-center text-white">{!! $elemento[ 'anio' ][ $i ]['texto'] !!}</div>
                                @endif
                                @if( !empty( $elemento[ 'anio' ][ $i ]['image'] ) )
                                    @include('layouts.general.image', [ 'i' => $elemento[ 'anio' ][ $i ]['image'], 'n' => '' , 'c' => 'empresa--anio__logo' ] )
                                @endif
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@push( "scripts" )
<script>
    change = function(t) {
        const anio = t.attributes["href"].value;
        console.log(anio)
        let data = document.querySelector(`#a_${anio}`);
        let target = t.parentElement;
        let selected = document.querySelectorAll(".selected");
        Array.prototype.forEach.call(selected, x => { x.classList.toggle("selected") });
        target.classList.toggle("selected");
        data.classList.toggle("selected");
    };
</script>
@endpush