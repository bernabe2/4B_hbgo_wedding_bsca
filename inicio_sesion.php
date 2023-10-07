<?php
// Iniciar la sesión (asegúrate de haber iniciado sesión en tus scripts de inicio de sesión)
session_start();

// Destruir todas las variables de sesión
session_unset();
session_destroy();

// Redirigir al usuario a la página de inicio de sesión
header("Location:login.php");
exit(); // Asegúrate de que el script se detenga aquí
?>
