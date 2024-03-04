<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>
<body>
<form action="index.php" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br>
    <button type="submit" name="login">Iniciar Sesión</button>
</form>


    <?php
    session_start();
    include("Usuarios.php");

    if (isset($_SESSION['authenticated_user']) && $_SESSION['authenticated_user'] === true) {
        header("Location: application.php");
        exit();
    }

    if (isset($_POST['login'])) {
        $username = $_POST["username"]; 
        $password = $_POST["password"]; 
        $loginTime = date('H:i:s');
    
        $storedHash = getDatabaseHash($username);
    
        if ($storedHash && password_verify($password, $storedHash)) {
            $_SESSION['authenticated_user'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['login_time'] = $loginTime;
            header("Location: application.php");
            exit();
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    }
    
    ?>
</body>
</html>





