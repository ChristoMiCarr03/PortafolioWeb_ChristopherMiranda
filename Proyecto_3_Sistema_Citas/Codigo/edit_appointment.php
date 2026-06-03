<?php
require_once 'config.php';
if (!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }

$user_id = $_SESSION['user_id'];
$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM appointments WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $user_id]);
$appointment = $stmt->fetch();

if (!$appointment) {
    $_SESSION['message'] = "Cita no encontrada o no tienes permiso.";
    header('Location: appointments.php');
    exit;
}

require 'header.php';
?>
<h2>Editar Cita</h2>
<form method="POST" action="process_appointment.php">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="id" value="<?= $appointment['id'] ?>">
    
    <label>Título / Motivo</label>
    <input type="text" name="title" value="<?= htmlspecialchars($appointment['title']) ?>" required>
    
    <label>Fecha</label>
    <input type="date" name="date" value="<?= $appointment['date'] ?>" required>
    
    <label>Hora</label>
    <input type="time" name="time" value="<?= $appointment['time'] ?>" required>
    
    <label>Descripción</label>
    <textarea name="description" rows="4"><?= htmlspecialchars($appointment['description'] ?? '') ?></textarea>
    
    <button type="submit">Actualizar Cita</button>
</form>
<?php require 'footer.php'; ?>