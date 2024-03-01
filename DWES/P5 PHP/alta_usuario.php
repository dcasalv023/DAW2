<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

include 'conexion.php'; 
include 'Usuarios.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $email = $_POST['email'];

    $usuarios = new Usuarios($conexion);
    $resultado = $usuarios->crearUsuario($usuario, $contraseña, $email);

    if ($resultado) {
        echo "Usuario creado correctamente.";
    } else {
        echo "Error al crear usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Usuario</title>
</head>
<body>

<h2>Alta de Usuario</h2>
<form method="post" action="">
    <label for="usuario">Usuario:</label><br>
    <input type="text" id="usuario" name="usuario"><br>
    <label for="contraseña">Contraseña:</label><br>
    <input type="password" id="contraseña" name="contraseña"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br><br>
    <input type="submit" value="Crear usuario">
</form>

</body>
</html>
