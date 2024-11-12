<?php
include 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Disfraces</title>
    <style>
        /* General */
        body {
            background-image: url('data:image/jpeg;base64,<?php echo base64_encode(file_get_contents("imagenes/fondo.jpg")); ?>');
            background-size: cover;
            background-position: center;
            color: white;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Encabezado */
        header {
            background-color: rgba(0, 0, 0, 0.8);
            color: #ffa500;
            text-align: center;
            padding: 20px 0;
            border-bottom: 3px solid #ffa500;
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        nav.menu {
            margin: 10px 0;
        }

        nav.menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav.menu ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav.menu ul li a:hover {
            background-color: #ffa500;
            color: black;
        }

        /* Disfraces */
        .disfraces-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .disfraz-card {
            background-color: rgba(0, 0, 0, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(255, 165, 0, 0.6);
            width: 300px;
            padding: 20px;
            text-align: center;
        }

        .disfraz-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .disfraz-card h3 {
            color: #ffa500;
            margin-bottom: 10px;
        }

        .disfraz-card p {
            color: #f8f8f8;
            margin-bottom: 15px;
        }

        .disfraz-card button {
            background-color: #ffa500;
            color: #000;
            font-weight: bold;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .disfraz-card button:hover {
            background-color: #f05454;
        }

        /* Footer */
        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: #ffa500;
            text-align: center;
            padding: 10px 0;
            border-top: 3px solid #ffa500;
            margin-top: 20px;
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
                <li><a href="login.php">Iniciar Sesión</a></li>
                <li><a href="admin.php">Panel de Administración</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="disfraces-container">
            <!-- Disfraz 1 -->
            <div class="disfraz-card">
                <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents("imagenes/it.jpg")); ?>" alt="Disfraz It">
                <h3>Disfraz de It</h3>
                <p>El payaso más aterrador de todos los tiempos.</p>
                <form action="votar.php" method="POST">
                    <input type="hidden" name="id_disfraz" value="1">
                    <button type="submit">Votar</button>
                </form>
            </div>

            <!-- Disfraz 2 -->
            <div class="disfraz-card">
                <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents("imagenes/mex.jpg")); ?>" alt="Disfraz Mexicano">
                <h3>Disfraz Mexicano</h3>
                <p>Celebrando el Día de los Muertos con estilo.</p>
                <form action="votar.php" method="POST">
                    <input type="hidden" name="id_disfraz" value="2">
                    <button type="submit">Votar</button>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Desafío Halloween. Todos los derechos reservados.</p>
        <p>Contacto: admin@halloween.com</p>
    </footer>
</body>
</html>
