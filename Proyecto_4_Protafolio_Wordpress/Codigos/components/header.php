<?php
// Detecta el nombre del archivo actual en la raíz para la clase activa
$pagina_actual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio - Christopher Miranda</title>
    <!-- Ruta ajustada a la carpeta de assets -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Iconos globales -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <!-- NAVBAR GLOBAL -->
    <header class="navbar">
        <div class="nav-container">
            <div class="logo">Blog</div>
            <nav>
                <ul class="nav-links">
                    <li><a href="index.php" class="nav-item <?php echo ($pagina_actual == 'index.php') ? 'active' : ''; ?>">HOME</a></li>
                    <li><a href="sobre-mi.php" class="nav-item <?php echo ($pagina_actual == 'sobre-mi.php') ? 'active' : ''; ?>">SOBRE MÍ</a></li>
                    <li><a href="portafolio.php" class="nav-item <?php echo ($pagina_actual == 'portafolio.php') ? 'active' : ''; ?>">PORTAFOLIO</a></li>
                    <li><a href="servicios.php" class="nav-item <?php echo ($pagina_actual == 'servicios.php') ? 'active' : ''; ?>">SERVICIOS</a></li>
                    <li><a href="contacto.php" class="nav-item <?php echo ($pagina_actual == 'contacto.php') ? 'active' : ''; ?>">CONTACTO</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Contenedor principal de vistas -->
    <main class="page-content">