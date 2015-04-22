<?php


// DEFINIR LOS PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ///////////////////////////



	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );
	define( 'THEMEPATH', get_template_directory_uri() . '/' );
	define( 'SITEURL', site_url('/') );



// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////



	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script( 'functions', 'site_url', site_url('/') );

		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );

	});

// FRONT END SCRIPTS FOOTER //////////////////////////////////////////////////////
	function footerScripts(){
		if( wp_script_is( 'functions', 'done' ) ) {

			/*------------------------------------*\
			    #HOME
			\*------------------------------------*/
			if ( is_home() ) { ?>
				<script type="text/javascript">
					(function( $ ) {
						"use strict";
						$(function(){

							$('.js-facebook-photos').on('click', function(e){
								e.preventDefault();
								//$('.js-facebook-albums-container').addClass('open');
								var facebook_id = $('.js-fb-id').val();
								//fbphotoSelect(facebook_id);
								getFacebookAlbums( facebook_id );
							});

						});
					}(jQuery));
				</script>
			<?php } ?>

			<!-- /**********************************\ -->
			<!-- #GLOBAL -->
			<!-- \**********************************/ -->
			<script type="text/javascript">
				(function( $ ) {
					"use strict";
					$(function(){
						/*------------------------------------*\
							#ON LOAD
						\*------------------------------------*/
						<?php global $id_historia_usuario; ?>
						var test_app_id = '706805166104322';
						var prod_app_id = '706804956104343'
						window.fbAsyncInit = function() {
							FB.init({
								appId	: prod_app_id,
								xfbml	: true,
								version : 'v2.2'
							});
						};
						(function(d, s, id){
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) {return;}
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/en_US/sdk.js";
							fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));

						runCycle('.js-slideshow');
						runMCustomScrollbar('.modal#modal-form');

						$('body').formplate();
						$('.forma-tu-historia input[type=file]').nicefileinput({
							label : 'Agregar imagen a mi historia'
						});

						radioIsSelected('.search-form');


						<?php if ($id_historia_usuario != '') { ?>
							openModal( 'historia' );
							insertPostContent( <?php echo $id_historia_usuario; ?> );
						<?php } ?>





						/*------------------------------------*\
							#Triggered events
						\*------------------------------------*/


						$('.js-open-modal').on('click', function(){
							var modalType = $(this).data('modal');
							openModal( modalType );
							$('body').toggleClass('body-modal');
						});
						$('.grid .js-open-modal').on('click', function(){
							var id = $(this).data('id');
							insertPostContent( id );
						});
						$('.modal-wrapper .js-close').on('click', function(){
							clearModalStory();
							closeModal( $(this) );
						});

						$('.js-open-search').on('click', function(){
							openSearch();
						});
						$('.js-close-search').on('click', function(){
							closeSearch();
						});

						$('.scroll-down').on('click', function(e){
							e.preventDefault();
							scrollDown('.grid');
						});

						$('.bg-facebook').on('click', function(e){
							e.preventDefault();
							loginFacebook();
						});

						$('.js-facebook-albums-container').on('click', 'div', function(e){
							e.preventDefault();

							var album_id = $(this).data('id');
							$('.js-facebook-photos-container img').remove();
							getAlbumPhotos( album_id );
							$('.js-facebook-photos-container').addClass('open');
							$('.js-facebook-albums-container').removeClass('open');

						});

						$('.js-regresar-forma').on('click', function( e ){
							e.preventDefault();
							$('.js-facebook-photos-container').removeClass('open');
							$('.js-facebook-albums-container').removeClass('open');
						});

						$('.js-regresar-albumes').on('click', function( e ){
							e.preventDefault();
							$('.js-facebook-photos-container').removeClass('open');
							$('.js-facebook-albums-container').addClass('open');
						});

						$('.js-facebook-photos-container').on('click', '.fb-photo', function(e){
							e.preventDefault();

							$('.js-facebook-photos-container').removeClass('open');
							var selected_photo_url = $(this).attr('src');
							$('.js-fb-selected-photo').attr('src', selected_photo_url);
							$('.js-fb-photo-url').val(selected_photo_url);
							$('.js-fb-selected-photo').addClass('open');
						});

						formValidation('.forma-tu-historia');
						formValidation('.search-form');

						$('.search-form input[name="radio-search"]').change(function() {
							radioIsSelected('.search-form');
						});

						$('.js-share-fb').click(function(e){
							e.preventDefault();

							var postID = $(this).closest('article').data('id');
							shareOnFacebook( site_url + '?u=' + postID );
						});









						/*------------------------------------*\
							#RESPONSIVE
						\*------------------------------------*/
						$(window).resize(function(){

						});
					});
				}(jQuery));
			</script>
		<?php }
		}
	add_action( 'wp_footer', 'footerScripts', 21 );


	function admin_footer_scripts() {
	?>
		<script type="text/javascript">
			(function( $ ) {
				"use strict";
				$(function(){

						var test_app_id = '706805166104322';
						var prod_app_id = '706804956104343'
						window.fbAsyncInit = function() {
							FB.init({
								appId	: prod_app_id,
								xfbml	: true,
								version : 'v2.2'
							});

							// Post to Facebook
							if( typeof fb_access_token !== 'undefined' && typeof fb_user_id !== 'undefined' ){
								console.log('posting to wall...');
								var story_link = site_url + '?u=' + user_story_id;
								console.log( story_link );
								postToWall( fb_user_id, fb_access_token, user_quote, story_link );
							}

						};
						(function(d, s, id){
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) {return;}
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/en_US/sdk.js";
							fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));

				});
			}(jQuery));
		</script>
	<?php
	}
	add_action('admin_footer', 'admin_footer_scripts');


