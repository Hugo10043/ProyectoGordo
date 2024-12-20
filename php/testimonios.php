<?php
require_once "../funciones/crud.php";
require_once "../funciones/config.php";
require_once "../funciones/conectar.php";

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
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script defer src="../javaScript/validacionTestimonios.js"></script>
</head>

<body>
    <?php
    nav();
    ?>
    <div class="container my-5">
        <h2 class="text-center mb-4">Gestion de Testimonios</h2>
        <?php

        //Si no se manda nada por formulario salen todos los testimonios.
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            listarTestimonios($conexion);
        }


        if (isset($_POST["insertar"])) {
            $autor = $_POST["autor"];
            $contenido = $_POST["contenido"];
            insertarNuevoTestimonio($conexion, $autor, $contenido);

            echo '
            <div class="col-12 text-center mt-4">
                <section class="mb-5">
                    <form method="POST">
                        <button type="submit" name="mostrar_todos" class="btn btn-secondary">Mostrar Todos los Testimonios</button>
                    </form>
                </section>
            </div>';
        }

        if (isset($_POST["mostrar_todos"])) {
            listarTestimonios($conexion);
        }
        ?>

        <section class="mb-5">
            <h4>Insertar Nuevo Testimonio</h4>
            <form method="POST" class="row g-3" id="form">
                <div class="col-md-6">
                    <label for="autor" class="form-label">Autor</label>
                    <select class="form-control" id="autor" name="autor">
                        <?php listarNombreDeSociosTestimonios($conexion); ?>
                    </select>
                    <span class="error"></span>
                </div>
                <div class="col-md-6">
                    <label for="contenido" class="form-label">Contenido</label>
                    <textarea class="form-control" name="contenido" id="contenido"></textarea>
                    <span class="error"></span>
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