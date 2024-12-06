<?php
session_start();  

$conexion = new mysqli("localhost", "root", "", "energym");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'] ?? null;
    $contrasena = $_POST['contrasena'] ?? null;

    if ($correo && $contrasena) {
        $stmt = $conexion->prepare("SELECT nombre, contrasena, rol FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $contraseñaHash = $fila['contrasena'];
            $nombre = $fila['nombre']; 
            $rol = $fila['rol']; 

            if (password_verify($contrasena, $contraseñaHash)) {
                $_SESSION['usuario_logeado'] = $correo;  
                $_SESSION['nombre_usuario'] = $nombre;  
                $_SESSION['rol'] = $rol;  

                if ($rol === 'admin') {
                    header("Location: admin.php");  
                } else {
                    header("Location: Inicio.php");  
                }
                exit;
            } else {
                $mensaje = "Contraseña incorrecta.";  
            }
        } else {
            $mensaje = "No se encontró el usuario.";  
        }

        $stmt->close();
    } else {
        $mensaje = "Por favor, completa todos los campos.";  
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="login.css"> 
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="Logo.jpeg" alt="Logo" class="logo">
            <h1 class="title">Iniciar Sesión</h1>
            <p class="slogan">Bienvenido de nuevo, ingresa tus datos</p>
        </div>

        <form class="form" action="login.php" method="POST">
            <label for="correo">Correo Electrónico</label>
            <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo" required>

            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña" required>

            <button type="submit" class="btn">Iniciar Sesión</button>
        </form>

        <?php if (isset($mensaje) && !empty($mensaje)): ?>
            <p class="error-message"><?= htmlspecialchars($mensaje) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
