<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../Estilos/estiloFormularioStaff.css">
<link rel="stylesheet" type="text/css" href="../Estilos/estiloedicionItems.css">
<script src="https://kit.fontawesome.com/62ea397d3a.js" crossorigin="anonymous"></script>
<link rel="icon" href="../Fotos/staff.gif">

<title>Formulario Staff</title>
</head>

<body>
<nav class="nav">
			<ul class="nav__ul">
				<a href="../index.php"><image class="nav__li-logo" src="../Fotos/skyterralogo.png"></a>
				<li class="nav__li fas fa-sign-in-alt" id="iniciarSesion"><?php
				session_start();
				if(!empty($_SESSION['id_usuario'] )){
					// Si el usuario no está registrado, mostrar iniciar sesión, sino, mostrar Cerrar sesión
					echo '<a href = "./cerrar-sesion.php">Cerrar sesión</a';
					
				}else{
					echo '<a href = "./login.php">Iniciar sesión</a';
				}
				?></li> 
				<li class="nav__li fas fa-bullhorn"><a href="../noticias.php">Noticias</a></li>
				<li class="nav__li fas fa-home"><a href="../index.php">Inicio</a></li>
			</ul>
		</nav>
		<nav class="nav__responsive">
			
				<ul class="nav__responsive-ul">
					<div class="nav__responsive-button fas fa-equals" >
						<a href="../index.php"><img src="../Fotos/skyterralogo.png"></a>
						
					</div>
					<div class="nav__responsive-div">
						<div>
							<li class="nav__responsive-li fas fa-home"><a href="../index.php">Inicio</a></li>
						</div>
						<div>
							<li class="nav__responsive-li fas fa-bullhorn"><a href="../noticias.php">Noticias</a></li>
						</div>
						<div>
							<li class="nav__responsive-li fas fa-sign-in-alt"><?php
								if(!empty($_SESSION['id_usuario'] )){
									// Si el usuario no está registrado, mostrar iniciar sesión, sino, mostrar Cerrar sesión
									echo '<a href = "./cerrar-sesion.php">Cerrar sesión</a>';
									
								}else{
									echo '<a href = "./login.php">Iniciar sesión</a>';
								}
								?></li>
										</div>
							
					</div>
				</ul>
		</nav>
	</header>

<?php 
include('.\conexion-base.php');
 ?>
	
	<?php
		if(isset($_POST['accion'])){
			if($_POST['accion'] == "agregar" ){
				// Creamos formulario de agregar ítem
				echo <<<EOT

				<form action="items.php" method="POST" name="formularioagregarItems">
					<h2>Agregar Ítem</h2>
					<input type="text" name="agregar__nombre" placeholder="Nombre del ítem">
					<input type="text" name="agregar__descripcion" placeholder="Descripción del ítem">
					<button ><a href="./items.php">Regresar</a></button><button type="submit" name ="accion_final" value="agregarNuevoItem">Agregar</button>
				
				</form>

				EOT;
				
				


			}
			if ($_POST['accion'] == "modificar" ){
				if(isset($_POST['nombre__item']) & isset($_POST['descripcion__item'])& isset($_POST['id__item'])){
                    $id__item = $_POST['id__item'];
					$nombre__item = $_POST['nombre__item'];
					$descripcion__item = $_POST['descripcion__item'];
					// Creamos formulario de modificar ítem con los datos ya introducidos
					echo <<<EOT

					<form action="items.php" method="POST" name="formulariomodificarItems">
					    <h2>Modificar Ítem</h2>
					    <input type="text" name="modificar__nombre" placeholder="Nombre del ítem" value="$nombre__item">
					    <input type="text" name="modificar__descripcion" placeholder="Descripción del ítem" value="$descripcion__item">
					    <button ><a href="./items.php">Regresar</a></button><button type="submit" name="accion_final" value="ModificarElItem">Modificar</button><input type="hidden" name="modificar__id" value="$id__item">



					</form>

					EOT;

					

				}
				



			}
			if ($_POST['accion'] == "eliminar" ){

                if(isset($_POST['nombre__item']) & isset($_POST['descripcion__item'])& isset($_POST['id__item'])){
                    $id__item = $_POST['id__item'];
					$nombre__item = $_POST['nombre__item'];
					$descripcion__item = $_POST['descripcion__item'];
					// Creamos formulario de eliminar ítem con los datos ya introducidos
					echo <<<EOT

					<form action="items.php" method="POST" name="formularioeliminarItems">
					    <h2>Eliminar Ítem</h2>
					    <input type="text" name="eliminar__nombre" placeholder="Nombre del ítem" value="$nombre__item" readonly>
					    <input type="text" name="eliminar__descripcion" placeholder="Descripción del ítem" value="$descripcion__item" readonly>
					    <input type="hidden" name="eliminar__id" value="$id__item"><button ><a href="./items.php">Regresar</a></button><button type="submit" name="accion_final" value="EliminarElItem">Eliminar</button>



					</form>

					EOT;

					

				}



			}




            






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
