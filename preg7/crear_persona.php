<?php
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}  
// Obtener los datos del formulario
$ci = isset($_POST["ci"]) ? $_POST["ci"] : '';
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
$paterno = isset($_POST["paterno"]) ? $_POST["paterno"] : '';

// Verificar si las variables no están vacías
if (!empty($ci) && !empty($nombre) && !empty($paterno)) {
    // Insertar la nueva persona
    $sql = "INSERT INTO persona (ci, nombre, paterno) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $ci, $nombre, $paterno);

        if (mysqli_stmt_execute($stmt)) {
            // Redirigir página principal
            header("Location: persona.php");
            exit; 
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_error($con);
        }
    } else {
        echo "Error en la preparación de la consulta: " . mysqli_error($con);
    }
} else {
    echo "Error: todos los campos son obligatorios.";
}

mysqli_close($con);
?>
