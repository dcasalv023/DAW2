<?php
    //Write a PHP script to display the following strings.
//Sample String :
//'Tomorrow I \'ll learn PHP global variables.'
//'This is a bad command : del c:\\*.*'
//Expected Output :
//Tomorrow I 'll learn PHP global variables.
//This is a bad command : del c:\*.*

//Escriba un script PHP para mostrar las siguientes cadenas.
//Cadena de muestra:
//'Mañana aprenderé las variables globales de PHP.'
//'Este es un comando incorrecto: del c:\\*.*'
//Rendimiento esperado :
//Mañana aprenderé las variables globales de PHP.
//Este es un comando incorrecto: del c:\*.*


$cadena1 = 'Mañana aprenderé las variables globales de PHP';
$cadena2 = 'Este es un comando incorrecto del c:\\*.*';

$cadena1 = stripslashes($cadena1);
$cadena2 = stripslashes($cadena2);

echo $cadena1 . "<br>";
echo $cadena2;
?>