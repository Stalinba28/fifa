<?php
include 'conexionR.php'; 
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: login.php'); 
    exit();
}

if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    $conn->query("DELETE FROM usuarios WHERE id = $id");
    header('Location: admin.php'); 
}

$busqueda = '';
if (isset($_POST['buscar'])) {
    $busqueda = $conn->real_escape_string($_POST['busqueda']);
}

$sql = "SELECT * FROM usuarios";
if ($busqueda) {
    $sql .= " WHERE nombre LIKE '%$busqueda%' OR correo LIKE '%$busqueda%' OR id LIKE '%$busqueda%'";
}
$result = $conn->query($sql);

if (isset($_POST['cerrar_sesion'])) {
    session_destroy();
    header('Location: inicio.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="admin.css"> 
</head>
<body>
    <h1>Panel de Administración</h1>
    <form method="post" action="">
        <input type="text" name="busqueda" placeholder="Buscar usuarios..." value="<?= htmlspecialchars($busqueda) ?>">
        <button type="submit" name="buscar">Buscar</button>
    </form>
    <form method="post" action="" style="margin-top: 10px;">
        <button type="submit" name="cerrar_sesion">Cerrar Sesión</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Género</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($usuario = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                <td><?= htmlspecialchars($usuario['apellido']) ?></td>
                <td><?= htmlspecialchars($usuario['correo']) ?></td>
                <td><?= htmlspecialchars($usuario['genero']) ?></td>
                <td><?= htmlspecialchars($usuario['edad']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $usuario['id'] ?>">Editar</a>
                    <a href="?eliminar=<?= $usuario['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
