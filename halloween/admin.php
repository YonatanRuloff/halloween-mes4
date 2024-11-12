<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <h1>Panel de Administración</h1>
        <a href="index.php">Regresar</a>
    </header>
    <main>
        <form action="procesar_admin.php" method="POST">
            <label for="nombre">Nombre del Disfraz:</label>
            <input type="text" name="nombre" id="nombre" required>
            
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" required></textarea>
            
            <button type="submit">Agregar Disfraz</button>
        </form>
    </main>
</body>
</html>
