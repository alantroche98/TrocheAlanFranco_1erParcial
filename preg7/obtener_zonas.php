<?php
// Conexión a la base de datos
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");

// Verificar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si se ha enviado el ID del distrito
if (isset($_POST['distrito_id'])) {
    $distrito_id = $_POST['distrito_id'];

    // Consulta para obtener las zonas del distrito especificado
    $sql = "SELECT id, nombre FROM zona WHERE distrito_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $distrito_id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    $zonas = array();
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $zonas[] = $fila; // Agregar cada zona al array
    }

    // Devolver las zonas en formato JSON
    echo json_encode($zonas);
}

// Cerrar la conexión
mysqli_close($con);
?>
