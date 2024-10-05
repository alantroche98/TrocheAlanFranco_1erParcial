<?php include 'cabecera.inc.php'; ?>
<?php
include 'conexion.inc.php'; 

// Consulta para obtener los catastros
$sql = "SELECT * FROM catastro";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
}

// Generar la tabla HTML con estilos CSS
echo '<style>
        table {
            width: 100%; /* Ajusta el ancho de la tabla */
            border-collapse: collapse; /* Eliminar espacios entre celdas */
            margin: 20px 0; /* Espaciado alrededor de la tabla */
            font-size: 1em; /* Tamaño de fuente */
            font-family: Arial, sans-serif; /* Tipo de fuente */
        }
        th, td {
            padding: 12px; /* Espaciado interno de las celdas */
            text-align: left; /* Alinear texto a la izquierda */
            border-bottom: 1px solid #ddd; /* Línea de separación entre filas */
        }
        th {
            background-color: #2b68e5 !important; /* Color de fondo de la cabecera */
            color: white !important; /* Color del texto de la cabecera */
        }

        tr:hover {
            background-color: #f1f1f1; /* Color al pasar el ratón sobre la fila */
        }
        tbody tr:nth-child(even) {
            background-color: #e6f7ff; /* Color de fondo alternativo para filas */
        }
      </style>';

echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>'; 
echo '<th>Zona</th>'; 
echo '<th>Xini</th>'; 
echo '<th>Yini</th>'; 
echo '<th>Xfin</th>'; 
echo '<th>Yfin</th>'; 
echo '<th>Tipo de Impuesto</th>'; // Nueva columna
echo '</tr>';
echo '</thead>';
echo '<tbody>';

// Iterar a través de los resultados
echo'<br><br><br><br><br>';
echo ' <h1>Control de Pago de Impuestos</h1>';
while ($fila = mysqli_fetch_assoc($result)) {
    $codigoCatastral = $fila['id'];
    // Determinar el tipo de impuesto
    if (substr($codigoCatastral, 0, 1) == '1') {
        $tipoImpuesto = 'Alto';
    } elseif (substr($codigoCatastral, 0, 1) == '2') {
        $tipoImpuesto = 'Medio';
    } elseif (substr($codigoCatastral, 0, 1) == '3') {
        $tipoImpuesto = 'Bajo';
    } else {
        $tipoImpuesto = 'Desconocido'; // Para otros casos
    }

    // Mostrar los datos en la tabla
    echo '<tr>';
    echo '<td>' . $fila['id'] . '</td>'; // ID
    echo '<td>' . $fila['zona'] . '</td>'; // Zona
    echo '<td>' . $fila['Xini'] . '</td>'; // Xini
    echo '<td>' . $fila['Yini'] . '</td>'; // Yini
    echo '<td>' . $fila['Xfin'] . '</td>'; // Xfin
    echo '<td>' . $fila['Yfin'] . '</td>'; // Yfin
    echo '<td>' . $tipoImpuesto . '</td>'; // Tipo de impuesto
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

// Cerrar la conexión
mysqli_close($con);
?>


<?php include 'pie.inc.php'; ?>

