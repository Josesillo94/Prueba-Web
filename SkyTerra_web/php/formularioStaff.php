<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../Estilos/estiloFormularioStaff.css">
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
<form id="formularioStaff" method="post" action="formularioStaff.php" name="formularioStaff">
    <h3>Postulación a Staff</h3>
    <div class="div-usuario">
        <label ></label>
        <?php 

        if(isset($_SESSION['nombre_usuario'])){
            // Autocompletamos el nombre de usuario
            echo <<<EOT
            
            <input type='text' name='usuario' placeholder='Usuario' value='$_SESSION[nombre_usuario]' required readonly />

            EOT;
        }else{
            
            echo <<<EOT
            
            <input type='text' name='usuario' placeholder='Usuario' required  />

            EOT;
        
        }
        
        ?>
        
    </div>
    <div >
        <label></label>
        <input type="text" placeholder="Correo" name="gmail"  required />

    </div>
    <div >
        <label></label>
        <textarea placeholder="Mensaje de Postulación" name="mensaje"  required ></textarea>

    </div>

    
    <button type="submit" name="postular"  value="postulo">Postúlate</button>
    <?php
    
	if(isset($_POST['postular'])){
		if(isset($_POST['usuario']) & isset($_POST['gmail']) & isset($_POST['mensaje'])){ 
			// Si las variables no son nulas, se inserta en la base de datos
			$id_usuario = $_SESSION['id_usuario'];
			$correo = $_POST['gmail'];
			$mensaje = $_POST['mensaje'];
			$fecha = date("F j, Y, G:i a");
			$query = mysqli_query($conexion, "INSERT INTO formulariostaff (id_usuario, Correo, Fecha, Postulación) VALUES ('$id_usuario', '$correo', '$fecha', '$mensaje') ");
			header("Location: ../index.php");
			die();
	
	
		}else{
			echo"<p>Proceso erróneo, vuelve a intentarlo</p>";
			
			
		}




	}
    
    
    
    
    ?>
</form>
<footer >
		<div class="footer__div">
				<p class="footer__div-c fas fa-copyright">Copyright SkyTerra 2021</p>
				<p class="footer__div-icon fab fa-instagram"></p>
				<p class="footer__div-icon fab fa-twitter" ></p>
				<p class="footer__div-icon fab fa-youtube"></p>
				<p class="footer__div-j">Web Diseñada por <a href="https://github.com/Josesillo94">Josesillo94</a></p>

		</div>
	</footer>
<script src="..\js\alerta.js" ></script>
</body>

</html>
