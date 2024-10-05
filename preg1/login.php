<?php 
// Iniciar la sesión
session_start();

// Definir variables y mensajes
$username = "";
$password = "";
$error = "";

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Aquí deberías realizar la validación de las credenciales del usuario.
    // Para este ejemplo, vamos a utilizar un usuario y contraseña fijos.
    // En un entorno real, consulta tu base de datos para verificar las credenciales.
    $valid_username = "admin"; // Cambia esto por el nombre de usuario real
    $valid_password = "password"; // Cambia esto por la contraseña real

    // Comprobar si las credenciales son correctas
    if ($username === $valid_username && $password === $valid_password) {
        // Autenticación exitosa, establecer sesión
        $_SESSION["username"] = $username; // Guarda el nombre de usuario en la sesión
        header("Location: index.php"); // Redirige a la página principal después del inicio de sesión
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos."; // Mensaje de error
    }
}
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
    <div class="card w-50 mx-auto"> <!-- Tarjeta centrada con ancho limitado -->
        <div class="card-body">
            <h2 class="text-center">Iniciar Sesión</h2>
            
            <?php if ($error): ?>
                <div class="alert alert-danger text-center">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php" class="w-100"> <!-- Formulario con ancho completo -->
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
                <!-- Remember me checkbox-->
                <div class="form-check mb-3">
                    <input class="form-check-input" id="rememberMe" name="rememberMe" type="checkbox" />
                    <label class="form-check-label" for="rememberMe">Recuerdame</label>
                </div>
                <!-- Submit Button-->
                <div class="d-grid">
                    <button class="btn btn-primary rounded-pill btn-lg" id="submitLoginButton" type="submit">Login</button>
                </div>
                <!-- Forgot password link-->
                <div class="text-center mt-3">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
        </div>
    </div>
</div>
<br>	<br>	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



<br><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include 'pie.inc.php'; ?>
