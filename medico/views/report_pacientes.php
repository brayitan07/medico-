<?php
session_start();
require_once "../models/database.php";

// Verificar que el usuario sea un administrador
if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], ['doctor', 'admin'])) {
    header("Location: ../controllers/login.php");
    exit();
}


// Obtener pacientes
$sql = "SELECT * FROM pacientes"; // Asegúrate de que el nombre de la tabla sea correcto
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Pacientes</title>
    <link rel="stylesheet" href="../assets/css/stylerc.css">
</head>
<body>
    <div class="report-container">
        <h2>Informe de Pacientes</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre del Paciente</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['apellido']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td><?php echo $row['numero_identificacion']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
