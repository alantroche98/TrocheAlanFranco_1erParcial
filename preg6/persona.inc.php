<?php
$host = "127.0.0.1:3307";      
$user = "root";           
$password = "";          
$database = "BDAlan";   
$con = mysqli_connect($host, $user, $password, $database);

// Verificar si la conexión falló
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
