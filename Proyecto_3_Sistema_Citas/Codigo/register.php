<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $error = "Las contraseñas no coinciden.";
    } elseif (strlen($password) < 6) {
        $error = "La contraseña debe tener al menos 6 caracteres.";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        try {
            $stmt->execute([$username, $email, $hashed]);
            $_SESSION['message'] = "¡Registro exitoso! Ahora puedes iniciar sesión.";
            header('Location: login.php');
            exit;
        } catch (PDOException $e) {
            $error = "El usuario o correo ya existe.";
        }
    }
}

require 'header.php';
?>
<h2>Registro de Usuario</h2>
<?php if (isset($error)) echo "<div class='alert alert-error'>$error</div>"; ?>
<form method="POST">
    <label>Usuario</label>
    <input type="text" name="username" required>
    
    <label>Correo electrónico</label>
    <input type="email" name="email" required>
    
    <label>Contraseña</label>
    <input type="password" name="password" required>
    
    <label>Confirmar Contraseña</label>
    <input type="password" name="confirm_password" required>
    
    <button type="submit">Registrarse</button>
</form>
<p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
<?php require 'footer.php'; ?>