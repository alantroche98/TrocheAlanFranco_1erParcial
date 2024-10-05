<?php
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener el ID (CI) del formulario
$ci = $_POST["ci"];

// Debug: Verificar el valor de CI
echo "CI recibido: " . $ci; 

//eliminar el registro
$sql = "DELETE FROM persona WHERE ci = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $ci);

// Ejecutar la consulta
if (mysqli_stmt_execute($stmt)) {
    // Redirigir a la página de índice después de eliminar
    header("Location: persona.php");
    exit(); //detener ejecucion
} else {
    echo "Error al eliminar el registro: " . mysqli_error($con);
}

mysqli_close($con);
?>
