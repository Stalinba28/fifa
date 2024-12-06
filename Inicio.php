<?php
session_start();

if (!isset($_SESSION['usuario_logeado'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['nombre_usuario'];  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Energy Gym - Inicio</title>
    <link rel="stylesheet" href="Inicio.css">
</head>
<body>
    <div class="welcome-container">
        <h1>Bienvenido, <?= htmlspecialchars($usuario) ?> 👋</h1>
    </div>

    <header>
        <div class="logo-container">
            <img src="Logo.jpeg" alt="Logo de Energy Gym" class="logo">
            <div class="text">
                <h1>ENERGYM</h1>
                <p>EL DOLOR ES TEMPORAL PERO LA SATISFACCIÓN ES PARA SIEMPRE</p>

                <form class="logout-form" action="logout.php" method="POST">
                    <button type="submit" class="btn logout">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="acerca.php">Acerca de nosotros</a></li>
            <li><a href="tienda.php">Tienda</a></li>
            <li><a href="rutinas.php">Rutinas</a></li>
            <li><a href="preguntas.php">Preguntas frecuentes</a></li>
        </ul>
    </nav>

    <section class="hero">
        <h2>¡Bienvenido a tu espacio fitness!</h2>
        <p>Explora nuestras rutinas, productos y servicios para alcanzar tus metas.</p>
        <img src="Imagen_1.png" alt="Entrenamiento en el gimnasio">
    </section>

    <section class="info">
        <div>Entrenamiento<br>Gratuito</div>
        <div>Aplicación móvil<br>Próximamente</div>
        <div>Siempre los<br>mejores consejos</div>
    </section>

    <footer>
        <div class="footer-content">
            <div>📞 Teléfono: 6790-4335</div>
            <div>📸 Instagram: @ENERGYM</div>
            <div>🌐 ENERGYM.com.pa</div>
            <div>© 2024 ENERGYM - Todos los derechos reservados</div>
        </div>
        <div class="footer-extra">
            <p>¡Síguenos en nuestras redes sociales para más consejos de fitness y promociones exclusivas!</p>
        </div>
    </footer>
</body>
</html>
