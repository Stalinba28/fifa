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
    <title>Preguntas Frecuentes</title>
    <link rel="stylesheet" href="preguntas.css"> 
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="Logo.jpeg" alt="Logo de ENERGYM" class="logo">
            <div class="text">
                <h1>Preguntas Frecuentes</h1>
            </div>
        </div>
    </header>

    <main>
        <div class="welcome-container">
            <h2>Bienvenido, <?= htmlspecialchars($usuario) ?> 👋</h2>
        </div>

        <section>
            <h2>¿Qué es ENERGYM?</h2>
            <p>ENERGYM es una plataforma gratuita que ofrece rutinas de ejercicios personalizadas basadas en tu altura y peso. Está diseñada para que cualquier persona pueda implementarlas desde su hogar, sin necesidad de equipos especializados.</p>
        </section>
        <section>
            <h2>¿Cómo puedo empezar a usar ENERGYM?</h2>
            <p>Para comenzar, solo necesitas registrarte en nuestra página. Una vez dentro, te proporcionaremos una rutina adaptada a tus necesidades actuales.</p>
        </section>
        <section>
            <h2>¿ENERGYM es realmente gratuito?</h2>
            <p>Sí, ENERGYM fue creado con el objetivo de ayudar a la comunidad sin costo alguno. Todas las funciones disponibles en la página son completamente gratuitas.</p>
        </section>
        <section>
            <h2>¿Necesito equipo de gimnasio para realizar las rutinas?</h2>
            <p>No, nuestras rutinas están diseñadas para que puedas realizarlas en casa utilizando solo tu cuerpo y objetos comunes del hogar, como sillas o botellas de agua.</p>
        </section>
        <section>
            <h2>¿Puedo usar ENERGYM si nunca he hecho ejercicio antes?</h2>
            <p>¡Por supuesto! ENERGYM es ideal tanto para principiantes como para personas con experiencia. Cada rutina se adapta a tu nivel físico actual para garantizar que puedas avanzar de manera segura y efectiva.</p>
        </section>
        <section>
            <h2>¿Qué pasa si tengo alguna lesión o condición médica?</h2>
            <p>Si tienes una lesión o condición médica, te recomendamos consultar a un médico antes de comenzar cualquier rutina. Aunque nuestras rutinas son seguras, es importante asegurarte de que sean adecuadas para tu situación específica.</p>
        </section>
        
        <a href="Inicio.php">Volver a la Página Principal</a>
    </main>

    <footer>
        <p>© 2024 ENERGYM - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
