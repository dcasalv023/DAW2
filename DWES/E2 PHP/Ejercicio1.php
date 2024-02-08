<?php
    //Write a PHP script to get the PHP version and configuration information. 
    //Escriba un script PHP para obtener la versión de PHP y la información de configuración.

    $phpVersion = phpversion();
    echo "Versión de PHP: " . $phpVersion;
    echo phpinfo();

?>
