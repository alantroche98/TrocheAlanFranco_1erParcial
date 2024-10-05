<?php
session_start();
include 'conexion.inc.php'; // Incluye la conexión a la base de datos

// Verifica si el usuario está logueado
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php"); // Redirige a la página de login si no está autenticado
    exit();
}

// Aquí va el resto de tu código para la página index.php
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
    <!-- Resto de tu contenido -->
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
