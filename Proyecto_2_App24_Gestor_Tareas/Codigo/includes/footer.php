        <div class="footer">
            TaskFlow © <?php echo date('Y'); ?> • Desarrollado con PHP + MySQL
        </div>
    </div>

    <!-- Modal Editar -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h2>✏️ Editar Tarea</h2>
            <form id="editForm" action="actions/task_actions.php" method="POST">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" id="edit_id">

                <div class="form-group">
                    <label>Título *</label>
                    <input type="text" name="title" id="edit_title" required>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="description" id="edit_description" rows="4"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Fecha límite</label>
                        <input type="date" name="due_date" id="edit_due_date">
                    </div>
                    <div class="form-group">
                        <label>Prioridad</label>
                        <select name="priority" id="edit_priority">
                            <option value="baja">Baja</option>
                            <option value="media">Media</option>
                            <option value="alta">Alta</option>
                        </select>
                    </div>
                </div>

                <div class="modal-buttons">
                    <button type="submit" class="btn-primary">Guardar Cambios</button>
                    <button type="button" onclick="closeEditModal()" class="btn-cancel">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>