<div class="wrapper-videos">
    <h3 class="blog__title blog__title--lateral">Categorías</h3>
    <ul class="list-group blog__categorias">
        @foreach( $data["elementos"][ "categorias" ] AS $c )
        <li class="list-group-item border-0 d-flex justify-content-between"><a href="{{ URL::to($c->link()) }}">{{ $c->title }}</a><span class="categoria__count">{{ $c->blogs()->count() }}</span></li>
        @endforeach
    </ul>
</div>
{{--@if($data[ "empresa" ]->social_networks)
<div class="wrapper-redes mt-5">
    <h3 class="blog__title blog__title--lateral">Redes Sociales</h3>
    @php
    $social_networks = [
        'instagram' => '<i class="fab fa-instagram"></i>',
        'linkedin' => '<i class="fab fa-linkedin-in"></i>',
        'youtube' => '<i class="fab fa-youtube"></i>',
        'facebook' => '<i class="fab fa-facebook-f"></i>',
        'twitter' => '<i class="fab fa-twitter"></i>',
        'pinterest' => '<i class="fab fa-pinterest-p"></i>'
    ];
    @endphp
    <div class="d-flex ml-n3 justify-content-center mt-4">
        @foreach( $data[ "empresa" ]->social_networks AS $k => $red )
        <a class="ml-3 social-networks" href="{{ $red[ 'url' ] }}" target="_blank" rel="noopener noreferrer" title="{{ $red[ 'titulo' ] }}">{!! $social_networks[ $red[ 'redes' ] ] !!}</a>
        @endforeach
    </div>
</div>
@endif--}}