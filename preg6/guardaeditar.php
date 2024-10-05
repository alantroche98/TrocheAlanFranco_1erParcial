<?php
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}  
// Obtener los datos
$ci = $_POST["ci"];
$nombre = $_POST["nombre"];
$paterno = $_POST["paterno"];

// Actualizar la persona
$sql = "UPDATE persona SET nombre = ?, paterno = ? WHERE ci = ?";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssi", $nombre, $paterno, $ci);
    if (mysqli_stmt_execute($stmt)) {
        //vuelta a la página principal
        header("Location: persona.php");
        exit; 
    } else {
        echo "Error al actualizar: " . mysqli_error($con);
    }
} else {
    echo "Error en la preparación de la consulta: " . mysqli_error($con);
}
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
