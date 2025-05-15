<?php
session_start();
require_once "../models/database.php";

if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], ['doctor', 'admin'])) {
    header("Location: login.php");
    exit();
}


// Aquí puedes incluir la lógica para generar informes
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Informes</title>
    <link rel="stylesheet" href="../assets/css/stylerp.css">
</head>
<body>
    <div class="report-container">
        <h2>Generar Informes</h2>
        <!-- Aquí puedes agregar opciones para seleccionar el tipo de informe -->
        <center><p>Seleccione el tipo de informe que desea generar:</p>
        <div class="button-container">
            <a href="../views/report_citas.php" class="button">Informe de Citas</a>
            <a href="../views/report_pacientes.php" class="button">Informe de Pacientes</a>
        </div>
    </div>
</body>
</html>
