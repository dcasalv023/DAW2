<?php

// Database configuration
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'usu4');
define('DB_PASSWORD', 'usu4');
define('DB_NAME', 'tarea4');

// Function to connect to the database
function conectarBaseDeDatos()
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Function to verify user access
function verificarAcceso($usuario, $contrasena)
{
    $conn = conectarBaseDeDatos();

    // Query the database to verify the user
    $stmt = $conn->prepare("SELECT contrasena FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    // Verify the password using password_verify
    $conn->close();  // Close the database connection before returning

    return ($hashedPassword !== null && password_verify($contrasena, $hashedPassword));
}

