<?php
// Conexión a la base de datos
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");

// Verificar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener el ID (CI) del formulario
$ci = $_POST["ci"]; // Cambiado de $_GET a $_POST

// Debug: Verificar el valor de CI
echo "CI recibido: " . $ci; // Agrega esta línea para depuración

// Consulta para eliminar el registro
$sql = "DELETE FROM persona WHERE ci = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $ci);

// Ejecutar la consulta
if (mysqli_stmt_execute($stmt)) {
    // Redirigir a la página de índice después de eliminar
    header("Location:persona.php");
    exit(); // Asegurarse de detener la ejecución del script después de la redirección
} else {
    // Manejar el error en caso de que la eliminación falle
    echo "Error al eliminar el registro: " . mysqli_error($con);
}
// Cerrar la conexión
mysqli_close($con);
?>
