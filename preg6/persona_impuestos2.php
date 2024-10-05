<?php
$cabeceraPath = 'cabecera.inc.php'; 
if (file_exists($cabeceraPath)) {
    include $cabeceraPath;
} else {
    die("El archivo cabecera.inc.php no se encontró.");
}

include 'conexion.inc.php'; 

//obtener la lista de personas
$sql = "SELECT * FROM persona";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
}

//almacenar en array
$personasPorImpuesto = [
    'Alto' => [],
    'Medio' => [],
    'Bajo' => []
];

// Iterar Y agrupar por tipo de impuesto
while ($fila = mysqli_fetch_assoc($result)) {
    $codigoCatastral = $fila['ci']; 
    if (substr($codigoCatastral, 0, 1) == '1') {
        $tipoImpuesto = 'Alto';
    } elseif (substr($codigoCatastral, 0, 1) == '2') {
        $tipoImpuesto = 'Medio';
    } elseif (substr($codigoCatastral, 0, 1) == '3') {
        $tipoImpuesto = 'Bajo';
    } else {
        $tipoImpuesto = 'Desconocido'; // Para otros casos
    }

    // Agregar nombre y apellido a la categoría correspondiente
    if ($tipoImpuesto != 'Desconocido') {
        $nombreCompleto = $fila['nombre'] . ' ' . $fila['paterno'];
        $personasPorImpuesto[$tipoImpuesto][] = $nombreCompleto;
    }
}

// Generar la tabla HTML con estilos CSS
echo '<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 1em;
        font-family: Arial, sans-serif;
    }
    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        border-right: 1px solid #ddd; /* Línea vertical entre columnas */
    }
    th {
        background-color: #007BFF !important; /* Color de fondo azul con !important */
        color: white !important; /* Color del texto blanco con !important */
    }
    tr:hover {
        background-color: #f1f1f1;
    }
    tbody tr:nth-child(even) {
        background-color: #e6f7ff;
    }
    /* Eliminar la línea derecha de la última columna */
    td:last-child, th:last-child {
        border-right: none;
    }
</style>';

      
echo '<br><br><br><br><br><br><h1>Lista de propietarios ordenados por tipo de Impuestos</h1>';
echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th>Alto</th>'; 
echo '<th>Medio</th>'; 
echo '<th>Bajo</th>'; 
echo '</tr>';
echo '</thead>';
echo '<tbody>';

// Determinar el número máximo de personas en cada categoría para alinear filas
$maxLength = max(count($personasPorImpuesto['Alto']), count($personasPorImpuesto['Medio']), count($personasPorImpuesto['Bajo']));
// Mostrar las personas en columnas
for ($i = 0; $i < $maxLength; $i++) {
    echo '<tr>';
    echo '<td>' . (isset($personasPorImpuesto['Alto'][$i]) ? $personasPorImpuesto['Alto'][$i] : '') . '</td>';
    echo '<td>' . (isset($personasPorImpuesto['Medio'][$i]) ? $personasPorImpuesto['Medio'][$i] : '') . '</td>';
    echo '<td>' . (isset($personasPorImpuesto['Bajo'][$i]) ? $personasPorImpuesto['Bajo'][$i] : '') . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table><br><br><br><br><br><br>';
?>
<?php include 'pie.inc.php'; ?>

