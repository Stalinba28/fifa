<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$base_de_datos = "energym";

// Establecer conexión segura con SSL
$conn = new mysqli($host, $usuario, $clave, $base_de_datos, 3306);

// Activar SSL
$conn->ssl_set(NULL, NULL, "/path/to/ca-cert.pem", "/path/to/client-cert.pem", "/path/to/client-key.pem");
$conn->real_connect($host, $usuario, $clave, $base_de_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión cifrada exitosa.";
?>

