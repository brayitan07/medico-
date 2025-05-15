<?php
session_start();
require_once "../models/database.php";

// Verificar que el usuario sea un administrador
if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], ['doctor', 'admin'])) {
    header("Location: login.php");
    exit();
}
// Obtener el ID del empleado a editar
$id = $_GET['id'];

// Obtener información del empleado
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$empleado = mysqli_fetch_assoc($result);

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'];
    $correo = $_POST['correo'];

    // Actualizar empleado
    $update_sql = "UPDATE usuarios SET nombre_usuario = '$nombre_usuario', correo = '$correo' WHERE id = '$id'";
    if (mysqli_query($conn, $update_sql)) {
        header("Location: ../views/admin_dashboard.php"); // Redirigir al dashboard del administrador
    } else {
        echo "Error al actualizar el empleado: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
            text-align: left;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .button {
            background-color: #5cbb5c;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #4a9b4a;
        }

        .form-container form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Editar Empleado</h2>
        <form method="POST">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" value="<?php echo $empleado['nombre_usuario']; ?>" required>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="<?php echo $empleado['correo']; ?>" required>

            <button type="submit" class="button">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
