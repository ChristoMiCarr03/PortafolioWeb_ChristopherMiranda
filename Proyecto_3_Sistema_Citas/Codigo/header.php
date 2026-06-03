<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Citas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <h1>📅 Sistema de Citas</h1>
            <?php if (isset($_SESSION['user_id'])): ?>
                <div>
                    <span>Bienvenido, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                    <a href="appointments.php">Mis Citas</a>
                    <a href="create_appointment.php">Nueva Cita</a>
                    <a href="logout.php">Cerrar Sesión</a>
                </div>
            <?php else: ?>
                <div>
                    <a href="login.php">Iniciar Sesión</a>
                    <a href="register.php">Registrarse</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container">