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
var $=jQuery.noConflict();
/*------------------------------------*\
	#ON LOAD
\*------------------------------------*/


function runCycle(selector){
	$(selector).on( 'cycle-initialized cycle-after', function( event, opts ) {
		videoEnds('.cycle-slide-active .covervid-video' );
	});

	$(selector).cycle({
		'fx'               	: 'scrollHorz',
		'timeout'          	: 0,
		'swipe'				: true,
		'slides'           	: '.covervid-wrapper--wrapper',
		'youtube'          	: true,
		'log'				: false
	});

	toggleVideoPlay(selector);

}

function cycleNext(){
	$('.js-slideshow').cycle('next');
}

function runFitVids(selector){
	$(selector).fitVids();
}

function runFitText(selector, compress){
	$(selector).fitText(compress);
}

function runMCustomScrollbar(selector){
	$(selector).mCustomScrollbar({
		theme: "minimal"
	});
}

/**
 * Opens Modal
 * @param element
**/
function openModal(element){
	var aAbrir = element.data('modal');
	aAbrir = $('#modal-'+aAbrir+'.modal-wrapper' );
	aAbrir.removeClass('hide');
}

/**
 * Closes Modal
 * @param element to be closed
**/
function closeModal(element){
	$('.modal-wrapper').addClass('hide');
}



/*------------------------------------*\
	#Triggered events
\*------------------------------------*/

function isTop(){
	var scrollAmount = $(window).scrollTop();
	if ( scrollAmount <= 0 ){
		return true;
	}
	return false;
}

function toggleCover(toggled){

	if ( toggled ){
		showCover();
		showGrid();
		playVideo('.cycle-slide-active .covervid-video');
		return;
	}

	hideCover();
	hideGrid();
	pauseVideos('.covervid-wrapper--wrapper .covervid-video');
}

function showCover(){
	$('.cover').removeClass('closed');
}

function hideCover(){
	$('.cover').addClass('closed');
}

function showGrid(){
	$('.grid').removeClass('closed');
}

function hideGrid(){
	$('.grid').addClass('closed');
}


function toggleVideoPlay(selector){
	$(selector).on('cycle-after',function(e, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
		var active = $(incomingSlideEl);
		$('.covervid-wrapper--wrapper .covervid-video').each(function(){
			$(this)[0].pause();
		});
		playVideo('.cycle-slide-active .covervid-video');
	});
}

function pauseVideos(selector){
	$(selector).each(function(){
		$(this)[0].pause();
	});
}

function playVideo(selector){
	$(selector).get(0).play();

}

function videoEnds(selector){
	$(selector).each(function(){
		$(this).bind('ended', function(){
			cycleNext();
		});
	});
}

function existeHistoriaUsuario(facebookId){
	return 0;
}



/*------------------------------------*\
	#FACEBOOK RELATED
\*------------------------------------*/

function loginFacebook(){
	FB.login(function(response) {
		if (response.authResponse) {
			console.log('El usuario autorizó ingresar con Facebook...');
			FB.api('/me', function(response) {
				if( existeHistoriaUsuario() ) {
					console.log('el usuario actual ya envió una historia...');
					// mostrar leyenda... 
				}

				$('.js-nombre').val(response.name);
				$('.js-fb-id').val(response.id);
				console.log(response);
			});
		} else {
			console.log('El usuario canceló o no aceptó ingresar con Facebook...');
		}
	});
}


/*------------------------------------*\
	#AJAX
\*------------------------------------*/

function guardarHistoria(data_historia){
	$.post(
		ajax_url,
		data_historia,
		function(response){
			console.log(response);
		}
	);
}



/*------------------------------------*\
	#RESPONSIVE
\*------------------------------------*/