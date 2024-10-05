<?php include '/primerparcial324/preg4/';
session_start();
session_destroy(); // Destruye la sesión
header("Location: /primerparcial324/preg4/login.php"); // Redirige a la página de login
exit();
?>
