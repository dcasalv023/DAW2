<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicacion</title>
</head>
<body>
    <?php
    session_start();
    require("Usuarios.php");
    echo 'Inicio en la Aplicación con éxito';
    ?>
    <h1>Bienvenido <?php echo $_SESSION['username']?></h1>
    <h2>Inicio sesión : <?php echo $_SESSION['login_time']?></h2>
    <form action="aplicacion.php" method="post">
        <button type="submit" name="register_form">Registrar nuevo usuario</button>
        <button type="submit" name="modify_user">Modificar usuario</button>
        <button type="submit" name="delete_user">Eliminar usuario</button>
        <button type="submit" name="logout">Cerrar sesión</button>
    </form>
    
    <?php
    if (isset($_POST["logout"])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }

    if(isset($_POST["register_form"])){
        echo "<br>";
        displayRegistrationForm();
    }

    if(isset($_POST["modify_user"])){
        echo "<br>";
        displayModifyForm();
    }

    if(isset($_POST["modify"])){
        if(findUserData()){
            $user = findUserData();
            displayModifyUserForm($user);
        }else{
            echo "<br>";
            echo "Usuario no encontrado.";
        }
    }

    if(isset($_POST["modify_data"])){
        echo "<br>";
        modifyUser();
    }

    if(isset($_POST["delete_user"])){
        echo "<br>";
        displayDeleteForm();
    }

    if(isset($_POST['register'])){
        registerUser();
    }

    if(isset($_POST['delete'])){
        deleteUser();
    }
    echo "<br>";
    displayUserData();
    ?>
</body>
</html>
