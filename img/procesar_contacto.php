<?php
require 'conexion.php';

// Obtener datos del formulario
$nombre   = $_POST['nombre'];
$correo   = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje  = $_POST['mensaje'];

// Guardar en BD
$sql = "INSERT INTO contactos (nombre, correo, telefono, mensaje)
        VALUES ('$nombre', '$correo', '$telefono', '$mensaje')";

$conn->query($sql);

// Enviar correo
$para = "prosmecsas@gmail.com";
$asunto = "Nuevo mensaje desde la página PROSMEC S.A.S.";
$cuerpo = "
Nuevo mensaje recibido:

Nombre: $nombre
Correo: $correo
Teléfono: $telefono
Mensaje:
$mensaje
";

$header = "From: noreply@prosmec.com\r\n";
$header .= "Reply-To: $correo\r\n";

mail($para, $asunto, $cuerpo, $header);

// Respuesta al usuario
echo "<script>
alert('✅ Mensaje enviado correctamente. ¡Gracias por contactarnos!');
window.location.href='contacto.html';
</script>";
?>
