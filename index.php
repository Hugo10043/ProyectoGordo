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
    <title>Club Deportivo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="estilos.css">

</head>

<body>

    <?php
    nav();
    ?>


    <section class="container my-5">
        <div class="row align-items-center">

            <div class="col-md-6 mb-4">
                <img src="imagenes/gimnasio.jpg" alt="Gimnasio Kalimuscle" class="img-fluid rounded shadow">
            </div>

            <div class="col-md-6">
                <h2 class="fw-bold text-primary">Bienvenido a Kalimuscle</h2>
                <p class="fs-5 text-muted">
                    En <strong>Kalimuscle</strong>, te ayudamos a alcanzar tus metas físicas y mejorar tu bienestar
                    con instalaciones de última generación, entrenadores altamente capacitados y un ambiente motivador.
                    Ya sea que estés comenzando tu viaje fitness o que seas un atleta experimentado, tenemos todo lo que
                    necesitas.
                </p>
                <p class="fs-5 text-muted">
                    Únete a nuestra comunidad de deportistas apasionados y descubre por qué <strong>Kalimuscle</strong>
                    es el lugar perfecto para entrenar, crecer y triunfar.
                </p>
                <a href="#" class="btn btn-primary px-4 py-2">Contáctanos</a>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <h2>Últimas Noticias</h2>
        <?php
        listarUltimasNoticias($conexion);
        ?>
    </section>

    <!-- Testimonios -->
    <section class="container my-5">
        <h2>Testimonio aleatorio de nuestros socios</h2>
        <?php
        listarTestimonioAleatorio($conexion);
        ?>
    </section>


    <section class="container my-5">
        <h2>Contacto</h2>

        <div class="card p-4 shadow-lg rounded" style="background-color: #f8f9fa;">
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>


    <?php
    footer();
    ?>

</body>

</html>