<?php
session_start();
session_unset();
session_destroy();
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Celulares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hero {
            background: linear-gradient(to bottom right, #007bff, #6610f2);
            color: white;
            padding: 80px 20px;
            text-align: center;
        }

        /* IMÁGENES MÁS PEQUEÑAS Y COMPLETAS */
        .producto-img {
            width: 100%;
            height: 180px;          /* 🔥 MÁS PEQUEÑAS */
            object-fit: contain;    /* 🔥 NO RECORTA, MUESTRA TODO */
            object-position: center;
            background-color: #f8f8f8; /* Fondo gris suave para las que no llenan */
            padding: 10px;          /* Espacio interno para evitar que peguen al borde */
            border-radius: 10px 10px 0 0;
        }

        .card {
            overflow: hidden;
            border-radius: 10px;
        }

        .footer {
            text-align: center;
            padding: 15px;
            background: #f0f0f0;
            margin-top: 40px;
        }
    </style>
</head>
<body class="bg-light">

<!-- HERO -->
<div class="hero">
    <h1 class="display-4 fw-bold">Bienvenido a la Tienda de Celulares</h1>
    <p class="lead">Encuentra los mejores smartphones al mejor precio</p>
    <a href="vistas/login.php" class="btn btn-light btn-lg mt-3">Iniciar Sesión</a>
</div>

<!-- TÍTULO -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Modelos Destacados</h2>

    <!-- GALERÍA -->
    <div class="row g-4">

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <img src="/tienda_celulares/assets/cel1.jpg" class="producto-img" alt="Celular 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Samsung Galaxy</h5>
                    <p class="card-text text-muted">Potencia y diseño moderno.</p>
                    <button class="btn btn-primary">Ver más</button>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <img src="/tienda_celulares/assets/cel2.webp" class="producto-img" alt="Celular 2">
                <div class="card-body text-center">
                    <h5 class="card-title">iPhone Pro</h5>
                    <p class="card-text text-muted">Calidad premium garantizada.</p>
                    <button class="btn btn-primary">Ver más</button>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <img src="/tienda_celulares/assets/cel3.webp" class="producto-img" alt="Celular 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Xiaomi Redmi</h5>
                    <p class="card-text text-muted">Rendimiento y economía.</p>
                    <button class="btn btn-primary">Ver más</button>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <img src="/tienda_celulares/assets/cel4.jfif" class="producto-img" alt="Celular 4">
                <div class="card-body text-center">
                    <h5 class="card-title">Motorola Edge</h5>
                    <p class="card-text text-muted">Tecnología para todos.</p>
                    <button class="btn btn-primary">Ver más</button>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<div class="footer mt-5">
    © <?= date("Y") ?> Tienda de Celulares — Todos los derechos reservados.
</div>

</body>
</html>
