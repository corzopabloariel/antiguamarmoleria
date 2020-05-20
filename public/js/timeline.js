let timeline = document.getElementsByClassName( "timeline-cd" )[ 0 ];
if ( timeline !== undefined ) {
	let timeline_element = timeline.getElementsByClassName( "timeline-container" );
	let timline_verificar = ( x , index ) => {
		if( !x.classList.contains( "selected" ) ) {
			aux = timeline.getElementsByClassName( "selected" );
			aux_container = document.getElementById( "timeline-text" );
			aux_text = aux_container.getElementsByClassName( "selected" );
			text = aux_container.getElementsByClassName( "timeline-container" );
			aux[ 0 ].classList.remove( "selected" );
			aux_text[ 0 ].classList.remove( "selected" );
			x.classList.add( "selected" );
			text[ index ].classList.add( "selected" );
		}
	};
}