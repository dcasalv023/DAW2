<?php
include('funciones.php');
$conexion = conectarBD();

// Manejo de la modificación
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si las claves están definidas en $_POST
    if (isset($_POST['venta'], $_POST['nueva_cantidad'])) {
        list($codComercial, $refProducto, $fecha) = explode('-', $_POST['venta']);
        $nuevaCantidad = $_POST['nueva_cantidad'];

        // Verificar si la venta existe antes de la modificación
        $consultaExistencia = "SELECT COUNT(*) as total 
                               FROM Ventas 
                               WHERE codComercial = :codComercial 
                               AND refProducto = :refProducto 
                               AND fecha = :fecha";

        $parametrosExistencia = [
            ':codComercial' => $codComercial,
            ':refProducto' => $refProducto,
            ':fecha' => $fecha,
        ];

        $stmtExistencia = ejecutarConsulta($conexion, $consultaExistencia, $parametrosExistencia);
        $existeVenta = $stmtExistencia->fetchColumn();

        if ($existeVenta) {
            // Modificar la venta
            $consultaModificacion = "UPDATE Ventas 
                                     SET cantidad = :nuevaCantidad 
                                     WHERE codComercial = :codComercial 
                                     AND refProducto = :refProducto 
                                     AND fecha = :fecha";

            $parametrosModificacion = [
                ':nuevaCantidad' => $nuevaCantidad,
                ':codComercial' => $codComercial,
                ':refProducto' => $refProducto,
                ':fecha' => $fecha,
            ];

            $stmtModificacion = ejecutarConsulta($conexion, $consultaModificacion, $parametrosModificacion);

            echo "<p>Venta modificada correctamente.</p>";
        } else {
            echo "<p>La venta no existe. Verifique los datos.</p>";
        }
    } else {
        echo "<p>Por favor, complete todos los campos del formulario.</p>";
    }
}

// Obtener lista de ventas para el formulario
$ventas = ejecutarConsulta($conexion, "SELECT * FROM Ventas")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Venta</title>
    <link rel="stylesheet" type="text/css" href="modificar.css">
</head>
<body>
    <h1>Modificar Venta</h1>
    <form action="modificar_ventas.php" method="post">
        <label for="venta">Seleccione una venta:</label>
        <select name="venta" id="venta">
            <?php foreach ($ventas as $venta): ?>
                <option value="<?php echo $venta['codComercial'] . '-' . $venta['refProducto'] . '-' . $venta['fecha']; ?>">
                    <?php echo $venta['codComercial'] . ' - ' . $venta['refProducto'] . ' - ' . $venta['fecha']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="nueva_cantidad">Nueva Cantidad:</label>
        <input type="number" name="nueva_cantidad" required>

        <button type="submit">Modificar Venta</button>
    </form>
</body>
</html>
