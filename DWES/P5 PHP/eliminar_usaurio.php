<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

include 'conexion.php'; 
include 'Usuarios.php'; 

$usuario = $_SESSION['usuario'];
$usuarios = new Usuarios($conexion);
$resultado = $usuarios->eliminarUsuario($usuario);

if ($resultado) {
    echo "Usuario eliminado correctamente.";
} else {
    echo "Error al eliminar usuario.";
}
?>
