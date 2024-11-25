<?php
function insertarNuevoSocio($conexionBD, $nombre, $edad, $usuario, $contraseña, $telefono, $foto)
{
    $nombreSocio = strtolower($nombre);
    $sentencia = "INSERT INTO socio (nombre, edad, usuario, password, telefono, foto) VALUES (?, ?, ?, ?, ?, ?)";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->bind_param("sissss", $nombreSocio, $edad, $usuario, $contraseña, $telefono, $foto);

    try {
        $consulta->execute();

        if ($consulta->affected_rows > 0) {
            echo '<div class="container my-5">';
            echo '<div class="row gy-4">';
            echo '<h4>Socio Insertado</h4>';
            echo '
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="row g-0">
                         <div class="col-md-3 d-flex align-items-center justify-content-center p-3">
                            <img src="' . $foto . '" class="img-fluid rounded-circle" alt="Foto de ' . $nombre . '">
                        </div>

                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">' . $nombre . ' (' . $edad . ' años)</h5>
                                <p class="card-text">
                                    <strong>Usuario:</strong> ' . $usuario . '<br>
                                    <strong>Teléfono:</strong> ' . $telefono . '<br>
                                    <strong>Contraseña:</strong> ' . $contraseña . '
                                  
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            echo '</div>';
            echo '</div>';
        }
    } catch (mysqli_sql_exception $e) {
        echo '<div class="container my-5"><div class="alert alert-danger">Error: El usuario "' . $usuario . '" ya existe.</div></div>';
    }
}


function listarSocios($conexionBD)
{

    $sentencia = "SELECT * FROM socio";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->execute();

    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        echo '<div class="container my-5">';
        echo '<div class="row gy-4">';

        echo '<h4>Listado Completo de Socios</h4>';

        while ($fila = $resultado->fetch_assoc()) {
            $id = $fila["id"];
            $nombre = $fila["nombre"];
            $edad = $fila["edad"];
            $usuario = $fila["usuario"];
            $contraseña = $fila["password"];
            $telefono = $fila["telefono"];
            $foto = $fila["foto"];

            echo '
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="row g-0">
                         <div class="col-md-3 d-flex align-items-center justify-content-center p-3">
                            <img src="' . $foto . '" class="img-fluid rounded-circle" alt="Foto de ' . $nombre . '">
                        </div>

                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">' . $nombre . ' (' . $edad . ' años)</h5>
                                <p class="card-text">
                                    <strong>Usuario:</strong> ' . $usuario . '<br>
                                    <strong>Teléfono:</strong> ' . $telefono . '<br>
                                    <strong>Contraseña:</strong> ' . $contraseña . '
                                    
                                </p>
                                <p><a href="modificar_socio.php?id=' . $id . '" class="btn btn-warning">Modificar</a></p>
                                <p class="card-text"><small class="text-muted">ID: ' . $id . '</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }

        echo '</div>';
        echo '</div>';
    } else {
        echo '<p class="text-center text-muted">No hay socios registrados.</p>';
    }
}

function listarNombreDeSocios($conexionBD)
{

    $sentencia = "SELECT id, nombre FROM socio";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->execute();

    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        echo '<option value="">Seleccione un socio</option>';

        while ($fila = $resultado->fetch_assoc()) {
            $id = $fila["id"];
            $nombre = $fila["nombre"];

            echo '<option value="' . $id . '">' . $nombre . '</option>';
        }
    }
}

function listarSocioPorId($conexionBD, $id)
{
    $sentencia = "SELECT * FROM socio WHERE id = ?";
    $consulta = $conexionBD->prepare($sentencia);
    $consulta->bind_param("i", $id);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {

        while ($socio = $resultado->fetch_assoc()) {
            $nombre = $socio["nombre"];
            $edad = $socio["edad"];
            $usuario = $socio["usuario"];
            $contraseña = $socio["password"];
            $telefono = $socio["telefono"];
            $foto = $socio["foto"];
        }

        echo '
        <div class="container my-5">
            <h2 class="text-center mb-4">Modificar Socio</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="' . $nombre . '" required>
                </div>
                <div class="mb-3">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad" value="' . $edad . '" required>
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="' . $usuario . '" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" id="contraseña" name="contraseña" value="' . $contraseña . '" required>
                    
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="' . $telefono . '" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto (URL)</label>
                    <input type="text" class="form-control" id="foto" name="foto" value="' . $foto . '">
                </div>
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
            </form>
            <a href="socios.php" class="btn btn-secondary mt-3">Volver</a>
        </div>';
    } else {
        echo '<div class="container my-5"><div class="alert alert-danger">Socio no encontrado.</div></div>';
    }
}



function listarSociosPorNombre($conexionBD, $nombreSocio)
{
    $id = 0;
    $nombre = "";
    $edad = 0;
    $usuario = "";
    $telefono = "";
    $contraseña = "";
    $foto = "";

    $sentencia = "SELECT * FROM socio WHERE nombre LIKE ?";
    $consulta = $conexionBD->prepare($sentencia);
    $cadena = strtolower($nombreSocio);

    $consulta->bind_param("s", $cadena);

    $consulta->bind_result($id, $nombre, $edad, $usuario, $contraseña, $telefono, $foto);
    $consulta->execute();

    $resultado = $consulta->get_result();
    if ($resultado->num_rows > 0) {
        echo '<div class="container my-5">';
        echo '<div class="row gy-4">';

        echo '<h4>Listado por Nombre de Socios</h4>';

        while ($fila = $resultado->fetch_assoc()) {
            $id = $fila["id"];
            $nombre = $fila["nombre"];
            $edad = $fila["edad"];
            $usuario = $fila["usuario"];
            $contraseña = $fila["password"];
            $telefono = $fila["telefono"];
            $foto = $fila["foto"];

            echo '
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-3 d-flex align-items-center justify-content-center p-3">
                            <img src="' . $foto . '" class="img-fluid rounded-circle" alt="Foto de ' . $nombre . '" style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">' . $nombre . ' (' . $edad . ' años)</h5>
                                <p class="card-text">
                                    <strong>Usuario:</strong> ' . $usuario . '<br>
                                    <strong>Teléfono:</strong> ' . $telefono . '<br>
                                    <strong>Contraseña:</strong> ' . $contraseña . '
                                </p>
                                <a href="modificar_socio.php?id=' . $id . '" class="btn btn-warning">Modificar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }

        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="alert alert-warning">No se encontraron socios con ese nombre.</div>';
    }

}

