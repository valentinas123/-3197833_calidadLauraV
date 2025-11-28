<?php
include "../config/conexion.php";

if(isset($_POST['nombre']) && !empty($_POST['nombre'])) {
    $nombre = $conexion->real_escape_string($_POST['nombre']);

    $sql = "INSERT INTO tipos_producto (nombre) VALUES ('$nombre')";

    if($conexion->query($sql)) {
        header("Location: /tienda_celulares/vistas/tipos_listar.php");
        exit();
    } else {
        $error = "Error al guardar el tipo de producto: " . $conexion->error;
    }
} else {
    $error = "El nombre del tipo de producto es obligatorio.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Tipo de Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <a href="/tienda_celulares/vistas/tipos_crear.php" class="btn btn-primary">Volver</a>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
