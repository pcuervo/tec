(function($){
	"use strict";
	$(function(){

		/*------------------------------------*\
			#ON LOAD
		\*------------------------------------*/





		/*------------------------------------*\
			#Triggered events
		\*------------------------------------*/




		/*------------------------------------*\
			#RESPONSIVE
		\*------------------------------------*/

	});
})(jQuery);

/*------------------------------------*\
	#ON LOAD
\*------------------------------------*/


function runCycle(selector){
	$(selector).cycle({
		'fx'               	: 'scrollHorz',
		//'timeout'          	: 0,
		'swipe'				: true,
		'prev'             	: '.cycle-prev',
		'next'             	: '.cycle-next',
		'slides'           	: '>a,>img',
		'youtube'          	: true,
		'log'				: true
	});
}

function runFitVids(selector){
	$(selector).fitVids();
}




/*------------------------------------*\
	#Triggered events
\*------------------------------------*/





/*------------------------------------*\
	#RESPONSIVE
\*------------------------------------*/