function listarSociosPorTelefono($conexionBD, $telefonoSocio)
{
    $id = 0;
    $nombre = "";
    $edad = 0;
    $usuario = "";
    $telefono = "";
    $contraseña = "";
    $foto = "";

    $sentencia = "SELECT * FROM socio WHERE telefono LIKE ?";
    $consulta = $conexionBD->prepare($sentencia);


    $consulta->bind_param("s", $telefonoSocio);

    $consulta->bind_result($id, $nombre, $edad, $usuario, $contraseña, $telefono, $foto);
    $consulta->execute();

    $resultado = $consulta->get_result();
    if ($resultado->num_rows > 0) {
        echo '<div class="container my-5">';
        echo '<div class="row gy-4">';

        echo '<h4>Listado por Telefono de Socios</h4>';

        while ($fila = $resultado->fetch_assoc()) {
            $id = $fila["id"];
            $nombre = $fila["nombre"];
            $edad = $fila["edad"];
            $usuario = $fila["usuario"];
            $contraseña = $fila["password"];
            $telefono = $fila["telefono"];
            $foto = $fila["foto"];

            echo '
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-3 d-flex align-items-center justify-content-center p-3">
                            <img src="' . $foto . '" class="img-fluid rounded-circle" alt="Foto de ' . $nombre . '" style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">' . $nombre . ' (' . $edad . ' años)</h5>
                                <p class="card-text">
                                    <strong>Usuario:</strong> ' . $usuario . '<br>
                                    <strong>Teléfono:</strong> ' . $telefono . '<br>
                                    <strong>Contraseña:</strong> ' . $contraseña . '
                                </p>
                                <a href="modificar_socio.php?id=' . $id . '" class="btn btn-warning">Modificar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }

        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="alert alert-warning">No se encontraron socios con ese telefono.</div>';
    }

}

function modificarSocio($conexionBD, $idSocio, $nombre, $edad, $usuario, $contraseña, $telefono, $foto)
{

    $nombreSocio = strtolower($nombre);


    $sentencia = "UPDATE socio SET nombre = ?, edad = ?, usuario = ?, password = ?, telefono = ?, foto = ? WHERE id = ?";
    $consulta = $conexionBD->prepare($sentencia);


    $consulta->bind_param("sissssi", $nombreSocio, $edad, $usuario, $contraseña, $telefono, $foto, $idSocio);


    $consulta->execute();

    if ($consulta->affected_rows > 0) {
        echo "Se ha modificado el socio con ID $idSocio. Redirigiendo...";
        header("Refresh:3; url=socios.php");

    } else {
        echo "No se ha modificado el socio. Puede que el ID no exista o los datos sean los mismos.";
    }

}
?>



<?php

