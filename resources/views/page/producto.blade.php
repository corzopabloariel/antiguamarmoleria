@if(!empty($data["marca"]->sliders))
    @include('layouts.general.slider', ['slider' => $data["marca"]->sliders, 'sliderID' => "marca--slider" , 'div' => 1 , 'arrow' => 0, "class" => "marca--slider", "title" => $data['marca']->title])
@endif
<div class="productos pb-5 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb bread--pyrus">
                    @foreach($data["before"] AS $e)
                    <li class="breadcrumb-item"><a href="{{URL::to($e->link())}}">{{$e->title}}</a></li>
                    @if (strcmp($e->getTable(), "marcas") == 0)
                    <li class="breadcrumb-item"><a href="{{URL::to($e->link() . '/colores')}}">Colores</a></li>
                    @endif
                    @endforeach
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
                </div>
            </div>
        </div>
        @if($data["productos"]->isNotEmpty())
        <div class="row mt-n4">
            @foreach($data["productos"] AS $p)
            <div class="col-12 col-md-4 mt-5 d-flex align-items-stretch">
                <a @isset($data['colores']) href="{{ URL::to($p->link()) }}" @endisset class="producto--color producto--hover shadow-sm w-100  @if(empty($p->images)) d-flex @endif">
                    @if (!empty($p->images))
                        @include( 'layouts.general.image' , [ 'i' => $p->firstImage()["image"] , 'c' => 'producto--image producto--image__element' , 'n' => "", "in_div" => 1] )
                    @endif
                    <p class="producto--title producto--title__color @if(empty($p->images)) align-self-center @endif">{{ $p->title }}</p>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-12 justify-content-center d-flex">
                {{ $data["productos"]->links() }}
            </div>
        </div>
        @else
        <div class="row mt-5">
            <div class="col-12 col-md-6 d-flex align-items-center">
                <div class="w-100">
                    @include('layouts.general.slider', ['slider' => $data["producto"]->images, 'sliderID' => "producto--slider" , 'div' => 1 , 'arrow' => 0, 'class' => 'producto--image producto--image__element'])
                </div>
            </div>
            <div class="col-12 col-md-6">
                @if(!empty($data["producto"]->characteristics))
                    <h2 class="producto--title">{{ $data["producto"]->title }}</h2>
                    @foreach($data["producto"]->characteristics AS $characteristic)
                    <p class="producto--characteristic" style="--bg: {{$data['marca']->color['color']}}; --txt: {{$data['marca']->color_text['color_text']}};"><strong>{!! $characteristic["icon"] !!}{{ $characteristic["title"] }}</strong> {{ $characteristic["data"] }}</p>
                    @endforeach
                @endif
            </div>
        </div>
        @endif
    </div>
</div>