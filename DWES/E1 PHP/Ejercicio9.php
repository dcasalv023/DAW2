<?php
    //9. Ordena alfabéticamente en orden inverso (de la Z a la A) el siguiente array:
$colores = array("rojo", "verde", "azul", "amarillo");

ksort($colores);
foreach($colores as $key => $val){
    echo $key ." = " .$val . "<br>";
}
?>