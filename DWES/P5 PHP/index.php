<?php
session_start();

include 'conexion.php'; // Archivo de conexión a la base de datos

// Incluye la clase Usuarios
include 'Usuarios.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Crear instancia de Usuarios pasando la conexión a la base de datos
    $usuarios = new Usuarios($conexion);

    if ($usuarios->validarInicioSesion($usuario, $contraseña)) {
        $_SESSION['usuario'] = $usuario;
        header('Location: aplicacion.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
</head>
<body>

<h2>Iniciar sesión</h2>
<form method="post" action="">
    <label for="usuario">Usuario:</label><br>
    <input type="text" id="usuario" name="usuario"><br>
    <label for="contraseña">Contraseña:</label><br>
    <input type="password" id="contraseña" name="contraseña"><br><br>
    <input type="submit" value="Iniciar sesión">
</form>

<?php if (isset($error)) echo $error; ?>

</body>
</html>




