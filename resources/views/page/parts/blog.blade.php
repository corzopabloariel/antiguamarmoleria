@php
$url = 'novedad/' . str_slug($elemento->titulo);
$url .= '/' . $elemento->id;
@endphp
<a class="card hover border-0 shadow-sm" href="{{ URL::to($url) }}">
    <div class="plus">
        @include( 'layouts.general.image' , [ 'i' => $elemento->image , 'n' => $elemento->titulo , 'c' => 'card-img-top' ] )
        <div class="img card-body position-relative bg-light">
            <h4 class="blog--title card-title">{{ $elemento->titulo }}</h4>
            <div class="mt-2 resume">{!! $elemento->resume !!}</div>
        </div>
    </div>
</a>