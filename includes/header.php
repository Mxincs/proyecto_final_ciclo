<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luceros IFA</title>
    <link rel="stylesheet" href="/luceros-pfg/css/styles.css">
</head>
<body>

<header>
    <nav class="navbar" aria-label="Navegación Principal">

        <a href="/luceros-pfg/index.php" class="logo-luceros">
            <img src="/luceros-pfg/img/logo_LUCEROS_IFA.png" alt="Logo Luceros IFA">
        </a>

        <ul class="nav-links">
            <li><a href="/luceros-pfg/cursos.php">CURSOS</a></li>

            <?php if (isset($_SESSION['usuario'])): ?>
                <?php if ($_SESSION['rol'] === 'alumno'): ?>
                    <li><a href="/luceros-pfg/alumno/rutinas.php">MIS RUTINAS</a></li>
                <?php endif; ?>
                <?php if ($_SESSION['rol'] === 'profesor'): ?>
                    <li><a href="/luceros-pfg/alumno/rutinas.php">MIS RUTINAS</a></li>
                    <li><a href="/luceros-pfg/profesor/gestionar_cursos.php">GESTIONAR CURSOS</a></li>
                <?php endif; ?>
                <li><a href="/luceros-pfg/logout.php" class="contacto-mod">CERRAR SESIÓN</a></li>
            <?php else: ?>
                <li><a href="/luceros-pfg/login.php">INICIAR SESIÓN</a></li>
                <li><a href="/luceros-pfg/registro.php" class="contacto-mod">REGISTRO</a></li>
            <?php endif; ?>
        </ul>

    </nav>
</header>