<?php
// Obtener datos del formulario
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];

// Conectarse a la base de datos
$conexion = new mysqli("cs.ilab.cl", "2_BD_39", "ignacio2024-", "2_BD_39");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consultar si existe un usuario con el nombre y contraseña proporcionados
$sql = "SELECT * FROM Usuario WHERE nombre = '$nombre' AND password = '$contrasena'";
$resultado = $conexion->query($sql);

// Verificar si se encontró algún registro
if ($resultado->num_rows > 0) {
    // El usuario y la contraseña coinciden
    echo "Inicio de sesión exitoso";
} else {
    // No se encontró ningún registro que coincida
    echo "Nombre de usuario o contraseña incorrectos";
}

// Cerrar la conexión
$conexion->close();
?>
