<?php
	get_header();
	global $id_historia_usuario;
	$id_historia_usuario = ( isset($_GET['u']) ) ? $_GET['u'] : '';
	$current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
	<section class="[ cover ][ z-index-1 ]">
		<span class="[ screen opacity-gradient--full--5 ][ z-index-3 ]"></span>
		<div class="[ slideshow ][ js-slideshow ][ z-index zindex-1 ]">
			<img src="<?php echo THEMEPATH; ?>images/persona.jpg" alt="">
			<img src="<?php echo THEMEPATH; ?>images/persona.jpg" alt="">
			<div class="[ cycle-control cycle-prev ]">
				<i class="icon-prev"></i>
			</div><!-- cycle-prev  -->
			<div class="[ cycle-control cycle-next ]">
				<i class="icon-next"></i>
			</div><!-- cycle-next  -->
		</div><!-- js-video-slideshow -->
		<div class="[ wrapper ]">
			<section class="[ display-texts ]">
				<article class="[ text-center ]">
					<h5 class="[ display-text display-text--large display-text--bold display-text--uppercase ][ title ][ js-title ]">Cuéntanos tu historia</h5>
					<h5 class="[ display-text ][ sub-title ][ js-sub-title ]">Buscamos las mejores historias del Tecnológico de Monterrey</h5>
					<h5 class="[ display-text display-text--medium display-text--bold ][ sub-sub-title ][ js-sub-sub-title ]">Nosotros se la contaremos a todo México</h5>
					<a href="#" class="[ button ][ inline-block ][ js-open-modal ]" data-modal="form">
						Súmate
					</a>
				</article>
				<article class="[ text-center ]">
					<a href="#" class="[ scroll-down ][ text-center ]">
						<i class="[ icon-chevron-down ][ highlight ]"></i>
					</a>
				</article>
			</section>
		</div><!-- wrapper -->
	</section>
	<section class="[ grid ][ z-index z-index-3 ]">
		<div class="[ wrapper ]">
			<div class="[ clearfix ]">
				<?php
					if( have_posts() ) : while( have_posts() ) : the_post();
						$puesto       	= get_post_meta( $post->ID, '_detalles_puesto_meta', true );
						$nombre       	= get_post_meta( $post->ID, '_detalles_nombre_meta', true );
						$fb_profile_pic	= get_post_meta( $post->ID, '_fb_profile_pic_meta', true );
						$fb_photo_url	= get_post_meta( $post->ID, '_fb_photo_url_meta', true );
						$generacion   	= get_post_meta( $post->ID, '_detalles_generacion_meta', true );
						$share_link 	= $current_link . '?u=' . $post->ID;

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
							<a href="https://twitter.com/share?url=<?php echo $share_link; ?>&text=Todos buscamos el camino al éxito, descubre cómo lo conseguí.&via=Tec" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="[ button button--circle button--light ][ inline-block ]">
								<i class="[ icon-twitter ]"></i>
							</a>
						</div>
					</article><!-- item -->

				<?php endwhile; endif; ?>
			</div><!-- row -->
		</div><!-- wrapper -->
	</section><!-- grid -->
<?php get_footer(); ?>