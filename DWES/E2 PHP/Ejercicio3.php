<?php

//Write a PHP program to compute the sum of the prime numbers less than 100.
//Note: There are 25 prime numbers are there in less than 100.
//2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97 and sum of all these numbers is 1060.


//Escribe un programa PHP para calcular la suma de los números primos menores que 100.
//Nota: Hay 25 números primos en menos de 100.
//2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97 y La suma de todos estos números es 1060.


function esPrimo($numero) {
    if ($numero <= 1) {
        return false;
    }
    for ($i = 2; $i * $i <= $numero; $i++) {
        if ($numero % $i === 0) {
            return false;
        }
    }
    return true;
}

$suma = 0;

for ($numero = 2; $numero < 100; $numero++) {
    if (esPrimo($numero)) {
        $suma += $numero;
    }
}

echo "La suma de los números primos menores que 100 es: " . $suma;
?>



