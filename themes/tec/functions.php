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
						window.fbAsyncInit = function() {
							FB.init({
								appId	: '419093274917539',
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
						runMCustomScrollbar('.modal');
						$('.covervid-video').coverVid(640, 360);

						$('body').formplate();
						$('.forma-tu-historia input[type=file]').nicefileinput({
							label : 'Agregar imagen a mi historia'
						});

						radioIsSelected('.search-form');





						/*------------------------------------*\
							#Triggered events
						\*------------------------------------*/

						$(window).on("scroll",function(){
							toggleCover(isTop());
						});

						$('.js-open-modal').on('click', function(){
							openModal( $(this) );
						});
						$('.grid .js-open-modal').on('click', function(){
							insertPostContent( $(this) );
						});
						$('.modal-wrapper .js-close').on('click', function(){
							closeModal( $(this) );
						});
						$('.bg-facebook').on('click', function(e){
							e.preventDefault();
							loginFacebook();
						});

						formValidation('.forma-tu-historia');
						formValidation('.search-form');

						$('.search-form input[name="radio-search"]').change(function() {
							radioIsSelected('.search-form');
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



// ADMIN SCRIPTS AND STYLES //////////////////////////////////////////////////////////



	add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'admin-js', JSPATH.'admin.js', array('jquery'), '1.0', true );

		// localize scripts
		wp_localize_script( 'admin-js', 'ajax_url', admin_url('admin-ajax.php') );

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

		$post_historia = array(
			'post_title'    => $titulo,
			'post_content'  => $historia,
			'post_status'   => 'draft',
			'post_author'   => 1,
		);
		$post_id = wp_insert_post( $post_historia );

		// Agregar metadata
		add_post_meta( $post_id, '_detalles_nombre_meta', $nombre, false ) || update_post_meta( $post_id, '_detalles_nombre_meta', $nombre );
		add_post_meta( $post_id, '_detalles_puesto_meta', $puesto, false ) || update_post_meta( $post_id, '_detalles_puesto_meta', $puesto );
		add_post_meta( $post_id, '_detalles_generacion_meta', $generacion, false ) || update_post_meta( $post_id, '_detalles_generacion_meta', $generacion );
		add_post_meta( $post_id, '_detalles_fbid_meta', $facebook_id, false ) || update_post_meta( $post_id, '_detalles_fbid_meta', $facebook_id );
		add_post_meta( $post_id, '_detalles_publicar_fb_meta', $publicar_fb, false ) || update_post_meta( $post_id, '_detalles_publicar_fb_meta', $publicar_fb );


		echo json_encode($post_id, JSON_FORCE_OBJECT);
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
		$puesto     = get_post_meta($post_id, '_detalles_puesto_meta', true);
		$nombre     = get_post_meta($post_id, '_detalles_nombre_meta', true);
		$generacion = get_post_meta($post_id, '_detalles_generacion_meta', true);
		$titulo     = $post->post_title;
		$content 	= $post->post_content;

		$post_content['meta_content'] = array(
			'puesto'		=> $puesto,
			'nombre'		=> $nombre,
			'generacion'	=> $generacion,
			'titulo'		=> $titulo,
			'content'		=> $content
		);

		echo json_encode($post_content, JSON_FORCE_OBJECT);
		exit();
	} // get_descripcion_coleccion
	add_action("wp_ajax_get_post_meta_content", "get_post_meta_content");
	add_action("wp_ajax_nopriv_get_post_meta_content", "get_post_meta_content");

