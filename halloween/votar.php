<?php
include 'includes/config.php';
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    echo "<script>alert('Debe iniciar sesión para votar.'); window.location.href = 'login.php';</script>";
    exit();
}

// Verificar si se recibe un ID de disfraz
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_disfraz'])) {
    $id_disfraz = (int)$_POST['id_disfraz'];
    $id_usuario = $_SESSION['usuario_id']; // ID del usuario autenticado

    try {
        // Verificar si el disfraz existe y no está eliminado
        $sql = "SELECT * FROM disfraces WHERE id = :id_disfraz AND eliminado = 0";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id_disfraz', $id_disfraz);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            echo "<script>alert('El disfraz seleccionado no existe.'); window.location.href = 'disfraces.php';</script>";
            exit();
        }

        // Verificar si el usuario ya votó por este disfraz
        $sql = "SELECT * FROM votos WHERE id_usuario = :id_usuario AND id_disfraz = :id_disfraz";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_disfraz', $id_disfraz);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<script>alert('Ya ha votado por este disfraz.'); window.location.href = 'disfraces.php';</script>";
            exit();
        }

        // Registrar el voto en la tabla 'votos'
        $sql = "INSERT INTO votos (id_usuario, id_disfraz) VALUES (:id_usuario, :id_disfraz)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_disfraz', $id_disfraz);
        $stmt->execute();

        // Incrementar el contador de votos en la tabla 'disfraces'
        $sql = "UPDATE disfraces SET votos = votos + 1 WHERE id = :id_disfraz";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id_disfraz', $id_disfraz);
        $stmt->execute();

        // Mensaje de confirmación
        echo "<script>alert('¡Has votado por este disfraz con éxito!'); window.location.href = 'disfraces.php';</script>";
        exit();
    } catch (PDOException $e) {
        error_log('Error al votar: ' . $e->getMessage());
        echo "<script>alert('Error interno del servidor. Intenta más tarde.'); window.location.href = 'disfraces.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Solicitud inválida.'); window.location.href = 'disfraces.php';</script>";
    exit();
}
