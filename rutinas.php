<?php
session_start();

if (!isset($_SESSION['usuario_logeado'])) {
    header("Location: login.php");
    exit;
}

$ejercicios = [
    "pecho" => ["Flexiones 12 repeticiones" => "Flexiones.mp4", "Flexiones inclinadas 10 repeticiones" => "Flex_incl.mp4", "Flexiones diamante 10 repeticiones" => "Flex_diam.mp4", "Flexiones declinadas 10 repeticiones" => "Flex_dec.mp4", "Flexiones con agarre gancho  12 repeticiones" => "flex_ganc.mp4"],
    "espalda" => ["Cobra Prono Repeticiones: 30-45 segundos" => "Cobra_prono.mp4", "Angel de nieve en reversa Repeticiones: 8-12" => "Angel_nieve.mp4", "Tiron Prono Repeticiones: 10-15" => "Tiron_prono.mp4", "Flexión escapular Repeticiones: 10-15" => "Flexion_esca.mp4", "Puente de gluteo Repeticiones: 10-15" => "Puente_gluteo.mp4"],
    "abdominales" => ["ABS bicicleta 12 repeticiones (por cada lado)" => "Abs_bici.mp4", "Toque de talones 15 repeticiones (por cada lado)" => "Talones.mp4", "Elevaciones de piernas 12 repeticiones" => "Elevaciones.mp4", "Tijeras 12 repeticiones (por lado)" => "Tijeras.mp4", "Giro ruso 10 repeticiones" => "Giro_R.mp4"],
    "pierna" => ["Sentadilla 15 repeticiones" => "sentadilla.mp4", "Zancada 15 repeticiones (por pierna)" => "Zancada.mp4", "Sentadilla búlgara 10 repeticions (por pierna)" => "Zanca_bul.mp4", "Sentadilla con salto 12 repeticiones" => "Senta_sal.mp4", "Abduptores 12 repeticiones (por pierna)" => "Abduptores.mp4"],
];

$rutina = [];
foreach ($ejercicios as $musculo => $lista) {
    $ejercicio = array_rand($lista);
    $rutina[$musculo] = ["nombre" => $ejercicio, "archivo" => $lista[$ejercicio]];
}

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
                    <p><?= $data["nombre"] ?></p>
                    <?php
                    $extension = pathinfo($data['archivo'], PATHINFO_EXTENSION);
                    if ($extension === "mp4"): ?>
                        <div class="video-container">
                            <video controls>
                                <source src="/Semestral_Desarrollo/<?= $data['archivo'] ?>" type="video/mp4">
                                Tu navegador no soporta videos.
                            </video>
                        </div>
                    <?php else: ?>
                        <img src="/Semestral_Desarrollo/<?= $data['archivo'] ?>" alt="<?= $data['nombre'] ?>" width="300">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>
    </main>

    <footer>
        <p>© 2024 ENERGYM - Todos los derechos reservados</p>
    </footer>
</body>
</html>
