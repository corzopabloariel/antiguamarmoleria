<div class="productos py-5">
    <div class="container">
        <div class="row">
            @if(!empty($data["marca"]->description))
            <div class="col-12 col-md col-lg-4 d-flex align-items-stretch">
                <div class="producto--info d-flex align-items-center" style="--bg: {{$data['marca']->color['color']}}; --txt: {{$data['marca']->color_text['color_text']}};"><div class="w-100">{!! $data["marca"]->description !!}</div></div>
            </div>
            @endif
            <div class="col-12 col-md col-lg">
                <div class="producto--info">
                    @if (empty($data["marca"]->logo))
                        <p class="producto--title producto--title__principal">{{ $data["marca"]->title }}</p>
                    @else
                        @include( 'layouts.general.image' , [ 'i' => $data["marca"]->logo , 'c' => 'producto--logo' , 'n' => $data["marca"]->title ] )
                    @endif
                    <div class="producto--resume">{!! $data["marca"]->resume !!}</div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                @if(!empty($data["marca"]->characteristics))
                <div class="producto--info producto--characteristics">{!! $data["marca"]->characteristics !!}</div>
                @endif
            </div>
        </div>
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
    </div>
</div>