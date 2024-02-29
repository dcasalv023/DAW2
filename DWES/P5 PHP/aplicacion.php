<?php
session_start(); // Iniciamos la sesión

// Verificamos si el usuario está autenticado
if(!isset($_SESSION['usuario'])) {
    header("Location: index.php"); // Redirigimos al usuario a la página de inicio de sesión
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aplicación</title>
</head>
<body>
    <h2>Bienvenido a la aplicación</h2>
    <p>Hola, <?php echo $_SESSION['usuario']; ?>.</p>
    <p>Esta es la aplicación.</p>
    <a href="salir.php">Salir</a>
</body>
</html>
