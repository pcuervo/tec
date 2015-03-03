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
		'timeout'          	: 0,
		'swipe'				: true,
		'slides'           	: '>a,>img',
		'youtube'          	: true,
		'log'				: false
	});
}

function runFitVids(selector){
	$(selector).fitVids();
}

function runFitText(selector, compress){
	$(selector).fitText(compress);
}

/**
 * Opens Modal
 * @param element
**/
function openModal(element){
	var aAbrir = element.data('modal');
	console.log(aAbrir);
	aAbrir = $('#modal-'+aAbrir+'.modal-wrapper' );
	aAbrir.fadeIn('fast', function(){
		$(this).removeClass('hide');
	});
}

/**
 * Closes Modal
 * @param element to be closed
**/
function closeModal(element){
	var aCerrar = element.parent().parent();
	aCerrar.fadeOut('fast', function(){
		$(this).addClass('hide');
	});
}



/*------------------------------------*\
	#Triggered events
\*------------------------------------*/





/*------------------------------------*\
	#RESPONSIVE
\*------------------------------------*/