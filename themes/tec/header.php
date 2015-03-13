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
								<form action="#" class="[ search-form ]">
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
										<input type="text" placeholder="Nombre">
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
										<select name="generación" id="generación">
											<option selected="true" disabled="disabled">Generación</option>
											<option value="1947">1947</option>
											<option value="1948">1948</option>
											<option value="1949">1949</option>
											<option value="1950">1950</option>
											<option value="1951">1951</option>
											<option value="1952">1952</option>
											<option value="1953">1953</option>
											<option value="1954">1954</option>
											<option value="1955">1955</option>
											<option value="1956">1956</option>
											<option value="1957">1957</option>
											<option value="1958">1958</option>
											<option value="1959">1959</option>
											<option value="1960">1960</option>
											<option value="1961">1961</option>
											<option value="1962">1962</option>
											<option value="1963">1963</option>
											<option value="1964">1964</option>
											<option value="1965">1965</option>
											<option value="1966">1966</option>
											<option value="1967">1967</option>
											<option value="1968">1968</option>
											<option value="1969">1969</option>
											<option value="1970">1970</option>
											<option value="1971">1971</option>
											<option value="1972">1972</option>
											<option value="1973">1973</option>
											<option value="1974">1974</option>
											<option value="1975">1975</option>
											<option value="1976">1976</option>
											<option value="1977">1977</option>
											<option value="1978">1978</option>
											<option value="1979">1979</option>
											<option value="1980">1980</option>
											<option value="1981">1981</option>
											<option value="1982">1982</option>
											<option value="1983">1983</option>
											<option value="1984">1984</option>
											<option value="1985">1985</option>
											<option value="1986">1986</option>
											<option value="1987">1987</option>
											<option value="1988">1988</option>
											<option value="1989">1989</option>
											<option value="1990">1990</option>
											<option value="1991">1991</option>
											<option value="1992">1992</option>
											<option value="1993">1993</option>
											<option value="1994">1994</option>
											<option value="1995">1995</option>
											<option value="1996">1996</option>
											<option value="1997">1997</option>
											<option value="1998">1998</option>
											<option value="1999">1999</option>
											<option value="2000">2000</option>
											<option value="2001">2001</option>
											<option value="2002">2002</option>
											<option value="2003">2003</option>
											<option value="2004">2004</option>
											<option value="2005">2005</option>
											<option value="2006">2006</option>
											<option value="2007">2007</option>
											<option value="2008">2008</option>
											<option value="2008">2008</option>
											<option value="2009">2009</option>
											<option value="2010">2010</option>
											<option value="2011">2011</option>
											<option value="2012">2012</option>
											<option value="2013">2013</option>
											<option value="2014">2014</option>
											<option value="2015">2015</option>
											<option value="2016">2016</option>
											<option value="2017">2017</option>
											<option value="2018">2018</option>
											<option value="2019">2019</option>
											<option value="2020">2020</option>
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
