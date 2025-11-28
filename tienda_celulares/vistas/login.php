<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card shadow p-4">
                <h3 class="text-center mb-4">Iniciar Sesión</h3>

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger"><?= $_GET['error'] ?></div>
                <?php endif; ?>

                <form action="/tienda_celulares/acciones/login_validar.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Usuario</label>
                        <input type="text" name="usuario" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Clave</label>
                        <input type="password" name="clave" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>
