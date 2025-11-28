<?php
session_start();
if(!isset($_SESSION['usuario'])) {
    header("Location: /tienda_celulares/vistas/login.php");
    exit();
}

include "../config/conexion.php";
$tipos = $conexion->query("SELECT * FROM tipos_producto");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4">Crear Producto</h3>

        <form action="/tienda_celulares/acciones/productos_guardar.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo de Producto</label>
                <select name="tipo_id" class="form-select" required>
                    <?php while($t = $tipos->fetch_assoc()) { ?>
                        <option value="<?= $t['id'] ?>"><?= $t['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/tienda_celulares/vistas/productos_listar.php" class="btn btn-secondary">Cancelar</a>
            <a href="/tienda_celulares/vistas/productos_listar.php" class="btn btn-secondary ms-2">Volver</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
