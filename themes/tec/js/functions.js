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

/**
 * Opens Search
 * @param element
**/
function openSearch(){
	$('.search-form--wrapper' ).addClass('opened');
}

/**
 * Closes Search
 * @param element to be closed
**/
function closeSearch(){
	$('.search-form--wrapper' ).removeClass('opened');
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
		if ( $('#modal-historia').hasClass('hide') ){
			playVideo('.cycle-slide-active .covervid-video');
		}
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

function formValidation(forma){
	$(forma).validate({
		submitHandler:function(){
			switch(forma){
				case '.forma-tu-historia':
					guardarHistoria();
					break;
			}
		}
	});
}



/*------------------------------------*\
	#FACEBOOK RELATED
\*------------------------------------*/

function loginFacebook(){
	FB.login(function(response) {
		if (response.authResponse) {
			console.log('El usuario autorizó ingresar con Facebook...');
			FB.api('/me', function(response) {

				mostrarFotoPerfilHistoria(response.id, 50, 50);
				$('.js-nombre').val(response.name);
				$('.js-fb-id').val(response.id);
				$('.step-1').addClass('hidden--xmall');
				$('.step-2').removeClass('hidden--xmall');

				existeHistoriaUsuario(response.id);
			});
		} else {
			console.log('El usuario canceló o no aceptó ingresar con Facebook...');
		}
	}, { scope: 'public_profile, publish_actions'});
}

function mostrarFotoPerfilHistoria(id, width, height){
	FB.api(
		"/"+id+"/picture",
		{
			"redirect": false,
			"height": height,
			"width": width,
			"type": "normal"
		},
		function (response) {
			if (response && !response.error) {
				var profile_pic = '<img src="'+response.data.url+'" />';
				$('.forma-tu-historia').prepend(profile_pic);
			}
		}
	);
}

function mostrarFotoPerfilSingle(id, width, height){

	FB.api(
		"/"+id+"/picture",
		{
			"redirect": false,
			"height": height,
			"width": width,
			"type": "normal"
		},
		function (response) {
			if (response && !response.error) {
				var profile_pic = '<img src="'+response.data.url+'" />';
				console.log(profile_pic);
				$('.js-profile-pic').prepend(profile_pic);
			}
		}
	);
}

function radioIsSelected(forma){
	console.log(forma);
	if ( $(forma+" input[name='radio-search']:checked").val() == 'nombre'){
		$('.search-field').hide();
		$('.search-field input, .search-field select').removeClass('required');
		$('.js-search-nombre').show();
		$('.js-search-nombre input').addClass('required');
		$('.js-search-submit').show();
	} else if ( $(forma+" input[name='radio-search']:checked").val() == 'campus'){
		$('.search-field').hide();
		$('.search-field input, .search-field select').removeClass('required');
		$('.js-search-campus').show();
		$('.js-search-campus select').addClass('required');
		$('.js-search-submit').show();
	} else if ( $(forma+" input[name='radio-search']:checked").val() == 'generacion'){
		$('.search-field').hide();
		$('.search-field input, .search-field select').removeClass('required');
		$('.js-search-generacion').show();
		$('.js-search-generacion select').addClass('required');
		$('.js-search-submit').show();
	}
}



/*------------------------------------*\
	#AJAX
\*------------------------------------*/

function guardarHistoria(){
	var data_historia = $('.forma-tu-historia').serializeArray();
	//console.log(data_historia);
	$.post(
		ajax_url,
		data_historia,
		function(response){
			//console.log(response);
			$('.step-2').addClass('hidden--xmall');
			$('.step-3').removeClass('hidden--xmall');
		}
	);
}

function insertPostContent(element){
	var post_id = $(element).data('id');
	var data = {};
	data['action'] = 'get_post_meta_content';
	data['post_id'] = post_id;
	$.post(
		ajax_url,
		data,
		function(response){
			console.log(response);
			var json_posts = $.parseJSON(response);
			var html_resultados;
			var num_posts = -1;

			console.log(json_posts.meta_content.fb_id);
			mostrarFotoPerfilSingle(json_posts.meta_content.fb_id, 150, 150);
			$('#modal-historia h2').text(json_posts.meta_content.titulo);
			$('#modal-historia .js-nombre').text(json_posts.meta_content.nombre);
			$('#modal-historia .js-puesto').text(json_posts.meta_content.puesto);
			$('#modal-historia .js-generacion').text(json_posts.meta_content.generacion);
			$('#modal-historia .js-nombre').text(json_posts.meta_content.nombre);
			$('#modal-historia .js-imagen').text(json_posts.meta_content.imagen);
			$('#modal-historia .js-historia').text(json_posts.meta_content.historia);

		}
	);
}

function existeHistoriaUsuario(facebookId){
	var data = {};
	data['action'] = 'tiene_historia';
	data['facebook_id'] = facebookId;
	console.log(facebookId);

	$.ajax({
        async: false,
        type: 'post',
        url: ajax_url,
        data: data,
        success: function(response) {
        	if(response == '1') {
	        	$('.step-2').addClass('hidden--xmall');
				$('.step-4').removeClass('hidden--xmall');
			}
        },
    });
	
}// existeHistoriaUsuario

/*------------------------------------*\
	#RESPONSIVE
\*------------------------------------*/