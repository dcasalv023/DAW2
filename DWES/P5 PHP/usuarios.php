<?php

class Usuarios {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function validarInicioSesion($usuario, $contraseña) {
        // Verificar en la base de datos si el usuario y la contraseña son válidos
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($contraseña, $row['pwd'])) {
                return true;
            }
        }
        return false;
    }

    public function crearUsuario($usuario, $contraseña, $email) {
        // Hash de la contraseña
        $hashContraseña = password_hash($contraseña, PASSWORD_DEFAULT);

        // Insertar usuario en la base de datos
        $stmt = $this->conexion->prepare("INSERT INTO usuarios (usuario, pwd, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $usuario, $hashContraseña, $email);
        return $stmt->execute();
    }

    public function modificarUsuario($id, $usuario, $contraseña, $email) {
        // Hash de la contraseña si se ha proporcionado
        $hashedContraseña = "";
        if ($contraseña !== "") {
            $hashContraseña = password_hash($contraseña, PASSWORD_DEFAULT);
            $hashedContraseña = ", pwd = '$hashContraseña'";
        }

        // Actualizar usuario en la base de datos
        $stmt = $this->conexion->prepare("UPDATE usuarios SET usuario = ?, email = ? $hashedContraseña WHERE id = ?");
        $stmt->bind_param("ssi", $usuario, $email, $id);
        return $stmt->execute();
    }

    public function eliminarUsuario($id) {
        // Eliminar usuario de la base de datos
        $stmt = $this->conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

?>
