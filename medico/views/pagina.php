<?php
session_start();
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nefertiti</title>
  <link rel="stylesheet" href="../assets/css/stylesp.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <img src="../img/nf-removebg-preview.png" width="130" height="65" alt="Logo Centro Médico">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="conocenos.php">Conócenos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactanos.php">Contacto</a>
          </li>
        </ul>
        <form class="d-flex ms-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
        <div class="d-flex ms-3">
          <?php if (isset($_SESSION['u'])): ?>
            <!-- Botón para cerrar sesión si el usuario está logueado -->
            <a class="btn btn-outline-success me-2" href="../controllers/logout.php">Cerrar sesión</a>
            <!-- Botón para ir a la página de guardar cita -->
            <button class="btn btn-outline-primary" type="button" onclick="window.location.href='../controllers/guardar_cita.php'">Guardar Cita</button>
          <?php else: ?>
            <!-- Botón para iniciar sesión si no está logueado -->
            <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href='../controllers/login.php'">Iniciar sesión</button>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <!-- Carousel -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/_2221c8cb-a4ff-4eb4-9ca0-6ef2ea46cdef.jpg" class="d-block w-100" alt="..." height="400">
      </div>
      <div class="carousel-item">
        <img src="../img/_edb8e092-b4cd-42f6-a8a2-398dc3ae7d8b.jpg" class="d-block w-100" alt="..." height="400">
      </div>
      <div class="carousel-item">
        <img src="../img/_f6e7e07c-158a-47b8-8cd0-87c6fed8366f.jpg" class="d-block w-100" alt="..." height="400">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>

  <!-- Servicios -->
  <section id="servicios" class="services-section">
    <h2>Nuestros Servicios</h2>
    <div class="services-container">
      <div class="service-item">
        <h3>Consulta General</h3>
        <p>Atención médica integral con nuestros especialistas.</p>
      </div>
      <div class="service-item">
        <h3>Especialidades</h3>
        <p>Acceso a las mejores especialidades médicas en un solo lugar.</p>
      </div>
      <div class="service-item">
        <h3>Citas Médicas</h3>
        <p>Agenda tus citas médicas en línea fácilmente.</p>
      </div>
    </div>
  </section>

  <!-- Doctores -->
  <section id="doctores" class="doctor-section">
    <h2>Nuestros Doctores</h2>
    <p>Conoce a los especialistas que te atenderán en el centro médico.</p>
    <div class="doctor-grid">
      <div class="doctor-card">
        <img src="../img/doctor2.jpg" alt="Doctor 1">
        <h3>Dr. Juan Pérez</h3>
        <p>Cardiología</p>
      </div>
      <div class="doctor-card">
        <img src="../img/doctora1.jpg" alt="Doctor 2">
        <h3>Dra. María Gómez</h3>
        <p>Pediatría</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2024 Nefertiti. Todos los derechos reservados.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

