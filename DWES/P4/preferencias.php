<?php
session_start();

// Check if the user is not authenticated
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}

// Check if the form has been submitted to change preferences
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["color_fondo"])) {
        // Get the color selected by the user
        $colorFondo = $_POST["color_fondo"];

        // Set the cookie with color preferences
        setcookie("preferencias_color", $colorFondo, time() + (86400 * 30), "/"); // Cookie valid for 30 days
    }
}

// Check if resetting preferences is desired
if (isset($_GET["reset"]) && $_GET["reset"] === "true") {
    // Delete the preferences cookie
    setcookie("preferencias_color", "", time() - 3600, "/");
    header("Location: preferencias.php");
    exit();
}

// Get the current background color from the cookie or set white as default
$colorFondoActual = isset($_COOKIE["preferencias_color"]) ? $_COOKIE["preferencias_color"] : "white";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="preferencias.css">
    <style>
        body {
            background-color: <?php echo $colorFondoActual; ?>;
        }
    </style>
</head>
<body>
    <h2>Preferencias</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="color_fondo">Selecciona el color de fondo:</label>
        <select name="color_fondo">
            <option value="white" <?php echo ($colorFondoActual === "white") ? "selected" : ""; ?>>Blanco</option>
            <option value="lightblue" <?php echo ($colorFondoActual === "lightblue") ? "selected" : ""; ?>>Azul Claro</option>
            <option value="lightgreen" <?php echo ($colorFondoActual === "lightgreen") ? "selected" : ""; ?>>Verde Claro</option>
        </select>
        <br>

        <input type="submit" value="Guardar preferencias">
    </form>

    <p><a href="preferencias.php?reset=true">Restablecer preferencias</a></p>

    <p><a href="aplicacion.php">Volver a la aplicación</a></p>
</body>
</html>
