<?php
include 'conexionR.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $genero = $_POST['genero'];
    $edad = $_POST['edad'];

    if (empty($genero)) {
        die("Error: El campo género está vacío.");
    }

    $sql = "INSERT INTO usuarios (nombre, apellido, correo, contrasena, genero, edad)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssssi", $nombre, $apellido, $correo, $contrasena, $genero, $edad);

        if ($stmt->execute()) {
            header("Location: Inicio.php");
            exit(); 
        } else {
            echo "Error al registrar: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    $conn->close();
}
?>
