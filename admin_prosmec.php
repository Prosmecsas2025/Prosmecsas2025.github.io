<?php
require 'conexion.php';

// Contraseña del panel
$passCorrecta = "Prosmec2025";

if (!isset($_POST['pass'])) {
?>
<form method="POST">
  <h2>Acceso al panel PROSMEC</h2>
  <input type="password" name="pass">
  <button type="submit">Entrar</button>
</form>
<?php
  exit;
}

if ($_POST['pass'] !== $passCorrecta) {
  exit("Contraseña incorrecta");
}

$consulta = $conn->query("SELECT * FROM contactos ORDER BY fecha DESC");
?>

<h1>Mensajes recibidos</h1>
<table border="1" cellpadding="8">
<tr>
  <th>ID</th>
  <th>Nombre</th>
  <th>Correo</th>
  <th>Teléfono</th>
  <th>Mensaje</th>
  <th>Fecha</th>
</tr>

<?php while($row = $consulta->fetch_assoc()) { ?>
<tr>
  <td><?= $row['id'] ?></td>
  <td><?= $row['nombre'] ?></td>
  <td><?= $row['correo'] ?></td>
  <td><?= $row['telefono'] ?></td>
  <td><?= $row['mensaje'] ?></td>
  <td><?= $row['fecha'] ?></td>
</tr>
<?php } ?>
</table>
