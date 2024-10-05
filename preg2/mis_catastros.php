<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (isset($_SESSION['ci'])) {
    $ci = $_SESSION['ci']; // Aquí obtienes el ci de la sesión
} else {
    // Maneja el caso en que el ci no está definido
    echo "No se ha encontrado el CI del usuario.";
    exit();
}

// Conectar a la base de datos
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "BDAlan";
$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
    die ("Conexión fallida: " . $conexion->connect_error);
}

// Obtener el CI de la persona del usuario actual
$userCi = $_SESSION['ci']; // Asegúrate de haber guardado el CI en la sesión durante el inicio de sesión

// Obtener los catastros asociados al usuario
$query = "SELECT c.* FROM catastro c
          JOIN persona_catastro pc ON c.id = pc.catastro_id
          WHERE pc.persona_ci = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $userCi);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Mis Catastros</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            padding: 20px;
        }
        .table thead th {
            background-color: #007bff;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f2f2f2;
        }
        .container {
            margin-top: 30px;
        }
        h1 {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mis Catastros</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Zona</th>
                    <th>X Inicio</th>
                    <th>Y Inicio</th>
                    <th>X Fin</th>
                    <th>Y Fin</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['zona']; ?></td>
                        <td><?php echo $row['Xini']; ?></td>
                        <td><?php echo $row['Yini']; ?></td>
                        <td><?php echo $row['Xfin']; ?></td>
                        <td><?php echo $row['Yfin']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <?php
    // Cierra la conexión
    $conexion->close();
    ?>

    <!-- Modal para editar catastro -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Catastro</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="editar_catastro.php" method="POST">
                        <input type="hidden" name="id" id="catastroId">
                        <div class="form-group">
                            <label for="zona">Zona</label>
                            <input type="text" class="form-control" id="zona" name="zona">
                        </div>
                        <div class="form-group">
                            <label for="Xini">X Inicio</label>
                            <input type="text" class="form-control" id="Xini" name="Xini">
                        </div>
                        <div class="form-group">
                            <label for="Yini">Y Inicio</label>
                            <input type="text" class="form-control" id="Yini" name="Yini">
                        </div>
                        <div class="form-group">
                            <label for="Xfin">X Fin</label>
                            <input type="text" class="form-control" id="Xfin" name="Xfin">
                        </div>
                        <div class="form-group">
                            <label for="Yfin">Y Fin</label>
                            <input type="text" class="form-control" id="Yfin" name="Yfin">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Script para pasar los datos al modal de editar
        $('#editarModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var zona = button.data('zona');
            var xini = button.data('xini');
            var yini = button.data('yini');
            var xfin = button.data('xfin');
            var yfin = button.data('yfin');

            var modal = $(this);
            modal.find('#catastroId').val(id);
            modal.find('#zona').val(zona);
            modal.find('#Xini').val(xini);
            modal.find('#Yini').val(yini);
            modal.find('#Xfin').val(xfin);
            modal.find('#Yfin').val(yfin);
        });
    </script>
</body>
</html>
