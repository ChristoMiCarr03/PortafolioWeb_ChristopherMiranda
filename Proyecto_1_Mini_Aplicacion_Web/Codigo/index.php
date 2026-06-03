<?php
session_start();

// Si el usuario ya inició sesión, ir al dashboard; si no, al login
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
	header('Location: views/dashboard.html');
	exit();
} else {
	header('Location: views/login.html');
	exit();
}
?>