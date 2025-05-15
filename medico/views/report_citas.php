<?php
session_start();
require_once "../models/database.php";

if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], ['doctor', 'admin'])) {
    header("Location: ../controllers/login.php");
    exit();
}


// Obtener citas
$sql = "SELECT * FROM citas_medicas";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Citas</title>
    <link rel="stylesheet" href="../assets/css/stylerc.css">
</head>
<body>
    <div class="report-container">
        <h2>Informe de Citas Médicas</h2>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Identificación</th>
                    <th>Número de Identificación</th>
                    <th>Nombre del Paciente</th>
                    <th>Apellido del Paciente</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Fecha de Cita</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['tipo_identificacion']; ?></td>
                    <td><?php echo $row['numero_identificacion']; ?></td>
                    <td><?php echo $row['nombre_paciente']; ?></td>
                    <td><?php echo $row['apellido_paciente']; ?></td>
                    <td><?php echo $row['telefono_paciente']; ?></td>
                    <td><?php echo $row['correo_paciente']; ?></td>
                    <td><?php echo $row['fecha_cita']; ?></td>
                    <td><?php echo $row['motivo']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
