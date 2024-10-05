<?php
$host = "127.0.0.1:3307";  // O "127.0.0.1"
$user = "root";           
$password = "";          
$database = "BDAlan";   

//crea la conexión
$con = mysqli_connect($host, $user, $password, $database);

// Verificar si la conexión falló
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
