<?php include 'cabecera.inc.php'; ?>

<?php 
// Conexión a la base de datos
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");

// Verificar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta para obtener todas las personas
$sql = "SELECT * FROM persona";
$resultado = mysqli_query($con, $sql);
?>

<html>
<head>
    <title>Listado de Propietarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br><br><br>
        <h1>Administración de Listado de Propietarios</h1>
        
        <!-- Botón para agregar persona -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregarModal">
            Nuevo Propietario
        </button>

        <table class="table">
            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?php echo $fila['ci']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['paterno']; ?></td>
                    <td>
                        <!-- Botón para abrir el modal de editar -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal" 
                        data-ci="<?php echo $fila['ci']; ?>" 
                        data-nombre="<?php echo $fila['nombre']; ?>" 
                        data-paterno="<?php echo $fila['paterno']; ?>">
                            Editar
                        </button>
                       <!-- Botón para eliminar persona -->
                        <form action="eliminar_persona.php" method="POST" style="display:inline;">
                            <input type="hidden" name="ci" value="<?php echo $fila['ci']; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para agregar persona -->
    <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="crear_persona.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregarModalLabel">Nuevo Propietario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="ci" class="form-label">CI</label>
                            <input type="text" class="form-control" id="ci" name="ci" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="paterno" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="paterno" name="paterno" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Propietario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para editar persona -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEditar" action="guardaeditar.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel">Editar Propietario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3">
                        <label for="ci" class="form-label">CI</label>
                        <input type="text" class="form-control" id="ci" name="ci" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="paterno" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="paterno" name="paterno" required>
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var editarModal = document.getElementById('editarModal');
        editarModal.addEventListener('show.bs.modal', function (event) {
            // Botón que abrió el modal
            var button = event.relatedTarget;

            // Extraer la información del botón
            var ci = button.getAttribute('data-ci');
            var nombre = button.getAttribute('data-nombre');
            var paterno = button.getAttribute('data-paterno');

            // Colocar la información en los campos del modal
            var inputCi = editarModal.querySelector('#ci');
            var inputNombre = editarModal.querySelector('#nombre');
            var inputPaterno = editarModal.querySelector('#paterno');

            inputCi.value = ci;
            inputNombre.value = nombre;
            inputPaterno.value = paterno;
        });
    </script>
</body>
</html>

<?php include 'pie.inc.php'; ?>

