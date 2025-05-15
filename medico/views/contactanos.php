<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contactanos</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/stylescc.css">
</head>
<body>
    <!-- Encabezado -->
    <header class="header">
        <h1>Nefertiti</h1>
        <p>Atención médica de calidad con un toque de innovación</p>
    </header>

    <!-- Sección de contacto -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h2>Contacto</h2>
                <form>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Tu nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Tu email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="mensaje" rows="3" placeholder="Tu mensaje" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>

            <div class="col-md-4">
                <h2>Cómo llegar</h2>
                <p>Estamos ubicados en la calle principal de la ciudad, cerca del parque central.</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d397093.05740854895!2d-74.1232901!3d4.7065699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9b56ee5e3b03%3A0xc3e5234a8e391767!2sCentro%20M%C3%A9dico%20Colsubsidio%20Tierra%20Grata!5e0!3m2!1ses-419!2sco!4v1695431931622!5m2!1ses-419!2sco" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div class="col-md-4">
                <h2>Horarios de Atención</h2>
                <p>Lunes a Viernes: 8:00 AM - 6:00 PM</p>
                <p>Sábados: 9:00 AM - 2:00 PM</p>
                <p>Domingos y festivos: Cerrado</p>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="footer mt-5">
        <div class="text-center p-3">
            <p>&copy; 2024 Nefertiti. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
