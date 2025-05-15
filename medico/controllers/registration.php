<?php
session_start();
require_once "../models/database.php";

$errors = [];
$success_message = "";

// Manejo del formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_nombre_usuario'])) {
    $nombre_usuario = mysqli_real_escape_string($conn, $_POST['register_nombre_usuario']);
    $correo = mysqli_real_escape_string($conn, $_POST['register_correo']);
    $contrasena = $_POST['register_contrasena'];
    $confirmar_contrasena = $_POST['register_confirmar_contrasena'];

    if (empty($nombre_usuario) || empty($correo) || empty($contrasena) || empty($confirmar_contrasena)) {
        $errors[] = "Todos los campos son requeridos";
    }
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El correo electrónico no es válido";
    }
    if (strlen($contrasena) < 8) {
        $errors[] = "La contraseña debe tener al menos 8 caracteres";
    }
    if ($contrasena !== $confirmar_contrasena) {
        $errors[] = "Las contraseñas no coinciden";
    }

    if (count($errors) === 0) {
        // Verificar si el correo ya está registrado
        $sql = "SELECT * FROM usuarios WHERE correo = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $correo);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $errors[] = "El correo electrónico ya está registrado";
        } else {
            // Registrar nuevo usuario
            $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (nombre_usuario, correo, contrasena) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $nombre_usuario, $correo, $contrasenaHash);
            if (mysqli_stmt_execute($stmt)) {
                $success_message = "Registro exitoso";
            } else {
                $errors[] = "Algo salió mal: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../assets/css/stylesr.css">
</head>
<body>
    <div class="form-container">
        <div class="form-box register">
            <h2>Registrar</h2>
            <form method="POST" action="">
                <div class="input-box">
                    <span>Nombre usuario</span>
                    <input type="text" name="register_nombre_usuario" required>
                </div>
                <div class="input-box">
                    <span>Correo</span>
                    <input type="email" name="register_correo" required>
                </div>
                <div class="input-box">
                    <span>Contraseña</span>
                    <input type="password" name="register_contrasena" required>
                </div>
                <div class="input-box">
                    <span>Confirmar Contraseña</span>
                    <input type="password" name="register_confirmar_contrasena" required>
                </div>
                <div class="input-box">
                    <input type="submit" value="Registrar">
                </div>
                <?php if (!empty($success_message)): ?>
                    <div class="alert alert-success"><?php echo $success_message; ?></div>
                <?php endif; ?>
                <?php if (!empty($errors)): ?>
                    <?php foreach ($errors as $error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="switch-link">
                    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
