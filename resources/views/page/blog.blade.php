<div class="encabezado py-5">
    <div class="container">
        <h2 class="title--important">{{ $data[ 'blog' ]->titulo }}</h2>
    </div>
</div>
<div class="blogs pb-5 pt-3">
    <div class="container">
        <ol class="breadcrumb bg-transparent border-0 p-0 m-0">
            <li class="breadcrumb-item breadcrumb--home"><a href="{{ URL::to( '/' ) }}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ URL::to( '/novedades' ) }}">Novedades</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $data[ 'blog' ]->titulo }}</li>
        </ol>
        <div class="row">
            <div class="col-12 col-md blog">
                @include( 'layouts.general.image' , [ 'i' => $data[ 'blog' ]->image , 'n' => $data[ 'blog' ]->titulo , 'c' => 'blog--image' ] )
                <h3 class="title-simple mt-3">{{ $data[ 'blog' ]->titulo }}</h3>
                <div class="mt-2 blog--descripcion">{!! $data[ 'blog' ]->data !!}</div>
            </div>
        </div>
    </div>
</div>