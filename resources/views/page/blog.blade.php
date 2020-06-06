<div class="blogs">
    <div class="banner d-flex align-items-stretch" style="--url: url({{asset(@$data['portada']->image['i'])}})">
        <div class="container d-flex">
            <h3 class="banner--title align-self-end"><span>Novedades</span></h3>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md">
                    <ol class="breadcrumb bg-transparent border-0 p-0 m-0">
                        <li class="breadcrumb-item breadcrumb--home"><a href="{{ URL::to( '/' ) }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('novedades')}}">Novedades</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to($data['categoria']->link())}}">{{$data["categoria"]->title}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$data['elementos']['novedad']->title}}</li>
                    </ol>
                    <div class="row">
                        <div class="col-12 blog">
                            @include('layouts.general.image', [ 'i' => $data['elementos']['novedad']->images , 'n' => $data['elementos']['novedad']->title , 'c' => 'blog__image' ] )
                            @if (!empty($data['elementos']['novedad']->date))
                            @php
                            $fecha = "";
                            $aux = strtotime($data['elementos']['novedad']->date);
                            $mes = [
                                "1" => "Enero",
                                "2" => "Febrero",
                                "3" => "Marzo",
                                "4" => "Abril",
                                "5" => "Mayo",
                                "6" => "Junio",
                                "7" => "Julio",
                                "8" => "Agosto",
                                "9" => "Septiembre",
                                "10" => "Octubre",
                                "11" => "Noviembre",
                                "12" => "Diciembre"];
                            $fecha = date("d", $aux) . " de " . $mes[date("n", $aux)] . " del " . date("Y", $aux);
                            @endphp
                            <p class="blog__date blog__date--open"><i class="fas fa-calendar-day mr-2"></i>{{$fecha}}</p>
                            @endif
                            <h3 class="blog__title">{{ $data['elementos']['novedad']->title }}</h3>
                            <div class="blog__resume blog__resume--open">
                                @if (empty($data['elementos']['novedad']->text))
                                {!! $data['elementos']['novedad']->resume !!}
                                @else
                                {!! $data['elementos']['novedad']->text !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    @include( 'page.parts.blog_lateral' )
                </div>
            </div>
        </div>
    </div>
</div>