<?php
include('funciones.php');
$conexion = conectarBD();

$accion = isset($_GET['accion']) ? $_GET['accion'] : '';

switch ($accion) {
    case 'consulta':
        include('consulta_ventas.php');
        break;
    case 'insercion':
        include('insertar_ventas.php');
        break;
    case 'modificar':
        include('modificar_ventas.php');
        break;
    case 'eliminar':
        include('eliminar_ventas.php');
        break;
    default:
        echo "<p>Seleccione una acción válida.</p>";
        break;
}
?>

