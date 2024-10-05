<?php
// Conexión a la base de datos
$host = '127.0.0.1:3307';
$db   = 'BDAlan'; 
$user = 'root'; 
$pass = ''; 

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID de catastro desde la solicitud
$idCatastro = isset($_GET['catastro_id']) ? intval($_GET['catastro_id']) : 0;

$sql = "SELECT p.ci, p.nombre, p.paterno 
        FROM persona p 
        INNER JOIN persona_catastro pc ON p.ci = pc.persona_id 
        WHERE pc.catastro_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idCatastro);
$stmt->execute();
$result = $stmt->get_result();

// Crear la tabla HTML para mostrar los propietarios
if ($result->num_rows > 0) {
    echo '<table class="table table-striped">';
    echo '<thead><tr><th>CI</th><th>Nombre</th><th>Paterno</th></tr></thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['ci']) . '</td>';
        echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
        echo '<td>' . htmlspecialchars($row['paterno']) . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "No se encontraron propietarios para el catastro seleccionado.";
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
