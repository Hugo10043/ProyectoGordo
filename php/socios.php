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
    <title>Socios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script defer src="../javaScript/validacionSocios.js"></script>
</head>

<body>

    <?php
    nav();
    ?>
    <div class="container my-5">
        <h2 class="text-center mb-4">Gestion de Socios</h2>

        <!-- Formulario de busqueda -->
        <section class="mb-5">
            <h4>Buscar Socios</h4>
            <form method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombreSocio" name="nombreSocio" placeholder="Nombre del socio">
                </div>
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="telefonoSocio" name="telefonoSocio"
                        placeholder="Telefono del socio">
                </div>
                <div class="col-12">
                    <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </section>

        <!-- Listado de socios -->
        <section>
            <?php

            //Si no se manda nada por formulario salen todos los socios. Asi al iniciar la pagina salen todos.
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                listarSocios($conexion);
            }

            if (isset($_POST['buscar'])) {

                $nombreBuscado = $_POST['nombreSocio'];
                $telefonoBuscado = $_POST['telefonoSocio'];

                echo '<section class="mb-5">
            <form method="POST">
                <button type="submit" name="mostrar_todos" class="btn btn-secondary">Mostrar Todos los Socios</button>
            </form>
        </section>';

                if (!empty($nombreBuscado)) {

                    listarSociosPorNombre($conexion, $nombreBuscado);

                }

                if (!empty($telefonoBuscado)) {

                    listarSociosPorTelefono($conexion, $telefonoBuscado);
                }

                if(empty($nombreBuscado)&&empty($telefonoBuscado)){
                    echo '<div class="alert alert-warning">Escribe un nombre o telefono.</div>';
                }
            }

            if (isset($_POST['mostrar_todos'])) {
                listarSocios($conexion);
            }

            if (isset($_POST['insertar'])) {
                $nombre = $_POST['nombre'];
                $edad = $_POST['edad'];
                $usuario = $_POST['usuario'];
                $contraseña = $_POST['contraseña'];
                $telefono = $_POST['telefono'];
                $rutaFoto = guardarImagenesSocios('foto');

                insertarNuevoSocio($conexion, $nombre, $edad, $usuario, $contraseña, $telefono, $rutaFoto);

                echo '<section class="mb-5">
            <form method="POST">
                <button type="submit" name="mostrar_todos" class="btn btn-secondary">Mostrar Todos los Socios</button>
            </form>
        </section>';
            }

            ?>
        </section>

        <!-- Formulario para insertar un nuevo socio -->
        <section class="mb-5">
            <h4>Insertar Nuevo Socio</h4>
            <form method="POST" class="row g-3" enctype="multipart/form-data" id="form">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                    <span class="error"></span>
                </div>
                <div class="col-md-6">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="text" class="form-control" id="edad" name="edad">
                    <span class="error"></span>
                </div>
                <div class="col-md-6">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario">
                    <span class="error"></span>
                </div>
                <div class="col-md-6">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" id="contraseña" name="contraseña">
                    <span class="error"></span>
                </div>
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono">
                    <span class="error"></span>
                </div>
                <div class="col-md-6">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
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