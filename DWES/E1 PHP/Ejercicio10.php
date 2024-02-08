<?php
    // 10. A partir de la variable $cadena que se muestra en el código siguiente obtén los siguientes
// datos:
// - Número de caracteres que almacena la cadena
// - Número de palabras que almacena la cadena
// - Devuelve la cadena escrita en mayúscula

$cadena="Esto es un string de varias palabras";
//Número de caracteres que almacena la cadena
//Devuelve la cadena escrita en mayúscula
//Número de palabras que almacena la cadena

echo strlen($cadena);
echo strtoupper($cadena);
echo str_word_count($cadena);
?>