<?php
include_once "../config/conexion.php";

$error = "";
$id = 0;

if (
    isset($_POST['id'], $_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['tipo_id'])
) {
    $id = (int)$_POST['id'];
    $nombre = trim($_POST['nombre']);
    $precio = (float)$_POST['precio'];
    $descripcion = trim($_POST['descripcion']);
    $tipo = (int)$_POST['tipo_id'];
    $sql = "UPDATE productos 
            SET nombre = ?, precio = ?, descripcion = ?, tipo_id = ?
            WHERE id = ?";

    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sdsii", $nombre, $precio, $descripcion, $tipo, $id);

        if ($stmt->execute()) {
            header("Location: /tienda_celulares/vistas/productos_listar.php");
            exit;
        } else {
            $error = "Error al actualizar el producto.";
        }

        $stmt->close();
    } else {
        $error = "Error en la consulta SQL.";
    }

} else {
    $error = "Faltan datos obligatorios para actualizar el producto.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <?php if ($error !== ""): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <a href="/tienda_celulares/vistas/productos_editar.php?id=<?= htmlspecialchars($id) ?>" class="btn btn-primary">
            Volver
        </a>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
