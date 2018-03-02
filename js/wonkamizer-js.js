( function() {
	"use strict";

	if ( document.querySelector('.home') ) {
		var slide_timer;
		timer_set();
		set_indicator_listeners();

	}
		
function set_indicator_listeners() {
	var indicator_select = document.querySelector( '.indicator-list' );
	indicator_select.addEventListener( 'click', function(e) {
		if ( e.target.nodeName == "SPAN") {
			var list = e.target.parentElement.classList.length;
			var parent_class = e.target.parentElement.classList.item( list - 1);
			var number = parent_class.charAt( parent_class.length - 1);
			slide_from_to( number );
		}
	});
}

function slide_from_to( number ) {
	clearTimeout(slide_timer);

	var w = window.innerWidth,
	rightScore = document.querySelector('.score-right'),
	leftScore = document.querySelector('.score-left'),
	content_areas = document.querySelectorAll( '.content-area' ),
	bg_container = document.getElementById( 'page' );

	rightScore.style.top="-85px";
	rightScore.style.transform="rotate(145deg)";
	rightScore.style.opacity=0;
	leftScore.style.top="85px";
	leftScore.style.transform="rotate(-145deg)";
	leftScore.style.opacity=0;
	for (var b = 0; b < content_areas.length; b++) {
		if ( content_areas[b].classList.contains( 'active' ) ) {
			content_areas[b].classList.remove( 'active' );
			content_areas[parseInt(number) - 1].classList.add( 'active' );
			break;
		}
	}
	var indicator_select = document.querySelectorAll( '.indicator-dot' );
	for (var v = 0; v < indicator_select.length; v++) {
		if ( indicator_select[v].classList.contains( 'active' ) ) {
			indicator_select[v].classList.remove( 'active' );
			indicator_select[parseInt(number) - 1].classList.add( 'active' );
			break;
		}
	}
	if (w < 768) {
		if (number == 3) {
			bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-m-"+number+".jpg');background-size: cover;background-position: center -150px;background-repeat: no-repeat;";
		} else {
			bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-m-"+number+".jpg');background-size: cover;background-position: center center;background-repeat: no-repeat;";
		}
	} else {
		if (number == 3) {
			bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-"+number+".jpg');background-size: cover;background-position: center center;background-repeat: no-repeat;";
		} else {
			bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-"+number+".jpg');background-size: cover;background-position: center center;background-repeat: no-repeat;";
		}
	}
	setTimeout( function(){rightScore.textContent=number;rightScore.style.opacity=1;rightScore.style.transform="rotate(0deg)";rightScore.style.top=0;},300);
	setTimeout( function(){leftScore.textContent=Math.floor(Math.random() * 4);leftScore.style.opacity=1;leftScore.style.transform="rotate(0deg)";leftScore.style.top=0;},300);
	timer_set();
}

function home_pages() {
	var w = window.innerWidth,
	rightScore = document.querySelector('.score-right'),
	leftScore = document.querySelector('.score-left'),
	content_areas = document.querySelectorAll( '.content-area' ),
	bg_container = document.getElementById( 'page' ),
	current_indicator,next_indicator,list_length,slide_number,next_number,
	current_slide,next_slide;

	rightScore.style.top="-85px";
	rightScore.style.transform="rotate(145deg)";
	rightScore.style.opacity=0;
	leftScore.style.top="85px";
	leftScore.style.transform="rotate(-145deg)";
	leftScore.style.opacity=0;
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
				if ( w < 768 ) {
					if (next_number == 3) {
						bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-m-"+next_number+".jpg');background-size: cover;background-position: center -150px;background-repeat: no-repeat;";
					} else {
						bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-m-"+next_number+".jpg');background-size: cover;background-position: center center;background-repeat: no-repeat;";
					}
				} else {
					if (next_number == 3) {
						bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-"+next_number+".jpg');background-size: cover;background-position: center center;background-repeat: no-repeat;";
					} else {
						bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-"+next_number+".jpg');background-size: cover;background-position: center center;background-repeat: no-repeat;";
					}
				}
			} else {
				next_slide = content_areas[i+1];
				next_number = parseInt(slide_number)+1;
				next_indicator = document.querySelector('.indicator-'+next_number+'>.indicator-dot');
				if ( w < 768 ) {
					if (next_number == 3) {
						bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-m-"+next_number+".jpg');background-size: cover;background-position: center -150px;background-repeat: no-repeat;";
					} else {
						bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-m-"+next_number+".jpg');background-size: cover;background-position: center center;background-repeat: no-repeat;";
					}
				} else {
					if (next_number == 3) {
						bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-"+next_number+".jpg');background-size: cover;background-position: center center;background-repeat: no-repeat;";
					} else {
						bg_container.style = "background: url('/wp-content/uploads/2018/02/slide-"+next_number+".jpg');background-size: cover;background-position: center center;background-repeat: no-repeat;";
					}
				}
			}

			next_indicator.classList.add('active');
			next_slide.classList.add('active');

			break;
		}
	}

	setTimeout( function(){rightScore.textContent=next_number;rightScore.style.opacity=1;rightScore.style.transform="rotate(0deg)";rightScore.style.top=0;},300);
	setTimeout( function(){leftScore.textContent=Math.floor(Math.random() * 4);leftScore.style.opacity=1;leftScore.style.transform="rotate(0deg)";leftScore.style.top=0;},300);
}

function timer_set() {
	slide_timer = setInterval( function() { home_pages(); }, 6000);
}
	
})();