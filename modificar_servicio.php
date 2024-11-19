<?php
require_once "programa/crud.php";
require_once "programa/config.php";
require_once "programa/conectar.php";

$conexion = conectar($nombre_host, $nombre_usuario, $password_db, $nombre_db);

// Obtener el ID del servicio
$idServicio = $_GET["id"];



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $descripcion = $_POST["descripcion"];
    $duracion = $_POST["duracion"];
    $precio = $_POST["precio"];

    modificarServicio($conexion, $idServicio, $descripcion, $duracion, $precio);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Servicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
    nav();
    ?>

    <?php
    listarServicioPorId($conexion,$idServicio);
    ?>

    <?php
    footer();
    ?>
</body>

</html>