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
	// $(selector).on( 'cycle-initialized cycle-after', function( event, opts ) {
	// 	videoEnds('.cycle-slide-active .covervid-video' );
	// });

	$(selector).cycle({
		'fx'               	: 'scrollHorz',
		'timeout'          	: 0,
		'swipe'				: true,
		//'slides'           	: '.covervid-wrapper--wrapper',
		'youtube'          	: true,
		'log'				: false
	});

	//toggleVideoPlay(selector);

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
function openModal(type){
	aAbrir = $('#modal-'+type+'.modal-wrapper' );
	aAbrir.removeClass('hide');
}

/**
 * Closes Modal
 * @param element to be closed
**/
function closeModal(element){
	$('.modal-wrapper').addClass('hide');
	$('body').removeClass('body-modal');
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
	if ( scrollAmount <= 10 ){
		console.log(true);
		return true;
	}
	console.log(false);
	return false;
}

function toggleCover(toggled){

	if ( toggled ){
		showGrid();
		return;
	}
	hideGrid();
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

/**
* Scroll past the cover
**/
function scrollDown(positionElement){
	var position = $(positionElement).offset().top;
	position = position - $('header').height();
	$('html, body').animate({scrollTop: position}, 650);
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
		rules: {
			historia: {
				required: true,
				max: 60
			}
		},
		submitHandler:function(){
			switch(forma){
				case '.forma-tu-historia':
					guardarHistoria();
					break;
				default:
					form.submit();
			}
		}
	});
}

function radioIsSelected(forma){

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
	#FACEBOOK RELATED
\*------------------------------------*/

function loginFacebook(){
	FB.login(function(response) {
		var access_token = response.authResponse.accessToken;
		if (response.authResponse) {
			console.log('El usuario autorizó ingresar con Facebook...');
			FB.api('/me', function(response) {


				mostrarFotoPerfilHistoria(response.id, 50, 50);
				agregarFotoPerfilHistoria( response.id );
				$('.js-nombre').val(response.name);
				$('.js-fb-id').val(response.id);
				$('.js-fb-token').val(access_token);
				$('.step-1').addClass('hidden--xmall');
				$('.step-2').removeClass('hidden--xmall');

				existeHistoriaUsuario(response.id);
			});
		} else {
			console.log('El usuario canceló o no aceptó ingresar con Facebook...');
		}
	}, { scope: 'publish_actions, user_photos'});
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
				$('.forma-tu-historia').prepend( profile_pic );
			}
		}
	);

}// mostrarFotoPerfilHistoria

function agregarFotoPerfilHistoria( id ){

	FB.api(
		"/"+id+"/picture",
		{
			"redirect": false,
			"height": 600,
			"width": 600,
			"type": "large"
		},
		function (response) {
			if (response && !response.error) {
				$('.js-fb-profile-pic').val( response.data.url );
			}
		}
	);

}// agregarFotoPerfilHistoria

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
				$('.js-profile-pic').empty();
				var profile_pic = '<img src="'+response.data.url+'" />';
				$('.js-profile-pic').prepend(profile_pic);
			}
		}
	);
}

var selector, logActivity, callbackAlbumSelected, callbackPhotoUnselected, callbackSubmit;
var buttonOK = $('#CSPhotoSelector_buttonOK');
var o = this;


/* --------------------------------------------------------------------
 * Photo selector functions
 * ----------------------------------------------------------------- */

fbphotoSelect = function(id) {
	// if no user/friend id is sent, default to current user
	if (!id) id = 'me';

	callbackAlbumSelected = function(albumId) {
		var album, name;
		album = CSPhotoSelector.getAlbumById(albumId);
		// show album photos
		selector.showPhotoSelector(null, album.id);
	};

	callbackAlbumUnselected = function(albumId) {
		var album, name;
		album = CSPhotoSelector.getAlbumById(albumId);
	};

	callbackPhotoSelected = function(photoId) {
		var photo;
		photo = CSPhotoSelector.getPhotoById(photoId);
		buttonOK.show();
		logActivity('Selected ID: ' + photo.id);
	};

	callbackPhotoUnselected = function(photoId) {
		var photo;
		album = CSPhotoSelector.getPhotoById(photoId);
		buttonOK.hide();
	};

	callbackSubmit = function(photoId) {
		var photo;
		photo = CSPhotoSelector.getPhotoById(photoId);
		logActivity('<br><strong>Submitted</strong><br> Photo ID: ' + photo.id + '<br>Photo URL: ' + photo.source + '<br>');
	};


	// Initialise the Photo Selector with options that will apply to all instances
	CSPhotoSelector.init({debug: true});

	// Create Photo Selector instances
	selector = CSPhotoSelector.newInstance({
		callbackAlbumSelected	: callbackAlbumSelected,
		callbackAlbumUnselected	: callbackAlbumUnselected,
		callbackPhotoSelected	: callbackPhotoSelected,
		callbackPhotoUnselected	: callbackPhotoUnselected,
		callbackSubmit			: callbackSubmit,
		maxSelection			: 1,
		albumsPerPage			: 6,
		photosPerPage			: 200,
		autoDeselection			: true
	});

	// reset and show album selector
	selector.reset();
	selector.showAlbumSelector(id);
}

