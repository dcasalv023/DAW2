<?php
session_start(); // Iniciamos la sesión

// Verificamos si el usuario está autenticado
if(!isset($_SESSION['usuario'])) {
    header("Location: index.php"); // Redirigimos al usuario a la página de inicio de sesión
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
    <p>Hola, <?php echo $usuario; ?>.</p>
    <p>Esta es la aplicación.</p>
    
    <!-- Opciones de la aplicación -->
    <ul>
        <li><a href="alta_usuario.php">Dar de alta un usuario</a></li>
        <li><a href="modificar_usuario.php">Modificar tus datos</a></li>
        <li><a href="eliminar_usuario.php">Eliminar tu cuenta</a></li>
    </ul>
    
    <!-- Enlace para salir de la sesión -->
    <a href="salir.php">Salir</a>
</body>
</html>

