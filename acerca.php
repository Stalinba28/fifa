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
    <title>Acerca de Nosotros</title>
    <link rel="stylesheet" href="acerca.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="Logo.jpeg" alt="Logo de ENERGYM" class="logo">
            <div class="text">
                <h1>Acerca de ENERGYM</h1>
            </div>
        </div>
    </header>
    <main>
        <section class="hero">
            <h2>Bienvenidos a ENERGYM</h2>
            <img src="Imagen_1.png" alt="Entrenamiento en el gimnasio">
        </section>
        <section>
            <h2>Nuestra Historia</h2>
            <p>ENERGYM nació con la visión de ayudar a las personas a alcanzar su máximo potencial físico y mental. Dos amigos decidieron crear una plataforma gratuita que permite, generar rutinas accesibles para cualquier persona, incluso desde casa.</p>
        </section>
        <section>
            <h2>Nuestra Misión</h2>
            <p>Brindar a nuestros usuarios las herramientas necesarias para alcanzar un estilo de vida saludable y sostenible, eliminando barreras de acceso y promoviendo el bienestar.</p>
        </section>
        <section>
            <h2>¿Por qué elegirnos?</h2>
            <ul>
                <li>Rutinas personalizadas basadas en datos reales.</li>
                <li>Acceso gratuito para todos.</li>
                <li>Enfoque práctico para entrenar en casa.</li>
            </ul>
        </section>
        <a href="Inicio.html">Volver a la Página Principal</a>
    </main>
    <footer>
        <p>© 2024 ENERGYM - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
