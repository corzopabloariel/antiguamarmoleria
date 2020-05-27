<div class="faq">
    <div class="banner d-flex align-items-stretch" style="--url: url({{asset(@$data['portada']->image['i'])}})">
        <div class="container d-flex">
            <h3 class="banner--title align-self-end"><span>Preguntas frecuentas</span></h3>
        </div>
    </div>
    <div class="py-5">
        <div class="container py-5">
            <div class="card-columns">
                @foreach($data["elementos"] as $e)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $e->title }}</h5>
                        <div class="card-text">{!! $e->resume !!}</div>
                    </div>
                    @include( 'layouts.general.image' , [ 'i' => $e->sliders , 'n' => "" , 'c' => 'card-img-top' ] )
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>