function insertarNuevoServicio($conexionBD, $descripcion, $duracion, $precio)
{
    $nombreServicio = strtolower($descripcion);


    $sentencia = "INSERT INTO servicio (descripcion, duracion, precio) VALUES (?, ?, ?)";
    $consulta = $conexionBD->prepare($sentencia);
    $consulta->bind_param("sii", $nombreServicio, $duracion, $precio);

    try {
        $consulta->execute();

        if ($consulta->affected_rows > 0) {


            echo '
            <div class="container my-5">
                <h2 class="text-center mb-4">Servicio Insertado</h2>
                <div class="accordion" id="accordionServicioInsertado">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNuevo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNuevo" aria-expanded="false" aria-controls="collapseNuevo">
                                Servicio #' . $descripcion . '
                            </button>
                        </h2>
                        <div id="collapseNuevo" class="accordion-collapse collapse" aria-labelledby="headingNuevo" data-bs-parent="#accordionServicioInsertado">
                            <div class="accordion-body">
                                <p><strong>Descripción:</strong> ' . $descripcion . '</p>
                                <p><strong>Duración:</strong> ' . $duracion . ' minutos</p>
                                <p><strong>Precio:</strong> $' . $precio . '</p>
                                <div class="text-end">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
    } catch (mysqli_sql_exception $e) {
        echo '<div class="container my-5"><div class="alert alert-danger">Error: El servicio "' . $descripcion . '" ya existe.</div></div>';

    }
}


function modificarServicio($conexionBD, $idServicio, $descripcion, $duracion, $precio)
{

    $nombreServicio = strtolower($descripcion);


    $sentencia = "UPDATE servicio SET descripcion = ?, duracion = ?, precio = ? WHERE id = ?";
    $consulta = $conexionBD->prepare($sentencia);


    $consulta->bind_param("siii", $nombreServicio, $duracion, $precio, $idServicio);


    $consulta->execute();

    if ($consulta->affected_rows > 0) {
        echo "Se ha modificado el servicio con ID $idServicio. Redirigiendo...";
        header("Refresh:3; url=servicios.php");

    } else {
        echo "No se ha modificado el servicio. Puede que el ID no exista o los datos sean los mismos.";
    }

}

function listarServicioPorId($conexionBD, $id)
{
    $sentencia = "SELECT * FROM servicio WHERE id = ?";
    $consulta = $conexionBD->prepare($sentencia);
    $consulta->bind_param("i", $id);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {

        while ($servicio = $resultado->fetch_assoc()) {
            $descripcion = $servicio["descripcion"];
            $duracion = $servicio["duracion"];
            $precio = $servicio["precio"];
        }

        echo '
        <div class="container my-5">
            <h2 class="text-center mb-4">Modificar Servicio</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="' . $descripcion . '" required>
                </div>
                <div class="mb-3">
                    <label for="duracion" class="form-label">Duracion</label>
                    <input type="number" class="form-control" id="duracion" name="duracion" value="' . $duracion . '" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" value="' . $precio . '" required>
                </div>
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
            </form>
            <a href="servicios.php" class="btn btn-secondary mt-3">Volver</a>
        </div>';
    } else {
        echo '<div class="container my-5"><div class="alert alert-danger">Servicio no encontrado.</div></div>';
    }
}

function listarServiciosPorNombre($conexionBD, $nombreServicio)
{
    $id = 0;
    $descripcion = "";
    $duracion = 0;
    $precio = 0;


    $sentencia = "SELECT * FROM servicio WHERE descripcion LIKE ?";
    $consulta = $conexionBD->prepare($sentencia);
    $cadena = strtolower($nombreServicio);

    $consulta->bind_param("s", $cadena);
    $consulta->execute();
    $resultado = $consulta->get_result();


    echo '<div class="container my-5">';
    echo '<div class="accordion" id="accordionServiciosFiltrados">';

    $contador = 1;

    echo '<h4>Listado por Nombre de Servicios</h4>';

    while ($fila = $resultado->fetch_assoc()) {
        $id = $fila["id"];
        $descripcion = $fila["descripcion"];
        $duracion = $fila["duracion"];
        $precio = $fila["precio"];


        echo '
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading' . $contador . '">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $contador . '" aria-expanded="false" aria-controls="collapse' . $contador . '">
                    Servicio #' . $id . ' - ' . $descripcion . '
                </button>
            </h2>
            <div id="collapse' . $contador . '" class="accordion-collapse collapse" aria-labelledby="heading' . $contador . '" data-bs-parent="#accordionServiciosFiltrados">
                <div class="accordion-body">
                    <p><strong>Descripción:</strong> ' . $descripcion . '</p>
                    <p><strong>Duración:</strong> ' . $duracion . 'm minutos</p>
                    <p><strong>Precio:</strong> ' . $precio . '€</p>
                    <div class="text-end">
                        <p><a href="modificar_servicio.php?id=' . $id . '" class="btn btn-warning">Modificar</a></p>
                    </div>
                </div>
            </div>
        </div>';
        $contador++;
    }

    if ($contador === 1) {

        echo '<div class="alert alert-warning">No se encontraron servicios con el nombre especificado.</div>';
    }

    echo '</div>';
    echo '</div>';
}


function listarServicios($conexionBD)
{
    $sentencia = "SELECT * FROM servicio ORDER BY precio";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->execute();

    $resultado = $consulta->get_result();


    echo '<div class="container my-5">';
    echo '<div class="accordion" id="accordionServicios">';
    echo '<h4>Listado Completo de Servicios</h4>';

    $contador = 1;

    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $id = $fila["id"];
        $descripcion = $fila["descripcion"];
        $duracion = $fila["duracion"];
        $precio = $fila["precio"];

        echo '
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading' . $contador . '">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $contador . '" aria-expanded="false" aria-controls="collapse' . $contador . '">
                    Servicio #' . $id . ' - ' . $descripcion . '
                </button>
            </h2>
            <div id="collapse' . $contador . '" class="accordion-collapse collapse" aria-labelledby="heading' . $contador . '" data-bs-parent="#accordionServicios">
                <div class="accordion-body">
                    <p><strong>Descripción:</strong> ' . $descripcion . '</p>
                    <p><strong>Duración:</strong> ' . $duracion . 'm</p>
                    <p><strong>Precio:</strong> ' . $precio . '€</p>
                    <div class="text-end">
                        <a href="modificar_servicio.php?id=' . $id . '" class="btn btn-warning">Modificar</a>
                    </div>
                </div>
            </div>
        </div>';
        $contador++;
    }

    echo '</div>';
    echo '</div>';
}

function listarNombreDeServicios($conexionBD)
{

    $sentencia = "SELECT id, descripcion FROM servicio";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->execute();

    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        echo '<option value="">Seleccione un servicio</option>';

        while ($fila = $resultado->fetch_assoc()) {
            $id = $fila["id"];
            $descripcion = $fila["descripcion"];

            echo '<option value="' . $id . '">' . $descripcion . '</option>';
        }
    }
}

?>



<?php

function insertarNuevoTestimonio($conexionBD, $autor, $contenido, $fecha)
{
    $sentencia = "INSERT INTO testimonio (autor, contenido, fecha) VALUES (?, ?, ?)";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->bind_param("sss", $autor, $contenido, $fecha);

    try {
        $consulta->execute();

        if ($consulta->affected_rows > 0) {
            echo '<div class="container my-5">';
            echo '<div class="row gy-4">';
            echo '<h4 class="col-12 text-center mb-4">Testimonio Insertado</h4>';


            echo '
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="row g-0">

                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">' . $autor . '</h5>
                                <p class="card-text">
                                    <strong>Fecha:</strong> ' . $fecha . '<br>
                                    <strong>Testimonio:</strong> ' . $contenido . '
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';


            echo '
            <div class="col-12 text-center mt-4">
                <section class="mb-5">
                    <form method="POST">
                        <button type="submit" name="mostrar_todos" class="btn btn-secondary">Mostrar Todos los Testimonios</button>
                    </form>
                </section>
            </div>';

            echo '</div>';
            echo '</div>';
        }
    } catch (mysqli_sql_exception $e) {
        echo '<div class="container my-5"><div class="alert alert-danger">No puedes insertar otro testimonio con el mismo texto.</div></div>';
        echo '
            <div class="col-12 text-center mt-4">
                <section class="mb-5">
                    <form method="POST">
                        <button type="submit" name="mostrar_todos" class="btn btn-secondary">Mostrar Todos los Testimonios</button>
                    </form>
                </section>
            </div>';
    }
}



