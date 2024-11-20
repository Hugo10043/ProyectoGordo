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
    <title>Noticias</title>
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
        <h2 class="text-center mb-4">Gestión de Noticias</h2>

        <?php

        // $veces = numeroNoticias($conexion) / 4;

        // $numero = 0;
        // for ($i = 0; $i < $veces; $i++) {
        //     listarNoticias($conexion, $numero);
        //     $numero += 4;
        // }
        // echo $numero;
        

        $pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
        $offset = ($pagina - 1) * 4;

        // Mostrar las noticias en el carrusel
        listarNoticias($conexion, $offset);

        // Mostrar los botones de paginación
        $totalNoticias = numeroNoticias($conexion);
        $totalPaginas = ceil($totalNoticias / 4);

        echo '<nav class="mt-4">';
        echo '<ul class="pagination justify-content-center">';
        for ($i = 1; $i <= $totalPaginas; $i++) {
            echo '<li class="page-item ' . ($i === $pagina ? 'active' : '') . '">
            <a class="page-link" href="?pagina=' . $i . '">' . $i . '</a>
          </li>';
        }
        echo '</ul>';
        echo '</nav>';
        ?>

        <section class="mb-5">
            <h4>Insertar Nueva Noticia</h4>
            <form method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div class="col-md-6">
                    <label for="contenido" class="form-label">Contenido</label>
                    <input type="text" class="form-control" id="contenido" name="contenido" required>
                </div>
                <div class="col-md-6">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" required>
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