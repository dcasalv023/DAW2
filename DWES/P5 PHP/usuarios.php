<?php
require_once 'conexion.php'; // Incluimos el archivo de conexión

class Usuarios {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function validarUsuario($usuario, $contrasena) {
        // Consulta SQL para validar el usuario
        $consulta = "SELECT * FROM usuarios WHERE usuario = ?";
        
        // Preparar la consulta
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param("s", $usuario);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado de la consulta
        $resultado = $stmt->get_result();

        // Verificar si se encontró un usuario con el nombre proporcionado
        if ($resultado->num_rows == 1) {
            $usuarioBD = $resultado->fetch_assoc();

            // Verificar si la contraseña coincide utilizando password_verify
            if (password_verify($contrasena, $usuarioBD['pwd'])) {
                return true; // Usuario y contraseña válidos
            }
        }

        return false; // Usuario o contraseña incorrectos
    }

    public function existeUsuario($usuario) {
        // Consulta SQL para verificar si el usuario ya existe
        $consulta = "SELECT COUNT(*) AS total FROM usuarios WHERE usuario = ?";
        
        // Preparar la consulta
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param("s", $usuario);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado de la consulta
        $resultado = $stmt->get_result();

        // Obtener el número de filas encontradas
        $fila = $resultado->fetch_assoc();
        $total = $fila['total'];

        return $total > 0; // Devolver verdadero si el usuario existe, falso si no existe
    }

    public function registrarUsuario($usuario, $contrasena, $email) {
        // Hash de la contraseña
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

        // Consulta SQL para insertar el nuevo usuario
        $consulta = "INSERT INTO usuarios (usuario, pwd, email) VALUES (?, ?, ?)";

        // Preparar la consulta
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param("sss", $usuario, $hashed_password, $email);

        // Ejecutar la consulta
        return $stmt->execute(); // Devolver verdadero si se inserta correctamente, falso si hay un error
    }
}

// Creamos una instancia de la clase Usuarios
$usuarios = new Usuarios($conexion);
?>

