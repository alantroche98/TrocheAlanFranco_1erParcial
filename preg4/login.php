<?php
// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Iniciar la sesión
session_start();

// Definir variables y mensajes
$username = "";
$password = "";
$error = "";

// Incluir el archivo de conexión a la base de datos
include 'conexion.inc.php';

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    function limpiarEntrada($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $username = limpiarEntrada($_POST["username"]);
    $password = limpiarEntrada($_POST["password"]);

    // Consulta para obtener el usuario
    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    // Verifica si se encontró el usuario
    // Verifica si se encontró el usuario
if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado); // Obtener la fila del usuario
    
    // Verifica la contraseña
    if (password_verify($password, $fila['password'])) {
        // Autenticación exitosa, establecer sesión
        $_SESSION["username"] = $username; // Guarda el nombre de usuario en la sesión
        $_SESSION["role"] = $fila['role']; // Guarda el rol en la sesión
        $_SESSION['ci'] = $fila['ci']; // Asegúrate de guardar el CI correcto aquí

        header("Location: index.php"); // Redirige a la página principal después del inicio de sesión
        exit();
    } else {
        $error = "Contraseña incorrecta."; // Mensaje de error
    }
} else {
    $error = "Usuario no encontrado."; // Mensaje de error si no se encuentra el usuario
}

}

// Datos del nuevo usuario
$new_username = "admin2"; // Cambia el nombre de usuario según lo desees
$new_password = "admin123"; // Cambia la contraseña según lo desees

// Hashear la nueva contraseña
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Insertar el nuevo usuario en la base de datos
$sql_insert = "INSERT INTO usuarios (username, password, role) VALUES (?, ?, ?)";
$stmt_insert = mysqli_prepare($con, $sql_insert);
$role = "admin"; // Establece el rol como 'admin'
mysqli_stmt_bind_param($stmt_insert, "sss", $new_username, $hashed_password, $role);
$result_insert = mysqli_stmt_execute($stmt_insert);

// Verificar si la inserción fue exitosa
/*if ($result_insert) {
    echo "Usuario creado exitosamente.";
} else {
    echo "Error al crear el usuario: " . mysqli_error($con);
}*/

// Cerrar conexión
mysqli_stmt_close($stmt_insert);
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>

<div class="container mt-5">
    <div class="card w-50 mx-auto">
        <div class="card-body">
            <h2 class="text-center">Iniciar Sesión</h2>
            
            <?php if ($error): ?>
                <div class="alert alert-danger text-center">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php" class="w-100">
                <!-- Username input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="username" name="username" type="text" placeholder="Enter your username..." required />
                    <label for="username">Usuario</label>
                </div>
                <!-- Password input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password..." required />
                    <label for="password">Contraseña</label>
                </div>
                <!-- Submit Button-->
                <div class="d-grid">
                    <button class="btn btn-primary rounded-pill btn-lg" id="submitLoginButton" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include 'pie.inc.php'; ?>
