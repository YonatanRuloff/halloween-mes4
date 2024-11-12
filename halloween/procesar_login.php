<?php
include 'includes/config.php';

session_start();

// Verificar si ya hay una sesión activa
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $clave = $_POST['clave'] ?? '';

    // Validar los datos ingresados
    if (empty($nombre) || empty($clave)) {
        header('Location: login.php?error=Por favor, complete todos los campos.');
        exit();
    }

    if (!preg_match('/^[a-zA-Z0-9]{4,20}$/', $nombre)) {
        header('Location: login.php?error=El nombre de usuario debe tener entre 4 y 20 caracteres alfanuméricos.');
        exit();
    }

    try {
        // Consulta a la base de datos
        $sql = "SELECT * FROM usuarios WHERE nombre = :nombre LIMIT 1";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if ($clave === $usuario['clave']) { // Comparar directamente la contraseña
                // Guardar datos en la sesión
                $_SESSION['usuario'] = $usuario['nombre'];
                $_SESSION['usuario_id'] = $usuario['id']; // Opcional para identificar al usuario
                header('Location: index.php?success=Sesión iniciada con éxito.');
                exit();
            } else {
                header('Location: login.php?error=Contraseña incorrecta.');
                exit();
            }
        } else {
            header('Location: login.php?error=El nombre de usuario no existe.');
            exit();
        }
    } catch (PDOException $e) {
        error_log('Error en el inicio de sesión: ' . $e->getMessage());
        header('Location: login.php?error=Error interno del servidor.');
        exit();
    }
} else {
    header('Location: login.php?error=Método de solicitud no permitido.');
    exit();
}
