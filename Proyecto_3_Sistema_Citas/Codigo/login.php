<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: appointments.php');
        exit;
    } else {
        $error = "Correo o contraseña incorrectos.";
    }
}

require 'header.php';
?>
<h2>Iniciar Sesión</h2>
<?php if (isset($error)) echo "<div class='alert alert-error'>$error</div>"; ?>
<?php if (isset($_SESSION['message'])) { echo "<div class='alert alert-success'>" . $_SESSION['message'] . "</div>"; unset($_SESSION['message']); } ?>
<form method="POST">
    <label>Correo electrónico</label>
    <input type="email" name="email" required>
    
    <label>Contraseña</label>
    <input type="password" name="password" required>
    
    <button type="submit">Iniciar Sesión</button>
</form>
<p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
<?php require 'footer.php'; ?>