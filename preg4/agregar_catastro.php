<?php
// Conexión a la bD
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

//datos del formulario
$zona = $_POST['zona'];
$Xini = $_POST['Xini'];
$Yini = $_POST['Yini'];
$Xfin = $_POST['Xfin'];
$Yfin = $_POST['Yfin'];

// Consulta para insertar un nuevo catastro
$sql = "INSERT INTO catastro (zona, Xini, Yini, Xfin, Yfin) VALUES ('$zona', $Xini, $Yini, $Xfin, $Yfin)";

if (mysqli_query($con, $sql)) {
    echo "Nuevo catastro agregado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);

// Redirigir al listado de catastros
header("Location: catastro.php");
exit();
?>
