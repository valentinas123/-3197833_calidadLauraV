<?php
session_start();
if(!isset($_SESSION['usuario'])) {
    header("Location: /tienda_celulares/vistas/login.php");
    exit();
}

include "../config/conexion.php";

$query = $conexion->query("
    SELECT productos.*, tipos_producto.nombre AS tipo 
    FROM productos 
    JOIN tipos_producto ON productos.tipo_id = tipos_producto.id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <a href="/tienda_celulares/vistas/dashboard.php" class="btn btn-primary mb-3">
    ← Volver al Dashboard
</a>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Productos</h2>
        <a href="/tienda_celulares/vistas/productos_crear.php" class="btn btn-success">Crear nuevo producto</a>
    </div>

    <table class="table table-bordered table-striped bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $query->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= number_format($row['precio'], 2) ?></td>
                <td><?= $row['tipo'] ?></td>
                <td>
                    <a href="/tienda_celulares/vistas/productos_editar.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                    <a href="/tienda_celulares/acciones/productos_eliminar.php?id=<?= $row['id'] ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
