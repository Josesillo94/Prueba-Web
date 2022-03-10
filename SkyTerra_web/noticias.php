<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="./Fotos/skyterralogo.png">
	<link rel="stylesheet" type="text/css" href="./Estilos/estandarizador.css">
	<link rel="stylesheet" type="text/css" href="./Estilos/estiloNoticias.css">
	<script src="https://kit.fontawesome.com/62ea397d3a.js" crossorigin="anonymous"></script>
	<title>SkyTerra Noticias</title> 
</head>
<body>
	<header>
		<nav class="nav">
			<ul class="nav__ul">
				<a href="./index.php"><image class="nav__li-logo" src="./Fotos/skyterralogo.png"></a>
				<li class="nav__li fas fa-sign-in-alt" id="iniciarSesion"><?php
				session_start();
				if(!empty($_SESSION['id_usuario'] )){
					// Si el usuario no está registrado, mostrar iniciar sesión, sino, mostrar Cerrar sesión
					echo '<a href = "./php/cerrar-sesion.php">Cerrar sesión</a';
					
				}else{
					echo '<a href = "./php/login.php">Iniciar sesión</a';
				}
				?></li> 
				<li class="nav__li fas fa-bullhorn"><a href="./noticias.php">Noticias</a></li>
				<li class="nav__li fas fa-home"><a href="./index.php">Inicio</a></li>
			</ul>
		</nav>
		<nav class="nav__responsive">
			
				<ul class="nav__responsive-ul">
					<div class="nav__responsive-button fas fa-equals" >
						<a href="./index.php"><img src="./Fotos/skyterralogo.png"></a>
						
					</div>
					<div class="nav__responsive-div">
						<div>
							<li class="nav__responsive-li fas fa-home"><a href="./index.php">Inicio</a></li>
						</div>
						<div>
							<li class="nav__responsive-li fas fa-bullhorn"><a href="./noticias.php">Noticias</a></li>
						</div>
						<div>
							<li class="nav__responsive-li fas fa-sign-in-alt"><?php
								if(!empty($_SESSION['id_usuario'] )){
									// Si el usuario no está registrado, mostrar iniciar sesión, sino, mostrar Cerrar sesión
									echo '<a href = "./php/cerrar-sesion.php">Cerrar sesión</a>';
									
								}else{
									echo '<a href = "./php/login.php">Iniciar sesión</a>';
								}
								?></li>
										</div>
							
					</div>
				</ul>
		</nav>
	</header>
	<?php
		if(!empty($_SESSION['id_usuario'] )){
			echo <<<EOT

			<article>
				<section>
					
					<div class="article__div">
						<div class="article__div-noticia"><h3>Se ha realizado un evento de vuelo con 3 maravillosos ganadores</h3> <img src="./fotos/evento1.png"></div>
						<div class="article__div-noticia"><h3>Se ha desarollado una zona con jefes a los que derrotar y ganar recompensas</h3><img src="./fotos/noticia3.png"></div>
						<div class="article__div-noticia"><h3>Se ha introducido un recolector de basura para mantener todo más limpio</h3><img src="./fotos/noticia2.png"></div>
						<div class="article__div-noticia"><h3>Se ha realizado un evento todos contra todos con buenos kits y recompensas</h3><img src="./fotos/noticia4.png"></div>
					</div>


					

				</section>

			</article>



			EOT;
			
			
		}else{
			echo <<<EOT

			<article>
				<section>
					
					<div class="article__div">
						<div class="article__div-noticia"><h3>Necesitas iniciar sesión para poder ver las noticias</h3> <img src="./Fotos/nodisponible.PNG"></div>
						<div class="article__div-noticia"><h3>Para iniciar sesión solo necesitas hacer click en el icono de iniciar sesión y crear una cuenta o loguearte</h3> <img src="./Fotos/nodisponible.PNG"></div>
						
						
					</div>
					

					

				</section>

			</article>


			
			



			EOT;
		}
	?>
	
	<footer >
		<div class="footer__div">
				<p class="footer__div-c fas fa-copyright">Copyright SkyTerra 2021</p>
				<p class="footer__div-icon fab fa-instagram"></p>
				<p class="footer__div-icon fab fa-twitter" ></p>
				<p class="footer__div-icon fab fa-youtube"></p>
				<p class="footer__div-j">Web Diseñada por <a href="https://github.com/Josesillo94">Josesillo94</a></p>

		</div>
	</footer>

</body>
</html>