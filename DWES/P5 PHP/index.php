<?php
session_start(); // Iniciamos la sesión

// Verificamos si el usuario ya está autenticado
if(isset($_SESSION['usuario'])) {
    header("Location: aplicacion.php"); // Redirigimos al usuario a la página de aplicación
    exit;
}

// Verificamos si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Validamos las credenciales y realizamos el inicio de sesión
    // Código de inicio de sesión aquí...
    // Después de iniciar sesión, redirigimos al usuario a la página de aplicación
    header("Location: aplicacion.php");
    exit;
}

// Verificamos si se ha enviado el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registro"])) {
    // Procesamos el formulario de registro
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $email = $_POST["email"];

    // Validamos los datos del formulario
    if(empty($usuario) || empty($contrasena) || empty($email)) {
        $error_registro = "Por favor, complete todos los campos.";
    } else {
        // Validamos si el usuario ya existe en la base de datos
        require_once 'Usuarios.php';
        $usuarios = new Usuarios($conexion);
        if($usuarios->existeUsuario($usuario)) {
            $error_registro = "El nombre de usuario ya está en uso.";
        } else {
            // Insertamos el nuevo usuario en la base de datos
            if($usuarios->registrarUsuario($usuario, $contrasena, $email)) {
                // Registro exitoso, redirigimos al usuario al inicio de sesión
                header("Location: index.php");
                exit;
            } else {
                $error_registro = "Hubo un error al registrar el usuario. Por favor, inténtelo de nuevo.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión o Registrarse</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form action="" method="post">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario"><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena"><br><br>
        <input type="submit" name="login" value="Iniciar sesión">
    </form>

    <h2>Registrarse</h2>
    <?php if(isset($error_registro)) { ?>
        <p style="color: red;"><?php echo $error_registro; ?></p>
    <?php } ?>
    <form action="" method="post">
        <label for="usuario_reg">Usuario:</label><br>
        <input type="text" id="usuario_reg" name="usuario"><br>
        <label for="contrasena_reg">Contraseña:</label><br>
        <input type="password" id="contrasena_reg" name="contrasena"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" name="registro" value="Registrarse">
    </form>
</body>
</html>


