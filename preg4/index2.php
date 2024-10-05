<?php
session_start();
include 'conexion.inc.php'; //conexión a la base de datos

// Verificar logueado
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php"); // Redirige a la página de login si no está autenticado
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION["username"]; ?>!</h1>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
