<?php
session_start();
if(!isset($_SESSION['usuario'])) {
    header("Location: /tienda_celulares/vistas/login.php");
    exit();
}

include "../config/conexion.php";

// Consultar tipos de producto
$tipos = $conexion->query("SELECT * FROM tipos_producto");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tipos de Producto</title>
    <a href="/tienda_celulares/vistas/dashboard.php" class="btn btn-primary mb-3">
    ← Volver al Dashboard
</a>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2>Tipos de Producto</h2>

    <!-- Mensaje de éxito/error -->
    <?php if(isset($_SESSION['mensaje'])): ?>
        <div class="alert alert-success"><?= $_SESSION['mensaje']; ?></div>
        <?php unset($_SESSION['mensaje']); ?>
    <?php endif; ?>

    <a href="/tienda_celulares/vistas/tipos_crear.php" class="btn btn-success mb-3">Crear nuevo tipo</a>

    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $tipos->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td>
                    <a href="/tienda_celulares/vistas/tipos_editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/tienda_celulares/acciones/tipos_eliminar.php?id=<?= $row['id'] ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Estás seguro de eliminar este tipo de producto?')">
                       Eliminar
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
