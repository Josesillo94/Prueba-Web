<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="./Estilos/estiloTienda.css">
<script src="https://kit.fontawesome.com/62ea397d3a.js" crossorigin="anonymous"></script>
<link rel="icon" href="./Fotos/tienda.png">

<title>Tienda</title>
</head>

<body>

<nav class="nav">
			<ul class="nav__ul">
				<a href="index.php"><image class="nav__li-logo" src="./Fotos/skyterralogo.png"></a>
				<li class="nav__li fas fa-sign-in-alt" id="iniciarSesion"><?php
					session_start();
					// Si el usuario no está registrado, mostrar iniciar sesión, sino, mostrar Cerrar sesión
					if(!empty($_SESSION['id_usuario'] )){

						echo '<a href = "./php/cerrar-sesion.php">Cerrar sesión</a>';
						
					}else{
						echo '<a href = "./php/login.php">Iniciar sesión</a>';
						
					}
					?>
				</li> 
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
								if(!empty($_SESSION['nombre_usuario'] )){
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
include('.\php\conexion-base.php');
 ?>
<form id="formulariocompraTienda" method="post" action="tienda.php" name="formularioTienda">
    <h3>Bienvenido a Nuestra Tienda</h3>
    <div class="div-usuario">
        <label ></label>
        <?php 

        if(isset($_SESSION['nombre_usuario'])){
            // Mostrar en el campo usuario el nombre de usuario y hacerlo readonly
            echo <<<EOT
            
            <input type='text' name='usuario' placeholder='Usuario' value='$_SESSION[nombre_usuario]' required readonly  />

            EOT;
        }
        
        ?>
        
    </div>
    <div class="div-objeto">
        <label for="objetos">Elige un objeto:</label>
		<select name="objetos" id="objetos">
		<?php 
		$sql="SELECT * from items";
		$result=mysqli_query($conexion,$sql);
			// Mostrar todos los ítems de la base de datos
		while($mostrar=mysqli_fetch_array($result)){
			
		 ?>
			
			<option value="<?php echo "$mostrar[nombreItem]" ?>"><?php echo "$mostrar[nombreItem] " ?></option>
			
			
			
		<?php
		 
		}
		?>
        
            
        </select>
		
		
    </div>
    <div class="div-cantidad">
        <label></label>
        <input type="number" placeholder="Cantidad" id="cantidadItems" name="cantidad" pattern="[1,9]{1,5}" required />
    </div>
    <div class="div-precio">
        <label></label>
        <input type="number" placeholder="Precio" name="precio" id="precioItems" readonly /><label id="euro">€</label>
    </div>
    <button type="submit" name="comprar"  value="comprar">Realizar Compra</button>
    <?php
    
	if(isset($_POST['comprar'])){// Compruebo que no sean nulas las variables
		if(isset($_SESSION['id_usuario']) & isset($_POST['objetos']) & isset($_POST['cantidad']) & isset($_POST['precio'])){ 
			$objeto = $_POST['objetos'];
			// Obtengo los ítems con el nombre marcado anteriormente
			$sql = mysqli_query($conexion, "SELECT id FROM items WHERE nombreItem = '$objeto'");
			$mostrar=mysqli_fetch_array($sql);
			
			$id_usuario = $_SESSION['id_usuario'];
			$cantidad = $_POST['cantidad'];
			$precio = $_POST['precio'];
			$precio = $precio . " €";
			$fecha = date("F j, Y, G:i a"); 
			// Inserto la compra del ítem
			$query = mysqli_query($conexion, "INSERT INTO productos (Cantidad, Precio, Fecha, id_usuario, id_item) VALUES ('$cantidad', '$precio', '$fecha', '$id_usuario', '$mostrar[0]') ");
			header("Location: ./index.php");
			die();
			
	
	
		}else{
			echo"<p>Proceso erróneo, vuelve a intentarlo</p>";
			
			
		}




	}
    
    
    
    
    ?>
</form>
<table  >
		<h2>Historial de Compra</h2>
		<tr>
			<td class="titulos__tabla">Id Compra</td>
			<td class="titulos__tabla">Nombre Usuario</td>
			<td class="titulos__tabla">Nombre del Ítem</td>
			<td class="titulos__tabla">Cantidad</td>
			<td class="titulos__tabla">Precio</td>
			<td class="titulos__tabla">Fecha</td>		
		</tr>

		<?php
		// Localizo todas las compras hechas por el usuario
		$nombreUsuario = $_SESSION['nombre_usuario']; 
		$sql="SELECT productos.ID, usuarios.nombre, items.nombreItem, Cantidad, Precio, Fecha from productos inner join usuarios on 
		productos.id_usuario = usuarios.id inner join items on productos.id_item = items.id WHERE usuarios.nombre =  '$nombreUsuario'";
		$result=mysqli_query($conexion,$sql);
			// Muestro todas las compras
		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td class="texto__tabla"><?php echo $mostrar['ID'] ?></td>
			<td class="texto__tabla"><?php echo $mostrar['nombre'] ?></td>
			<td class="texto__tabla"><?php echo $mostrar['nombreItem'] ?></td>
			<td class="texto__tabla"><?php echo $mostrar['Cantidad'] ?></td>
			<td class="texto__tabla"><?php echo $mostrar['Precio'] ?></td>
			<td class="texto__tabla"><?php echo $mostrar['Fecha'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>
	<button><a href="./index.php">Regresar</a></button>



<footer >
		<div class="footer__div">
				<p class="footer__div-c fas fa-copyright">Copyright SkyTerra 2021</p>
				<p class="footer__div-icon fab fa-instagram"></p>
				<p class="footer__div-icon fab fa-twitter" ></p>
				<p class="footer__div-icon fab fa-youtube"></p>
				<p class="footer__div-j">Web Diseñada por <a href="https://github.com/Josesillo94">Josesillo94</a></p>

		</div>
	</footer>
<script src=".\js\codigo.js" ></script>
</body>

</html>
