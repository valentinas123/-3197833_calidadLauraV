<?php
include "../config/conexion.php";

if(isset($_POST['id'], $_POST['nombre'])) {
    $id = (int)$_POST['id']; // Convertimos a entero para seguridad
    $nombre = $conexion->real_escape_string($_POST['nombre']);

    $sql = "UPDATE tipos_producto SET nombre='$nombre' WHERE id=$id";

    if($conexion->query($sql)) {
        header("Location: /tienda_celulares/vistas/tipos_listar.php");
        exit();
    } else {
        $error = "Error al actualizar el tipo de producto: " . $conexion->error;
    }
} else {
    $error = "Faltan datos obligatorios para actualizar el tipo de producto.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Tipo de Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <a href="/tienda_celulares/vistas/tipos_editar.php?id=<?= $id ?>" class="btn btn-primary">Volver</a>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
