<?php
session_start(); // Iniciamos la sesión
session_unset(); // Borramos todas las variables de sesión
session_destroy(); // Destruimos la sesión
header("Location: index.php"); // Redirigimos al usuario a la página de inicio de sesión
exit;
?>
