<?php
session_start();

if (!isset($_SESSION['usuario_logeado'])) {
    header("Location: login.php");
    exit;
}

$productos = [
    ["nombre" => "Proteína Whey", "precio" => "20.99", "imagen" => "Proteina_Whey.jpg"],
    ["nombre" => "Creatina", "precio" => "15.49", "imagen" => "Creatina.jpg"],
    ["nombre" => "Aminoácidos", "precio" => "12.99", "imagen" => "Aminoacidos.jpg"],
    ["nombre" => "Pre-entrenamiento", "precio" => "18.99", "imagen" => "Pre_entrenamiento.jpg"],
];

$usuario = $_SESSION['nombre_usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - EnerGym</title>
    <link rel="stylesheet" href="tienda.css">
</head>
<body>
    <header>
        <div>
            <img src="Logo.jpeg" alt="Logo EnerGym" class="logo">
            <h1>ENERGYM</h1>
            <p>EL DOLOR ES TEMPORAL PERO LA SATISFACCIÓN ES PARA SIEMPRE</p>
        </div>
        <a href="Inicio.php" class="btn">Volver al Inicio</a>
    </header>


    <main>
        <h1>Bienvenido a la tienda, <?= htmlspecialchars($usuario) ?> 👊</h1>
        
        <section class="productos">
            <div class="producto">
                <div class="producto-imagen">
                    <img src="Proteina_Whey.jpg" alt="Proteína Whey" width="150">
                </div>
                <div class="producto-info">
                    <h2>Proteína Whey</h2>
                    <p class="precio">$20.99</p>
                </div>
                <div class="producto-btn">
                    <button class="btn-agregar">Añadir al carrito</button>
                </div>
            </div>

            <div class="producto">
                <div class="producto-imagen">
                    <img src="Creatina.jpg" alt="Creatina" width="150">
                </div>
                <div class="producto-info">
                    <h2>Creatina</h2>
                    <p class="precio">$15.49</p>
                </div>
                <div class="producto-btn">
                    <button class="btn-agregar">Añadir al carrito</button>
                </div>
            </div>

            <div class="producto">
                <div class="producto-imagen">
                    <img src="Aminoacidos.jpg" alt="Aminoácidos" width="150">
                </div>
                <div class="producto-info">
                    <h2>Aminoácidos</h2>
                    <p class="precio">$12.99</p>
                </div>
                <div class="producto-btn">
                    <button class="btn-agregar">Añadir al carrito</button>
                </div>
            </div>

            <div class="producto">
                <div class="producto-imagen">
                    <img src="Pre_entrenamiento.jpg" alt="Pre-entrenamiento" width="150">
                </div>
                <div class="producto-info">
                    <h2>Pre-entrenamiento</h2>
                    <p class="precio">$18.99</p>
                </div>
                <div class="producto-btn">
                    <button class="btn-agregar">Añadir al carrito</button>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>© 2024 ENERGYM - Todos los derechos reservados</p>
    </footer>
</body>
</html>
