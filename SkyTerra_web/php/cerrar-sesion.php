<?php
  // Destruimos sesión y redirigimos a la página principal
  session_start();
  session_destroy();
  header('Location: ../index.php');
  exit;
?>