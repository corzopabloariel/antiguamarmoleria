<div class="wrapper-empresa bg-white">
    @include( 'layouts.general.slider' , [ 'slider' => $data[ 'slider' ] , 'sliderID' => "slider" , 'div' => 1 , 'arrow' => 0, 'idioma' => App::getLocale()] )
    @include( 'page.parts.empresa' , [ 'elemento' => $data[ 'contenido' ]->data, 'link' => 1] )
</div>