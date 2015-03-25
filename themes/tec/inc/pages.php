<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// CONTACTO
		if( ! get_page_by_path('privacidad') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Privacidad',
				'post_name'   => 'privacidad',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


	});
