<div class="productos py-5">
    <div class="container">
        <div class="row">
            @if(!empty($data["marca"]->description))
            <div class="col-12 col-md-4 col-lg-4">
                <div class="producto--info" style="--bg: {{$data['marca']->color['color']}}; --txt: {{$data['marca']->color_text['color_text']}};">{!! $data["marca"]->description !!}</div>
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
        @if(!empty($data["marca"]->features))
        <div class="row mt-4">
            <div class="col-12">
                <div class="producto--info" style="--bg: {{$data['marca']->color['color']}}; --txt: {{$data['marca']->color_text['color_text']}};">
                    <h3 class="producto--title">Otras características</h3>
                    {!! $data["marca"]->features !!}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>