// ADMIN SCRIPTS AND STYLES //////////////////////////////////////////////////////////



	add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'admin-js', JSPATH.'admin.js', array('jquery'), '1.0', true );

		// localize scripts
		wp_localize_script( 'admin-js', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script( 'admin-js', 'site_url', site_url('/') );

		// styles
		wp_enqueue_style( 'admin-css', CSSPATH.'admin.css' );

	});



// FRONT PAGE DISPLAYS A STATIC PAGE /////////////////////////////////////////////////



	/*add_action( 'after_setup_theme', function () {

		$frontPage = get_page_by_path('home', OBJECT);
		$blogPage  = get_page_by_path('blog', OBJECT);

		if ( $frontPage AND $blogPage ){
			update_option('show_on_front', 'page');
			update_option('page_on_front', $frontPage->ID);
			update_option('page_for_posts', $blogPage->ID);
		}
	});*/



// REMOVE ADMIN BAR FOR NON ADMINS ///////////////////////////////////////////////////



	add_filter( 'show_admin_bar', function($content){
		return ( current_user_can('administrator') ) ? $content : false;
	});



// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////



	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="http://pcuervo.com">Pequeño Cuervo</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});



// POST THUMBNAILS SUPPORT ///////////////////////////////////////////////////////////



	if ( function_exists('add_theme_support') ){
		add_theme_support('post-thumbnails');
	}

	if ( function_exists('add_image_size') ){

		// add_image_size( 'size_name', 200, 200, true );

		// cambiar el tamaño del thumbnail
		/*
		update_option( 'thumbnail_size_h', 100 );
		update_option( 'thumbnail_size_w', 200 );
		update_option( 'thumbnail_crop', false );
		*/
	}



// POST TYPES, METABOXES, TAXONOMIES AND CUSTOM PAGES ////////////////////////////////



	require_once('inc/post-types.php');


	require_once('inc/metaboxes.php');


	require_once('inc/taxonomies.php');


	require_once('inc/pages.php');


	require_once('inc/users.php');



// MODIFICAR EL MAIN QUERY ///////////////////////////////////////////////////////////



	add_action( 'pre_get_posts', function($query){

		if ( $query->is_main_query() and ! is_admin() ) {

		}
		return $query;

	});



// THE EXECRPT FORMAT AND LENGTH /////////////////////////////////////////////////////



	/*add_filter('excerpt_length', function($length){
		return 20;
	});*/


	/*add_filter('excerpt_more', function(){
		return ' &raquo;';
	});*/



// REMOVE ACCENTS AND THE LETTER Ñ FROM FILE NAMES ///////////////////////////////////



	add_filter( 'sanitize_file_name', function ($filename) {
		$filename = str_replace('ñ', 'n', $filename);
		return remove_accents($filename);
	});



