<div class="wrapper-home bg-white">
    @include( 'layouts.general.slider' , [ 'slider' => $data[ 'slider' ] , 'sliderID' => "slider" , 'div' => 1 , 'arrow' => 0] )
    @include( 'page.parts.home' , [ 'elementos' => $data[ 'contenido' ]->data, 'link' => 1] )
</div>