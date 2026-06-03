<?php
require_once 'config.php';
if (!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }

$user_id = $_SESSION['user_id'];

// Mensajes flash
$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

$stmt = $pdo->prepare("SELECT * FROM appointments WHERE user_id = ? ORDER BY date ASC, time ASC");
$stmt->execute([$user_id]);
$appointments = $stmt->fetchAll();
?>

<?php require 'header.php'; ?>
<h2>Mis Citas</h2>

<?php if ($message) echo "<div class='alert alert-success'>$message</div>"; ?>

<a href="create_appointment.php" class="btn">➕ Nueva Cita</a>

<table>
    <tr>
        <th>Título</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($appointments as $app): ?>
    <tr>
        <td><?= htmlspecialchars($app['title']) ?></td>
        <td><?= $app['date'] ?></td>
        <td><?= $app['time'] ?></td>
        <td><?= htmlspecialchars($app['description'] ?? '—') ?></td>
        <td>
            <a href="edit_appointment.php?id=<?= $app['id'] ?>" class="btn">Editar</a>
            
            <form method="POST" action="process_appointment.php" style="display:inline;">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= $app['id'] ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar esta cita?')">Eliminar</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php if (empty($appointments)): ?>
    <p>No tienes citas registradas aún.</p>
<?php endif; ?>

<?php require 'footer.php'; ?>