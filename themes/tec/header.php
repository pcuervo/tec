<!doctype html>
	<head>
		<meta charset="utf-8">

		<title><?php print_title(); ?></title>

		<link rel="icon" sizes="16x16 32x32 48x48 64x64" href="<?php echo THEMEPATH; ?>favicon.ico"/>
		<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>favicon.ico"/>
		<![endif]-->
		<!-- Optional: Android & iPhone-->
		<link rel="apple-touch-icon-precomposed" href="<?php echo THEMEPATH; ?>favicon-152.png"/>
		<!-- Optional: IE10 Tile.-->
		<meta name="msapplication-TileColor" content="#FFFFFF"/>
		<meta name="msapplication-TileImage" content="favicon-144.png"/>
		<!-- Optional: ipads, androids, iphones, ...-->
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo THEMEPATH; ?>favicon-152.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo THEMEPATH; ?>favicon-144.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo THEMEPATH; ?>favicon-120.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo THEMEPATH; ?>favicon-114.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo THEMEPATH; ?>favicon-72.png"/>
		<link rel="apple-touch-icon-precomposed" href="<?php echo THEMEPATH; ?>favicon-57.png"/>

		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<?php wp_head(); ?>
	</head>

	<body>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		<div class="container">
			<header>
				<div class="[ opacity-gradient--full ][ z-index-1 ]"></div>
				<div class="[ wrapper ]">
					<div class="[ row ][ z-index z-index-2 ]">
						<div class="[ columna xmall-6 ][ menu__item ][ text-left ]">
							<h1>
								<a href="#">
									<i class="icon-logo-tec"></i>
								</a>
							</h1>
						</div>
						<div class="[ columna xmall-6 ][ menu__item ][ text-right ]">
							<a class="[ js-open-search ]" href="#">
								<i class="icon-search"></i>
							</a>

							<div class="[ search-form--wrapper ]">
								<form action="<?php echo site_url('buscar') ?>" class="[ search-form ]" method="POST">
									<div class="[ radios ][ row ][ margin-bottom--small ]">
										<div class="[ formplate ][ columna xmall-4 ][ text-center ]">
											<input type="radio" name="radio-search" value="nombre" id="radio-nombre">
											<label for="radio-nombre">Nombre</label>
										</div>
										<div class="[ formplate ][ columna xmall-4 ][ text-center ]">
											<input type="radio" name="radio-search" value="campus" id="radio-campus">
											<label for="radio-campus">Campus</label>
										</div>
										<div class="[ formplate ][ columna xmall-4 ][ text-center ]">
											<input type="radio" name="radio-search" value="generacion" id="radio-generacion">
											<label for="radio-generacion">Generación</label>
										</div>
									</div>

									<fieldset class="[ formplate ][ search-field search-nombre ][ js-search-nombre ]">
										<input type="text" placeholder="Nombre" name="nombre">
									</fieldset>
									<div class="[ formplate ][ search-field search-campus ][ js-search-campus ]">
										<select name="campus" id="campus">
											<option selected="true" disabled="disabled">Campus</option>
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
									</div>
									<div class="[ formplate ][ search-field search-generacion ][ js-search-generacion ]">
										<select name="generacion" id="generación">
											<option selected="true" disabled="disabled">Generación</option>
											<?php 
											for ( $i=2018; $i > 1947 ; $i--)  {
												echo '<option value="' . $i . '">' . $i . '</option>';
											}
											?>
										</select>
									</div>
									<fieldset class="[ margin-bottom--small ][ text-center ][ search-submit ][ js-search-submit ]">
										<button class="[ button button--rounded-corners ]" type="submit">Buscar</button>
									</fieldset>
									<fieldset class="[ margin-bottom--small ][ text-center ]">
										<button class="[ button button--rounded-corners button--dark ][ js-close-search ]" type="button">Cancelar<buttona>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</header>
			<main>
