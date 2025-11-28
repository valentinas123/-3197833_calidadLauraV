<?php
include "../config/conexion.php";

if(isset($_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['tipo_id'])) {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $precio = (float)$_POST['precio'];
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $tipo = (int)$_POST['tipo_id'];

    $sql = "INSERT INTO productos (nombre, precio, descripcion, tipo_id)
            VALUES ('$nombre', '$precio', '$descripcion', '$tipo')";

    if($conexion->query($sql)) {
        header("Location: /tienda_celulares/vistas/productos_listar.php");
        exit();
    } else {
        $error = "Error al guardar el producto: " . $conexion->error;
    }
} else {
    $error = "Faltan datos obligatorios para crear el producto.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <a href="/tienda_celulares/vistas/productos_crear.php" class="btn btn-primary">Volver</a>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
