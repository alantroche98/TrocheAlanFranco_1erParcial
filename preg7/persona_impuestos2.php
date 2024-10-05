<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location:login.php'); // Redirigir a la página de inicio de sesión
    exit;
}

// Verifica si el archivo de cabecera existe y lo incluye
$cabeceraPath = 'cabecera.inc.php'; // Cambia la ruta según la estructura de tus carpetas
//$cabeceraPath = '../preg6/cabecera.inc.php'; // Cambia la ruta según la estructura de tus carpetas
if (file_exists($cabeceraPath)) {
    include $cabeceraPath;
} else {
    die("El archivo cabecera.inc.php no se encontró.");
}

// Incluir el archivo de conexión a la base de datos
include 'conexion.inc.php'; // Asegúrate de que la ruta sea correcta y relativa

// Consulta para obtener la lista de personas
$sql = "SELECT * FROM persona"; // Cambia el nombre de la tabla si es necesario
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
}

//array para almacenar los resultados
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
            background-color: #007BFF;
            color: white;
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
      
echo '<h1>Lista de propietarios ordenados por tipo de Impuestos</h1>';
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
echo '</table>';

//pie de página
$piePath = 'pie.inc.php'; // Cambia la ruta según la estructura de tus carpetas
if (file_exists($piePath)) {
    include $piePath;
} else {
    die("El archivo pie.inc.php no se encontró.");
}
mysqli_close($con);
?>
