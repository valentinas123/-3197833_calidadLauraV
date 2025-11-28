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
    <title>Crear Tipo de Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4 col-md-4 mx-auto">
        <h3 class="mb-4 text-center">Crear Tipo de Producto</h3>

        <form action="/tienda_celulares/acciones/tipos_guardar.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Guardar</button>
            <a href="/tienda_celulares/vistas/tipos_listar.php" class="btn btn-secondary w-100 mt-2">Cancelar</a>
            <a href="/tienda_celulares/vistas/tipos_listar.php" class="btn btn-secondary w-100 mt-2">Volver</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
