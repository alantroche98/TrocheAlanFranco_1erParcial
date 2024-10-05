<?php
// Conexión a la base de datos
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");

// Verificar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si el parámetro 'ci' está en la URL y es válido
if (isset($_GET["ci"]) && is_numeric($_GET["ci"])) {
    $ci = $_GET["ci"];
    
    // Consulta preparada para obtener los datos de la persona
    $stmt = mysqli_prepare($con, "SELECT nombre, paterno FROM persona WHERE ci = ?");
    mysqli_stmt_bind_param($stmt, "i", $ci);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    
    // Verificar si se obtuvo un resultado
    if ($fila = mysqli_fetch_assoc($resultado)) {
        $nombre = $fila["nombre"];
        $paterno = $fila["paterno"];
        
        // Depuración para verificar si se obtuvieron los datos
        echo "Nombre: " . $nombre . "<br>";
        echo "Apellido Paterno: " . $paterno . "<br>";
    } else {
        echo "No se encontró la persona con el CI: $ci.";
        exit;
    }
} else {
    echo "CI inválido o no proporcionado.";
    exit;
}
?>

<html>
<head>
    <title>Editar Propietario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<h1>EDITAR PROPIETARIO</h1>
<form action="daeditar.php" method="POST">
    <div class="mb-3">
        <label for="ci" class="form-label">CI</label>
        <input type="text" class="form-control" id="ci" name="ci" value="<?php echo htmlspecialchars($ci); ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombres</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
    </div>
    <div class="mb-3">
        <label for="paterno" class="form-label">Apellido Paterno</label>
        <input type="text" class="form-control" id="paterno" name="paterno" value="<?php echo htmlspecialchars($paterno); ?>">
    </div>
    <input type="submit" name="aceptar" value="Aceptar" class="btn btn-primary">
    <a href="persona.php" class="btn btn-danger">Cancelar</a>
</form>

</body>
</html>
