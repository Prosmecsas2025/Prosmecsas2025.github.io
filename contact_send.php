<?php
header('Content-Type: application/json; charset=utf-8');
// Basic PHP endpoint to save contact form to MySQL (XAMPP).
// Configure these DB settings for your XAMPP installation.
$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = '';
$db_name = 'prosmec_db';

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    echo json_encode(['success'=>false,'error'=>'DB connection failed: '.$conn->connect_error]);
    exit;
}

// sanitize input
$nombre = isset($_POST['nombre']) ? $conn->real_escape_string(strip_tags($_POST['nombre'])) : '';
$email = isset($_POST['email']) ? $conn->real_escape_string(strip_tags($_POST['email'])) : '';
$asunto = isset($_POST['asunto']) ? $conn->real_escape_string(strip_tags($_POST['asunto'])) : '';
$mensaje = isset($_POST['mensaje']) ? $conn->real_escape_string(strip_tags($_POST['mensaje'])) : '';

if (empty($nombre) || empty($email) || empty($mensaje)) {
    echo json_encode(['success'=>false,'error'=>'Faltan campos obligatorios.']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO contactos (nombre, email, asunto, mensaje, creado_en) VALUES (?, ?, ?, ?, NOW())");
$stmt->bind_param("ssss", $nombre, $email, $asunto, $mensaje);
if ($stmt->execute()) {
    echo json_encode(['success'=>true]);
} else {
    echo json_encode(['success'=>false,'error'=>$stmt->error]);
}
$stmt->close();
$conn->close();
?>