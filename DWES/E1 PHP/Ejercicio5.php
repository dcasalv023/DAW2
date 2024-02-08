<?php
    //5. Recorre el array asociativo estaturas y muestra los pares clave/valor.

    $estatura = [
        "Juan"=> 186,
        "Alberto"=> 172,
        "Marta"=> 173,
    ];

    foreach ($estatura as $clave => $valor){
        echo "La estatura de $clave es: $valor";
    }
?>