<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    try {
        switch ($action) {
            case 'create':
                $title = trim($_POST['title']);
                $description = trim($_POST['description'] ?? '');
                $due_date = !empty($_POST['due_date']) ? $_POST['due_date'] : null;
                $priority = $_POST['priority'] ?? 'media';

                $stmt = $pdo->prepare("INSERT INTO tasks (title, description, due_date, priority) 
                                     VALUES (?, ?, ?, ?)");
                $stmt->execute([$title, $description, $due_date, $priority]);
                break;

            case 'complete':
                $id = $_POST['id'];
                $stmt = $pdo->prepare("UPDATE tasks SET status = 'completada' WHERE id = ?");
                $stmt->execute([$id]);
                break;

            case 'uncomplete':
                $id = $_POST['id'];
                $stmt = $pdo->prepare("UPDATE tasks SET status = 'pendiente' WHERE id = ?");
                $stmt->execute([$id]);
                break;

            case 'update':
                $id = $_POST['id'];
                $title = trim($_POST['title']);
                $description = trim($_POST['description'] ?? '');
                $due_date = !empty($_POST['due_date']) ? $_POST['due_date'] : null;
                $priority = $_POST['priority'] ?? 'media';

                $stmt = $pdo->prepare("UPDATE tasks SET title = ?, description = ?, due_date = ?, priority = ? WHERE id = ?");
                $stmt->execute([$title, $description, $due_date, $priority, $id]);
                break;

            case 'delete':
                $id = $_POST['id'];
                $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
                $stmt->execute([$id]);
                break;
        }

        header("Location: ../index.php");
        exit;

    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>