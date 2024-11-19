<?php
require_once "programa/crud.php";
require_once "programa/config.php";
require_once "programa/conectar.php";

$conexion = conectar($nombre_host, $nombre_usuario, $password_db, $nombre_db);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
    nav();
    ?>
    <div class="container my-5">
        <h2 class="text-center mb-4">Gestión de Testimonios</h2>
        <?php

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            listarTestimonios($conexion);
        }
        

        if (isset($_POST["insertar"])) {
            $autor = $_POST["autor"];
            $contenido = $_POST["contenido"];
            $fecha = $_POST["fecha"];
            insertarNuevoTestimonio($conexion, $autor, $contenido, $fecha);
        }

        if (isset($_POST["mostrar_todos"])) {
            listarTestimonios($conexion);
        }
        ?>

        <section class="mb-5">
            <h4>Insertar Nuevo Testimonio</h4>
            <form method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="autor" class="form-label">Autor</label>
                    <input type="text" class="form-control" id="autor" name="autor" required>
                </div>
                <div class="col-md-6">
                    <label for="contenido" class="form-label">Contenido</label>
                    <input type="text" class="form-control" id="contenido" name="contenido" required>
                </div>
                <div class="col-md-6">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="col-12">
                    <button type="submit" name="insertar" class="btn btn-success">Insertar</button>
                </div>
            </form>
        </section>
    </div>
    
    <?php
    footer();
    ?>
</body>

</html>