// HELPER METHODS AND FUNCTIONS //////////////////////////////////////////////////////

	show_admin_bar(false);

	/**
	 * Print the <title> tag based on what is being viewed.
	 * @return string
	 */
	function print_title(){
		global $page, $paged;

		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		// Add a page number if necessary
		if ( $paged >= 2 || $page >= 2 ){
			echo ' | ' . sprintf( __( 'Página %s' ), max( $paged, $page ) );
		}
	}



	/**
	 * Imprime una lista separada por commas de todos los terms asociados al post id especificado
	 * los terms pertenecen a la taxonomia especificada. Default: Category
	 *
	 * @param  int     $post_id
	 * @param  string  $taxonomy
	 * @return string
	 */
	function print_the_terms($post_id, $taxonomy = 'category'){
		$terms = get_the_terms( $post_id, $taxonomy );

		if ( $terms and ! is_wp_error($terms) ){
			$names = wp_list_pluck($terms ,'name');
			echo implode(', ', $names);
		}
	}



	/**
	 * Regresa la url del attachment especificado
	 * @param  int     $post_id
	 * @param  string  $size
	 * @return string  url de la imagen
	 */
	function attachment_image_url($post_id, $size){
		$image_id   = get_post_thumbnail_id($post_id);
		$image_data = wp_get_attachment_image_src($image_id, $size, true);
		echo isset($image_data[0]) ? $image_data[0] : '';
	}



	/**
	 * Imprime active si el string coincide con la pagina que se esta mostrando
	 * @param  string $string
	 * @return string
	 */
	function nav_is($string = ''){
		$query = get_queried_object();

		if( isset($query->slug) AND preg_match("/$string/i", $query->slug)
			OR isset($query->name) AND preg_match("/$string/i", $query->name)
			OR isset($query->rewrite) AND preg_match("/$string/i", $query->rewrite['slug'])
			OR isset($query->post_title) AND preg_match("/$string/i", remove_accents(str_replace(' ', '-', $query->post_title) ) ) )
			echo 'active';
	}

	/**
	 * Regresa los posts que coincidan con la búsqueda.
	 * @param  string $type - Tipo de búsqueda (nombre, generación, campus)
	 * @param  string $value - Valor buscado
	 * @return array $posts - ID de los posts encontrados o vacío
	 */
	function get_search_results( $type, $value ){
		global $wpdb;

		$query = " SELECT DISTINCT ID FROM wp_posts P INNER JOIN wp_postmeta PM ON PM.post_id = P.id";
		switch ( $type ) {
			case 'nombre':
				$query .= "
					WHERE meta_key = '_detalles_nombre_meta'
					AND meta_value LIKE '%$value%'";
				break;
			case 'generación':
				$query .= "
					WHERE meta_key = '_detalles_generacion_meta'
					AND meta_value = '$value'";
				break;
			case 'campus':
				$query .= "
					WHERE meta_key = '_detalles_campus_meta'
					AND meta_value = '$value'";
				break;
		}// switch

		$query .= " AND post_status = 'publish'";
		//echo $query;
		$results = $wpdb->get_results( $query );
		return $results;

	}// get_search_results



