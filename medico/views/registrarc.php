<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cita</title>
    <link rel="stylesheet" href="../assets/css/stylesr.css">
</head>
<body>
    <div class="form-container">
        <div class="form-box register">
            <h2>Registrar Cita Médica</h2>
            <form method="POST" action="guardar_cita.php">
                <div class="input-box">
                    <span>Tipo de Identificación</span>
                    <input type="text" name="tipo_identificacion" required>
                </div>
                <div class="input-box">
                    <span>Número de Identificación</span>
                    <input type="text" name="numero_identificacion" required>
                </div>
                <div class="input-box">
                    <span>Nombre del Paciente</span>
                    <input type="text" name="nombre_paciente" required>
                </div>
                <div class="input-box">
                    <span>Apellido del Paciente</span>
                    <input type="text" name="apellido_paciente" required>
                </div>
                <div class="input-box">
                    <span>Teléfono</span>
                    <input type="text" name="telefono_paciente" required>
                </div>
                <div class="input-box">
                    <span>Correo Electrónico</span>
                    <input type="email" name="correo_paciente" required>
                </div>
                <div class="input-box">
                    <span>Fecha y Hora de Cita</span>
                    <input type="datetime-local" name="fecha_cita" required>
                </div>
                <div class="input-box">
                    <span>Motivo</span>
                    <textarea name="motivo" required></textarea>
                </div>
                <div class="input-box">
                    <input type="submit" value="Registrar Cita">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
