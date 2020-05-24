<header class="header">
    <div class="container d-flex justify-content-between align-items-center">
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
                            $class = "header--link";
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
    <div class="header--info">
        <div class="container d-flex"></div>
    </div>
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
    <ul class="list-unstyled flex-column header--list__small">
        @if($elementos->phones)
            @foreach( $elementos->phones AS $t )
                @if ($t["in_header"])
                <li class="d-flex align-items-start">
                    @if ($t[ "tipo" ] == "tel")
                        <i class="footer--icon header--icon fas fa-phone-alt"></i>
                    @else
                        <i class="fab fa-whatsapp footer--icon header--icon"></i>
                    @endif
                    <div class="footer--info">
                        @include( 'layouts.general.telefono' , [ "dato" => $t ] )
                    </div>
                </li>
                @endif
            @endforeach
        @endif
    </ul>
    <hr>
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
</div>