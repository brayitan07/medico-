<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conócenos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/stylesc.css"> <!-- Ruta correcta a los estilos -->
</head>
<body>

    <!-- Encabezado -->
    <header class="header">
        <h1>Nefertiti</h1>
        <p>Conoce a Nuestro Equipo Médico de Clase Mundial</p>
    </header>

    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="Pagina.php">Nefertiti</a> <!-- Ruta correcta -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Pagina.php">Inicio</a> <!-- Ruta correcta -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Ver_mas.php">Servicios</a> <!-- Ruta correcta -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Equipo Médico</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contactanos.php">Contacto</a> <!-- Ruta correcta -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección de Equipo Médico -->
    <div class="container mt-5">
        <div class="row">
            <!-- Doctor 1 -->
            <div class="col-md-6">
                <div class="doctor-card">
                    <img src="../img/doctor2.jpg" alt="Foto del Doctor" class="doctor-img"> <!-- Ruta correcta para las imágenes -->
                    <h3>Dr. Juan Pérez</h3>
                    <p><strong>Especialidad:</strong> Cardiología</p>
                    <p><strong>Experiencia:</strong> 15 años en tratamiento de enfermedades cardiovasculares.</p>
                </div>
            </div>

            <!-- Doctor 2 -->
            <div class="col-md-6">
                <div class="doctor-card">
                    <img src="../img/doctora1.jpg" alt="Foto del Doctor" class="doctor-img"> <!-- Ruta correcta para las imágenes -->
                    <h3>Dra. María Gómez</h3>
                    <p><strong>Especialidad:</strong> Pediatría</p>
                    <p><strong>Experiencia:</strong> Más de 10 años atendiendo a pacientes pediátricos.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="footer mt-5">
        <div class="text-center p-3">
            <p>&copy; 2024 Clínica Nefertiti. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
