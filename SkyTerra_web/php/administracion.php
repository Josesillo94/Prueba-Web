<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../Estilos/estiloFormularioStaff.css">
<link rel="stylesheet" type="text/css" href="../Estilos/estiloItems.css">
<link rel="stylesheet" type="text/css" href="../Estilos/estilosAdministracion.css">
<script src="https://kit.fontawesome.com/62ea397d3a.js" crossorigin="anonymous"></script>
<link rel="icon" href="../Fotos/staff.gif">

<title>Administración</title>
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
		
        if($_POST['accion'] == "eliminarCompras" & isset($_POST['eliminar__Compra'])){
			// Si las variables no son nulas, eliminar compra
            $eliminar__Compra = $_POST['eliminar__Compra'];
            $sql = mysqli_query($conexion, "DELETE FROM productos WHERE ID = '$eliminar__Compra'");
			

        }
        if($_POST['accion'] == "eliminarPostulacion" & isset($_POST['eliminar__Postulacion'])){
			// Si las variables no son nulas, eliminar formulario
            $eliminar__Postulacion = $_POST['eliminar__Postulacion'];
            $sql = mysqli_query($conexion, "DELETE FROM formulariostaff WHERE ID = '$eliminar__Postulacion'");

            

        }





    }
    
    
    
    ?>
	<button><a href="../index.php">Regresar</a></button>
 	<table  >
		 <h2>Tabla Productos Comprados</h2>
		<tr >
			<td class="titulos__tabla">Id</td>
			<td class="titulos__tabla">Nombre Usuario</td>
			<td class="titulos__tabla">Nombre Ítem</td>
            <td class="titulos__tabla">Cantidad</td>
            <td class="titulos__tabla">Precio</td>
            <td class="titulos__tabla">Fecha</td>
			<td class="titulos__tabla">Eliminar</td>
		</tr>

		<?php 
		$sql="SELECT productos.ID, usuarios.nombre, items.nombreItem, Cantidad, Precio, Fecha FROM productos inner join usuarios on productos.id_usuario  = usuarios.id
        inner join items on productos.id_item  = items.id ORDER BY usuarios.nombre";
		$result = mysqli_query($conexion,$sql);
        // Mostrando tabla de productos comprados
        
		
		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr >
			<td class="texto__tabla"><?php echo $mostrar['ID'] ?></td>
			<td class="texto__tabla"><?php echo $mostrar['nombre'] ?></td>
			<td class="texto__tabla"><?php echo $mostrar['nombreItem'] ?></td>
            <td class="texto__tabla"><?php echo $mostrar['Cantidad'] ?></td>
            <td class="texto__tabla"><?php echo $mostrar['Precio'] ?></td>
            <td class="texto__tabla"><?php echo $mostrar['Fecha'] ?></td>
			<form id ="listaCompras" action="administracion.php" method="POST" name="listaCompras">
				<td class="texto__tabla"><button type="submit" name="accion" value="eliminarCompras" class="boton__tabla">Eliminar</button></td>
				<input type="hidden" name="eliminar__Compra" value="<?php echo $mostrar['ID'] ?>">

			</form>
			
		</tr>
	<?php 
	}
	 ?>
	</table>
    <table  >
		<h2>Tabla Postulaciones de Usuarios</h2>
		<tr >
			<td class="titulos__tabla">Id</td>
			<td class="titulos__tabla">Nombre Usuario</td>
			<td class="titulos__tabla">Correo</td>
            <td class="titulos__tabla">Fecha</td>
            <td class="titulos__tabla">Postulación</td>
			<td class="titulos__tabla">Eliminar</td>
		</tr>

		<?php 
		$sql="SELECT formulariostaff.ID, usuarios.nombre, Correo, Fecha, Postulación FROM formulariostaff inner join usuarios on formulariostaff.id_usuario  = usuarios.id";
		$result = mysqli_query($conexion,$sql);
		// Mostrando tabla de postulaciones
		while($mostrar=mysqli_fetch_array($result)){
		 ?>	

		<tr >
			<td class="texto__tabla"><?php echo $mostrar['ID'] ?></td>
			<td class="texto__tabla"><?php echo $mostrar['nombre'] ?></td>
			<td class="texto__tabla"><?php echo $mostrar['Correo'] ?></td>
            <td class="texto__tabla"><?php echo $mostrar['Fecha'] ?></td>
            <td class="texto__tabla"><?php echo $mostrar['Postulación'] ?></td>
			<form id ="listaPostulaciones" action="administracion.php" method="POST" name="listaPostulaciones">
				<td class="texto__tabla"><button type="submit" name="accion" value="eliminarPostulacion" class="boton__tabla">Eliminar</button></td>
				<input type="hidden" name="eliminar__Postulacion" value="<?php echo $mostrar['ID'] ?>">

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
