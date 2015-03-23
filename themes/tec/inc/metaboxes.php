<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		add_meta_box( 'detalles', 'Detalles', 'detalles_meta_callback', 'post', 'side', 'high' );

	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////



	function detalles_meta_callback($post){
		$puesto     	= get_post_meta($post->ID, '_detalles_puesto_meta', true);
		$nombre     	= get_post_meta($post->ID, '_detalles_nombre_meta', true);
		$generacion 	= get_post_meta($post->ID, '_detalles_generacion_meta', true);
		$fb_id 			= get_post_meta($post->ID, '_detalles_fbid_meta', true);
		$access_token 	= get_post_meta($post->ID, '_detalles_access_token_meta', true);
		$publicar_fb 	= get_post_meta($post->ID, '_detalles_publicar_fb_meta', true);

		wp_nonce_field(__FILE__, '_detalles_meta_nonce');

echo <<<END

	<label>Puesto:</label>
	<input type="text" class="widefat" id="_detalles_puesto" name="_detalles_puesto_meta" value="$puesto" />
	<label>Nombre:</label>
	<input type="text" class="widefat" id="_detalles_nombre" name="_detalles_nombre_meta" value="$nombre" />
	<label>Generacion:</label>
	<input type="text" class="widefat" id="_detalles_generacion" name="_detalles_generacion_meta" value="$generacion" />
	<label>Publicar en Facebook:</label>
	<input type="text" class="widefat" id="_detalles_publicar_fb" name="_detalles_publicar_fb_meta" value="$publicar_fb" />
	<input type="hidden" class="widefat" id="_detalles_fbid" name="_detalles_fbid_meta" value="$fb_id" />
	<input type="hidden" class="widefat" id="_detalles_access_token" name="_detalles_access_token__meta" value="$access_token" />

END;

	}



// SAVE METABOXES DATA ///////////////////////////////////////////////////////////////



	add_action('save_post', function($post_id){


		if ( ! current_user_can('edit_page', $post_id))
			return $post_id;


		if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE )
			return $post_id;


		if ( wp_is_post_revision($post_id) OR wp_is_post_autosave($post_id) )
			return $post_id;


		if ( isset($_POST['_detalles_puesto_meta']) and check_admin_referer(__FILE__, '_detalles_meta_nonce') ){
			update_post_meta($post_id, '_detalles_puesto_meta', $_POST['_detalles_puesto_meta']);
		}

		if ( isset($_POST['_detalles_nombre_meta']) and check_admin_referer(__FILE__, '_detalles_meta_nonce') ){
			update_post_meta($post_id, '_detalles_nombre_meta', $_POST['_detalles_nombre_meta']);
		}

		if ( isset($_POST['_detalles_generacion_meta']) and check_admin_referer(__FILE__, '_detalles_meta_nonce') ){
			update_post_meta($post_id, '_detalles_generacion_meta', $_POST['_detalles_generacion_meta']);
		}

		if ( isset($_POST['_detalles_publicar_fb_meta']) and check_admin_referer(__FILE__, '_detalles_meta_nonce') ){
			update_post_meta($post_id, '_detalles_publicar_fb_meta', $_POST['_detalles_publicar_fb_meta']);
		}

		if ( isset($_POST['_detalles_fbid_meta']) and check_admin_referer(__FILE__, '_detalles_meta_nonce') ){
			update_post_meta($post_id, '_detalles_fbid_meta', $_POST['_detalles_fbid_meta']);
		}

		if ( isset($_POST['_detalles_access_token_meta']) and check_admin_referer(__FILE__, '_detalles_meta_nonce') ){
			update_post_meta($post_id, '_detalles_access_token_meta', $_POST['_detalles_access_token_meta']);
		}

		// Guardar correctamente los checkboxes
		/*if ( isset($_POST['_checkbox_meta']) and check_admin_referer(__FILE__, '_checkbox_nonce') ){
			update_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		} else if ( ! defined('DOING_AJAX') ){
			delete_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		}*/


	});



// OTHER METABOXES ELEMENTS //////////////////////////////////////////////////////////
