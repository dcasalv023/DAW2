<?php
if (isset($_COOKIE['idioma'])) {
    $idioma = $_COOKIE['idioma'];
} else {
    $idioma = 'es';
}

$textos = array(
    'es' => array(
        'titulo' => 'Página en Español',
        'mensaje' => 'Bienvenido a nuestra página web en español.',
        'boton' => 'Cambiar a Inglés',
    ),
    'en' => array(
        'titulo' => 'English Page',
        'mensaje' => 'Welcome to our English webpage.',
        'boton' => 'Cambiar a Español',
    ),
);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $textos[$idioma]['titulo']; ?></title>
</head>
<body>
    <h1><?php echo $textos[$idioma]['mensaje']; ?></h1>
    <a href="cambiar_idioma.php?idioma=<?php echo ($idioma == 'es') ? 'en' : 'es'; ?>"><?php echo $textos[$idioma]['boton']; ?></a>
</body>
</html>