function listarTestimonios($conexionBD)
{
    $sentencia = "SELECT * FROM testimonio ORDER BY fecha";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->execute();

    $resultado = $consulta->get_result();

    // Contenedor del acordeon
    echo '<div class="container my-5">';
    echo '<div class="accordion accordion-flush" id="accordionTestimonios">';
    echo '<h4>Listado de Testimonios</h4>';

    $contador = 1;


    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $id = $fila["id"];
        $autor = $fila["autor"];
        $contenido = $fila["contenido"];
        $fecha = $fila["fecha"];

        echo '
    <div class="accordion-item">
    <h2 class="accordion-header" id="heading' . $contador . '">
        <button class="accordion-button collapsed bg-primary-light fw-bold fs-5 p-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $contador . '" aria-expanded="false" aria-controls="collapse' . $contador . '">
    <i class="bi bi-person-circle"></i>Testimonio de ' . $autor . ' - ' . $fecha . '
</button>
    </h2>

    <div id="collapse' . $contador . '" class="accordion-collapse collapse" aria-labelledby="heading' . $contador . '" data-bs-parent="#accordionTestimonios">
        <div class="accordion-body bg-light">
            <div class="container">
                <p><strong>Testimonio:</strong> ' . $contenido . '</p>
                <p class="card-text"><small class="text-muted">ID: ' . $id . '</small></p>
            </div>
        </div>
    </div>
</div>';

        $contador++;
    }

    echo '</div>';
    echo '</div>';
}


function listarTestimonioAleatorio($conexionBD)
{

    $sentencia = "SELECT * FROM testimonio ORDER BY RAND() LIMIT 1";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->execute();

    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {

        $fila = $resultado->fetch_array(MYSQLI_ASSOC);
        $autor = $fila["autor"];
        $contenido = $fila["contenido"];
        $fecha = $fila["fecha"];


        echo '
        <div class="testimonial-card mb-4 p-4 shadow-lg rounded" style="background-color: #e9ecef; border-left: 6px solid #28a745;">
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-quote-left fa-2x text-success me-3"></i>
                <h5 class="mb-0" style="font-size: 1.3rem; font-weight: bold;">Testimonio</h5>
            </div>
            <blockquote class="blockquote mb-0">
                <p class="mb-3" style="font-style: italic; font-size: 1.1rem;">"' . $contenido . '"</p>
                <footer class="blockquote-footer text-end">
                    <cite title="Source Title">' . $autor . '- <small>' . date('d M Y', strtotime($fecha)) . '</small>
                </footer>
            </blockquote>
        </div>';
    } else {
        echo "No hay testimonios disponibles.";
    }
}
?>



<?php

function insertarNuevaNoticia($conexionBD, $titulo, $contenido, $imagen, $fecha)
{


    $sentencia = "INSERT INTO noticia (titulo, contenido, imagen, fecha) VALUES (?, ?, ?, ?)";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->bind_param("ssss", $titulo, $contenido, $imagen, $fecha);

    try {
        $consulta->execute();

        if ($consulta->affected_rows > 0) {

            $contenidoLimitado = implode(' ', array_slice(explode(' ', $contenido), 0, 3)) . '...';

            echo '<div class="container my-5">';
            echo '<div class="row gy-4">';
            echo '<h4>Socio Insertado</h4>';
            echo '<div class="card mx-auto" style="width: 50%;">
                    <img src="' . $imagen . '" class="card-img-top" alt="Imagen de ' . $titulo . '" style="height: 300px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">' . $titulo . '</h5>
                        <p class="card-text">' . $contenidoLimitado . '</p>
                        <p class="text-muted"><small>Fecha de publicación: ' . $fecha . '</small></p>
                    </div>';
            echo '</div>';
            echo '</div><br>';
        }
    } catch (mysqli_sql_exception $e) {
        echo '<div class="container my-5"><div class="alert alert-danger">Error: El noticia con titulo "' . $titulo . '" ya existe.</div></div>';
    }
}

function numeroNoticias($conexionBD)
{


    $sentencia = "SELECT COUNT(id) as Total FROM noticia";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->execute();

    $resultado = $consulta->get_result();

    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $total = (int) $fila["Total"];
        return $total;
    }
}

function listarNoticias($conexionBD, $numero)
{
    $consulta = "SELECT * FROM noticia LIMIT 4 OFFSET ?";
    $resultado = $conexionBD->prepare($consulta);
    $resultado->bind_param("i", $numero);
    $resultado->execute();
    $resultado = $resultado->get_result();

    if ($resultado->num_rows > 0) {
        echo '<div id="carouselNoticias" class="carousel slide" data-bs-ride="carousel">';
        echo '<div class="carousel-inner">';

        $activa = true; // La primera es la activa
        while ($fila = $resultado->fetch_assoc()) {
            $id = $fila['id'];
            $titulo = $fila['titulo'];
            $contenido = $fila['contenido'];
            $imagen = $fila['imagen'];
            $fecha = $fila['fecha'];


            $contenidoLimitado = implode(' ', array_slice(explode(' ', $contenido), 0, 3)) . '...';

            echo '
            <div class="carousel-item ' . ($activa ? 'active' : '') . '">
                <div class="card mx-auto" style="width: 80%;">
                    <img src="' . $imagen . '" class="card-img-top" alt="Imagen de ' . $titulo . '" style="height: 300px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">' . $titulo . '</h5>
                        <p class="card-text">' . $contenidoLimitado . '</p>
                        <p><a href="ver_noticia.php?id=' . $id . '" class="btn btn-warning">Ver completa</a></p>
                        <p class="text-muted"><small>Fecha de publicación: ' . $fecha . '</small></p>
                    </div>
                </div>
            </div>';
            $activa = false; // Despues las demas no son activas
        }

        echo '</div>';

        // Controles del carrusel
        echo '
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselNoticias" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselNoticias" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>';

        echo '</div>'; // Cierra el carrusel
    } else {
        echo '<p class="text-center text-muted">No hay noticias disponibles.</p>';
    }
}


