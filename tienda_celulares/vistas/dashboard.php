<?php
session_start();
if(!isset($_SESSION['usuario'])) {
    header("Location: /tienda_celulares/vistas/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h1 class="mb-4">Dashboard</h1>
        <p>Bienvenido, <strong><?= $_SESSION['usuario']; ?></strong></p>

        <div class="d-grid gap-2">
            <a href="/tienda_celulares/vistas/productos_listar.php" class="btn btn-primary">CRUD Productos</a>
            <a href="/tienda_celulares/vistas/tipos_listar.php" class="btn btn-success">CRUD Tipos de Producto</a>
            <a href="/tienda_celulares/index.php" class="btn btn-danger">Cerrar sesión</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
