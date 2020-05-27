<div class="faq">
    <div class="banner d-flex align-items-stretch" style="--url: url({{asset(@$data['portada']->image['i'])}})">
        <div class="container d-flex">
            <h3 class="banner--title align-self-end"><span>Preguntas frecuentas</span></h3>
        </div>
    </div>
    <div class="py-5">
        <div class="container py-5">
            <div class="row mt-4n justify-content-center">
                @foreach($data["elementos"] as $e)
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                    <div class="card border-0 shadow">
                        @include( 'layouts.general.image' , [ 'i' => $e->sliders , 'n' => "" , 'c' => 'card-img-top' ] )
                        <div class="card-body">
                            <h5 class="card-title">{{ $e->title }}</h5>
                            <div class="card-text">{!! $e->resume !!}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>