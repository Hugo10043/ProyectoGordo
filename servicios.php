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
    <title>Servicios</title>
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
        <h2 class="text-center mb-4">Gestión de Servicios</h2>

        <!-- Formulario de busqueda -->
        <section class="mb-5">
            <h4>Buscar Servicios</h4>
            <form method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del servicio">
                </div>
                <div class="col-12">
                    <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </section>


        <!-- Listado de servicios -->
        <section>
            <?php

            if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                listarServicios($conexion);
            }

            if (isset($_POST["buscar"])) {

                $nombreBuscado = $_POST["nombre"];

                echo '<section class="mb-5">
            <form method="POST">
                <button type="submit" name="mostrar_todos" class="btn btn-secondary">Mostrar Todos los Servicios</button>
            </form>
        </section>';

                if (!empty($nombreBuscado)) {

                    listarServiciosPorNombre($conexion, $nombreBuscado);
                } else {

                    echo '<div class="alert alert-warning">Escribe un nombre.</div>';
                }
            }

            if (isset($_POST["mostrar_todos"])) {
                listarServicios($conexion);
            }

            if (isset($_POST["insertar"])) {
                $descripcion = $_POST["descripcion"];
                $duracion = $_POST["duracion"];
                $precio = $_POST["precio"];
                insertarNuevoServicio($conexion, $descripcion, $duracion, $precio);
            }
            ?>
        </section>

        <!-- Formulario para insertar un nuevo servicio -->
        <section class="mb-5">
            <h4>Insertar Nuevo Servicio</h4>
            <form method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>
                <div class="col-md-6">
                    <label for="duracion" class="form-label">Duracion</label>
                    <input type="number" class="form-control" id="duracion" name="duracion" required>
                </div>
                <div class="col-md-6">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" required>
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