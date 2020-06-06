<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-2 d-flex align-items-center">
                <div class="w-100">
                    <div class="d-flex justify-content-center">
                        @include( 'layouts.general.image' , [ 'i' => $elementos->images['logoFooter'] , 'c' => 'd-block footer--logo' , 'n' => 'Logo ' . env('APP_NAME') ] )
                    </div>
                    @if(!empty($elementos->social_networks))
                    @php
                    $ARR_redes = [
                        "facebook" => '<i class="header--social__icon fab fa-facebook-square"></i>',
                        "instagram" => '<i class="header--social__icon fab fa-instagram"></i>',
                        "twitter" => '<i class="header--social__icon fab fa-twitter"></i>',
                        "youtube" => '<i class="header--social__icon fab fa-youtube"></i>',
                        "linkedin" => '<i class="header--social__icon fab fa-linkedin-in"></i>'
                    ];
                    @endphp
                    <div class="header--social header--social__footer d-flex justify-content-center">
                        @foreach($elementos->social_networks AS $k => $v)
                            <a title="{{$v['titulo']}}" class="header--social__element" href="{{$v['url']}}" target="_blank">{!! $ARR_redes[$v["redes"]] !!}</a>
                        @endforeach
                    </div>
                    @endif
                    @if (!empty($elementos->text["tarjetas"]))
                    <div class="footer--tarjetas mt-5">{!! $elementos->text["tarjetas"] !!}</div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3 d-flex">
                <div class="w-100">
                    <h3 class="footer--title">Secciones</h3>
                    <ul class="list-unstyled mb-0 footer--list footer--list__column">
                        @foreach($elementos->sections AS $section)
                            <li class="text-truncate"><a href="{{ $link ? URL::to("{$section['LINK']}") : '#' }}">{{ $section['NAME'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3 d-flex">
                <div class="w-100">
                    <h3 class="footer--title">Productos</h3>
                    @isset($data["productos_footer"])
                    <ul class="list-unstyled mb-0 footer--list footer--list__column">
                        @foreach($data["productos_footer"] AS $m)
                        <li class="text-truncate"><a href="{{ $link ? URL::to($m->link()) : '#' }}">{{ $m->title }}</a></li>
                        @endforeach
                    </ul>
                    @endisset
                </div>
            </div>
            <div class="col-12 col-md col-lg-4 mt-md-4 mt-lg-0">
                <h3 class="footer--title">{{ env('APP_NAME') }}</h3>
                <ul class="list-unstyled mb-0 footer--list">
                    <li class="d-flex align-items-start">
                        <i class="footer--icon far fa-map"></i>
                        <div class="footer--info">
                            <p class="footer--title footer--title__info">Showroom/Fábrica</p>
                            @include( 'layouts.general.domicilio' , [ "dato" => $elementos->addresses , "link" => 1 ] )
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="far fa-clock footer--icon"></i>
                        <div class="footer--info">
                            <p class="footer--title footer--title__info">Horario de Atención</p>
                            {!! $elementos->attention_schedule !!}
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="footer--icon fas fa-phone-volume"></i>
                        <div class="footer--info">
                            <p class="footer--title footer--title__info">Teléfonos</p>
                            @php
                            $tel = "";
                            $wha = "";
                            foreach( $elementos->phones AS $t ) {
                                if ($t[ "tipo" ] == "tel")
                                    $tel .= "<p>" . view('layouts.general.telefono', ["dato" => $t])->render() . "</p>";
                                else
                                    $wha .= "<p>" . view('layouts.general.telefono', ["dato" => $t])->render() . "</p>";
                            }
                            @endphp
                            {!! $tel !!}
                        </div>
                    </li>
                    @if (!empty($wha))
                    <li class="d-flex align-items-start">
                        <i class="fab fa-whatsapp footer--icon"></i>
                        <div class="footer--info">
                            {!! $wha !!}
                        </div>
                    </li>
                    @endif
                    <li class="d-flex align-items-start">
                        <i class="footer--icon far fa-envelope"></i>
                        <div class="footer--info">
                            <p class="footer--title footer--title__info">Consultas Email</p>
                            @foreach( $elementos->emails as $e )
                                <p class="text-truncate">@include('layouts.general.email', ["dato" => $e["email"]])</p>
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
    <div class="pablocorzo py-3">
        <div class="container">
            <div class="row by">
                <div class="col-12">
                    <p class="mb-0 d-flex">
                        <span class="mr-3">© {{ env('APP_YEAR') }}</span>
                        @php
                        $urls = explode("-", env('APP_UAUTHOR'));
                        $names = explode("-", env('APP_AUTHOR'));
                        $links = "";
                        for ($i = 0; $i < count($urls); $i++) {
                            if (!empty($links))
                                $links .= " / ";
                            $links .= "<a target='_blank' href='{$urls[$i]}' style='color:inherit' class='right text-uppercase mx-2'>{$names[$i]}</a>";
                        }
                        @endphp
                        BY {!! $links !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>