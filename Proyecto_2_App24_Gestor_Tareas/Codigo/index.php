<?php
require_once 'config/db.php';
require_once 'includes/header.php';

// Obtener todas las tareas
$stmt = $pdo->query("SELECT * FROM tasks ORDER BY 
                    CASE WHEN status = 'pendiente' THEN 1 ELSE 2 END, 
                    due_date ASC, created_at DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Contadores
$total = count($tasks);
$pending = 0;
$completed = 0;
foreach ($tasks as $t) {
    if ($t['status'] === 'pendiente') $pending++;
    else $completed++;
}
?>

<div class="main-content">

    <!-- Mensajes -->
    <?php if (isset($_GET['success'])): ?>
        <div class="alert success">✅ Operación realizada correctamente</div>
    <?php endif; ?>

    <!-- Formulario Nueva Tarea -->
    <div class="form-new">
        <h2>➕ Crear nueva tarea</h2>
        <form action="actions/task_actions.php" method="POST">
            <input type="hidden" name="action" value="create">
            
            <div class="form-group">
                <label>Título de la tarea *</label>
                <input type="text" name="title" required placeholder="Ej: Terminar informe">
            </div>

            <div class="form-group">
                <label>Descripción</label>
                <textarea name="description" rows="3" placeholder="Detalles adicionales..."></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Fecha límite</label>
                    <input type="date" name="due_date">
                </div>
                <div class="form-group">
                    <label>Prioridad</label>
                    <select name="priority">
                        <option value="baja">Baja</option>
                        <option value="media" selected>Media</option>
                        <option value="alta">Alta</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn-primary">Guardar Tarea</button>
        </form>
    </div>

    <!-- Lista de Tareas -->
    <h2>📌 Mis Tareas (<?php echo $total; ?>)</h2>

    <div class="task-list">
        <?php if (empty($tasks)): ?>
            <div class="empty-state">
                <h3>No tienes tareas aún</h3>
                <p>Crea tu primera tarea arriba ↑</p>
            </div>
        <?php else: ?>
            <?php foreach ($tasks as $task): ?>
                <div class="task-item <?php echo $task['status'] === 'completada' ? 'completed' : ''; ?>">
                    
                    <form action="actions/task_actions.php" method="POST" style="display:inline;">
                        <input type="hidden" name="action" value="<?php echo $task['status'] === 'pendiente' ? 'complete' : 'uncomplete'; ?>">
                        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                        <button type="submit" class="checkbox">
                            <?php echo $task['status'] === 'completada' ? '✓' : ''; ?>
                        </button>
                    </form>

                    <div class="task-content">
                        <div class="task-title"><?php echo htmlspecialchars($task['title']); ?></div>
                        <?php if (!empty($task['description'])): ?>
                            <div class="task-description"><?php echo nl2br(htmlspecialchars($task['description'])); ?></div>
                        <?php endif; ?>

                        <div class="task-meta">
                            <?php if ($task['due_date']): ?>
                                <span class="task-date">📅 <?php echo date('d M Y', strtotime($task['due_date'])); ?></span>
                            <?php endif; ?>
                            <span class="priority <?php echo $task['priority']; ?>">
                                <?php echo ucfirst($task['priority']); ?>
                            </span>
                        </div>
                    </div>

                    <div class="actions">
                        <button onclick='openEditModal(<?php echo json_encode($task); ?>)' class="btn-small btn-edit">✏️</button>
                        
                        <form action="actions/task_actions.php" method="POST" style="display:inline;" 
                              onsubmit="return confirm('¿Eliminar esta tarea?')">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                            <button type="submit" class="btn-small btn-delete">🗑️</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>