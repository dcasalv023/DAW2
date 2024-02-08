<?php
include('funciones.php');
$conexion = conectarBD();

// Manejo de la eliminación
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si las claves están definidas en $_POST
    if (isset($_POST['venta'])) {
        list($codComercial, $refProducto, $fecha) = explode('-', $_POST['venta']);

        // Verificar si la venta existe antes de la eliminación
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
            // Eliminar la venta
            $consultaEliminacion = "DELETE FROM Ventas 
                                    WHERE codComercial = :codComercial 
                                    AND refProducto = :refProducto 
                                    AND fecha = :fecha";

            $parametrosEliminacion = [
                ':codComercial' => $codComercial,
                ':refProducto' => $refProducto,
                ':fecha' => $fecha,
            ];

            $stmtEliminacion = ejecutarConsulta($conexion, $consultaEliminacion, $parametrosEliminacion);

            echo "<p>Venta eliminada correctamente.</p>";
        } else {
            echo "<p>La venta no existe. Verifique los datos.</p>";
        }
    } else {
        echo "<p>Por favor, seleccione una venta para eliminar.</p>";
    }
}

// Obtener lista de ventas para el formulario
$ventas = ejecutarConsulta($conexion, "SELECT * FROM Ventas")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Venta</title>
    <link rel="stylesheet" type="text/css" href="eliminar.css">
</head>
<body>
    <h1>Eliminar Venta</h1>
    <form action="eliminar_ventas.php" method="post">
        <label for="venta">Seleccione una venta:</label>
        <select name="venta" id="venta">
            <?php foreach ($ventas as $venta): ?>
                <option value="<?php echo $venta['codComercial'] . '-' . $venta['refProducto'] . '-' . $venta['fecha']; ?>">
                    <?php echo $venta['codComercial'] . ' - ' . $venta['refProducto'] . ' - ' . $venta['fecha']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Eliminar Venta</button>
    </form>
</body>
</html>
