<?php
    //8. Ordena alfabéticamente el siguiente array:
$colores = array("rojo", "verde", "azul", "amarillo");

sort($colores);
foreach ($colores as $clave => $valor) {
    echo "colores[" . $clave . " ] = " . $valor . "\n";
}

?>