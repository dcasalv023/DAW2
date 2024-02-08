<?php
    //7. Ordena el array asociativo $estaturas en orden descendente de acuerdo a la clave.

    $estatura = [
        "Juan"=> 186,
        "Alberto"=> 172,
        "Marta"=> 173,
    ];

    ksort($estatura);
    var_export($estatura);

?>