<?php
require_once "programa/crud.php";
require_once "programa/config.php";
require_once "programa/conectar.php";

$conexion = conectar($nombre_host, $nombre_usuario, $password_db, $nombre_db);

// Obtener el ID del socio a modificar
$idSocio = $_GET['id'];


// Lógica de actualización del socio
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $telefono = $_POST['telefono'];
    $foto = $_POST['foto'];

    modificarSocio($conexion, $idSocio, $nombre, $edad, $usuario, $contraseña, $telefono, $foto);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Socio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
    nav();
    ?>

    <?php
    listarSocioPorId($conexion,$idSocio);
    ?>

    <?php
    footer();
    ?>
</body>

</html>