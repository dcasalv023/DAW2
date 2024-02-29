<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "tu_usuario"; // Reemplaza con tu nombre de usuario de la base de datos
$password = "tu_contraseña"; // Reemplaza con tu contraseña de la base de datos
$database = "tarea4";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Establecer el conjunto de caracteres
$conexion->set_charset("utf8");
?>
