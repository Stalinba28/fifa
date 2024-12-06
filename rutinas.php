<?php
session_start();

if (!isset($_SESSION['usuario_logeado'])) {
    header("Location: login.php");
    exit;
}

// Definición del arreglo de ejercicios
$ejercicios = [
    "pecho" => [
        "Flexiones 12 repeticiones" => "flex.jpg",
        "Flexiones inclinadas 10 repeticiones" => "flex_inc.jpg",
        "Flexiones declinadas 10 repeticiones" => "flex_dec.jpg"
    ],
    "espalda" => [
        "Cobra Prono (30-45 segundos)" => "cobra_pro.jpg",
        "Ángel de nieve en reversa (8-12 repeticiones)" => "angel_nieve.jpg",
        "Puente de glúteo (10-15 repeticiones)" => "puente.jpg"
    ],
    "abdominales" => [
        "ABS bicicleta (12 repeticiones por lado)" => "abs_bici.jpg",
        "Toque de talones (15 repeticiones por lado)" => "talones.jpg",
        "Elevaciones de piernas (12 repeticiones)" => "elevaciones.jpg"
    ],
    "pierna" => [
        "Sentadilla (15 repeticiones)" => "sentadilla.jpg",
        "Zancada (15 repeticiones por pierna)" => "zancada.jpg",
        "Sentadilla búlgara (10 repeticiones por pierna)" => "bulgara.jpg"
    ],
];

// Generar la rutina aleatoria
$rutina = [];
foreach ($ejercicios as $musculo => $lista) {
    $ejercicio = array_rand($lista); // Seleccionar un ejercicio aleatorio
    $rutina[$musculo] = [
        "nombre" => $ejercicio,
        "archivo" => $lista[$ejercicio]
    ];
}

// Obtener el nombre del usuario desde la sesión
$usuario = $_SESSION['nombre_usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutinas - EnerGym</title>
    <link rel="stylesheet" href="ejercicios.css">
</head>
<body>
    <header>
        <div>
            <img src="Logo.jpeg" alt="Logo EnerGym" class="logo">
            <h1>ENERGYM</h1>
            <p>EL DOLOR ES TEMPORAL PERO LA SATISFACCIÓN ES PARA SIEMPRE</p>
        </div>
        <a href="inicio.php" class="btn">Volver al Inicio</a>
    </header>

    <main>
        <h1>Esta es tu rutina para el día de hoy, <?= htmlspecialchars($usuario) ?> 👊</h1>
        <section class="rutina">
            <?php foreach ($rutina as $musculo => $data): ?>
                <div class="grupo-muscular">
                    <h2><?= ucfirst($musculo) ?></h2>
                    <p><?= htmlspecialchars($data["nombre"]) ?></p>
                    <img src="<?= htmlspecialchars($data['archivo']) ?>" alt="<?= htmlspecialchars($data['nombre']) ?>" width="300">
                </div>
            <?php endforeach; ?>
        </section>
    </main>

    <footer>
        <p>© 2024 ENERGYM - Todos los derechos reservados</p>
    </footer>
</body>
</html>