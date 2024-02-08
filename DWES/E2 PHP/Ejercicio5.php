<?php
//Write a PHP program to compute the sum of the digits of a number.

//Escribe un programa PHP para calcular la suma de los dígitos de un número.

function sumaDigitos($numero) {
    $suma = 0;
    
    $numeroStr = (string)$numero;
    
    for ($i = 0; $i < strlen($numeroStr); $i++) {
        $digito = intval($numeroStr[$i]);
        $suma += $digito;
    }
    
    return $suma;
}

$numero = 12345; 

$suma = sumaDigitos($numero);

echo "El número es: " . $numero . "<br>";
echo "La suma de sus dígitos es: " . $suma;
?>