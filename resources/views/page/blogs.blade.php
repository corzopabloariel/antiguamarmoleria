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
                    @isset($data["categoria"])
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item breadcrumb--home"><a href="{{ URL::to( '/' ) }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('novedades')}}">Novedades</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$data["categoria"]->title}}</li>
                    </ol>
                    @endisset
                    <div class="row mt-n3">
                        @foreach( $data["elementos"]["novedades"] AS $b )
                            <div class="col-12 col-md-6 mt-3">
                            @include( 'page.parts.blog' , [ 'elemento' => $b , 'type' => 0 ] )
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 d-flex justify-content-center">{{ $data["elementos"]["novedades"]->links() }}</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    @include( 'page.parts.blog_lateral' )
                </div>
            </div>
        </div>
    </div>
</div>