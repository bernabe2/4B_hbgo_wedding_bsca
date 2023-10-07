<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Consulta para obtener la contraseña almacenada en la base de datos para el usuario con el correo proporcionado
    // Asegúrate de ejecutar la consulta y obtener la contraseña almacenada

    // Verifica la contraseña proporcionada por el usuario con la contraseña almacenada en la base de datos
    if (password_verify($contraseña, $contraseñaAlmacenada)) {
        // Las contraseñas coinciden, el usuario está autenticado

        // Aquí puedes redirigir al usuario a la página de inicio, establecer variables de sesión, etc.
        header("Location:inicio_sesion.php");
        exit();
    } else {
        // Las contraseñas no coinciden, muestra un mensaje de error
        echo "Contraseña incorrecta";
    }
}
?>