function listarUltimasNoticias($conexionBD)
{

    $sentencia = "SELECT * FROM noticia ORDER BY fecha DESC LIMIT 3";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->execute();

    $resultado = $consulta->get_result();


    $contador = 0;


    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $id = $fila["id"];
        $titulo = $fila["titulo"];
        $contenido = $fila["contenido"];
        $imagen = $fila["imagen"];
        $fecha = $fila["fecha"];

        // Extraer las primeras tres palabras del contenido
        $contenido_array = explode(' ', $contenido);

        // Divide el contenido en palabras y coge las 3 primeras
        $contenido_resumido = implode(' ', array_slice($contenido_array, 0, 3));

        // Alternancia entre la izquierda y la derecha
        if ($contador % 2 == 0) {
            $alineacion = 'col-md-6 mb-4'; // Izquierda
        } else {
            $alineacion = 'col-md-6 mb-4 ms-auto'; // Derecha
        }


        echo '<div class="row">';


        echo '
        <div class="' . $alineacion . '">
            <div class="card">
                <img src="' . $imagen . '" class="card-img-top" alt="' . $titulo . '" style="width: 100%; height: auto; max-height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">' . $titulo . '</h5>
                    <p class="card-text">' . $contenido_resumido . '...</p> <!-- Muestra las primeras 3 palabras del contenido -->
                    <a href="ver_noticia.php?id=' . $id . '" class="btn btn-primary">Leer más</a> <!-- Botón para leer la noticia completa -->
                </div>
                <div class="card-footer text-muted">
                    <small>Publicado el ' . date('d M Y', strtotime($fecha)) . '</small>
                </div>
            </div>
        </div>';


        echo '</div>';


        $contador++;
    }
}



