<?php
session_start();
require_once "../config/database.php";
// Ensure this script is reached via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../views/login.html");
    exit();
}

$email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';

if ($email === '' || $password === '') {
    header("Location: ../views/login.html?error=empty");
    exit();
}

try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Error en la consulta: " . $e->getMessage());
}

if ($user && password_verify($password, $user["password"])) {
    $_SESSION["user_id"] = $user["id"];
    header("Location: ../views/dashboard.html");
    exit();
} else {
    header("Location: ../views/login.html?error=credentials");
    exit();
}
?>