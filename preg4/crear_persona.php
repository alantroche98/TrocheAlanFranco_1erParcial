<?php
// Conexión a la base de datos
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");

// Verificar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}  

// DATOS DEL FORM
$ci = isset($_POST["ci"]) ? $_POST["ci"] : '';
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
$paterno = isset($_POST["paterno"]) ? $_POST["paterno"] : '';

// Verificar si las variables no están vacías
if (!empty($ci) && !empty($nombre) && !empty($paterno)) {
    // Insertar la nueva persona en la base de datos
    $sql = "INSERT INTO persona (ci, nombre, paterno) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $ci, $nombre, $paterno);

        if (mysqli_stmt_execute($stmt)) {
            // Redirigir de vuelta a la página principal
            header("Location: persona.php");
            exit; // Asegúrate de usar exit después de header
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
