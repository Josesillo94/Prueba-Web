<?php

try {
    // Si todo va bien devolver la conexión, sino, mostrar error
    $conexion = mysqli_connect('localhost', 'root', '', 'skyterra_database');
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>