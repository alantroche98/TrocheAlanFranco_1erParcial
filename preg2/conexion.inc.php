<?php
// Ejemplo de conexión a la base de datos
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");

// Comprobar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>

