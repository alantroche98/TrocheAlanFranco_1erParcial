<?php
// Conexión a la base de datos
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");

// Verificar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}
// Obtener los datos del formulario
$zona = $_POST['zona'];
$Xini = $_POST['Xini'];
$Yini = $_POST['Yini'];
$Xfin = $_POST['Xfin'];
$Yfin = $_POST['Yfin'];

//insertar un nuevo catastro
$sql = "INSERT INTO catastro (zona, Xini, Yini, Xfin, Yfin) VALUES ('$zona', $Xini, $Yini, $Xfin, $Yfin)";

if (mysqli_query($con, $sql)) {
    echo "Nuevo catastro agregado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
//cerrar conexión
mysqli_close($con);

// Redirigir al listado de catastros
header("Location: catastro.php");
exit();
?>
