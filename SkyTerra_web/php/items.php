<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../Estilos/estiloFormularioStaff.css">
<link rel="stylesheet" type="text/css" href="../Estilos/estiloItems.css">
<script src="https://kit.fontawesome.com/62ea397d3a.js" crossorigin="anonymous"></script>
<link rel="icon" href="../Fotos/staff.gif">

<title>Items Administrador</title>
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
									// Si el usuario no está registrado, mostrar iniciar sesión, sino, mostrar abandonar
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
	 
	 if(isset($_POST['accion_final'])){
		// Si las variables no son nulas, se agrega un ítem 
		if($_POST['accion_final'] == "agregarNuevoItem" & isset($_POST['agregar__nombre']) & isset($_POST['agregar__descripcion']) ){
			$agregar__nombre = $_POST['agregar__nombre'];
			$agregar__descripcion = $_POST['agregar__descripcion'];
			$sql = mysqli_query($conexion, "INSERT INTO items (nombreItem, descripcion) VALUES ('$agregar__nombre', '$agregar__descripcion') ");
			
		}// Si las variables no son nulas, se modifica un ítem 
		if($_POST['accion_final'] == "ModificarElItem" & isset($_POST['modificar__nombre']) & isset($_POST['modificar__descripcion']) & isset($_POST['modificar__id'])){
			$modificar__id = $_POST['modificar__id'];
			$modificar__nombre = $_POST['modificar__nombre'];
			$modificar__descripcion = $_POST['modificar__descripcion'];
			$sql = mysqli_query($conexion, "UPDATE items SET nombreItem = '$modificar__nombre', descripcion = '$modificar__descripcion'
			WHERE id = '$modificar__id' ");
			
		}// Si las variables no son nulas, se elimina un ítem 
		if($_POST['accion_final'] == "EliminarElItem" & isset($_POST['eliminar__nombre']) & isset($_POST['eliminar__descripcion']) & isset($_POST['eliminar__id'])){
			$eliminar__id = $_POST['eliminar__id'];
			$eliminar__nombre = $_POST['eliminar__nombre'];
			$eliminar__descripcion = $_POST['eliminar__descripcion'];
			$sql = mysqli_query($conexion, "DELETE FROM items WHERE id = '$eliminar__id' AND nombreItem = '$eliminar__nombre'");
			
		}


	} 
	 
	 
	 
	 
	 
	 
	 
	 
	 ?>
	<button><a href="../index.php">Regresar</a></button>
	<button id="agregar" value="agregar" type="submit"  name="accion" form="formularioItems">Agregar Ítem</button>
	<h2>Administración de ítems</h2>
    <table  >
		<tr >
			<td class="titulos__tabla">Id</td>
			<td class="titulos__tabla">Nombre</td>
			<td class="titulos__tabla">Descripcion</td>
			<td class="titulos__tabla" colspan="2">Administrar</td>
		</tr>

		<?php 
		$sql="SELECT * from items";
		// Mostramos todos los ítems disponibles
		$result=mysqli_query($conexion,$sql);
		
		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr >
			<td class="texto__tabla"><?php echo $mostrar['id'] ?></td>
			<td class="texto__tabla"><?php echo $mostrar['nombreItem'] ?></td>
			<td class="texto__tabla"><?php echo $mostrar['descripcion'] ?></td>
			<form id ="formularioItems" action="edicionItems.php" method="POST" name="formularioItems">
				<td class="texto__tabla"><button type="submit" name="accion" value="modificar" class="boton__tabla">Modificar</button></td>
				<td class="texto__tabla"><button type="submit" name="accion" value="eliminar" class="boton__tabla">Eliminar</button></td>
				<input type="hidden" name="id__item" value="<?php echo $mostrar['id'] ?>">
				<input type="hidden" name="nombre__item" value="<?php echo $mostrar['nombreItem'] ?>">
				<input type="hidden" name="descripcion__item" value="<?php echo $mostrar['descripcion'] ?>">
			</form>
			
		</tr>
	<?php 
	}
	 ?>
	</table>
	

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
