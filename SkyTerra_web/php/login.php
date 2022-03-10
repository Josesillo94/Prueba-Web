<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../Estilos/estilosFormularios.css">
    <link rel="icon" href="/proyecto/Fotos/skyterralogo.png">
    <title>Inicio de Sesión</title>
</head>
<body>
    <?php

include('conexion-base.php');
session_start();
// Verifico que las variables no sean nulas
if (isset($_POST['loguear']) & isset($_POST['usuario']) & isset($_POST['contraseña'])) {

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE nombre = '$usuario' OR gmail = '$usuario' ");
    
    $resultado = mysqli_fetch_assoc($query);
    if ($query == 'false') {
        // Si no se encuentra un usuario muestro error, sino, verifico que la contraseña sea correcta y permito continuar al usuario
        echo '<p class="error">La combinación de nombre de usuario o gmail y contraseña es incorrecta.</p>';
    } else {
        if (password_verify($contraseña, $resultado['contraseña'])) {
            $_SESSION['id_usuario'] = $resultado['id'];
            $_SESSION['nombre_usuario'] = $resultado['nombre'];
            $cookie_nombre = "NombreUsuario";
            $cookie_valor = $usuario;
            setcookie($cookie_nombre, $cookie_valor, time() + 30);
            header('Location: ../index.php');
            
        } else {
            echo '<p class="error">La combinación de nombre de usuario y contraseña es incorrecta.</p>';
        }
    }
}

?>
<form method="post" action="" name="formulario-logueo">
    <h3>Bienvenido</h3>
    <div class="div-usuario">
        <label ></label>
        <input type="text" name="usuario" placeholder="Usuario"  required  />
    </div>
    <div class="div-contra">
        <label></label>
        <input type="password" placeholder="Contraseña" name="contraseña" required />
    </div>
    <button type="submit" name="loguear" value="login">Iniciar Sesión</button>
    <h3>¿No tienes una cuenta? <a href="./register.php">Regístrate</a></h3>
</form>

</body>
</html>