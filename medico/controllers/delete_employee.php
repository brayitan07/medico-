<?php
session_start();
require_once "../models/database.php";

// Verificar que el usuario sea un administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Obtener el ID del empleado a eliminar
$id = $_GET['id'];

// Eliminar empleado de la base de datos
$sql = "DELETE FROM usuarios WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
    header("Location: ../views/admin_dashboard.php"); // Redirigir al dashboard del administrador
} else {
    echo "Error al eliminar el empleado: " . mysqli_error($conn);
}
?>
