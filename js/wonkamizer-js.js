( function() {
	"use strict";

	if ( document.querySelector('.home') ) {
		var content_areas = document.querySelectorAll( '.content-area' ),
		bg_container = document.getElementById( 'backdrop-image' ),
		indicator_select = document.querySelectorAll( '.indicator-dot' ),
		current_indicator,
		next_indicator,
		list_length,
		slide_number,
		next_number,
		current_slide,
		next_slide,
		parent_class,
		slide_timer;

		timer_set();

	}
	
// function set_indicator_listeners() {
// 	indicator_select.onclick= function(){
// 		list_length = this.parentElement.classList.length;
// 		parent_class = this.parentElement.classList.item( list_length - 1);
// 		slide_number = parent_class.charAt( parent_class.length - 1);
// 		slide_from_to( slide_number );
// 	};
// }

// function slide_from_to( number=null ) {
// 	clearTimeout(slide_timer);
// 	for (var b = 0; b < content_areas.length; b++) {
// 		if ( content_areas[b].classList.contains( 'active' ) ) {
// 			content_areas[b].classList.remove( 'active' );
// 			content_areas[parseInt(number) - 1].classList.add( 'active' );
// 			break;
// 		}
// 	}
// 	for (var v = 0; v < indicator_select.length; v++) {
// 		if ( indicator_select[v].classList.contains( 'active' ) ) {
// 			indicator_select[v].classList.remove( 'active' );
// 			indicator_select[parseInt(number) - 1].classList.add( 'active' );
// 			break;
// 		}
// 	}
// 	bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-"+number+".jpg');background-size: cover; background-position: center center";
// 	timer_set();
// }

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

function timer_set() {
	slide_timer = setInterval( function() { home_pages(); }, 6000);
}
	
})();