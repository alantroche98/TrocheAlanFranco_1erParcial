<?php include 'cabecera.inc.php'; ?>
<?php  
// Conexión a la base de datos
$con = mysqli_connect("127.0.0.1:3307", "root", "", "BDAlan");
// Verificar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}
// Consulta para obtener todos los catastros
$sql = "SELECT * FROM catastro";
$resultado = mysqli_query($con, $sql);
?>

<html>
<head>
    <title>Listado de Catastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br><br><br>
        <h1>Administración de Listado de Catastros</h1>
        <!-- Botón para agregar catastro -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregarModal">
            Nuevo Catastro
        </button>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Zona</th>
                    <th>Xini</th>
                    <th>Yini</th>
                    <th>Xfin</th>
                    <th>Yfin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?php echo $fila['id']; ?></td>
                    <td><?php echo $fila['zona']; ?></td>
                    <td><?php echo $fila['Xini']; ?></td>
                    <td><?php echo $fila['Yini']; ?></td>
                    <td><?php echo $fila['Xfin']; ?></td>
                    <td><?php echo $fila['Yfin']; ?></td>
                    <td>
                        <!-- Botón para abrir el modal de editar -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal" 
                        data-id="<?php echo $fila['id']; ?>" 
                        data-zona="<?php echo $fila['zona']; ?>" 
                        data-xini="<?php echo $fila['Xini']; ?>" 
                        data-yini="<?php echo $fila['Yini']; ?>" 
                        data-xfin="<?php echo $fila['Xfin']; ?>" 
                        data-yfin="<?php echo $fila['Yfin']; ?>">
                            Editar
                        </button>
                        <!-- Botón para eliminar catastro -->
                        <form action="eliminar_catastro.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <!-- Botón para ver propietarios -->
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#verModal" 
                        data-id="<?php echo $fila['id']; ?>">
                            Ver Propietarios
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para agregar catastro -->
    <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="agregar_catastro.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregarModalLabel">Agregar Catastro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="zona" class="form-label">Zona</label>
                            <input type="text" class="form-control" id="zona" name="zona" required>
                        </div>
                        <div class="mb-3">
                            <label for="Xini" class="form-label">X Inicio</label>
                            <input type="text" class="form-control" id="Xini" name="Xini" required>
                        </div>
                        <div class="mb-3">
                            <label for="Yini" class="form-label">Y Inicio</label>
                            <input type="text" class="form-control" id="Yini" name="Yini" required>
                        </div>
                        <div class="mb-3">
                            <label for="Xfin" class="form-label">X Fin</label>
                            <input type="text" class="form-control" id="Xfin" name="Xfin" required>
                        </div>
                        <div class="mb-3">
                            <label for="Yfin" class="form-label">Y Fin</label>
                            <input type="text" class="form-control" id="Yfin" name="Yfin" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar Catastro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para editar catastro -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEditar" action="guardaeditar_catastro.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel">Editar Catastro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id" name="id" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="zona" class="form-label">Zona</label>
                            <input type="text" class="form-control" id="zona" name="zona" required>
                        </div>
                        <div class="mb-3">
                            <label for="Xini" class="form-label">X Inicio</label>
                            <input type="text" class="form-control" id="Xini" name="Xini" required>
                        </div>
                        <div class="mb-3">
                            <label for="Yini" class="form-label">Y Inicio</label>
                            <input type="text" class="form-control" id="Yini" name="Yini" required>
                        </div>
                        <div class="mb-3">
                            <label for="Xfin" class="form-label">X Fin</label>
                            <input type="text" class="form-control" id="Xfin" name="Xfin" required>
                        </div>
                        <div class="mb-3">
                            <label for="Yfin" class="form-label">Y Fin</label>
                            <input type="text" class="form-control" id="Yfin" name="Yfin" required>
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

       <!-- propietarios -->
        <div class="modal fade" id="verModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Propietarios del Catastro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="propietariosList">Cargando...</div> <!-- Este es el contenedor -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var editarModal = document.getElementById('editar Modal');
        editarModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Botón que activó el modal
            var id = button.getAttribute('data-id');
            var zona = button.getAttribute('data-zona');
            var xini = button.getAttribute('data-xini');
            var yini = button.getAttribute('data-yini');
            var xfin = button.getAttribute('data-xfin');
            var yfin = button.getAttribute('data-yfin');

            // Actualizar el modal con los valores de los atributos
            var modalId = editarModal.querySelector('#id');
            var modalZona = editarModal.querySelector('#zona');
            var modalXini = editarModal.querySelector('#Xini');
            var modalYini = editarModal.querySelector('#Yini');
            var modalXfin = editarModal.querySelector('#Xfin');
            var modalYfin = editarModal.querySelector('#Yfin');

            modalId.value = id;
            modalZona.value = zona;
            modalXini.value = xini;
            modalYini.value = yini;
            modalXfin.value = xfin;
            modalYfin.value = yfin;
        });

        var verModal = document.getElementById('verModal');
        verModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Botón que activó el modal
            var idCatastro = button.getAttribute('data-id');
            // Verificar que idCatastro no sea nulo o indefinido
            if (!idCatastro) {
                document.getElementById('propietariosList').innerHTML = "ID de catastro no válido.";
                return; // Salir de la función si no hay un ID válido
            }
            // Hacer una llamada AJAX para obtener los propietarios
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/primerparcial324/preg2/bdalan/obtener_propietarios.php?catastro_id=" + encodeURIComponent(idCatastro), true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('propietariosList').innerHTML = xhr.responseText;
                } else {
                    document.getElementById('propietariosList').innerHTML = "Error al cargar propietarios.";
                }
            };
            // Manejar errores de la llamada AJAX
            xhr.onerror = function() {
                document.getElementById('propietariosList').innerHTML = "Error de conexión.";
            };
            xhr.send();
        });
    </script>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
mysqli_close($con);
?>

