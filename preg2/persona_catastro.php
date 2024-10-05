<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];

    $con = mysqli_connect("127.0.0.1:3307", "root", "", "bdalan");
    if (!$con) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO persona (ci, nombre, paterno) VALUES ('$ci', '$nombre', '$paterno')";
    if (mysqli_query($con, $sql)) {
        header("Location: persona.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
<html>
<head>
    <title>Agregar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Agregar Persona</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="ci" class="form-label">CI</label>
                <input type="text" class="form-control" id="ci" name="ci" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="paterno" class="form-label">Paterno</label>
                <input type="text" class="form-control" id="paterno" name="paterno" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="persona.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
