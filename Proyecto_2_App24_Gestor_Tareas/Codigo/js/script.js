// Actualizar contadores en el header
function updateCounters() {
    const total = document.querySelectorAll('.task-item').length;
    const completed = document.querySelectorAll('.task-item.completed').length;
    const pending = total - completed;

    const totalEl = document.getElementById('total-tasks');
    const pendingEl = document.getElementById('pending-tasks');
    const completedEl = document.getElementById('completed-tasks');

    if (totalEl) totalEl.textContent = total;
    if (pendingEl) pendingEl.textContent = pending;
    if (completedEl) completedEl.textContent = completed;
}

// Abrir modal de edición
function openEditModal(task) {
    document.getElementById('edit_id').value = task.id;
    document.getElementById('edit_title').value = task.title;
    document.getElementById('edit_description').value = task.description || '';
    document.getElementById('edit_due_date').value = task.due_date || '';
    document.getElementById('edit_priority').value = task.priority;
    
    document.getElementById('editModal').style.display = 'flex';
}

// Cerrar modal
function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}

// Ejecutar al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    updateCounters();

    // Cerrar modal con tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") {
            closeEditModal();
        }
    });

    // Cerrar modal al hacer clic fuera del contenido
    const modal = document.getElementById('editModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeEditModal();
            }
        });
    }
});