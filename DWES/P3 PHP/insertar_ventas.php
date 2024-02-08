<?php
include('funciones.php');
$conexion = conectarBD();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codComercial = $_POST['comercial'];
    $refProducto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];

    // Verificar si el comercial y el producto existen antes de la inserción
    $consultaExistenciaComercial = "SELECT COUNT(*) as total FROM Comerciales WHERE codigo = :codComercial";
    $stmtExistenciaComercial = $conexion->prepare($consultaExistenciaComercial);
    $stmtExistenciaComercial->bindParam(':codComercial', $codComercial);
    $stmtExistenciaComercial->execute();
    $existeComercial = $stmtExistenciaComercial->fetchColumn();

    $consultaExistenciaProducto = "SELECT COUNT(*) as total FROM Productos WHERE referencia = :refProducto";
    $stmtExistenciaProducto = $conexion->prepare($consultaExistenciaProducto);
    $stmtExistenciaProducto->bindParam(':refProducto', $refProducto);
    $stmtExistenciaProducto->execute();
    $existeProducto = $stmtExistenciaProducto->fetchColumn();

    if ($existeComercial && $existeProducto) {
        // Insertar la venta
        $consultaInsercion = "INSERT INTO Ventas (codComercial, refProducto, cantidad, fecha)
                              VALUES (:codComercial, :refProducto, :cantidad, :fecha)";
        $stmtInsercion = $conexion->prepare($consultaInsercion);
        $stmtInsercion->bindParam(':codComercial', $codComercial);
        $stmtInsercion->bindParam(':refProducto', $refProducto);
        $stmtInsercion->bindParam(':cantidad', $cantidad);
        $stmtInsercion->bindParam(':fecha', $fecha);
        $stmtInsercion->execute();

        echo "<p>Venta insertada correctamente.</p>";
    } else {
        echo "<p>El comercial o el producto no existen. Verifique los datos.</p>";
    }
}

// Obtener lista de comerciales y productos para el formulario
$comerciales = ejecutarConsulta($conexion, "SELECT * FROM Comerciales")->fetchAll(PDO::FETCH_ASSOC);
$productos = ejecutarConsulta($conexion, "SELECT * FROM Productos")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Venta</title>
    <link rel="stylesheet" type="text/css" href="insertar.css">

</head>
<body>
    <h1>Insertar Venta</h1>
    <form action="insertar_ventas.php" method="post">
        <label for="comercial">Seleccione un comercial:</label>
        <select name="comercial" id="comercial">
            <?php foreach ($comerciales as $comercial): ?>
                <option value="<?php echo $comercial['codigo']; ?>"><?php echo $comercial['nombre']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="producto">Seleccione un producto:</label>
        <select name="producto" id="producto">
            <?php foreach ($productos as $producto): ?>
                <option value="<?php echo $producto['referencia']; ?>"><?php echo $producto['nombre']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" required>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required>

        <button type="submit">Insertar Venta</button>
    </form>
</body>
</html>
