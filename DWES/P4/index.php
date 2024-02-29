<?php
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if submitted as a guest
    if (isset($_POST["invitado"])) {
        header("Localización: informacion.php");
        exit();
    }

    // Check if both username and password are submitted
    if (!empty($_POST["usuario"]) && !empty($_POST["contrasena"])) {
        // Connect to the database (replace values)
        require_once "funciones.inc.php"; // Include functions file
        $conn = conectarBaseDeDatos();

        try {
            // Get the username and password entered by the user
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];

            // Verify the password using functions from funciones.inc.php
            if (verificarAcceso($usuario, $contrasena)) {
                // Correct password, start session and redirect to aplicacion.php
                $_SESSION["usuario"] = $usuario;
                header("Localización: aplicacion.php");
                exit();
            } else {
                // Incorrect password, display error message
                throw new Exception("usuario o contraseña incorrecto");
            }
        } catch (Exception $e) {
            // Handle any exception, e.g., log or display an error message
            $error = $e->getMessage();
        }

        // Close the database connection
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticación</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br>

        <input type="submit" value="Iniciar sesión">
    </form>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="invitado" value="true">
        <input type="submit" value="Ingresar como invitado">
    </form>
</body>
</html>
