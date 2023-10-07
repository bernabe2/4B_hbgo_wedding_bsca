<?php
// Establecer la conexión a la base de datos 
$conexion = mysqli_connect("localhost:3307", "soporte3b", "soporte3b", "usuarios");

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Recopilar datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Hash de la contraseña

// Insertar datos en la tabla de usuarios
$sql = "INSERT INTO usuarios (nombre, email, contraseña) VALUES ('$nombre', '$email', '$contraseña')";

if (mysqli_query($conexion, $sql)) {
    echo "Registro exitoso. Puedes iniciar sesión ahora.";
} else {
    echo "Error al registrar usuario: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
