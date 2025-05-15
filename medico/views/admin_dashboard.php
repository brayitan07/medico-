<?php 
session_start();
require_once "../models/Database.php"; // Correcta ruta al archivo de conexión

// Verificar que el usuario sea un administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../controllers/Login.php"); // Ruta correcta al archivo login
    exit();
}

// Obtener lista de empleados (doctores y usuarios)
$sql = "SELECT * FROM usuarios WHERE rol IN ('doctor', 'user')";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador</title>
    <link rel="stylesheet" href="../assets/css/stylead.css"> <!-- Correcta ruta a los estilos -->
</head>
<body>
    <div class="dashboard-container">
        <!-- Botón de Cerrar Sesión -->
        <div class="logout-container">
            <a href="../controllers/Logout.php" class="button logout-button">Cerrar Sesión</a> <!-- Ruta correcta al logout -->
        </div>
        <h2>Bienvenido, Administrador</h2>
        
        <div class="button-container">
            <a href="../controllers/Add_employee.php" class="button">Agregar Usuarios</a> <!-- Ruta correcta -->
            <a href="../controllers/Generate_reports.php" class="button">Generar Informes</a> <!-- Ruta correcta -->
        </div>

        <h3>Lista de Pacientes</h3>
        <table>
            <thead>
                <tr>
                    <th>Rol</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['rol']; ?></td>
                    <td><?php echo $row['nombre_usuario']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td>
                        <a href="../controllers/Edit_employee.php?id=<?php echo $row['id']; ?>" class="button action-button">Editar</a>
                        <a href="../controllers/Delete_employee.php?id=<?php echo $row['id']; ?>" class="button action-button delete-button">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
