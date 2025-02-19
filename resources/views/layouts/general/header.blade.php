<header class="header shadow">
    <div class="header--address py-3 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div>
                <i class="far fa-map mr-3"></i>@include('layouts.general.domicilio', ["dato" => $elementos->addresses, "link" => 1])
            </div>
            <div class="header__search">
                <form @if($link) action="{{URL::to('search')}}" @else disabled @endif class="d-flex" method="get">
                    <input type="search" name="s" required pattern="(.|\s)*\S(.|\s)*" placeholder="Estoy buscando" class="header__input">
                    <button type="submit" class="header__button"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-between align-items-center py-2">
        <div class="header-logo d-flex align-items-center align-self-center">
            @php
            $section = $elementos->sections[0];
            @endphp
            <a href="{{ $link ? URL::to("{$section['LINK']}") : '#' }}">
                @include( 'layouts.general.image' , [ 'i' => $elementos->images['logo'] , 'c' => 'd-block header--logo' , 'n' => 'Logo ' . env('APP_NAME') ] )
            </a>
        </div>
        <div id="menu-buscador" class=>
            <div id="hamburger" class="hamburger mt-4 align-self-center" onclick="menuBody( this );">
                <div class="position-relative p-3">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="d-none d-lg-block">
            <div class="header--element">
                <ul class="list-unstyled mb-0 header--menu justify-content-end">
                    @foreach($elementos->sections AS $section)
                        @if($section["SHOW"])
                        @php
                            $class = "header--link header--link__important";
                            for($i = 0; $i < count($section["REQUEST"]); $i++) {
                                if (Request::is("{$section["REQUEST"][$i]}"))
                                    $class .= " active";
                            }
                        @endphp
                        <li><a class="{{$class}}" href="{{ $link ? URL::to("{$section['LINK']}") : '#' }}">{{ $section['NAME'] }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="header--info d-none d-lg-block">
        <div class="container d-flex justify-content-between">
            <div class="header--info__target">
                @if (!empty($elementos->headers))
                @foreach($elementos->headers AS $h)
                <div class="header--info__element">
                    {!! $h["icon"] !!}
                    @php
                    $element = "";
                    $v = "";
                    if (isset($h["element"]))
                        $e = $elementos[$h["type"]][$h["element"]];
                    if($h["type"] == "emails")
                        $v = view('layouts.general.email', ['dato' => $e["email"]])->render();
                    if($h["type"] == "phones")
                        $v = view('layouts.general.telefono', ['dato' => $e])->render();
                    if($h["type"] == "attention_schedule")
                        $v = $elementos[$h["type"]];
                    @endphp
                    <div>
                        <h3 class="header--title">{{$h["title"]}}</h3>
                        <p class="header--text">{!! $v !!}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            @php
            $ARR_redes = [
                "facebook" => '<i class="header--social__icon fab fa-facebook-square"></i>',
                "instagram" => '<i class="header--social__icon fab fa-instagram"></i>',
                "twitter" => '<i class="header--social__icon fab fa-twitter"></i>',
                "youtube" => '<i class="header--social__icon fab fa-youtube"></i>',
                "linkedin" => '<i class="header--social__icon fab fa-linkedin-in"></i>'
            ];
            @endphp
            <div class="header--info__target header--social">
                @foreach($elementos->social_networks AS $k => $v)
                <a title="{{$v['titulo']}}" class="header--social__element" href="{{$v['url']}}" target="_blank">{!! $ARR_redes[$v["redes"]] !!}</a>
                @endforeach
            </div>
        </div>
    </div>
    @isset($data["marcas"])
    <div class="header--marcas d-none d-lg-block">
        <div class="container">
            <div class="header__scroll">
                @foreach($data["marcas"] AS $marca)
                    @php
                        $class = "d-flex w-100 justify-content-center align-items-center header--marca__link";
                        if (Request::is("{$marca->link()}*"))
                            $class .= " active--marca";
                    @endphp
                    <a href="{{ URL::to($marca->link()) }}" class="{{$class}}">
                        @if (empty($marca->logo2))
                            <p class="text-center">{{ $marca->title }}</p>
                        @else
                            @include( 'layouts.general.image' , [ 'i' => $marca->logo2 , 'c' => 'img--gris header--marca' , 'n' => $marca->title ] )
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    @endisset
</header>
<div id="wrapper-menu" class="position-fixed">
    <div id="hamburger-" class="hamburger position-absolute open d-none" style="right: 10px; top: 10px; z-index:111; height: 40px" onclick="menuBody( this );">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <a class="mb-4 d-inline-block" href="{{ $link ? URL::to('/') : '#' }}">
        @include( 'layouts.general.image' , [ 'i' => $elementos->images['logo'] , 'c' => 'd-block header--logo' , 'n' => 'Logo ' . env('APP_NAME') ] )
    </a>
    <div class="">
        <div class="header--info__target header--info__lateral">
            @if (!empty($elementos->headers))
            @foreach($elementos->headers AS $h)
            <div class="header--info__element col-12">
                {!! $h["icon"] !!}
                @php
                $element = "";
                $v = "";
                if (isset($h["element"]))
                    $e = $elementos[$h["type"]][$h["element"]];
                if($h["type"] == "emails")
                    $v = view('layouts.general.email', ['dato' => $e["email"]])->render();
                if($h["type"] == "phones")
                    $v = view('layouts.general.telefono', ['dato' => $e])->render();
                if($h["type"] == "attention_schedule")
                    $v = $elementos[$h["type"]];
                @endphp
                <div>
                    <h3 class="header--title">{{$h["title"]}}</h3>
                    <p class="header--text">{!! $v !!}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        @php
        $ARR_redes = [
            "facebook" => '<i class="header--social__icon fab fa-facebook-square"></i>',
            "instagram" => '<i class="header--social__icon fab fa-instagram"></i>',
            "twitter" => '<i class="header--social__icon fab fa-twitter"></i>',
            "youtube" => '<i class="header--social__icon fab fa-youtube"></i>',
            "linkedin" => '<i class="header--social__icon fab fa-linkedin-in"></i>'
        ];
        @endphp
        <div class="header--info__target header--social d-flex justify-content-center mt-4">
            @foreach($elementos->social_networks AS $k => $v)
            <a title="{{$v['titulo']}}" class="header--social__element" href="{{$v['url']}}" target="_blank">{!! $ARR_redes[$v["redes"]] !!}</a>
            @endforeach
        </div>
    </div>
    <h3 class="menu--lateral__title">Secciones</h3>
    <ul class="list-unstyled mb-0 flex-column">
        @foreach($elementos->sections AS $section)
            @php
                $class = "";
                for($i = 0; $i < count($section["REQUEST"]); $i++) {
                    if (Request::is("{$section["REQUEST"][$i]}"))
                        $class = "active";
                }
            @endphp
            <li><a class="{{$class}}" href="{{ $link ? URL::to("{$section['LINK']}") : '#' }}">{{ $section['NAME'] }}</a></li>
        @endforeach
    </ul>
    @isset($data["marcas"])
    <h3 class="menu--lateral__title">Productos</h3>
    <ul class="list-unstyled mb-0 flex-column">
        @foreach($data["marcas"] AS $marca)
        @php
            $class = "";
            if (Request::is("{$marca->link()}*"))
                $class = "active";
        @endphp
        <li>
            <a class="{{$class}}" href="{{ URL::to($marca->link()) }}">{{ $marca->title }}</a>
        </li>
        @endforeach
    </ul>
    @endisset
</div>