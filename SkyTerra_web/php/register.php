<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Estilos/estilosFormularios.css">
    <link rel="icon" href="/proyecto/Fotos/skyterralogo.png">
	<title>Registro de Usuario</title>
</head>
<body>
	<?php
	

include('conexion-base.php');
session_start();
    // Compruebo que las variables no sean nulas
if (isset($_POST['registrar']) & isset($_POST['nombre']) & isset($_POST['gmail'])) {

    $nombre = $_POST['nombre'];
    $gmail = $_POST['gmail'];
    $contra = $_POST['contra'];
    // Encripto la contraseña
    $contra_hasheada = password_hash($contra, PASSWORD_BCRYPT);

    $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE gmail= '$gmail' OR nombre = '$nombre'");
    $existente = mysqli_fetch_array($query);
    if (isset($existente)){
        // Si se encuentra un nombre o correo coincidente muestro error, sino, registro al usuario.
        echo '<p class="error">La dirección de correo electrónico o el usuario ya está en uso.</p>';
    }else{
        $query = mysqli_query($conexion, "INSERT INTO usuarios(nombre,contraseña,gmail) VALUES ('$nombre','$contra_hasheada','$gmail')");
        if($query){
            header('Location: ./login.php');
        }else{
            echo '<p class="error">¡Algo salió mal!</p>';
        }
    }
    
}

?>


<form method="post" action="" name="formulario-registro">
    <h3>Registro de Usuario</h3>
	<div class="div__nombre">
		<label></label>
		<input type="text" placeholder="Nombre de usuario" name="nombre" pattern="[a-zA-Z0-9]+" required />
	</div>
	<div class="div__gmail">
		<label></label>
		<input type="gmail" placeholder="Correo" name="gmail" required />
	</div>
	<div class="div__contra">
		<label></label>
		<input type="password" placeholder="Contraseña" name="contra" required />
	</div>
	<button type="submit"  name="registrar" value="register" >Registrarse</button>
    <h3>¿Ya tienes una cuenta? <a href="./login.php"><br>Inicia Sesión</a></h3>

	
</form>

</body>
</html>