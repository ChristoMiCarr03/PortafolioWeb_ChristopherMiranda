<?php
require_once 'config.php';

if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$action  = $_POST['action'] ?? '';

try {
    if ($action === 'create') {
        $stmt = $pdo->prepare("INSERT INTO appointments (user_id, title, date, time, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $user_id,
            trim($_POST['title']),
            $_POST['date'],
            $_POST['time'],
            trim($_POST['description'] ?? '')
        ]);
        $_SESSION['message'] = "✅ Cita creada correctamente.";
    }
    
    elseif ($action === 'update') {
        $id = (int)$_POST['id'];
        // Verificamos que la cita pertenezca al usuario
        $check = $pdo->prepare("SELECT id FROM appointments WHERE id = ? AND user_id = ?");
        $check->execute([$id, $user_id]);
        if ($check->fetch()) {
            $stmt = $pdo->prepare("UPDATE appointments SET title=?, date=?, time=?, description=? WHERE id=? AND user_id=?");
            $stmt->execute([
                trim($_POST['title']),
                $_POST['date'],
                $_POST['time'],
                trim($_POST['description'] ?? ''),
                $id,
                $user_id
            ]);
            $_SESSION['message'] = "✅ Cita actualizada correctamente.";
        }
    }
    
    elseif ($action === 'delete') {
        $id = (int)$_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM appointments WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $user_id]);
        $_SESSION['message'] = "✅ Cita eliminada correctamente.";
    }
    
} catch (Exception $e) {
    $_SESSION['message'] = "❌ Error: " . $e->getMessage();
}

header('Location: appointments.php');
exit;
?>