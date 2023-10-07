<?php
// Conectar a la base de datos 
$servername = "localhost:3307";
$username = "soporte3b";
$password = "soporte3b";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión a la base de datos
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recuperar datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Recomiendo cifrar la contraseña

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, email, contraseña) VALUES ('$nombre', '$email', '$contraseña')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error al registrar: " . $conn->error;
}

$conn->close();
?>
