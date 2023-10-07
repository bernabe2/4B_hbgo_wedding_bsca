<?php
// Establecer la conexión a la base de datos 
$conexion = mysqli_connect("localhost:3307", "soporte3b", "soporte3b", "usuarios");

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Recopilar datos del formulario
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];

// Consultar la base de datos para verificar el inicio de sesión
$sql = "SELECT id, nombre, contraseña FROM usuarios WHERE email = '$email'";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    if (mysqli_num_rows($resultado) === 1) {
        $fila = mysqli_fetch_assoc($resultado);
        if (password_verify($contraseña, $fila['contraseña'])) {
            // Inicio de sesión exitoso, puedes establecer la sesión aquí y redirigir al usuario a la página de inicio
            session_start();
            $_SESSION['id'] = $fila['id'];
            $_SESSION['nombre'] = $fila['nombre'];
            header("Location: inicio.php"); // Cambia 'inicio.php' por la página a la que deseas redirigir al usuario
            exit;
        } else {
            echo "Contraseña correcta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
} else {
    echo "Error al realizar la consulta: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
