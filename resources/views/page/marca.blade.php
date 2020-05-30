@if(!empty($data["marca"]->sliders))
    @include('layouts.general.slider', ['slider' => $data["marca"]->sliders, 'sliderID' => "marca--slider" , 'div' => 1 , 'arrow' => 0, "class" => "marca--slider", "title" => $data['marca']->title])
@endif
<div class="productos pb-5 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb bread--pyrus">
                    <li class="breadcrumb-item"><a href="{{URL::to($data['marca']->link())}}">{{$data['marca']->title}}</a></li>
                    @if(isset($data["colores"]))
                    <li class="breadcrumb-item"><a href="{{URL::to($data['marca']->link() . '/' , $data['marca']->content_slug)}}">{{$data["marca"]->content}}</a></li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if(!empty($data["marca"]->description))
            <div class="col-12 col-md col-lg-4 d-flex align-items-stretch">
                <div class="producto--info d-flex align-items-center" style="--bg: {{$data['marca']->color['color']}}; --txt: {{$data['marca']->color_text['color_text']}};"><div class="w-100">{!! $data["marca"]->description !!}</div></div>
            </div>
            @endif
            @php
            $style = "--bg: {$data['marca']->color['color']}; --txt: {$data['marca']->color_text['color_text']};";
            if(!$data["marca"]->only_colors || !empty($data["marca"]->logo))
                $style = "";
            @endphp
            <div class="col-12 col-md col-lg d-flex align-items-stretch">
                <div class="producto--info d-flex justify-content-between flex-column" style="{{$style}}">
                    <div class="w-100">
                        @if (empty($data["marca"]->logo))
                            <p class="producto--title producto--title__principal mb-0">{{ $data["marca"]->title }}</p>
                        @else
                            @include( 'layouts.general.image' , [ 'i' => $data["marca"]->logo , 'c' => 'producto--logo' , 'n' => $data["marca"]->title ] )
                        @endif
                        <div class="producto--resume">{!! $data["marca"]->resume !!}</div>
                    </div>
                    @if(!$data["marca"]->only_colors && !isset($data["colores"]))
                    <a class="button--colores" href="{{ URL::to($data['marca']->link() . '/' . $data['marca']->content_slug) }}">{{$data['marca']->content}}</a>
                    @endif
                </div>
            </div>
        </div>
        @if(!isset($data["colores"]))
            @if(!empty($data["marca"]->characteristics))
            <div class="row mt-4">
                <div class="col-12">
                    <div class="producto--info producto--characteristics">{!! $data["marca"]->characteristics !!}</div>
                </div>
            </div>
            @endif
            @if(!empty($data["marca"]->features))
            <div class="row mt-0">
                <div class="col-12">
                    <div class="producto--info" style="--bg: {{$data['marca']->color['color']}}; --txt: {{$data['marca']->color_text['color_text']}};">
                        <h3 class="producto--title">Otras características</h3>
                        {!! $data["marca"]->features !!}
                    </div>
                </div>
            </div>
            @endif
            @if(!empty($data["marca"]->advantage))
            <div class="row">
                @foreach($data["marca"]->advantage AS $a)
                <div class="col-12 col-md-4 col-lg-3 mt-5 d-flex align-items-stretch">
                    <div class="advantage shadow-sm w-100 d-flex align-items-center">
                        <div class="w-100">
                            @if (!empty($a["image"]))
                                @include( 'layouts.general.image' , [ 'i' => $a["image"] , 'c' => 'advantage--icon' , 'n' => ""] )
                            @endif
                            <p class="advantage--title">{{ $a["title"] }}</p>
                            @if(!empty($a["details"]))
                            <div class="advantage--details">{!! $a["details"] !!}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        @endif
        @if($data["marca"]->only_colors || isset($data["colores"]))
            <hr class="mt-5 mb-4">
            @if($data["productos"]->isNotEmpty())
            <div class="row mt-n4">
                @foreach($data["productos"] AS $p)
                <div class="col-12 col-md-4 col-lg-3 mt-5 d-flex align-items-stretch">
                    @include('page.parts.elemento', ['e' => $p])
                </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-12 justify-content-center d-flex">
                    {{ $data["productos"]->links() }}
                </div>
            </div>
            @endif
        @endif
    </div>
</div>