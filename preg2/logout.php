<?php //include '/primerparcial324/preg2/';
session_start();
session_destroy(); // Destruye la sesión
header("Location:login.php"); // Redirige a la página de login
exit();
?>
