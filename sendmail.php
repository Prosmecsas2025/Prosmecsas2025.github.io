<?php
// Configuración
$to = "tu-correo@ejemplo.com"; // 🔹 CAMBIA ESTO por tu correo real
$subject = "Nuevo mensaje de contacto - PROSMEC S.A.S.";

// Sanitizar datos
$name = htmlspecialchars(trim($_POST['name']));
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars(trim($_POST['message']));

// Validar que los campos no estén vacíos
if(empty($name) || empty($email) || empty($message)){
    echo "Todos los campos son obligatorios.";
    exit;
}

// Crear el cuerpo del correo
$body = "
Has recibido un nuevo mensaje desde tu página web:

Nombre: $name
Correo: $email
Mensaje:
$message
";

// Encabezados
$headers = "From: PROSMEC Web <no-reply@tudominio.com>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Enviar correo
if(mail($to, $subject, $body, $headers)){
    echo "<h2>¡Gracias! Tu mensaje ha sido enviado.</h2>";
} else {
    echo "<h2>Hubo un error al enviar tu mensaje. Intenta de nuevo.</h2>";
}
?>
