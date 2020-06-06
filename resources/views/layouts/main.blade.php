<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta name="description" content="{{ $data['metadato']['description'] }}"/>
        <meta name=”keywords” content="{{ $data['metadato']['keywords'] }}"/>
        @php
        $t = config( 'app.name' );
        if( strpos($data[ 'title' ],$t) !== false )
            $t = $data[ 'title' ];
        else
            $t .= ' :: ' . $data[ 'title' ];
        @endphp
        <title>@yield( 'headTitle' , $t )</title>
        @if( !empty( $data[ "empresa" ][ "images" ][ "favicon" ] ) )
            @switch( $data[ "empresa" ][ "images" ][ "favicon" ][ "i" ] )
                @case("png")
                    <link rel="icon" type="image/png" href="{{ asset($data[ 'empresa' ]->images[ 'favicon' ][ 'i' ] ) }}" />
                    @break
                @case("svg")
                    <link rel="icon" href="{{ asset($data[ 'empresa' ]->images[ 'favicon' ][ 'i' ] ) }}" type="image/svg+xml" />
                    @break
                @default
                    <link rel="shortcut icon" href="{{ asset( $data[ 'empresa' ]->images[ 'favicon' ][ 'i' ] ) }}" />
            @endswitch
        @endif
        <!-- <Styles> -->
        @include( 'layouts.general.css' )
        <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
        <link rel="stylesheet" href="{{ asset('css/loading-btn.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <link href="{{ asset('css/css.css') }}" rel="stylesheet">
        <link href="{{ asset('css/page/page.css') }}" rel="stylesheet">
        <link href="{{ asset('css/page/header.css') }}" rel="stylesheet">
        <link href="{{ asset('css/page/footer.css') }}" rel="stylesheet">
        @stack( 'styles' )
        <!-- </Styles> -->
    </head>
    <body>
        @php
            $url = str_replace(URL::to("/"), "", url()->current());
            $url = empty($url) ? "/" : $url;
            $pop = \App\Pop::where("url", $url)->first();
        @endphp
        @if ($pop)
            @if (!empty($pop->images))
            <div class="modal fade bd-example-modal-lg" id="modal__pop" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                        @include('layouts.general.image' , [ 'i' => $pop->images , 'n' => "" , 'c' => 'w-100', 'd' => 0])
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endif
        <div class="modal fade bd-example-modal-lg" id="terminosModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">{{ $data[ "terminos" ]->contents[ "title" ] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! $data[ "terminos" ]->contents[ "text" ] !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="imagesModal" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imagesModal--title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="carousel slide carousel-fade" data-ride="carousel" id="carouselFade">
                            <div class="carousel-inner" id="carouselImages"></div>
                            <a class="carousel-control-prev" href="#carouselFade" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselFade" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include( 'layouts.general.message' )
        <div id="wrapper-body">
            @include('layouts.general.header', ['elementos' => $data['empresa'], 'link' => 1])
            <section>
            @include($data['view'])
            </section>
            @include('layouts.general.footer', ['elementos' => $data['empresa'], 'link' => 1])
        </div>
        <!-- Scripts -->
        @include( 'layouts.general.script' )
        <script>
            window.url = "{{ url()->current() }}";
            window.url_base = "{{ URL::to( '/' ) }}";
            const popup = document.querySelector("#modal__pop");
            if (popup)
                $(popup).modal("show");
            $(".header__scroll").slick({
                centerMode: true,
                centerPadding: '60px',
                slidesToShow: 3,
                dots: false,
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 425,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true
                        }
                    }
                ]
            });
            $( () => {
                $('#search__modal').on('shown.bs.modal', function (e) {
                    if(window.typeMENU !== undefined)
                        menuBody(null);
                });
                $( ".carousel-caption .texto" ).css( {
                    marginTop: $("header").height()
                } );
                $( "#accordionMenu a").on( "click" , ( e ) => {
                    $(this).parent().stopPropagation();
                });
                $( ".dropdown-menu" ).click( ( e ) => {
                    e.stopPropagation();
                });
                $(window).resize(() => {
                    $( ".carousel-caption .texto" ).css( {
                        marginTop: $( "header" ).height()
                    } );
                });
            });
        </script>
        @stack( 'scripts' )
        <script src="{{ asset('js/bootstrap-autocomplete.js') }}"></script>
    </body>
</html>