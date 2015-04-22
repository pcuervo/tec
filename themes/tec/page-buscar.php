<?php
	get_header();
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	$nombre = isset( $_POST['nombre'] ) ? $_POST['nombre'] : '';
	$results = array();
	if( $nombre != '' ){
		$results = get_search_results( 'nombre', $_POST['nombre'] );
	}
	if( isset( $_POST['generacion'] ) ){
		$results = get_search_results( 'generación', $_POST['generacion'] );
	}
	if( isset( $_POST['campus'] ) ){
		$results = get_search_results( 'campus', $_POST['campus'] );
	}

	//the_post();
?>
	<section class="[ grid ]">
		<div class="[ wrapper ]">
			<div class="[ clearfix ]">
				<?php

					foreach ( $results as $post ) {

						$puesto       	= get_post_meta( $post->ID, '_detalles_puesto_meta', true );
						$nombre       	= get_post_meta( $post->ID, '_detalles_nombre_meta', true );
						$fb_profile_pic	= get_post_meta( $post->ID, '_fb_profile_pic_meta', true );
						$fb_photo_url	= get_post_meta( $post->ID, '_fb_photo_url_meta', true );
						$generacion   	= get_post_meta( $post->ID, '_detalles_generacion_meta', true );
						$actual_link 	= $actual_link+'?u='+$post->ID;

						if( $fb_photo_url == '' ){
							$fb_photo_url = $fb_profile_pic;
						}
				?>

					<article class="[ span xmall-12 medium-6 ][ item ][ bg-image ]" data-id="<?php echo $post->ID; ?>" style="background-image: url('<?php echo $fb_photo_url; ?>')">
						<span class="[ screen opacity--full ]"></span>
						<a href="#" class="[ block ][ js-open-modal ]" data-modal="historia" data-id="<?php echo $post->ID; ?>">
							<div class="[ square ][ z-index z-index-2 ]">
								<div class="[ item__header ]">
									<div class="[ item__name ][ columna xmall-6 ]">
										<h3><?php echo $nombre; ?></h3>
										<h4><?php echo $puesto; ?></h4>
									</div>
								</div>
								<div class="[ item__footer ]">
									<div class="[ item__title ]">
										<h2><?php the_title(); ?></h2>
										<h3><?php echo $generacion; ?></h3>
									</div>
								</div>
							</div><!-- square -->
						</a>
						<div class="[ item__share ][ z-index z-index-3 ]">
							<a href="facebook" class="[ button button--circle button--light ][ js-share-fb ][ inline-block ]">
								<i class="[ icon-facebook ]"></i>
							</a>
							<a href="https://twitter.com/share?url=<?php echo $actual_link; ?>&text=<?php echo urlencode($nombre) ?>&via=Tec" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="[ button button--circle button--light ][ inline-block ]">
								<i class="[ icon-twitter ]"></i>
							</a>
						</div>

					</article><!-- item -->
				<?php } ?>
			</div><!-- clearfix -->
		</div><!-- wrapper -->
	</section><!-- grid -->
<?php get_footer(); ?>