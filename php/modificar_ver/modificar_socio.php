<?php
require_once "../../funciones/crud.php";
require_once "../../funciones/config.php";
require_once "../../funciones/conectar.php";

$conexion = conectar($nombre_host, $nombre_usuario, $password_db, $nombre_db);

// Obtener el ID del socio
$idSocio = $_GET["id"];


//Se ejecuta si recibe un post del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $telefono = $_POST["telefono"];
    $rutaFotoNueva = guardarImagenesModSocios('foto');

    if (!$rutaFotoNueva) {
        // Si no se sube ninguna imagen mantenemos la  actual
        $sentencia = "SELECT foto FROM socio WHERE id = ?";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bind_param("i", $idSocio);
        $consulta->execute();
        $consulta->bind_result($rutaFotoActual);
        $consulta->fetch();
        $consulta->close();
        $rutaFotoNueva = $rutaFotoActual;
    }

    modificarSocio($conexion, $idSocio, $nombre, $edad, $usuario, $contraseña, $telefono, $rutaFotoNueva);
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
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="../../estilos/estilos.css">
</head>

<body>
    <?php
    navMod();
    ?>

    <?php
    listarSocioPorId($conexion,$idSocio);
    ?>

    <?php
    footer();
    ?>
</body>

</html>