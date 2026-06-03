<?php
require_once 'config.php';
if (!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }

require 'header.php';
?>
<h2>Crear Nueva Cita</h2>
<form method="POST" action="process_appointment.php">
    <input type="hidden" name="action" value="create">
    
    <label>Título / Motivo</label>
    <input type="text" name="title" required>
    
    <label>Fecha</label>
    <input type="date" name="date" required>
    
    <label>Hora</label>
    <input type="time" name="time" required>
    
    <label>Descripción (opcional)</label>
    <textarea name="description" rows="4"></textarea>
    
    <button type="submit">Guardar Cita</button>
</form>
<?php require 'footer.php'; ?>