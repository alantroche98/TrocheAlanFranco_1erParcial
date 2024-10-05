<?php
// Conexión a la base de datos
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");

// Verificar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener el ID del catastro a eliminar
$id = $_POST['id'];

// Consulta para eliminar el catastro
$sql = "DELETE FROM catastro WHERE id=$id";

if (mysqli_query($con, $sql)) {
    echo "Catastro eliminado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);

header("Location: catastro.php");
exit();
?>
