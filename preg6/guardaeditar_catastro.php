<?php
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}
//datos del formulario
$id = $_POST['id'];
$zona = $_POST['zona'];
$Xini = $_POST['Xini'];
$Yini = $_POST['Yini'];
$Xfin = $_POST['Xfin'];
$Yfin = $_POST['Yfin'];

//actualizar el catastro
$sql = "UPDATE catastro SET zona='$zona', Xini=$Xini, Yini=$Yini, Xfin=$Xfin, Yfin=$Yfin WHERE id=$id";

if (mysqli_query($con, $sql)) {
    echo "Catastro actualizado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Cerrar la conexión
mysqli_close($con);

// Redirigir al listado de catastros
header("Location:catastro.php");
exit();
?>