// AJAX REQUESTS //////////////////////////////////////////////////////



	/**
	 * Guarda la historia del usuario como un post con status 'Unpublish'
	 */
	function guardar_historia(){
		$nombre = $_POST['nombre'];
		$campus = $_POST['campus'];
		$generacion = $_POST['generacion'];
		$historia = $_POST['historia'];
		$titulo = $_POST['titulo'];
		$puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : '';
		$publicar_fb = (isset($_POST['acepto'])) ? $_POST['acepto'] : 'false';
		$facebook_id = $_POST['id'];
		$fb_access_token = $_POST['access_token'];
		$fb_profile_pic = $_POST['fb_profile_pic'];
		$fb_photo_url = ( isset( $_POST['fb_photo_url'] ) ) ? $_POST['fb_photo_url'] : '';

		// Production
		$app_id = '706804956104343';
		$app_secret = 'feecdd018148235ccb42e3f114c85e36';

		// Test
		// $app_id = '706805166104322';
		// $app_secret = '6cf91ae86165bf49a1c08cce1132906f';

		$post_historia = array(
			'post_title'    => $titulo,
			'post_content'  => $historia,
			'post_status'   => 'draft',
			'post_author'   => 1,
		);
		$post_id = wp_insert_post( $post_historia );

		// Solicitar token extendido de Facebook
		$token_url = "https://graph.facebook.com/oauth/access_token?client_id=". $app_id ."&client_secret=". $app_secret ."&grant_type=fb_exchange_token&fb_exchange_token=". $fb_access_token;
	    $token_response = file_get_contents($token_url);
		$params = null;
		parse_str($token_response, $params);

		// Agregar metadata
		add_post_meta( $post_id, '_detalles_nombre_meta', $nombre, false ) || update_post_meta( $post_id, '_detalles_nombre_meta', $nombre );
		add_post_meta( $post_id, '_detalles_puesto_meta', $puesto, false ) || update_post_meta( $post_id, '_detalles_puesto_meta', $puesto );
		add_post_meta( $post_id, '_detalles_generacion_meta', $generacion, false ) || update_post_meta( $post_id, '_detalles_generacion_meta', $generacion );
		add_post_meta( $post_id, '_detalles_campus_meta', $campus, false ) || update_post_meta( $post_id, '_detalles_campus_meta', $campus );
		add_post_meta( $post_id, '_detalles_fbid_meta', $facebook_id, false ) || update_post_meta( $post_id, '_detalles_fbid_meta', $facebook_id );
		add_post_meta( $post_id, '_detalles_publicar_fb_meta', $publicar_fb, false ) || update_post_meta( $post_id, '_detalles_publicar_fb_meta', $publicar_fb );
		add_post_meta( $post_id, '_extended_fb_token_meta', $params['access_token'], false ) || update_post_meta( $post_id, '_extended_fb_token_meta', $params['access_token'] );
		add_post_meta( $post_id, '_fb_photo_url_meta', $fb_photo_url, false ) || update_post_meta( $post_id, '_fb_photo_url_meta', $fb_photo_url );
		add_post_meta( $post_id, '_fb_profile_pic_meta', $fb_profile_pic, false ) || update_post_meta( $post_id, '_fb_profile_pic_meta', $fb_profile_pic );

		$msg = array(
			'error'	=> 0,
			'msg'	=> 'Se ha guardado la información de la historia.',
			);
		echo json_encode($msg, JSON_FORCE_OBJECT);
		exit();
	} // get_descripcion_coleccion
	add_action("wp_ajax_guardar_historia", "guardar_historia");
	add_action("wp_ajax_nopriv_guardar_historia", "guardar_historia");

	/**
	 * Sacar información de un post a partir de un ID
	 */
	function get_post_meta_content(){

		$post_id = $_POST['post_id'];
		$post = get_post($post_id);

		// Get metadata
		$puesto     	= get_post_meta($post_id, '_detalles_puesto_meta', true);
		$nombre     	= get_post_meta($post_id, '_detalles_nombre_meta', true);
		$generacion 	= get_post_meta($post_id, '_detalles_generacion_meta', true);
		$campus 		= get_post_meta($post_id, '_detalles_campus_meta', true);
		$facebook_id 	= get_post_meta($post_id, '_detalles_fbid_meta', true);
		$facebook_img 	= get_post_meta($post_id, '_fb_photo_url_meta', true);
		$fb_profile_pic = get_post_meta($post_id, '_fb_profile_pic_meta', true);
		$titulo     	= $post->post_title;
		$content 		= $post->post_content;

		$post_content['meta_content'] = array(
			'puesto'		=> $puesto,
			'nombre'		=> $nombre,
			'generacion'	=> $generacion,
			'campus'	=> $campus,
			'titulo'		=> $titulo,
			'historia'		=> $content,
			'fb_id'			=> $facebook_id,
			'content'		=> $content,
			'facebook_img'	=> $facebook_img,
			'profile_pic'	=> $fb_profile_pic,
		);

		echo json_encode($post_content, JSON_FORCE_OBJECT);
		exit();
	} // get_descripcion_coleccion
	add_action("wp_ajax_get_post_meta_content", "get_post_meta_content");
	add_action("wp_ajax_nopriv_get_post_meta_content", "get_post_meta_content");


	/**
	 * Revisar si el usuario ya posteo una historia.
	 */
	function tiene_historia(){

		$facebook_id = $_POST['facebook_id'];

		$args = array(
		   'meta_query' => array(
		       array(
		           'key'	=> '_detalles_fbid_meta',
		           'value' 	=> $facebook_id
		       )
		   ),
		   'fields' => 'ids'
		 );
		 // perform the query
		 $fb_id_query = new WP_Query( $args );
		 $fb_ids = $fb_id_query->posts;

		 $existe = 0;
		 if ( ! empty( $fb_ids ) ) {
		     $existe = 1;
		 }

		echo json_encode($existe, JSON_FORCE_OBJECT);
		exit();
	} // get_descripcion_coleccion
	add_action("wp_ajax_tiene_historia", "tiene_historia");
	add_action("wp_ajax_nopriv_tiene_historia", "tiene_historia");


	function check_post_story_facebook( $hook ){
		global $post;

		if ( 'post.php' == $hook  && 'post' == $post->post_type && isset($_GET['message']) ) {

	        $message_id	= absint( $_GET['message'] );
	        $post_id 	= $_GET['post'];

	        $publicar 		= get_post_meta($post_id, '_detalles_publicar_fb_meta', true);
			$facebook_id 	= get_post_meta($post_id, '_detalles_fbid_meta', true);
			$access_token 	= get_post_meta($post_id, '_extended_fb_token_meta', true);
			$user_quote		= $post->post_title;
			$status 		= get_post_status( $post_id );

			if( $publicar == 'true' && $status == 'publish' )  {
				update_post_meta($post_id, '_detalles_publicar_fb_meta', 'false' );
				wp_localize_script( 'admin-js', 'fb_user_id', $facebook_id );
				wp_localize_script( 'admin-js', 'fb_access_token', $access_token );
				wp_localize_script( 'admin-js', 'user_quote', $user_quote );
				wp_localize_script( 'admin-js', 'user_story_id', $post->ID );
			}
	    }
	}
	add_action( 'admin_enqueue_scripts', 'check_post_story_facebook');
