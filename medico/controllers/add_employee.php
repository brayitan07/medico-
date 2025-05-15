<?php
session_start();
require_once "../models/database.php";

// Verificar si el usuario tiene los permisos de rol necesarios
if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], ['doctor', 'admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $rol = $_POST['rol']; // Obtener el rol seleccionado en el formulario
    
    // Insertar los datos incluyendo el rol seleccionado
    $sql = "INSERT INTO usuarios (nombre_usuario, correo, contrasena, rol) VALUES ('$nombre_usuario', '$correo', '$contrasena', '$rol')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Empleado agregado exitosamente.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado</title>
    <link rel="stylesheet" href="../assets/css/stylesr.css">
</head>
<body>
    <div class="form-container">
        <h2>Agregar Empleado</h2>
        <form method="POST" action="">
            <div class="input-box">
                <label for="nombre_usuario">Nombre de Usuario:</label>
                <input type="text" name="nombre_usuario" required>
            </div>

            <div class="input-box">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" name="correo" required>
            </div>

            <div class="input-box">
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" required>
            </div>

            <!-- Selección del rol del usuario -->
            <div class="input-box">
                <label for="rol">Seleccionar Rol:</label>
                <select name="rol" required>
                    <option value="doctor">Doctor</option>
                    <option value="user">Usuario</option>
                </select>
            </div>

            <div class="input-box">
                <input type="submit" value="Agregar Empleado">
            </div>
        </form>
    </div>
</body>
</html>
