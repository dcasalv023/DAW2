<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

include 'conexion.php'; 
include 'Usuarios.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_SESSION['usuario'];
    $nuevoUsuario = $_POST['nuevo_usuario'];
    $nuevaContraseña = $_POST['nueva_contraseña'];
    $nuevoEmail = $_POST['nuevo_email'];

    $usuarios = new Usuarios($conexion);
    $resultado = $usuarios->modificarUsuario($usuario, $nuevoUsuario, $nuevaContraseña, $nuevoEmail);

    if ($resultado) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar datos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Usuario</title>
</head>
<body>

<h2>Modificar Usuario</h2>
<form method="post" action="">
    <label for="nuevo_usuario">Nuevo Usuario:</label><br>
    <input type="text" id="nuevo_usuario" name="nuevo_usuario"><br>
    <label for="nueva_contraseña">Nueva Contraseña:</label><br>
    <input type="password" id="nueva_contraseña" name="nueva_contraseña"><br>
    <label for="nuevo_email">Nuevo Email:</label><br>
    <input type="text" id="nuevo_email" name="nuevo_email"><br><br>
    <input type="submit" value="Guardar cambios">
</form>

</body>
</html>
