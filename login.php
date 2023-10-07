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
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];

// Verificar las credenciales en la base de datos
$sql = "SELECT id, nombre, contraseña FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // El usuario existe, verificar la contraseña
    $row = $result->fetch_assoc();
    if (password_verify($contraseña, $row['contraseña'])) {
        // Contraseña válida, iniciar sesión o redirigir a la página de inicio
        echo "Inicio de sesión exitoso. Bienvenido, " . $row['nombre'];
        // Puedes establecer la sesión aquí y redirigir al usuario a la página de inicio.
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}

$conn->close();
?>
