<?php
include "../config/conexion.php";

if(isset($_POST['id'], $_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['tipo_id'])) {
    $id = (int)$_POST['id']; // Cast a entero para mayor seguridad
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $precio = (float)$_POST['precio'];
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $tipo = (int)$_POST['tipo_id'];

    $sql = "UPDATE productos 
            SET nombre='$nombre', precio='$precio', descripcion='$descripcion', tipo_id='$tipo'
            WHERE id=$id";

    if($conexion->query($sql)) {
        header("Location: /tienda_celulares/vistas/productos_listar.php");
        exit();
    } else {
        $error = "Error al actualizar el producto: " . $conexion->error;
    }
} else {
    $error = "Faltan datos obligatorios para actualizar el producto.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <a href="/tienda_celulares/vistas/productos_editar.php?id=<?= $id ?>" class="btn btn-primary">Volver</a>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
