<?php
require_once 'config.php';
if (isset($_SESSION['user_id'])) {
    header('Location: appointments.php');
    exit;
}
require 'header.php';
?>
<h2>Bienvenido al Sistema de Gestión de Citas</h2>
<p>Por favor <a href="login.php">inicia sesión</a> o <a href="register.php">regístrate</a> para comenzar.</p>
<?php require 'footer.php'; ?>