<?php
//Write a PHP program to remove duplicates from a sorted list.
//Input: (1,1,2,2,3,4,5,5)
//Output: (1,2,3,4,5)

//Escriba un programa PHP para eliminar duplicados de una lista ordenada.
//Entrada: (1,1,2,2,3,4,5,5)
//Salida: (1,2,3,4,5)

$entrada = array(1, 1, 2, 2, 3, 4, 5, 5);
$salida = array();

$longitud = count($entrada);

if($longitud > 0) {
    $salida[] = $entrada[0];

    for ($i = 1; $i < $longitud; $i++){
        if ($entrada[$i] != $entrada[$i - 1]) {
            $salida[] = $entrada[$i];
        }
    }
}

echo "Entrada: (" . implode(".", $entrada) . ")<br>";
echo "Salida: (" . implode(".", $salida) . ")";

?>