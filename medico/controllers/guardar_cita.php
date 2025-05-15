<?php
session_start();
require_once "../models/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tipo_identificacion = $_POST['tipo_identificacion'];
    $numero_identificacion = $_POST['numero_identificacion'];
    $nombre_paciente = $_POST['nombre_paciente'];
    $apellido_paciente = $_POST['apellido_paciente'];
    $telefono_paciente = $_POST['telefono_paciente'];
    $correo_paciente = $_POST['correo_paciente'];
    $fecha_cita = $_POST['fecha_cita'];
    $motivo = $_POST['motivo'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO citas_medicas (tipo_identificacion, numero_identificacion, nombre_paciente, apellido_paciente, telefono_paciente, correo_paciente, fecha_cita, motivo) 
            VALUES ('$tipo_identificacion', '$numero_identificacion', '$nombre_paciente', '$apellido_paciente', '$telefono_paciente', '$correo_paciente', '$fecha_cita', '$motivo')";

    if (mysqli_query($conn, $sql)) {
        echo "Cita médica registrada exitosamente.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cita Médica</title>
    <link rel="stylesheet" href="../assets/css/stylesct.css">
<body>
    <div class="form-container">
        <h2>Registrar Cita Médica</h2>
        <form method="POST" action="">
            <div class="input-box">
                <label for="tipo_identificacion">Tipo de Identificación:</label>
                <select name="tipo_identificacion" id="tipo_identificacion" required>
                    <option value="CC">Cédula de Ciudadanía</option>
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CE">Cédula de Extranjería</option>
                </select>
            </div>

            <div class="input-box">
                <label for="numero_identificacion">Número de Identificación:</label>
                <input type="text" name="numero_identificacion" id="numero_identificacion" required>
            </div>

            <div class="input-box">
                <label for="nombre_paciente">Nombre del Paciente:</label>
                <input type="text" name="nombre_paciente" id="nombre_paciente" required>
            </div>

            <div class="input-box">
                <label for="apellido_paciente">Apellido del Paciente:</label>
                <input type="text" name="apellido_paciente" id="apellido_paciente" required>
            </div>

            <div class="input-box">
                <label for="telefono_paciente">Teléfono del Paciente:</label>
                <input type="text" name="telefono_paciente" id="telefono_paciente" required>
            </div>
        </div>

        <div class="form-container">
            <div class="input-box">
                <label for="correo_paciente">Correo Electrónico:</label>
                <input type="email" name="correo_paciente" id="correo_paciente" required>
            </div>

            <div class="input-box">
                <label for="fecha_cita">Fecha de la Cita:</label>
                <input type="date" name="fecha_cita" id="fecha_cita" required>
            </div>

            <div class="input-box">
                <label for="motivo">Motivo de la Cita:</label>
                <textarea name="motivo" id="motivo" required></textarea>
            </div>

            <div class="input-box">
                <input type="submit" value="Registrar Cita">
            </div>
        </div>
    </form>
</div>
</body>
</html>
