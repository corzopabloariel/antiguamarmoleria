<header class="header">
    <div class="container d-flex justify-content-between align-items-stretch">
        <div class="header-logo d-flex align-items-center align-self-center">
            @php
            $section = $elementos->sections[$login][0];
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
        <div class="header--element d-none d-lg-block">
            <div class="d-flex flex-column align-items-stretch justify-content-between">
                <div class="dropdown d-flex justify-content-end pt-2">
                    @if(!$login)
                    <button id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="header--private" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-lock mr-2"></i>Zona Cliente
                    </button>
                    <ul class="submenu list-unstyled pb-0 rounded-0 shadow-sm rounded dropdown-menu dropdown-menu-right" id="login" aria-labelledby="dropdownMenuButton">
                        <li class="rounded-0">
                            <div class="p-3">
                                <form id="formLogueo" action="{{ url('/cliente/acceso') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="contenedorForm w-100" id="form_formulario_login">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-12">
                                                <input @if(!$link) disabled @endif required name="username" id="username" class="form-control form--input" type="text" placeholder="Usuario" required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center align-items-center mt-3">
                                            <div class="col-12">
                                                <input @if(!$link) disabled @endif required name="password" id="password" class="form-control form--input" type="password" placeholder="Contraseña" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button @if(!$link) disabled @endif class="btn btn-primary mx-auto btn--element px-5 rounded-pill mt-3 text-uppercase" type="submit">ingresar</button>
                                </form>
                            </div>
                        </li>
                        <li class="bg-light text-center rounded-0 border-top bg-light py-2">
                            <a href="{{ $link ? URL::to('olvide') : '#' }}" class="text-primary">Olvidé mi contraseña</a>
                        </li>
                    </ul>
                    @else
                    @php
                    $cliente = auth()->guard('clientAuth')->user();
                    @endphp
                    <div class="header--private">
                        <i class="fas fa-lock mr-2"></i>{{ $cliente->nombre }} (<a href="{{ Route('salir') }}">Cerrar sesión</a>)
                    </div>
                    @endif
                </div>
                <ul class="list-unstyled mb-0 header--list justify-content-end">
                    @foreach($elementos->sections[$login] AS $section)
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
    <div class="dropdown d-flex justify-content-end pt-2">
        @if(!$login)
        <button id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="header--private" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-lock mr-2"></i>Zona Cliente
        </button>
        <ul class="submenu list-unstyled pb-0 rounded-0 shadow-sm rounded dropdown-menu dropdown-menu-right" id="login" aria-labelledby="dropdownMenuButton">
            <li class="rounded-0">
                <div class="p-3">
                    <form id="formLogueo" action="{{ url('/cliente/acceso') }}" method="post">
                        {{ csrf_field() }}
                        <div class="contenedorForm w-100" id="form_formulario_login">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-12">
                                    <input @if(!$link) disabled @endif required name="username" id="username" class="form-control form--input" type="text" placeholder="Usuario" required>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-3">
                                <div class="col-12">
                                    <input @if(!$link) disabled @endif required name="password" id="password" class="form-control form--input" type="password" placeholder="Contraseña" required>
                                </div>
                            </div>
                        </div>
                        <button @if(!$link) disabled @endif class="btn btn-primary mx-auto btn--element px-5 rounded-pill mt-3 text-uppercase" type="submit">ingresar</button>
                    </form>
                </div>
            </li>
            <li class="bg-light text-center rounded-0 border-top bg-light py-2">
                <a href="{{ $link ? URL::to('olvide') : '#' }}" class="text-primary">Olvidé mi contraseña</a>
            </li>
        </ul>
        @else
        @php
        $cliente = auth()->guard('clientAuth')->user();
        @endphp
        <div class="header--list w-100 d-block px-3">
            {{ $cliente->nombre }}<br/><a href="{{ Route('salir') }}">Cerrar sesión</a>
        </div>
        @endif
    </div>
    <ul class="list-unstyled flex-column header--list__small">
        @if($elementos->telefonos)
            @foreach( $elementos->telefonos AS $t )
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
        @foreach($elementos->sections[$login] AS $section)
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