<?php
// Verificar si la función conectarBD no existe antes de declararla
if (!function_exists('conectarBD')) {
    function conectarBD() {
        $host = "localhost";
        $dbname = "ventas_comerciales";
        $usuario = "dwes";
        $contrasena = "abc123";

        try {
            $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $contrasena);
            return $conexion;
        } catch (PDOException $e) {
            die("Error en la conexión a la base de datos: " . $e->getMessage());
        }
    }
}

// Verificar si la función ejecutarConsulta no existe antes de declararla
if (!function_exists('ejecutarConsulta')) {
    function ejecutarConsulta($conexion, $consulta, $parametros = []) {
        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->execute($parametros);
            return $stmt;
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }
}
?>
