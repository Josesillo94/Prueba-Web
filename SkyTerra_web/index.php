<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="./Fotos/skyterralogo.png">
	<link rel="stylesheet" type="text/css" href="./Estilos/estandarizador.css">
	<link rel="stylesheet" type="text/css" href="./Estilos/estilo.css">
	<script src="https://kit.fontawesome.com/62ea397d3a.js" crossorigin="anonymous"></script>
	
	
	<title>SkyTerra</title>
</head>
<body>

	
	<header>
		
		<nav class="nav">
			<ul class="nav__ul">
				<image class="nav__li-logo" src="./Fotos/skyterralogo.png">
				<?php
				session_start();
				if(!empty($_SESSION['id_usuario'] )){
						// Si el usuario no está registrado, mostrar iniciar sesión, sino, mostrar Cerrar sesión
						echo '<li class="nav__li fas fa-sign-in-alt " id="iniciarSesion"><a  href = "./php/cerrar-sesion.php">Cerrar sesión</a></li>';
						if($_SESSION['nombre_usuario'] == "josesillo94"){
							// Si el usuario es josesillo94, mostrar menu de administración.
							echo '<li class="nav__li fas fa-user-cog seleccion_admin" id="iniciarSesion"><a href = "">Administrador</a>
							<ul id="ul__admin">
							<li  class="li__admin" ><a href="./php/items.php">Ítems</a></li>
							<li class="li__admin"><a href="./php/administracion.php">Administración</a></li></ul></li> ';
						}
				}else{
					echo '<li class="nav__li fas fa-sign-in-alt" id="iniciarSesion"><a href = "./php/login.php">Iniciar sesión</a></li>';
				}
				?>
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
							<li class="nav__responsive-li fas fa-sign-in-alt "><?php
								if(!empty($_SESSION['id_usuario'] )){
									// Si la variable $_SESSION['id_usuario'] no está vacía, mostrar cerrar sesión, sino, mostrar iniciar sesión
									echo '<a " href = "./php/cerrar-sesion.php">Cerrar sesión</a>';
									if($_SESSION['nombre_usuario'] == "josesillo94"){
										// Si el usuario es josesillo94, mostrar menú de administración 
										echo '<li class="nav__responsive-li fas fa-user-cog seleccion_admin" id="iniciarSesion"><a href = "">Administrador</a>
										<ul id="ul__admin">
										<li  class="li__admin" ><a href="./php/items.php">Ítems</a></li>
										<li class="li__admin"><a href="./php/administracion.php">Administración</a></li></ul></li> ';
									}
								}else{
									echo '<a href = "./php/login.php">Iniciar sesión</a>';
								}
								?></li>
										</div>
							
					</div>
				</ul>
		</nav>
	</header>

	<article class="article">
		<section>
			
			<div>
				<div><h2 class="article__h2"><?php
				if(!empty($_SESSION['id_usuario'] )){
						// Si la variable $_SESSION['id_usuario'] no está vacía, mostrar el nombre de usuario
					echo "Bienvenido ";
					echo '<b>a SkyTerra<b> ';
					echo $_SESSION["nombre_usuario"];

					
				}else{
					echo 'Bienvenido a SkyTerra';
				}
				?><br></h2></div>
					<div class="article__div"><br><p class="article__div-p">Este Servidor se creó el 1 de Febrero del 2021 con la idea de entretenerse jugando con los amigos.
					Poco a poco el Servidor fue creciendo hasta que llegamos a la cantidad de 51 personas jugando al mismo tiempo.<br><br></p>
					<video class="article__div-video" controls autoplay muted><source src="./Videos/TrailerSkyterra.mp4" type="video/mp4"></video>
					<br><br>
					<img class="article__div-foto" src="./Fotos/51.png">
				</div>
			</div>


			

		</section>

	</article>
	<aside class="aside" >
		<div class="aside__anuncio1"><h2>Buscamos Staff</h2>
			<br>
			<p>¿Quieres postularte para ser parte de nuestro Staff?
				<br><br>
			Si es así, debes rellenar el siguiente formulario de postulación con el cual
		 nos dirás más información sobre ti.</p>
		 <br><br>
		 <h3>Haz click aquí abajo para rellenar la postulación:</h3>
		 <?php 
		 if(!empty($_SESSION['id_usuario'] )){
			// Si la variable $_SESSION['id_usuario'] no está vacía, redirigir a la tienda y el formulario, sino, redirigir al login.
			echo <<<EOT
			
			<a href="./php/formularioStaff.php"><img class="aside__anuncio1-img" src="./Fotos/staff.gif"></a>
			<div class="aside__anuncio2"><br><h2>¿Buscas comprar algo?</h2><br><p>Si es así, haz click en la siguiente imagen para ir a nuestra tienda:</p><br><a href="./tienda.php">
				<img src="./Fotos/tienda.png"></a>
			</div>

			EOT;


			}else{
			echo <<<EOT

			<a href="./php/login.php"><img class="aside__anuncio1-img" src="./Fotos/staff.gif"></a>
			<div class="aside__anuncio2"><br><h2>¿Buscas comprar algo?</h2><br><p>Si es así, haz click en la siguiente imagen para ir a nuestra tienda:</p><br><a href="./php/login.php">
				<img src="./Fotos/tienda.png"></a>
			</div>

			EOT;
			} ?>
		
		
	</aside>
	
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