function verNoticiaIndividual($conexionBD, $id)
{
    $titulo = "";
    $contenido = "";
    $imagen = "";
    $fecha = "";

    $consulta = "SELECT * FROM noticia WHERE id=?";
    $resultado = $conexionBD->prepare($consulta);
    $resultado->bind_param("i", $id);
    $resultado->bind_result($id, $titulo, $contenido, $imagen, $fecha);
    $resultado->execute();


    while ($resultado->fetch()) {
        echo '
        <div class="container my-5">
        <div>
                <a href="noticias.php" class="btn btn-secondary mt-3">Volver</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h1 class="card-title">' . $titulo . '</h1>
                            
                            <img src="' . $imagen . '" class="img-fluid rounded float-start me-3" alt="Imagen de ' . $titulo . '" style="max-width: 250px; height: auto; object-fit: cover;">
                            
                            <p class="card-text">
                                ' . $contenido . '
                            </p>
                            
                            <p class="text-muted"><small>Publicado el: ' . $fecha . '</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
}

?>



<?php

function insertarNuevaCita($conexionBD, $id_socio, $id_servicio, $fecha, $hora)
{
    $sentencia = "INSERT INTO citas (id_socio, id_servicio, fecha, hora) VALUES (?, ?, ?, ?)";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->bind_param("iiss", $id_socio, $id_servicio, $fecha, $hora);

    $consulta->execute();

    try {
        if ($consulta->affected_rows > 0) {
            echo '
        <div class="col mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Cita para el Socio: ' . $id_socio . '</h5>
                    <p class="card-text">
                        <strong>Servicio:</strong> ' . $id_servicio . '<br>
                        <strong>Fecha:</strong> ' . $fecha . '<br>
                        <strong>Hora:</strong> ' . $hora . '<br>
                    </p>
                </div>
            </div>
        </div>';
        } else {
            echo "No se pudo insertar la cita.";
        }

    } catch (mysqli_sql_exception $e) {
        echo 'No se pudo insertar la cita. Posiblemente ya exista una igual';
    }
}


function gestionCita($conexionBD, $id_socio, $id_servicio,$condicion)
{
        if ($condicion === "b") {
            // Si la cita no está cancelada, podemos cancelarla
            $sentencia1 = "SELECT DAY(fecha) AS Dia FROM citas WHERE id_socio=? AND id_servicio=?";
            $consulta1 = $conexionBD->prepare($sentencia1);
            $consulta1->bind_param("ii", $id_socio, $id_servicio);
            $consulta1->execute();
            $resultado1 = $consulta1->get_result();

            if ($fila1 = $resultado1->fetch_assoc()) {
                $fecha = (int) $fila1['Dia'];  // Obtenemos el día de la cita
            } else {
                echo "No se encontró la cita.";
                return;
            }

            $diaHoy = (int) date("j");

            if ($diaHoy === $fecha) {
                echo "No puedes anular la cita. Deberías haberlo hecho con un día de antelación.";
            } else if ($diaHoy > $fecha) {
                echo "No puedes anular una cita ya pasada.";
            } else {
                // Cancelar la cita
                $sentencia2 = "UPDATE citas SET cancelada = 1 WHERE id_socio=? AND id_servicio=?";
                $consulta2 = $conexionBD->prepare($sentencia2);
                $consulta2->bind_param("ii", $id_socio, $id_servicio);
                $consulta2->execute();

                if ($consulta2->affected_rows > 0) {
                    echo "Se ha cancelado la cita. Redirigiendo...";
                header("Refresh:3; url=citas.php");
                } else {
                    echo "No se ha cancelado la cita.";
                }
            }

        } else if ($condicion === "a") {
            // Si ya está cancelada, se procede a borrar la cita
            $sentencia = "DELETE FROM citas WHERE id_socio=? AND id_servicio=? AND cancelada=1";
            $consulta = $conexionBD->prepare($sentencia);
            $consulta->bind_param("ii", $id_socio, $id_servicio);
            $consulta->execute();

            if ($consulta->affected_rows > 0) {
                echo "Se ha borrado la cita. Redirigiendo...";
            header("Refresh:3; url=citas.php");
            } else {
                echo "No se ha borrado la cita. Posiblemente no exista o no esté cancelada.";
            }
        }
}




function numeroCitas($conexionBD, $fecha)
{


    $consulta = "SELECT COUNT(id_socio) as Total FROM citas  WHERE fecha=?";
    $resultado = $conexionBD->prepare($consulta);

    $resultado->bind_param("s", $fecha);

    $resultado->execute();

    $resultado = $resultado->get_result();

    if ($fila = $resultado->fetch_assoc()) {
        $total = (int) $fila["Total"];
        return $total;
    }
}

function listarCitas($conexionBD, $fecha)
{

    $id_socio = 0;
    $id_servicio = 0;
    $nombre = "";
    $descripcion = "";
    $telefono = "";
    $fechaResultado = "";
    $hora = "";
    $cancelada = 0;



    $sentencia = "SELECT id_socio, id_servicio, nombre, descripcion, telefono, fecha, hora, cancelada FROM citas,socio,servicio WHERE id_socio=socio.id AND id_servicio=servicio.id AND fecha=?";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->bind_param("s", $fecha);

    $consulta->bind_result($id_socio, $id_servicio, $nombre, $descripcion, $telefono, $fechaResultado, $hora, $cancelada);

    $consulta->execute();

    echo '<div class="container my-5">';
    echo '<h2 class="text-center mb-4">Citas del día ' . $fecha . '</h2>';
    echo '<div class="row row-cols-1 row-cols-md-2 g-4">';

    $hayCitas = false;

    while ($consulta->fetch()) {
        $estado = $cancelada ? '<span class="badge bg-danger">Cancelada</span>' : '<span class="badge bg-success">Activa</span>';
        $hayCitas = true;
        $boton = $cancelada
            ? '<a href="gestion_cita.php?id_socio=' . $id_socio . '&id_servicio=' . $id_servicio . '&condicion=a" class="btn btn-danger btn-sm mt-2">Borrar Cita</a>'
            : '<a href="gestion_cita.php?id_socio=' . $id_socio . '&id_servicio=' . $id_servicio . '&condicion=b" class="btn btn-warning btn-sm mt-2">Cancelar Cita</a>';

        echo '
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Socio: ' . $nombre . '</h5>
                <p class="card-text">
                    <strong>Servicio:</strong> ' . $descripcion . '<br>
                    <strong>Teléfono:</strong> ' . $telefono . '<br>
                    <strong>Hora:</strong> ' . $hora . '<br>
                    ' . $estado . '
                </p>
                <p class="text-muted"><small>Fecha: ' . $fechaResultado . '</small></p>
                ' . $boton . '
            </div>
        </div>
    </div>';
    }

    echo '</div>';

    if (!$hayCitas) {
        echo '<div class="alert alert-info text-center">No hay citas para la fecha seleccionada.</div>';
    }

    echo '</div>';
}

function listarCitasPorNombreSocio($conexionBD, $nombreSocio)
{
    $id_socio = 0;
    $id_servicio = 0;
    $nombre = "";
    $descripcion = "";
    $telefono = "";
    $fecha = "";
    $hora = "";
    $cancelada = 0;


    $sentencia = "SELECT id_socio, id_servicio, nombre, descripcion, telefono, fecha, hora, cancelada FROM citas,socio,servicio WHERE id_socio=socio.id AND id_servicio=servicio.id AND socio.id=(SELECT id FROM socio WHERE nombre=?)";
    $consulta = $conexionBD->prepare($sentencia);
    $cadena = strtolower($nombreSocio);

    $consulta->bind_param("s", $cadena);

    $consulta->bind_result($id_socio, $id_servicio, $nombre, $descripcion, $telefono, $fecha, $hora, $cancelada);
    $consulta->execute();


    echo '<div class="container my-5">';
    echo '<h2 class="text-center mb-4">Busqueda de citas por servicios </h2>';
    echo '<div class="row row-cols-1 row-cols-md-2 g-4">';

    $hayCitas = false;

    while ($consulta->fetch()) {
        $estado = $cancelada ? '<span class="badge bg-danger">Cancelada</span>' : '<span class="badge bg-success">Activa</span>';
        $hayCitas = true;
        $boton = $cancelada
            ? '<a href="gestion_cita.php?id_socio=' . $id_socio . '&id_servicio=' . $id_servicio .'&condicion=a" class="btn btn-danger btn-sm mt-2">Borrar Cita</a>'
            : '<a href="gestion_cita.php?id_socio=' . $id_socio . '&id_servicio=' . $id_servicio .'&condicion=b" class="btn btn-warning btn-sm mt-2">Cancelar Cita</a>';

        echo '
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Socio: ' . $nombre . '</h5>
                <p class="card-text">
                    <strong>Servicio:</strong> ' . $descripcion . '<br>
                    <strong>Teléfono:</strong> ' . $telefono . '<br>
                    <strong>Hora:</strong> ' . $hora . '<br>
                    ' . $estado . '
                </p>
                <p class="text-muted"><small>Fecha: ' . $fecha . '</small></p>
                ' . $boton . '
            </div>
        </div>
    </div>';
    }

    echo '</div>';

    if (!$hayCitas) {
        echo '<div class="alert alert-info text-center">No hay citas con ese socio asociado.</div>';
    }

    echo '</div>';

}

function listarCitasPorNombreServicio($conexionBD, $nombreServicio)
{
    $id_socio = 0;
    $id_servicio = 0;
    $nombre = "";
    $descripcion = "";
    $telefono = "";
    $fecha = "";
    $hora = "";
    $cancelada = 0;


    $sentencia = "SELECT id_socio, id_servicio, nombre, descripcion, telefono, fecha, hora, cancelada FROM citas,socio,servicio WHERE id_socio=socio.id AND id_servicio=servicio.id AND servicio.id=(SELECT id FROM servicio WHERE descripcion=?)";

    $consulta = $conexionBD->prepare($sentencia);
    $cadena = strtolower($nombreServicio);

    $consulta->bind_param("s", $cadena);

    $consulta->bind_result($id_socio, $id_servicio, $nombre, $descripcion, $telefono, $fecha, $hora, $cancelada);
    $consulta->execute();


    echo '<div class="container my-5">';
    echo '<h2 class="text-center mb-4">Busqueda de citas por socios </h2>';
    echo '<div class="row row-cols-1 row-cols-md-2 g-4">';

    $hayCitas = false;

    while ($consulta->fetch()) {
        $estado = $cancelada ? '<span class="badge bg-danger">Cancelada</span>' : '<span class="badge bg-success">Activa</span>';
        $hayCitas = true;
        $boton = $cancelada
            ? '<a href="gestion_cita.php?id_socio=' . $id_socio . '&id_servicio=' . $id_servicio . '&condicion=a" class="btn btn-danger btn-sm mt-2">Borrar Cita</a>'
            : '<a href="gestion_cita.php?id_socio=' . $id_socio . '&id_servicio=' . $id_servicio . '&condicion=b" class="btn btn-warning btn-sm mt-2">Cancelar Cita</a>';

        echo '
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Socio: ' . $nombre . '</h5>
                <p class="card-text">
                    <strong>Servicio:</strong> ' . $descripcion . '<br>
                    <strong>Teléfono:</strong> ' . $telefono . '<br>
                    <strong>Hora:</strong> ' . $hora . '<br>
                    ' . $estado . '
                </p>
                <p class="text-muted"><small>Fecha: ' . $fecha . '</small></p>
                ' . $boton . '
            </div>
        </div>
    </div>';
    }

    echo '</div>';

    if (!$hayCitas) {
        echo '<div class="alert alert-info text-center">No hay citas con ese servicio asociado.</div>';
    }

    echo '</div>';

}

function listarCitasPorFecha($conexionBD, $fecha)
{

    $id_socio = 0;
    $id_servicio = 0;
    $nombre = "";
    $descripcion = "";
    $telefono = "";
    $fechaResultado = "";
    $hora = "";
    $cancelada = 0;


    $sentencia = "SELECT id_socio, id_servicio, nombre, descripcion, telefono, fecha, hora, cancelada FROM citas,socio,servicio WHERE id_socio=socio.id AND id_servicio=servicio.id AND fecha=?";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->bind_param("s", $fecha);

    $consulta->bind_result($id_socio, $id_servicio, $nombre, $descripcion, $telefono, $fechaResultado, $hora, $cancelada);

    $consulta->execute();

    echo '<div class="container my-5">';
    echo '<h2 class="text-center mb-4">Busqueda de citas por fecha </h2>';
    echo '<div class="row row-cols-1 row-cols-md-2 g-4">';

    $hayCitas = false;

    while ($consulta->fetch()) {
        $estado = $cancelada ? '<span class="badge bg-danger">Cancelada</span>' : '<span class="badge bg-success">Activa</span>';
        $hayCitas = true;
        $boton = $cancelada
            ? '<a href="gestion_cita.php?id_socio=' . $id_socio . '&id_servicio=' . $id_servicio . '&condicion=a" class="btn btn-danger btn-sm mt-2">Borrar Cita</a>'
            : '<a href="gestion_cita.php?id_socio=' . $id_socio . '&id_servicio=' . $id_servicio . '&condicion=b" class="btn btn-warning btn-sm mt-2">Cancelar Cita</a>';

        echo '
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Socio: ' . $nombre . '</h5>
                <p class="card-text">
                    <strong>Servicio:</strong> ' . $descripcion . '<br>
                    <strong>Teléfono:</strong> ' . $telefono . '<br>
                    <strong>Hora:</strong> ' . $hora . '<br>
                    ' . $estado . '
                </p>
                <p class="text-muted"><small>Fecha: ' . $fechaResultado . '</small></p>
                ' . $boton . '
            </div>
        </div>
    </div>';
    }

    echo '</div>';

    if (!$hayCitas) {
        echo '<div class="alert alert-info text-center">No hay citas en esta fecha.</div>';
    }

    echo '</div>';

}

function listarCitasPorId($conexionBD, $socio, $servicio, $condicion)
{

    $nombre = "";
    $descripcion = "";
    $telefono = "";
    $fecha = "";
    $hora = "";
    $cancelada = 0;


    $sentencia = "SELECT nombre, descripcion, telefono, fecha, hora,cancelada FROM citas,socio,servicio WHERE id_socio=socio.id AND id_servicio=servicio.id AND socio.id=(SELECT id FROM socio WHERE id=?) AND servicio.id=(SELECT id FROM servicio WHERE id=?)";

    $consulta = $conexionBD->prepare($sentencia);


    $consulta->bind_param("ii", $socio, $servicio);

    $consulta->bind_result($nombre, $descripcion, $telefono, $fecha, $hora, $cancelada);
    $consulta->execute();


    echo '<div class="container my-5">';
    echo '<h2 class="text-center mb-4">Cita Cancelada</h2>';
    echo '<div class="row row-cols-1 row-cols-md-2 g-4">';

    $hayCitas = false;

    
    while ($consulta->fetch()) {
        $hayCitas = true;
        echo '
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Socio: ' . $nombre . '</h5>
                <p class="card-text">
                    <strong>Servicio:</strong> ' . $descripcion . '<br>
                    <strong>Teléfono:</strong> ' . $telefono . '<br>
                    <strong>Hora:</strong> ' . $hora . '<br>
                </p>
                <p class="text-muted"><small>Fecha: ' . $fecha . '</small></p>
            </div>  
        </div>
    </div>';
    }

    echo '</div>';

    if (!$hayCitas) {
        echo '<div class="alert alert-info text-center">No existe esta cita.</div>';
    }

    echo '</div>';

    gestionCita($conexionBD, $socio, $servicio, $condicion);

    

}
?>


<?php
function guardarImagenes($foto)
{

    $directorioDestino = 'imagenes/';
    $nombreArchivo = $_FILES[$foto]['name'];
    $rutaCompleta = $directorioDestino . $nombreArchivo;


    // Mover el archivo a la carpeta de destino
    if (move_uploaded_file($_FILES[$foto]['tmp_name'], $rutaCompleta)) {
        return $rutaCompleta;
    }
}


function carrusel($conexion)
{

    $pagina = $_GET['pagina'] ?? 1;
    $division = ($pagina - 1) * 4;

    listarNoticias($conexion, $division);

    // Paginas
    $totalNoticias = numeroNoticias($conexion);
    $totalPaginas = ceil($totalNoticias / 4);

    echo '<nav class="mt-4"><ul class="pagination justify-content-center">';

    for ($i = 1; $i <= $totalPaginas; $i++) {
        $activa = ($i == $pagina) ? 'active text-white bg-primary' : '';
        echo '<li class="page-item ' . $activa . '">
                <a class="page-link ' . $activa . '" href="?pagina=' . $i . '">' . $i . '</a>
              </li>';
    }
    echo '</ul></nav>';
}


function calendario($conexion)
{
    // Obtener el mes y año actual por la URL y si no se le pasa nada coge el actual
    $mes = isset($_GET['mes']) ? (int) $_GET['mes'] : date("n");
    $año = isset($_GET['anio']) ? (int) $_GET['anio'] : date("Y");

    // Calcular mes anterior y siguiente
    $mesAnterior = $mes - 1;
    $añoAnterior = $año;
    if ($mesAnterior < 1) {
        $mesAnterior = 12;
        $añoAnterior--;
    }

    $mesSiguiente = $mes + 1;
    $añoSiguiente = $año;
    if ($mesSiguiente > 12) {
        $mesSiguiente = 1;
        $añoSiguiente++;
    }

    // Dias del mes
    $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $año);

    // Primer dia del mes
    $primerDia = date("N", strtotime("$año-$mes-01"));


    $nombresDias = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];

    $nombresMeses = [
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre"
    ];

    //Fecha actual
    $diaActual = date("j");
    $mesActual = date("n");
    $añoActual = date("Y");


    // Generar calendario
    echo '<div class="container my-5">';

    // Navegacion
    echo '<div class="d-flex justify-content-between align-items-center mb-4">';
    echo '<a href="?mes=' . $mesAnterior . '&anio=' . $añoAnterior . '" class="btn btn-primary">&laquo; Mes Anterior</a>';
    echo '<h2 class="text-center">' . $nombresMeses[$mes] . ' ' . $año . '</h2>';
    echo '<a href="?mes=' . $mesSiguiente . '&anio=' . $añoSiguiente . '" class="btn btn-primary">Mes Siguiente &raquo;</a>';
    echo '</div>';

    echo '<table class="table table-bordered text-center">';


    echo '<thead><tr>';
    foreach ($nombresDias as $dia) {
        echo '<th>' . $dia . '</th>';
    }
    echo '</tr></thead>';
    echo '<tbody><tr>';

    // Espacios vacíos antes
    for ($i = 1; $i < $primerDia; $i++) {
        echo '<td></td>';
    }

    // Generar los dias
    for ($dia = 1; $dia <= $dias; $dia++) {

        //Le paso un formato y los valores a sprintf para que me devuelva la fecha asi "2024-05-02" por ejemplo
        $fechaCompleta = sprintf("%04d-%02d-%02d", $año, $mes, $dia);

        $citas = numeroCitas($conexion, $fechaCompleta);

        if (($primerDia + $dia - 2) % 7 === 0) {
            echo '</tr><tr>';
        }

        // Resaltar dia actual
        if ($dia == $diaActual && $mes == $mesActual && $año == $añoActual) {

            // Dia actual
            // Mostrar icono si hay citas
            if ($citas > 0) {
                echo '<td class="position-relative bg-primary text-white fw-bold">
                <a href="ver_cita.php?fecha=' . $fechaCompleta . '" class="stretched-link text-white text-decoration-none d-block h-100">
                    ' . $dia . '
                    <div class="position-absolute top-0 end-0 m-1 d-flex align-items-center">
                        <span class="badge bg-warning">' . $citas . '</span>
                        <img src="imagenes/icono.png" alt="Cita">
                    </div>
                </a>
              </td>';
            } else {
                echo '<td class="position-relative bg-primary text-white fw-bold">' . $dia . '</td>';
            }
        } else {
            // Otros dias
            if ($citas > 0) {
                echo '<td class="position-relative">
                <a href="ver_cita.php?fecha=' . $fechaCompleta . '" class="stretched-link text-black text-decoration-none d-block h-100">
                    ' . $dia . '
                    <div class="position-absolute top-0 end-0 m-1 d-flex align-items-center">
                        <span class="badge bg-warning">' . $citas . '</span>
                        <img src="imagenes/icono.png" alt="Cita">
                    </div>
                </a>
              </td>';
            } else {
                echo '<td class="position-relative">' . $dia . '</td>';
            }
        }
    }




    //Calcular los espacios del final
    $ultimoDiaDeLaSemana = ($primerDia + $dias - 1) % 7;

    // Agregar los espacios
    if ($ultimoDiaDeLaSemana !== 0) {
        for ($i = $ultimoDiaDeLaSemana + 1; $i <= 7; $i++) {
            echo '<td></td>';
        }
    }


    echo '</tr></tbody>';
    echo '</table>';
    echo '</div>';

}
?>

<?php

function nav()
{
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="imagenes/icono.png" alt="Logo" class="logo me-2">
            <span class="fw-bold">KaliMuscle</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mb-2 mb-md-2">
                    <a class="nav-link text-primary bg-white rounded px-3 py-2 mx-1" href="socios.php">Socios</a>
                </li>
                <li class="nav-item mb-2 mb-md-2">
                    <a class="nav-link text-primary bg-white rounded px-3 py-2 mx-1" href="servicios.php">Servicios</a>
                </li>
                <li class="nav-item mb-2 mb-md-2">
                    <a class="nav-link text-primary bg-white rounded px-3 py-2 mx-1" href="testimonios.php">Testimonios</a>
                </li>
                <li class="nav-item mb-2 mb-md-2">
                    <a class="nav-link text-primary bg-white rounded px-3 py-2 mx-1" href="noticias.php">Noticias</a>
                </li>
                <li class="nav-item mb-2 mb-md-2">
                    <a class="nav-link text-primary bg-white rounded px-3 py-2 mx-1" href="citas.php">Citas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
';
}


function footer()
{
    echo '    <footer class="bg-light footer text-center py-3">
        <p>© 2024 Club Deportivo - Todos los derechos reservados.</p>
    </footer>';
}
?>