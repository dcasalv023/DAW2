<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

include 'conexion.php'; // Archivo de conexión a la base de datos
include 'Usuarios.php'; // Clase Usuarios

$usuario = $_SESSION['usuario'];
$usuarios = new Usuarios($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aplicación</title>
</head>
<body>

<h2>Bienvenido a la aplicación</h2>
<p>Has accedido como <?php echo $usuario; ?></p>

<!-- Aquí puedes agregar los enlaces para dar de alta, modificar, eliminar usuarios y salir -->

</body>
</html>

