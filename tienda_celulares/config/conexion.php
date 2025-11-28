<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$basedatos = "tienda";

$conexion = new mysqli($host, $usuario, $clave, $basedatos);

// Verificar conexión
if ($conexion->connect_error) {
    // Mostrar mensaje de error y detener ejecución
    die("<strong>Error de conexión a la base de datos:</strong> " . $conexion->connect_error);
}

// Establecer charset a UTF-8
$conexion->set_charset("utf8");
?>
