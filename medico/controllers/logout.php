<?php
session_start();
session_unset(); // Destruye todas las variables de sesión
session_destroy(); // Destruye la sesión
header("Location: ../views/pagina.php"); // Redirige a la página principal
exit();
?>
