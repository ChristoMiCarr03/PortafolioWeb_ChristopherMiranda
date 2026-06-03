<?php
// config.php
session_start();

$host = 'localhost';
$dbname = 'citas_db';
$username = 'root';      // usuario por defecto de XAMPP
$password = '';          // contraseña por defecto de XAMPP (vacía)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Error de conexión a la base de datos: " . $e->getMessage());
}
?>