<?php

    //Create a web page with a form to choose the language in which it is displayed,
    // English or Spanish. Stores the user's choice with a cookie so that the next 
    //time the user logs on the page appears directly in their language. If the cookie does not exist, the page will be displayed in Spanish.


    //Crea una página web con un formulario para elegir el idioma en el que se muestra, 
    //inglés o español. Almacena la elección del usuario con una cookie para que la próxima 
    //vez que el usuario inicie sesión en la página aparezca directamente en su idioma. Si la cookie no existe, la página se mostrará en español.


    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selección de Idioma</title>
</head>
<body>
    <h1>Seleccione su idioma</h1>
    <a href="cambiar_idioma.php?idioma=es">Español</a>
    <a href="cambiar_idioma.php?idioma=en">Inglés</a>
</body>
</html>
