<?php
    //6. Ordena el array asociativo $estaturas en orden descendente de acuerdo al valor.

    $estatura = [
        "Juan"=> 186,
        "Alberto"=> 172,
        "Marta"=> 173,
    ];

    arsort($estatura);
    var_export($estatura);

?>