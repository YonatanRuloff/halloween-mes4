<?php
include 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafío Halloween</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('imagenes/fondo.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            text-align: center;
            padding: 20px;
            border-bottom: 3px solid #ffa500;
        }

        nav.menu ul {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin: 0;
            gap: 20px;
        }

        nav.menu ul li a {
            color: white;
            text-decoration: none;
            padding: 5px 15px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        nav.menu ul li a:hover {
            background-color: #ffa500;
            color: black;
        }

        main {
            text-align: center;
            padding: 50px;
        }

        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: orange;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 3px solid #ffa500;
        }
    </style>
</head>
<body>
    <header>
        <h1>Desafío Halloween</h1>
        <nav class="menu">
            <ul>
                <li><a href="disfraces.php">Ver Disfraces</a></li>
                <li><a href="registro.php">Registro</a></li>
                <li><a href="login.php">Iniciar Sesión</a></li>
                <li><a href="admin.php">Panel de Administración</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>¡Bienvenidos al Desafío de Halloween!</h2>
        <p>Regístrate, vota por tus disfraces favoritos y sé parte de esta aterradora experiencia.</p>
    </main>
    <footer>
        <p>&copy; 2024 Desafío Halloween. Todos los derechos reservados.</p>
        <p>Contacto: admin@halloween.com</p>
    </footer>
</body>
</html>
