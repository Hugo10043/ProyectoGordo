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
    <title>Noticias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script defer src="../javaScript/validacionNoticias.js"></script>
</head>

<body>
    <?php
    nav();
    ?>

    <div class="container my-5">
        <h2 class="text-center mb-4">Gestion de Noticias</h2>

        <?php
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            
            carrusel($conexion);
        }

        if (isset($_POST['mostrar_todos'])) {
            carrusel($conexion);
        }

        if (isset($_POST['insertar'])) {
            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];
            $fecha = $_POST['fecha'];
            $rutaImagen = guardarImagenesNoticias('imagen');

            insertarNuevaNoticia($conexion, $titulo, $contenido, $rutaImagen, $fecha);

            echo'<section class="mb-5">
            <section class="mb-5">
            <form method="POST">
                <button type="submit" name="mostrar_todos" class="btn btn-secondary">Mostrar Todos los Servicios</button>
            </form>
        </section>';

        }
        ?>

            <h4>Insertar Nueva Noticia</h4>
            <form method="POST" class="row g-3" enctype="multipart/form-data" id="form">
                <div class="col-md-6">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                    <span class="error"></span>
                </div>
                <div class="col-md-6">
                    <label for="contenido" class="form-label">Contenido</label>
                    <textarea class="form-control" name="contenido" id="contenido"></textarea>
                    <span class="error"></span>
                </div>
                <div class="col-md-6">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                    <span class="error"></span>
                </div>
                <div class="col-md-6">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha">
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