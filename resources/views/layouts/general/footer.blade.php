<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 d-flex align-items-center">
                @include( 'layouts.general.image' , [ 'i' => $elementos->images['logoFooter'] , 'c' => 'd-block footer--logo' , 'n' => 'Logo ' . env('APP_NAME') ] )
            </div>
            <div class="col-12 col-md-4 col-lg-4 d-flex">
                <div class="w-100">
                    <h3 class="footer--title">Secciones</h3>
                    <ul class="list-unstyled mb-0 footer--list footer--list__column">
                        @foreach($elementos->sections[$login] AS $section)
                            <li class="text-truncate"><a href="{{ $link ? URL::to("{$section['LINK']}") : '#' }}">{{ $section['NAME'] }}</a></li>
                        @endforeach
                    </ul>
                    @if(!empty($elementos->social_networks))
                    @php
                    $ARR_redes = [
                        "facebook" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-facebook-square"></i>',
                        "instagram" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-instagram"></i>',
                        "twitter" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-twitter"></i>',
                        "youtube" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-youtube"></i>',
                        "linkedin" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-linkedin-in"></i>'
                    ];
                    @endphp
                    <div class="d-flex w-100 justify-content-start flex-column" style="">
                        Seguinos
                        <div class="mt-1">
                            @foreach($elementos->redes AS $k => $v)
                                <a href="{{$v['url']}}" target="_blank">{!! $ARR_redes[$v["redes"]] !!} {{$v["titulo"]}}</a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 mt-md-4 mt-lg-0">
                <h3 class="footer--title">{{ env('APP_NAME') }}</h3>
                <ul class="list-unstyled mb-0 footer--list">
                    <li class="d-flex align-items-start">
                        <i class="footer--icon fas fa-map-marker-alt"></i>
                        <div class="footer--info">
                            @include( 'layouts.general.domicilio' , [ "dato" => $elementos->domicilio , "link" => 1 ] )
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="footer--icon fas fa-phone-alt"></i>
                        <div class="footer--info">
                            @php
                            $tel = "";
                            $wha = "";
                            foreach( $elementos->telefono AS $t ) {
                                if ($t[ "tipo" ] == "tel")
                                    $tel .= "<p>" . view('layouts.general.telefono', ["dato" => $t])->render() . "</p>";
                                else
                                    $wha .= "<p>" . view('layouts.general.telefono', ["dato" => $t])->render() . "</p>";
                            }
                            @endphp
                            {!! $tel !!}
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="fab fa-whatsapp footer--icon"></i>
                        <div class="footer--info">
                            {!! $wha !!}
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="footer--icon far fa-envelope"></i>
                        <div class="footer--info">
                            @foreach( $elementos->email as $e )
                                <p class="text-truncate">@include( 'layouts.general.email' , [ "dato" => $e ] )</p>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        @if(!empty($elementos->footer))
        <div class="row mt-4 footer--text">
            @foreach($elementos->footer AS $e)
            <div class="col-12 col-md d-flex align-items-center">
                <div class="w-100">
                    {!! $e !!}
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
    <div class="osole py-3">
        <div class="container">
            <div class="row by">
                <div class="col-12">
                    <p class="mb-0 d-flex">
                        <span class="mr-3">© {{ env('APP_YEAR') }}</span>
                        <a target="_blank" href="{{ env('APP_UAUTHOR') }}" style="color:inherit" class="right text-uppercase">by {{ env('APP_AUTHOR') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>