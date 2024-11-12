<?php
// Configuración de conexión a la base de datos
$host = 'localhost';
$dbname = 'halloween'; 
$username = 'root'; 
$password = 'yonatanruloff10'; 

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error al conectar con la base de datos: " . $e->getMessage();
    exit();
}
?>
