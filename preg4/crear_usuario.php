<?php
$servername = "127.0.0.1:3307"; 
$username = "root";   
$password = ""; 
$dbname = "BDAlan"; 
$conexion = new mysqli($servername, $username, $password, $dbname);
// Verifica la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Datos del nuevo usuario
$newUsername = 'usuario1'; // Nombre de usuario
$newPassword = 'user0001'; // Contraseña en texto plano
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); // Hash de la contraseña

// Inserta el nuevo usuario
$query = "INSERT INTO usuarios (username, password, role) VALUES ('$newUsername', '$hashedPassword', 'user')";

if ($conexion->query($query) === TRUE) {
    echo "Usuario creado exitosamente";
} else {
    echo "Error: " . $query . "<br>" . $conexion->error;
}

// Cierra la conexión
$conexion->close();
?>
