<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['rol'])) {
    header("Location: controllers/login.php");
    exit();
}

$rol = $_SESSION['rol'];

// Encabezado HTML
echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Dashboard</title>
    <link rel='stylesheet' href='stylesrh.css'>
</head>
<body>
    <div class='container'>
        <h1>Bienvenido, " . ucfirst($rol) . "</h1>
        <nav>
            <ul>
                <li><a href='controllers/logout.php'>Cerrar sesión</a></li>";

if ($rol == 'admin') {
    // Menú para administradores
    echo "<li><a href='registrar_empleado.php'>Registrar Empleado</a></li>
          <li><a href='gestionar_citas.php'>Gestionar Citas</a></li>
          <li><a href='informes.php'>Generar Informes</a></li>";
} elseif ($rol == 'empleado') {
    // Menú para empleados
    echo "<li><a href='gestionar_citas.php'>Gestionar Citas</a></li>";
} elseif ($rol == 'usuario') {
    // Menú para usuarios
    echo "<li><a href='ver_citas.php'>Ver Citas</a></li>
          <li><a href='registrar_cita.php'>Registrar Cita</a></li>";
}

echo "      </ul>
        </nav>
        <div class='content'>";

// Contenido del dashboard según el rol
if ($rol == 'admin') {
    echo "<h2>Administración</h2>
          <p>Aquí puedes gestionar empleados y generar informes.</p>";
} elseif ($rol == 'empleado') {
    echo "<h2>Gestión de Citas</h2>
          <p>Aquí puedes ver y gestionar las citas programadas.</p>";
} elseif ($rol == 'usuario') {
    echo "<h2>Mis Citas</h2>
          <p>Aquí puedes ver tus citas programadas y registrarte para nuevas.</p>";
}

echo "      </div>
    </div>
</body>
</html>";
?>
