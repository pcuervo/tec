<?php get_header(); ?>
	<section class="[ cover ][ z-index-3 ]">
		<span class="[ screen opacity-gradient--full--5 ][ z-index-3 ]"></span>
		<div class="[ slideshow ][ js-slideshow ][ z-index zindex-1 ]">
			<div class="[ covervid-wrapper--wrapper ]">
				<div class="covervid-wrapper">
					<video class="covervid-video">
						<source src="<?php echo THEMEPATH; ?>videos/video1.mp4" type="video/mp4">
						<source src="<?php echo THEMEPATH; ?>videos/video1.webm" type="video/webm">
						<source src="<?php echo THEMEPATH; ?>videos/video1.ogv" type="video/ogg">
					</video>
				</div>
			</div>
			<div class="[ covervid-wrapper--wrapper ]">
				<div class="covervid-wrapper">
					<video class="covervid-video">
						<source src="<?php echo THEMEPATH; ?>videos/video1.mp4" type="video/mp4">
						<source src="<?php echo THEMEPATH; ?>videos/video1.webm" type="video/webm">
						<source src="<?php echo THEMEPATH; ?>videos/video1.ogv" type="video/ogg">
					</video>
				</div>
			</div>
			<!-- <img src="images/persona.jpg" alt=""> -->
			<!-- <a href="http://www.youtube.com/v/seX7jYI96GE?version=3&hl=en_US&rel=0&showinfo=0">Alex Russel</a> -->
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
	<section class="[ wrapper ]">
		<div class="[ grid ][ z-index z-index-1 ]">
			<div class="[ clearfix ]">
				<?php
					if( have_posts() ) : while( have_posts() ) : the_post();
					$puesto     = get_post_meta($post->ID, '_detalles_puesto_meta', true);
					$nombre     = get_post_meta($post->ID, '_detalles_nombre_meta', true);
					$generacion = get_post_meta($post->ID, '_detalles_generacion_meta', true);
				?>

					<article class="[ span xmall-12 medium-6 ][ item ][ bg-image ]" style="background-image: url(<?php the_post_thumbnail('full' ); ?>);">
						<span class="[ screen opacity--full ]"></span>
						<a href="#" class="[ block ][ js-open-modal ]" data-modal="una-historia">
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
							<a href="facebook" class="[ button button--circle button--light ][ inline-block ]">
								<i class="[ icon-facebook ]"></i>
							</a>
							<a href="twitter" class="[ button button--circle button--light ][ inline-block ]">
								<i class="[ icon-twitter ]"></i>
							</a>
						</div>
					</article><!-- item -->

				<?php endwhile; endif; ?>
			</div><!-- row -->
		</div><!-- grid -->
	</section><!-- wrapper -->
<?php get_footer(); ?>