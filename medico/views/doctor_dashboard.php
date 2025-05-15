<?php
session_start();
require_once "../models/database.php";

// Verificar que el usuario sea un doctor
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'doctor') {
    header("Location: ../controllers/login.php");
    exit();
}

// Obtener lista de empleados
$sql = "SELECT * FROM usuarios WHERE rol = 'user'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboar Doctor</title>
    <link rel="stylesheet" href="../assets/css/stylead.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Botón de Cerrar Sesión -->
        <div class="logout-container">
            <a href="../controllers/logout.php" class="button logout-button">Cerrar Sesión</a>
        </div>
        <h2>Bienvenido, Doctor</h2>
        
        <div class="button-container">
            <a href="../controllers/generate_reports.php" class="button">Generar Informes</a>
        </div>

        <h3>Lista de Paciente</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['nombre_usuario']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
