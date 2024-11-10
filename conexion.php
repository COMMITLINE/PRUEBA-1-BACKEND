<?php
$host = "localhost";
$usuario = "root"; // 
$contraseña = "tu_contraseña"; // contraseña de MySQL
$base_datos = "nombre_base_datos"; // nombre de la base de datos

$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
} else {
    echo "Conexión exitosa a la base de datos";
}

//cerrar la conexión después de usarla
$conexion->close();
?>
