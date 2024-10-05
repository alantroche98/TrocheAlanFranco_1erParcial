<?php ;
session_start();
session_destroy(); // Destruye la sesión
header("Location: /primerparcial324/preg6/login.php"); // Redirige a la página de login
exit();
?>
