<?php
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}
$id = $_POST['id'];

//eliminar el catastro
$sql = "DELETE FROM catastro WHERE id=$id";

if (mysqli_query($con, $sql)) {
    echo "Catastro eliminado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

// Redirigir al listado de catastros
header("Location: catastro.php");
exit();
?>
