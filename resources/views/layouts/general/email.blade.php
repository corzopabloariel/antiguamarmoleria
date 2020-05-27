@if( !empty( $dato ) )
@php
if (!is_string($dato))
    $dato = $dato['email'];
@endphp
<a title="{{$dato}}" class="text-truncate d-inline-block" href="mailto:{{$dato}}" target="blank">{{$dato}}</a>
@endif