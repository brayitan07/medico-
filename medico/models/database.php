<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "centro_medico";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
