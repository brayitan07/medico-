<?php
session_start();
require_once "../models/database.php";

$login_error = ""; // Variable para almacenar errores

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = mysqli_real_escape_string($conn, $_POST['login_correo']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['login_contrasena']); // Asegúrate de escapar también la contraseña

    // Consulta para verificar el usuario
    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // Verificación de contraseña
    if ($user && password_verify($contrasena, $user['contrasena'])) {
        $_SESSION['u'] = $user['nombre_usuario']; // Almacena el nombre de usuario en la sesión
        $_SESSION['user_id'] = $user['id']; // Almacena el ID del usuario
        $_SESSION['rol'] = $user['rol']; // Almacena el rol en la sesión
        
        // Redirige según el rol
        if ($user['rol'] == 'admin') {
            header('Location: ../views/admin_dashboard.php');
        } elseif ($user['rol'] == 'doctor') {
            header('Location: ../views/doctor_dashboard.php');
        } elseif ($user['rol'] == 'user') {
            header('Location: ../views/pagina.php');
        }
        exit();
    } else {
        $login_error = "Correo o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/stylesr.css">
</head>
<body>
    <div class="form-container">
        <div class="form-box login">
            <h2>Iniciar sesión</h2>
            <form method="POST" action="">
                <div class="input-box">
                    <span>Correo</span>
                    <input type="email" name="login_correo" required>
                </div>
                <div class="input-box">
                    <span>Contraseña</span>
                    <input type="password" name="login_contrasena" required>
                </div>
                <div class="remember">
                    <label><input type="checkbox"> Recordarme</label>
                </div>
                <div class="input-box">
                    <input type="submit" value="Login">
                </div>
                <?php if (!empty($login_error)): ?>
                    <div class="alert alert-danger"><?php echo $login_error; ?></div>
                <?php endif; ?>
                <div class="switch-link">
                    <p>¿No tienes una cuenta? <a href="registration.php">Registrarse aquí</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
