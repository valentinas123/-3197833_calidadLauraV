<?php
include "../config/conexion.php";

if(isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Convertimos a entero para seguridad

    $sql = "DELETE FROM tipos_producto WHERE id=$id";

    if($conexion->query($sql)) {
        header("Location: /tienda_celulares/vistas/tipos_listar.php");
        exit();
    } else {
        $error = "No se pudo eliminar el tipo de producto: " . $conexion->error;
    }
} else {
    $error = "ID de tipo de producto no proporcionado.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Tipo de Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <a href="/tienda_celulares/vistas/tipos_listar.php" class="btn btn-primary">Volver a Tipos</a>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