function getFacebookAlbums(facebook_id){

	FB.api(
		"/"+facebook_id+"/albums",
		function (response) {
			$.each( response.data, function( i, album_data ) {
				var album_id = album_data.id;
				var album_name = album_data.name;
				var album_cover_id = album_data.cover_photo;

				showAlbumInfo( album_id, album_name, album_cover_id );
			});
		}
	);

}// getFacebookAlbums

function showAlbumInfo( id, name, cover_id ){

	// Get the album cover picture
	FB.api(
		"/"+id+"/picture",
		function ( album_response ) {
			var cover_url = album_response.data.url;
			html_album = getAlbumHTML( id, name, cover_url );
			$('.js-facebook-albums-container').append( html_album ).addClass('open');
		}
	);

}// showAlbumInfo

function getAlbumHTML( id, name, url ){

	album_html = ' <div data-id="' + id + '"><img src="' + url + '" /><h3>' + name + '</h3></div>';
	return album_html;

}// getAlbumHTML

function getAlbumsId(album_data){

	var ids = [];
	$.each(album_data, function(i, album){
		ids.push(album.id)
	});
	return ids;

}// getAlbumsId

function getAlbumPhotos( album_id ){

	var album_photos = [];
	FB.api(
		"/"+album_id+"/photos",
		function (response) {
			if (response && !response.error) {
				var current_album_photos = [];
				current_album_photos = addPhoto(response.data);
			}
		}
	);

}// getAlbumPhotos

function addPhoto( album_photos_data ){
	$('.js-facebook-photos-container > div').remove();
	var photo_urls = [];
	$.each(album_photos_data, function(i, photo){
		var photo_html = '<div class="[ margin-bottom--small ]"><img src="' + photo.source + '" class="[ fb-photo ]" /><div>';
		$('.js-fb-photo-url').val( photo.source );
		$('.js-facebook-photos-container').append( photo_html ).addClass('open');
	});

}// addPhoto

function postToWall(user_token, message){
	FB.api(
	    "/me/feed",
	    "POST",
	    {
	        "message": message,
	        access_token: user_token
	    },
	    function (response) {
	      if (response && !response.error) {
	        /* handle the result */
	      }
	      console.log(response);
	    }
	);
}

function shareOnFacebook(url){
	FB.ui(
		{
			method: 'share',
			href: 'url',
		},
		function(response) {
			if (response && !response.error_code) {
				//console.log(response);
			} else {
				//console.log(response.error_code);
			}
		}
	);
}// shareOnFacebook


/*------------------------------------*\
	#AJAX
\*------------------------------------*/

function guardarHistoria(){
	var data_historia = $('.forma-tu-historia').serializeArray();

	$.post(
		ajax_url,
		data_historia,
		function(response){
			var mensaje = $('textarea[name="historia"]').val();
			$('.step-2').addClass('hidden--xmall');
			$('.step-3').removeClass('hidden--xmall');
		}
	);

}

function insertPostContent( id ){

	var data = {};
	data['action'] = 'get_post_meta_content';
	data['post_id'] = id;
	$.post(
		ajax_url,
		data,
		function(response){

			var json_posts = $.parseJSON(response);
			var html_resultados;
			var num_posts = -1;

			// mostrarFotoPerfilSingle(json_posts.meta_content.fb_id, 150, 150);
			$('#modal-historia h2').text(json_posts.meta_content.titulo);
			$('#modal-historia .js-nombre').text(json_posts.meta_content.nombre);
			$('#modal-historia .js-puesto').text(json_posts.meta_content.puesto);
			$('#modal-historia .js-generacion').text('Generación '+json_posts.meta_content.generacion);
			$('#modal-historia .js-campus').text('Campus '+json_posts.meta_content.campus);
			$('#modal-historia .js-nombre').text(json_posts.meta_content.nombre);
			$('#modal-historia .js-profile-pic img').attr('src', json_posts.meta_content.profile_pic);
			$('#modal-historia .js-historia p').text(json_posts.meta_content.historia);

			if ( json_posts.meta_content.facebook_img !== '' ){
				$('#modal-historia .js-facebook-pic img').attr('src', json_posts.meta_content.facebook_img);
			}

		}
	);

}// insertPostContent

function existeHistoriaUsuario(facebookId){
	var data = {};
	data['action'] = 'tiene_historia';
	data['facebook_id'] = facebookId;

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