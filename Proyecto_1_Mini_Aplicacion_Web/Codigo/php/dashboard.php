<?php
header('Content-Type: application/json; charset=utf-8');
require_once "auth.php";
require_once "../config/database.php";

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

try {
    if ($action === 'get_contacts') {
        $stmt = $conn->prepare("SELECT id, name, phone, email FROM contacts WHERE user_id = ? ORDER BY name ASC");
        $stmt->execute([$_SESSION['user_id']]);
        $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(['status' => 'ok', 'contacts' => $contacts]);
        exit();
    }

    if ($action === 'get_appointments') {
        $stmt = $conn->prepare(
            "SELECT a.id, a.date, a.time, a.description, a.contact_id, c.name AS contact_name
             FROM appointments a
             LEFT JOIN contacts c ON a.contact_id = c.id
             WHERE a.user_id = ?
             ORDER BY a.date DESC, a.time DESC"
        );
        $stmt->execute([$_SESSION['user_id']]);
        $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(['status' => 'ok', 'appointments' => $appointments]);
        exit();
    }

    if ($action === 'add_contact' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
        $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        if ($name === '') { http_response_code(400); echo json_encode(['status'=>'error','message'=>'El nombre es obligatorio']); exit(); }
        $stmt = $conn->prepare("INSERT INTO contacts (user_id, name, phone, email) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_SESSION['user_id'], $name, $phone, $email]);
        $newId = $conn->lastInsertId();
        // return the created contact so the frontend can add it immediately
        $created = ['id' => (int)$newId, 'name' => $name, 'phone' => $phone, 'email' => $email];
        echo json_encode(['status'=>'ok','message'=>'Contacto agregado correctamente','contact' => $created]);
        exit();
    }

    if ($action === 'add_appointment' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $contact_id = isset($_POST['contact_id']) ? intval($_POST['contact_id']) : 0;
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        $time = isset($_POST['time']) ? $_POST['time'] : '';
        $description = isset($_POST['description']) ? trim($_POST['description']) : '';
        if ($contact_id <= 0 || $date === '' || $time === '') { http_response_code(400); echo json_encode(['status'=>'error','message'=>'Contacto, fecha y hora son obligatorios']); exit(); }
        $stmt = $conn->prepare("INSERT INTO appointments (user_id, contact_id, date, time, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$_SESSION['user_id'], $contact_id, $date, $time, $description]);
        echo json_encode(['status'=>'ok','message'=>'Cita agregada correctamente']);
        exit();
    }

    http_response_code(400);
    echo json_encode(['status'=>'error','message'=>'Acción inválida']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['status'=>'error','message'=>$e->getMessage()]);
}

?>
