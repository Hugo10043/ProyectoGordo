<?php
require_once "../../funciones/crud.php";
require_once "../../funciones/config.php";
require_once "../../funciones/conectar.php";

$conexion = conectar($nombre_host, $nombre_usuario, $password_db, $nombre_db);

// Obtener el ID del socio
$fecha = $_GET["fecha"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="../../estilos/estilos.css">
</head>
<body>
    <?php
    navMod();
    ?>
    
    <?php
    listarCitas($conexion, $fecha);
    ?>
    
    <?php
    footer();
    ?>
</body>
</html>