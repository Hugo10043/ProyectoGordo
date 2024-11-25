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
    <title>Citas</title>
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
        <h2 class="text-center mb-4">Gestión de Socios</h2>

        <!-- Formulario de busqueda -->
        <section class="mb-5">
            <h4>Buscar Socios</h4>
            <form method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="socio" class="form-label">Socio</label>
                    <input type="text" class="form-control" id="socio" name="socio" placeholder="Nombre del socio">
                </div>
                <div class="col-md-6">
                    <label for="servicio" class="form-label">Servicio</label>
                    <input type="text" class="form-control" id="servicio" name="servicio"
                        placeholder="Nombre del servicio">
                </div>
                <div class="col-md-6">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
                </div>
                <div class="col-12">
                    <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </section>


        <!-- Listado -->
        <section>
            <?php

            //Si no se manda nada por formulario sale el calendario.
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                calendario($conexion);
            }

            if (isset($_POST['buscar'])) {

                $nombreSocio = $_POST['socio'];
                $nombreServicio = $_POST['servicio'];
                $fecha = $_POST['fecha'];

                

                if (!empty($nombreSocio)) {

                    listarCitasPorNombreSocio($conexion, $nombreSocio);

                }

                if (!empty($nombreServicio)) {

                    listarCitasPorNombreServicio($conexion, $nombreServicio);
                }

                if (!empty($fecha)) {

                    listarCitasPorFecha($conexion, $fecha);
                }

                if (empty($nombreSocio) && empty($nombreServicio) && empty($fecha)) {
                    echo '<div class="alert alert-warning">Escribe un algun nombre de socio, de servicio o alguna fecha.';
                }

                echo '<section class="mb-5">
            <form method="POST">
                <button type="submit" name="mostrar" class="btn btn-secondary">Mostrar Calendario</button>
            </form>
        </section>';
            }

            if (isset($_POST['mostrar'])) {
                calendario($conexion);
            }

            if (isset($_POST["insertar"])) {
                $socio = $_POST["socio"];
                $servicio = $_POST["servicio"];
                $fecha = $_POST["fecha"];
                $hora = $_POST["hora"];
                insertarNuevaCita($conexion, $socio, $servicio, $fecha, $hora);

                echo '<section class="mb-5">
            <form method="POST">
                <button type="submit" name="mostrar" class="btn btn-secondary">Mostrar Calendario</button>
            </form>
        </section>';
            }

            ?>
        </section>

        <section class="mb-5">
            <h4>Insertar Nueva Cita</h4>
            <form method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="socio" class="form-label">Socio</label>
                    <select class="form-control" id="socio" name="socio" required>
                        <?php
                        listarNombreDeSocios($conexion)
                            ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="servicio" class="form-label">Servicio</label>
                    <select class="form-control" id="servicio" name="servicio" required>
                        <?php
                        listarNombreDeServicios($conexion)
                            ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="col-md-6">
                    <label for="hora" class="form-label">Hora</label>
                    <input type="time" class="form-control" id="hora" name="hora" required>
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