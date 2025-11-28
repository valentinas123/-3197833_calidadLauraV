<?php
session_start();
include "../config/conexion.php";

if(isset($_POST['usuario']) && isset($_POST['clave'])) {

    $usuario = $conexion->real_escape_string($_POST['usuario']);
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM usuarios 
            WHERE usuario = '$usuario' 
            AND clave = SHA2('$clave', 256)";

    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $_SESSION['usuario'] = $usuario;
        header("Location: /tienda_celulares/vistas/dashboard.php");
        exit();
    } else {
        header("Location: /tienda_celulares/vistas/login.php?error=Usuario o clave incorrectos");
        exit();
    }

} else {
    header("Location: /tienda_celulares/vistas/login.php?error=Datos incompletos");
    exit();
}
