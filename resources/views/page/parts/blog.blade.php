<div class="blog">
    @if (!empty($elemento->date))
    @php
    $fecha = "";
    $aux = strtotime( $elemento->date );
    $mes = [
        "1" => "Ene",
        "2" => "Feb",
        "3" => "Mar",
        "4" => "Abr",
        "5" => "May",
        "6" => "Jun",
        "7" => "Jul",
        "8" => "Ago",
        "9" => "Sep",
        "10" => "Oct",
        "11" => "Nov",
        "12" => "Dic" ];
    $fecha = "<p>" . date("d", $aux) . "</p><p>" . $mes[date("n", $aux)] . "</p><p>" . date("y", $aux) . "</p>";
    @endphp
    <div class="blog__date">{!! $fecha !!}</div>
    @endif
    @include('layouts.general.image' , [ 'i' => $elemento->image() , 'n' => $elemento->titulo , 'c' => 'blog__image', 'd' => 1])
    <h4 class="blog__title"><a href="{{ URL::to($elemento->link()) }}">{{ $elemento->title }}</a></h4>
    <div class="blog__resume">{!! $elemento->resume !!}</div>
    <p class="blog__category"><i class="fas fa-globe mr-2"></i><a href="{{URL::to($elemento->category->link())}}">{{ $elemento->category->title }}</a></p>
</div>
