<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION["usuario"])) {
    header("Localización: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Aplicación</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="información.css">
</head>
<body>
    <h2>Información de la Aplicación</h2>

    <p>Bienvenido, <?php echo $_SESSION["usuario"]; ?>, a la aplicación.</p>

    <p>Esta aplicación muestra información sobre su funcionamiento.</p>

    <p>Funcionamiento:</p>
    <ul>
        <li>Si accedes como invitado, solo podrás ver esta página.</li>
        <li>Si te autenticas con un usuario y contraseña correctos, podrás acceder a la página de la aplicación.</li>
    </ul>

    <p><a href="index.php">Volver a la página de inicio</a></p>
</body>
</html>
