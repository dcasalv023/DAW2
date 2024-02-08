<?php
include('funciones.php');
$conexion = conectarBD();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codComercial = $_POST['comercial'];

    // Consulta las ventas del comercial seleccionado
    $consulta = "SELECT V.*, P.nombre as nombre_producto 
                 FROM Ventas V 
                 INNER JOIN Productos P ON V.refProducto = P.referencia 
                 WHERE V.codComercial = :codComercial";

    try {
        $consulta = "SELECT V.*, P.nombre as nombre_producto 
             FROM Ventas V 
             INNER JOIN Productos P ON V.refProducto = P.referencia 
             WHERE V.codComercial = :codComercial";

try {
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':codComercial', $codComercial, PDO::PARAM_INT);
    $stmt->execute();
    $ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error en la consulta: " . $e->getMessage());
}

        $ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
    }
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Ventas</title>
    <link rel="stylesheet" type="text/css" href="consulta.css">

</head>
<body>
    <h1>Consulta de Ventas</h1>
    <form action="ventas.php?accion=consulta" method="post">
        <label for="comercial">Seleccione un comercial:</label>
        <select name="comercial" id="comercial">
            <?php
            $comerciales = ejecutarConsulta($conexion, "SELECT * FROM Comerciales")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($comerciales as $comercial):
            ?>
                <option value="<?php echo $comercial['codigo']; ?>"><?php echo $comercial['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Consultar Ventas</button>
    </form>

    <?php if (isset($ventas)): ?>
        <h2>Ventas del Comercial</h2>
        <table border="1">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>
            <?php foreach ($ventas as $venta): ?>
                <tr>
                    <td><?php echo $venta['nombre_producto']; ?></td>
                    <td><?php echo $venta['cantidad']; ?></td>
                    <td><?php echo $venta['fecha']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
