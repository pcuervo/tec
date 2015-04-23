			</main>
		</div><!-- container -->
		<footer>
		</footer>
		<div id="modal-form" class="[ modal-wrapper ] [ hide ]">
			<div class="[ close ][ js-close ][ z-index- ]">
				<i class="[ fa fa-times ]"></i>
			</div>
			<div class="[ modal modal--transparent ]">
				<div class="[ modal-content ]">
					<div class="[ modal-body ]">
						<article class="[ step-1 ]">
							<a href="" class="[ block ][ columna xmall-12 ][ button button--rounded-corners ][ margin-bottom--small ][ bg-facebook ]">
								<span class="[ ]">Ingresa con facebook</span>
								<i class="[ icon-facebook ]"></i>
							</a>
						</article><!-- step-1 -->
						<div class="clear"></div>
						<article class="[ step-2 ][ hidden--xmall ]">
							<form action="" class="[ forma forma-tu-historia ]" enctype="multipart/form-data">
								<fieldset class="[ margin-bottom--small ]">
									<div class="[ formplate ]">
										<!-- <label for="nombre">Tu nombre</label> -->
										<input type="text" name="nombre" class="[ js-nombre ][ required ]" placeholder="Tu nombre*">
									</div><!-- formplate -->
									<div class="[ formplate ]">
										<!-- <label for="nombre">Tu nombre</label> -->
										<input type="text" name="puesto" placeholder="Tu puesto actual">
									</div><!-- formplate -->
									<div class="[ formplate ]">
										<select name="campus" id="campus" class="[ required ]">
											<option selected="true" disabled="disabled">Campus*</option>
											<option value="Aguascalientes">Aguascalientes</option>
											<option value="Central de Veracruz">Central de Veracruz</option>
											<option value="Chiapas">Chiapas</option>
											<option value="Chihuahua">Chihuahua</option>
											<option value="Ciudad de México">Ciudad de México</option>
											<option value="Ciudad Juárez">Ciudad Juárez</option>
											<option value="Ciudad Obregón">Ciudad Obregón</option>
											<option value="Cuernavaca">Cuernavaca</option>
											<option value="Estado de México">Estado de México</option>
											<option value="Guadalajara">Guadalajara</option>
											<option value="Hidalgo">Hidalgo</option>
											<option value="Irapuato">Irapuato</option>
											<option value="Laguna">Laguna</option>
											<option value="León">León</option>
											<option value="Monterrey">Monterrey</option>
											<option value="Morelia">Morelia</option>
											<option value="Puebla">Puebla</option>
											<option value="Querétaro">Querétaro</option>
											<option value="Saltillo">Saltillo</option>
											<option value="San Luis Potosí">San Luis Potosí</option>
											<option value="Santa Fe">Santa Fe</option>
											<option value="Sinaloa">Sinaloa</option>
											<option value="Sonora Norte">Sonora Norte</option>
											<option value="Tampico">Tampico</option>
											<option value="Toluca">Toluca</option>
											<option value="Zacatecas">Zacatecas</option>
										</select>
									</div><!-- formplate -->
									<div class="[ formplate ][ generacion ]">
										<select name="generacion" class="[ required ]">
											<option selected="true" disabled="disabled">Generación*</option>
											<?php
											for ( $i=2018; $i > 1947 ; $i--)  {
												echo '<option value="' . $i . '">' . $i . '</option>';
											}
											?>
										</select>
									</div><!-- formplate -->
								</fieldset>
								<fieldset class="[ margin-bottom--small ]">
									<div class="[ formplate ]">
										<textarea class="[ required ]" name="historia" id="" placeholder="Tu historia*"></textarea>
									</div><!-- formplate -->
								</fieldset>
								<fieldset class="[ margin-bottom--small ]">
									<div class="[ formplate ]">
										<textarea class="[ required ]" name="titulo" id="" placeholder="Cita o frase*(max 60 caracteres)"></textarea>
									</div><!-- formplate -->
								</fieldset>
								<fieldset class="[ margin-bottom ]">
									<img src="#" class="[ js-fb-selected-photo ][ center block xmall-6 medium-5 ][ margin-bottom ]" alt="">
									<button class="[ block ][ span xmall-12 no-margin ][ button button--rounded-corners ][ js-facebook-photos ]">Agregar imagen de Facebook a mi historia</button>
								</fieldset>
								<h3 class="[ text-center ][ margin-bottom ][ js-o ]">ó</h3>
								<fieldset class="[ margin-bottom ]">
									<input type="file" name="file" id="file" class="[ block ][ js-file-btn ]">
									<small class="[ js-o ]">La imagen debe ser formato JPEG, PNG o PDF y no puede exceder 3.0 MB</small>
								</fieldset>
								<fieldset class="[ margin-bottom ]">
									<div class="[ formplate ]">
										<input class="toggler" name="acepto" value="true" type="checkbox">
										<p class="[ text-center ]">Deseo que mi historia se publique en mi muro de Facebook.</p>
									</div><!-- formplate -->
								</fieldset>
								<input type="hidden" class="js-fb-id" name="id">
								<input type="hidden" class="js-fb-token" name="access_token">
								<input type="hidden" class="js-fb-profile-pic" name="fb_profile_pic">
								<input type="hidden" class="js-fb-photo-url" name="fb_photo_url">
								<input type="hidden" class="js-is-upload" name="is_upload" value="0">
								<fieldset class="[ margin-bottom--small ]">
									<button class="[ block ][ span xmall-12 no-margin ][ button button--rounded-corners ]" type="submit">Enviar</button>
								</fieldset>
							</form>
						</article><!-- step-2 -->
						<article class="[ js-facebook-albums-container ] ">
							<a href="#" class="[ block ][ span xmall-12 no-margin ][ button button--rounded-corners ][ margin-bottom ][ js-regresar-forma ]">
								Regresar
							</a>
							<!-- Aquí se muestran los albums -->
						</article>
						<article class="[ js-facebook-photos-container ]">
							<a href="#" class="[ block ][ span xmall-12 no-margin ][ button button--rounded-corners ][ margin-bottom ][ js-regresar-albumes ]">
								Regresar
							</a>
							<!-- Aquí se muestran las fotos de los albums -->
						</article>
						<article class="[ step-3 ][ hidden--xmall ]">
							<div class="[ success-message ][ text-center ]">
								<p class="[ title ][ margin-bottom--large ][ light ]">Tu historia de éxito ya fue registrada</p>
								<p class="[ title ][ margin-bottom--large ][ light ]"> ¡Gracias por compartirla!</p>
								<p class="[ light ]">Tu historia será revisada por nosotros y se te notificará en cuanto esté aprobada.</p>
								<div class="[ clear ]"></div>
								<button class="[ js-close ][ button ]">Hecho</button>
							</div>
						</article><!-- step-3 -->
						<article class="[ step-4 ][ hidden--xmall ]">
							<p class="[ title ][ margin-bottom--large ][ light ]">Ya has creado una historia, agradecemos tu participación.</p>
						</article><!-- step-4 -->
					</div><!-- modal-body -->
				</div><!-- modal-content -->
			</div>
		</div>
		<div id="modal-historia" class="[ modal-wrapper ] [ hide ]">
			<div class="[ modal modal--read-mode ]">
				<div class="[ close ][ js-close ]">
					<i class="[ icon-close ]"></i>
				</div>
				<div class="[ modal-content ]">
					<div class="[ modal-header ][ border-bottom margin-bottom ]">
						<div class="[ row ][ margin-bottom ]">
							<div class="[ columna xmall-3 ][ margin-bottom ][ profile-pic ][ js-profile-pic ]">
								<img class="[ image-circle image-responsive ]" src="" alt="">
							</div>
							<div class="[ columna xmall-9 ]">
								<h4 class=""><span class="[ js-nombre ]"></span> <br /><small class="[ js-puesto ]"></small></h4>
								<h3 class="[ js-generacion ]"></h3>
								<h3 class="[ js-campus ]"></h3>
							</div>
						</div><!-- row -->
						<h2 class="[ text-center ]"></h2>
						<br />
						<div class="[ margin-bottom ][ js-facebook-pic ]">
							<img class="[ xmall-10 medium-8 large-6 ][ center block ]" src="" alt="">
						</div>

					</div><!-- modal-header -->
					<br />
					<div class="[ modal-body ]">
						<div class="[ js-historia ][ margin-bottom ]">
							<p></p>
						</div>
						<div class="[ js-imagen ]"></div>
					</div><!-- modal-body -->
				</div><!-- modal-content -->
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>