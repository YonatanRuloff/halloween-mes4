<?php
if (isset($_GET['error'])) {
    echo "<p style='color: red; text-align: center;'>" . htmlspecialchars($_GET['error']) . "</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        /* Estilo para centrar el formulario */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh; /* Ajusta el espacio del formulario */
            background-image: url('imagenes/fondo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        form {
            background-color: rgba(0, 0, 0, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(255, 165, 0, 0.6);
            width: 100%;
            max-width: 400px;
        }

        form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffa500;
        }

        form label {
            font-weight: bold;
            color: #f8f8f8;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #ffa500;
            color: #000;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #f05454;
        }
    </style>
</head>
<body>
    <header>
        <h1>Desafío Halloween</h1>
        <nav class="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="registro.php">Registro</a></li>
                <li><a href="disfraces.php">Ver Disfraces</a></li>
                <li><a href="admin.php">Panel de Administración</a></li>
            </ul>
        </nav>
    </header>
    <div class="form-container">
        <form action="procesar_login.php" method="POST">
            <label for="nombre">Nombre de Usuario:</label>
            <input type="text" name="nombre" id="nombre" required>
            <label for="clave">Contraseña:</label>
            <input type="password" name="clave" id="clave" required>
            <button type="submit">Iniciar Sesión</button>
        </form>

    </div>
    <footer>
        <p>&copy; 2024 Desafío Halloween. Todos los derechos reservados.</p>
        <p>Contacto: admin@halloween.com</p>
    </footer>
</body>
</html>


