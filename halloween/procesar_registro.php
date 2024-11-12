<?php
include 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $clave = $_POST['clave'] ?? '';

    // Validar datos ingresados
    if (empty($nombre) || empty($clave)) {
        echo "Por favor, complete todos los campos.";
        exit();
    }

    try {
        // Verificar si el usuario ya existe
        $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "El nombre de usuario ya está en uso. Por favor, elija otro.";
        } else {
            // Insertar nuevo usuario
            $sqlInsert = "INSERT INTO usuarios (nombre, clave) VALUES (:nombre, :clave)";
            $stmtInsert = $conexion->prepare($sqlInsert);
            $stmtInsert->bindParam(':nombre', $nombre);
            $stmtInsert->bindParam(':clave', $clave);

            if ($stmtInsert->execute()) {
                echo "Registro exitoso. Ahora puede iniciar sesión.";
                header('Location: login.php'); // Redirigir al login después del registro
            } else {
                echo "Hubo un problema al registrar el usuario. Intente de nuevo.";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
