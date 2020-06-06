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
                    <li class="breadcrumb-item"><a href="{{URL::to($e->link() . '/' . $e->content_slug)}}">{{$e->content}}</a></li>
                    @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                <button class="btn btn-warning text-uppercase d-block d-sm-none rounded-0 mb-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">marcas<i class="fas fa-sort-amount-down ml-2"></i></button>
                <div class="sidebar collapse bg-transparent dont-collapse-sm sticky-top" id="collapseExample">
                    <div class="sidebar">
                        @foreach ($data[ "lateral"] AS $marca)
                        <a class="p-3 menu--lateral" href="{{URL::to($marca->link())}}" style="--bg: {{$marca->color['color']}}; --txt: {{$marca->color_text['color_text']}};">{{$marca->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="row">
                    @if(!empty($data["marca"]->description))
                    <div class="col-12 col-md col-lg-5 d-flex align-items-stretch">
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
                @if(!empty($data["producto"]->description))
                    <div class="row mt-5">
                        <div class="col-12 col-md-6 d-flex align-items-center">
                            <div class="w-100">
                                @include('layouts.general.slider', ['slider' => $data["producto"]->images, 'sliderID' => "producto--slider" , 'div' => 1 , 'arrow' => 0, 'class' => 'producto--image producto--image__element producto--image__specific'])
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <h2 class="producto--title">{{ $data["producto"]->title }}</h2>
                            {!! $data["producto"]->description !!}
                        </div>
                    </div>
                    @if($data["productos"]->isNotEmpty())
                    <div class="row mt-n2">
                        @foreach($data["productos"] AS $p)
                        <div class="col-12 col-md-4 mt-5 d-flex align-items-stretch">
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
                @else
                    @if($data["productos"]->isNotEmpty())
                    <div class="row mt-n2">
                        @foreach($data["productos"] AS $p)
                        <div class="col-12 col-md-4 mt-5 d-flex align-items-stretch">
                            @include('page.parts.elemento', ['e' => $p])
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
                        @if (!empty($data["producto"]->images))
                        <div class="col-12 col-md d-flex align-items-center">
                            <div class="w-100">
                                @include('layouts.general.slider', ['slider' => $data["producto"]->images, 'sliderID' => "producto--slider" , 'div' => 1 , 'arrow' => 0, 'class' => 'producto--image producto--image__element'])
                            </div>
                        </div>
                        @endif
                        <div class="col-12 col-md">
                            @if(!empty($data["producto"]->characteristics))
                                <h2 class="producto--title">{{ $data["producto"]->title }}</h2>
                                @foreach($data["producto"]->characteristics AS $characteristic)
                                <p class="producto--characteristic" style="--bg: {{$data['marca']->color['color']}}; --txt: {{$data['marca']->color_text['color_text']}};"><strong>{!! $characteristic["icon"] !!}{{ $characteristic["title"] }}</strong> {{ $characteristic["data"] }}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @endif
                @endif
                @if (!empty($data["producto"]->relacion))
                <h3 class="title mt-4 mb-3">Relacionados</h3>
                <div class="row mt-n4">
                    @foreach ($data["producto"]->relacion AS $r)
                        @php
                        $relacion = App\Producto::find($r);
                        @endphp
                        <div class="col-12 col-md-4 mt-4 d-flex align-items-stretch">
                            @include('page.parts.elemento', ['e' => $relacion])
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>