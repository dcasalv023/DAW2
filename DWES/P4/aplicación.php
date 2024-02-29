<?php
session_start();

// Check if the user is not authenticated
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}

// Update the connection time in the session
$_SESSION["hora_conexion"] = date("H:i:s");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="aplicacion.css">
</head>
<body>
    <h2>Bienvenido a la Aplicación, <?php echo $_SESSION["usuario"]; ?>!</h2>

    <p>Hora de conexión: <?php echo $_SESSION["hora_conexion"]; ?></p>

    <h3>Menú</h3>
    <ul>
        <li><a href="informacion.php">Ir a la página de información</a></li>
        <li><a href="preferencias.php">Ir a la página de preferencias</a></li>
        <li><a href="logout.php">Cerrar sesión</a></li>
    </ul>
</body>
</html>
