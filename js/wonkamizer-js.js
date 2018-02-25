( function() {
	"use strict";

	/*if ( document.querySelector('.home') ) {
		var content_areas = document.querySelectorAll( '.content-area' ),
		bg_container = document.getElementById( 'backdrop-image' ),
		current_indicator,
		next_indicator,
		list_length,
		slide_number,
		next_number,
		current_slide,
		next_slide,
		slide_timer;

		slide_timer = setInterval( function() { home_pages(); }, 6000);

	}*/

function home_pages() {
	for (var i = 0; i < content_areas.length; i++) {
		if ( content_areas[i].classList.contains( 'active' ) ) {
			list_length = content_areas[i].classList.length;
			current_slide = content_areas[i].classList.item( list_length - 2 );
			slide_number = current_slide.charAt( current_slide.length - 1 );
			content_areas[i].classList.remove( 'active' );
			current_indicator = document.querySelector('.indicator-'+slide_number+'>.indicator-dot');
			current_indicator.classList.remove( 'active' );
			if ( i === content_areas.length - 1 ) {
				next_slide = content_areas[0];
				next_number = 1;
				next_indicator = document.querySelector('.indicator-1>.indicator-dot');
				bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-"+next_number+".jpg');background-size: cover; background-position: center center";
			} else {
				next_slide = content_areas[i+1];
				next_number = parseInt(slide_number)+1;
				next_indicator = document.querySelector('.indicator-'+next_number+'>.indicator-dot');
				bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-"+next_number+".jpg');background-size: cover; background-position: center center";
			}

			next_indicator.classList.add('active');
			next_slide.classList.add('active');
			break;
		}
	}
}
	
})();