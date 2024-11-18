<?php
function insertarNuevoSocio($conexionBD, $nombre, $edad, $usuario, $contraseña, $telefono, $foto)
{

    $nombreSocio = strtolower($nombre);

    $sentencia = "INSERT INTO socio (nombre, edad, usuario, password, telefono, foto) VALUES (?, ?, ?, ?, ?, ?)";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->bind_param("sissss", $nombreSocio, $edad, $usuario, $contraseña, $telefono, $foto);

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
    } else {
        echo "No se ha insertado el nuevo socio. Posiblemente ya existiera.";
    }
}

function listarSocios($conexionBD)
{

    $consulta = "SELECT * FROM socio";
    $resultado = $conexionBD->query($consulta);

    if ($resultado->num_rows > 0) {
        echo '<div class="container my-5">';
        echo '<div class="row gy-4">';

        echo '<h4>Listado Completo de Socios</h4>';

        while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
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

function listarSocioPorId($conexionBD, $id)
{
    $sentencia = "SELECT * FROM socio WHERE id = ?";
    $consulta = $conexionBD->prepare($sentencia);
    $consulta->bind_param("i", $id);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        // Recuperar los datos del socio
        while ($socio = $resultado->fetch_assoc()) {
            $nombre = $socio['nombre'];
            $edad = $socio['edad'];
            $usuario = $socio['usuario'];
            $telefono = $socio['telefono'];
            $foto = $socio['foto'];
        }

        // Mostrar el formulario con los datos del socio
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
                    <input type="password" class="form-control" id="contraseña" name="contraseña">
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
        echo '<p class="text-center text-muted">No se encontraron socios con ese nombre.</p>';
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
            $contraseña=$fila["password"];
            $telefono = $fila["telefono"];
            $foto = $fila["foto"];

            // Mostrar cada socio en una tarjeta
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
        echo '<p class="text-center text-muted">No se encontraron socios con ese telefono.</p>';
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
        header("Refresh:2; url=socios.php");
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

    $consulta->execute();

    if ($consulta->affected_rows > 0) {
        echo "Se ha insertado el nuevo servicio";
    } else {
        echo "No se ha insertado el nuevo servicio. Posiblemente ya existiera.";
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
        echo "Se ha modificado el servicio con ID $idServicio";
    } else {
        echo "No se ha modificado el servicio. Puede que el ID no exista o los datos sean los mismos.";
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

    $consulta->bind_result($id, $descripcion, $duracion, $precio);
    $consulta->execute();

    while ($consulta->fetch()) {
        echo "<p>$id,$descripcion,$duracion,$precio</p>";
    }

}

function listarServicios($conexionBD)
{

    $consulta = "SELECT * FROM servicio ORDER BY precio";
    $resultado = $conexionBD->query($consulta);

    echo "<table border=1px>";
    echo "<tr><th>ID</th><th>DESCRIPCION</th><th>DURACION</th><th>PRECIO</th></tr>";
    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $id = $fila["id"];
        $descripcion = $fila["descripcion"];
        $duracion = $fila["duracion"];
        $precio = $fila["precio"];
        echo "<tr><td>$id</td><td>$descripcion</td><td>$duracion</td><td>$precio</td></tr>";
    }
    echo "</table>";

}
?>



<?php

function insertarNuevoTestimonio($conexionBD, $autor, $contenido, $fecha)
{


    $sentencia = "INSERT INTO testimonio (autor, contenido, fecha) VALUES (?, ?, ?)";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->bind_param("sss", $autor, $contenido, $fecha);

    $consulta->execute();

    if ($consulta->affected_rows > 0) {
        echo "Se ha insertado el nuevo testimonio";
    } else {
        echo "No se ha insertado el nuevo testimonio.";
    }
}

function listarTestimonios($conexionBD)
{

    $consulta = "SELECT * FROM testimonio";
    $resultado = $conexionBD->query($consulta);

    echo "<table border=1px>";
    echo "<tr><th>ID</th><th>AUTOR</th><th>CONTENIDO</th><th>FECHA</th></tr>";
    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $id = $fila["id"];
        $autor = $fila["autor"];
        $contenido = $fila["contenido"];
        $fecha = $fila["fecha"];
        echo "<tr><td>$id</td><td>$autor</td><td>$contenido</td><td>$fecha</td></tr>";
    }
    echo "</table>";

}

function listarTestimonioAleatorio($conexionBD)
{
    // Consulta para seleccionar un testimonio aleatorio
    $consulta = "SELECT * FROM testimonio ORDER BY RAND() LIMIT 1";
    $resultado = $conexionBD->query($consulta);

    if ($resultado->num_rows > 0) {
        // Obtener el testimonio
        $fila = $resultado->fetch_array(MYSQLI_ASSOC);
        $autor = $fila["autor"];
        $contenido = $fila["contenido"];
        $fecha = $fila["fecha"];

        // Mostrar el testimonio en un diseño tipo tarjeta pero diferente al de noticias
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

    $consulta->execute();

    if ($consulta->affected_rows > 0) {
        echo "Se ha insertado la nueva noticia.";
    } else {
        echo "No se ha insertado la nueva noticia.";
    }
}

function numeroNoticias($conexionBD)
{


    $consulta = "SELECT COUNT(id) as Total FROM noticia";
    $resultado = $conexionBD->query($consulta);

    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $total = (int) $fila["Total"];
        return $total;
    }
}

function listarNoticias($conexionBD, $numero)
{

    $id = 0;
    $titulo = "";
    $contenido = "";
    $imagen = "";
    $fecha = "";


    $consulta = "SELECT * FROM noticia LIMIT 4 OFFSET ?";

    $resultado = $conexionBD->prepare($consulta);


    $resultado->bind_param("i", $numero);

    $resultado->bind_result($id, $titulo, $contenido, $imagen, $fecha);
    $resultado->execute();


    echo "<table border=1px>";
    echo "<tr><th>ID</th><th>TITULO</th><th>CONTENIDO</th><th>IMAGEN</th><th>FECHA</th></tr>";

    while ($resultado->fetch()) {
        echo "<tr><td>$id</td><td>$titulo</td><td>$contenido</td><td>$imagen</td><td>$fecha</td></tr>";
    }

    echo "</table>";

}

function listarUltimasNoticias($conexionBD)
{
    // Consulta para obtener las 3 últimas noticias
    $consulta = "SELECT * FROM noticia ORDER BY fecha DESC LIMIT 3";
    $resultado = $conexionBD->query($consulta);

    // Variable para alternar las posiciones
    $count = 0;

    // Iterar sobre cada noticia
    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $id = $fila["id"];
        $titulo = $fila["titulo"];
        $contenido = $fila["contenido"];
        $imagen = $fila["imagen"]; // Ruta de la imagen
        $fecha = $fila["fecha"];

        // Extraer las primeras tres palabras del contenido
        $contenido_array = explode(' ', $contenido); // Divide el contenido en palabras
        $contenido_resumido = implode(' ', array_slice($contenido_array, 0, 3)); // Toma las primeras 3 palabras

        // Alternancia entre la izquierda y la derecha
        if ($count % 2 == 0) {
            $alignmentClass = 'col-md-6 mb-4'; // Izquierda (columna de la mitad izquierda)
        } else {
            $alignmentClass = 'col-md-6 mb-4 ms-auto'; // Derecha (columna de la mitad derecha)
        }

        // Comienzo de la fila que contendrá la noticia
        echo '<div class="row">';

        // Mostrar cada noticia en una tarjeta de Bootstrap
        echo '
        <div class="' . $alignmentClass . '">
            <div class="card">
                <img src="' . $imagen . '" class="card-img-top" alt="' . $titulo . '" style="width: 100%; height: auto; max-height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">' . $titulo . '</h5>
                    <p class="card-text">' . $contenido_resumido . '...</p> <!-- Muestra las primeras 3 palabras del contenido -->
                    <a href="noticia.php?id=' . $id . '" class="btn btn-primary">Leer más</a> <!-- Botón para leer la noticia completa -->
                </div>
                <div class="card-footer text-muted">
                    <small>Publicado el ' . date('d M Y', strtotime($fecha)) . '</small>
                </div>
            </div>
        </div>';

        // Cierre de la fila
        echo '</div>';

        // Incrementar el contador
        $count++;
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


    echo "<table border=1px>";
    echo "<tr><th>ID</th><th>TITULO</th><th>CONTENIDO</th><th>IMAGEN</th><th>FECHA</th></tr>";

    while ($resultado->fetch()) {
        echo "<tr><td>$id</td><td>$titulo</td><td>$contenido</td><td>$imagen</td><td>$fecha</td></tr>";
    }

    echo "</table>";

}

?>



<?php

function insertarNuevaCita($conexionBD, $id_socio, $id_servicio, $fecha, $hora)
{

    $sentencia = "INSERT INTO citas (id_socio, id_servicio, fecha, hora) VALUES (?, ?, ?, ?)";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->bind_param("iiss", $id_socio, $id_servicio, $fecha, $hora);

    $consulta->execute();

    if ($consulta->affected_rows > 0) {
        echo "Se ha insertado la nueva cita.";
    } else {
        echo "No se ha insertado la nueva cita.";
    }
}

function cancelarCita($conexionBD, $id_socio, $id_servicio)
{
    $dia = 0;

    $sentencia1 = "SELECT DAY(fecha) AS Dia FROM citas WHERE id_socio=? AND id_servicio=?";

    $consulta1 = $conexionBD->prepare($sentencia1);

    $consulta1->bind_param("ii", $id_socio, $id_servicio);

    $consulta1->bind_result($dia);

    $consulta1->execute();

    while ($consulta1->fetch()) {
        $fecha = (int) $dia;
    }

    $diaHoy = (int) date("j");

    if ($diaHoy === $fecha) {
        echo "No puedes anular la cita. Deberias haberlo hecho con un dia de antelacion.";

    } else if (date("d") > $fecha) {
        echo "No puedes anular una cita ya pasada.";

    } else {

        $sentencia2 = "UPDATE citas SET cancelada = 1 WHERE id_socio=? AND  id_servicio=?";
        $consulta2 = $conexionBD->prepare($sentencia2);

        $consulta2->bind_param("ii", $id_socio, $id_servicio);

        $consulta2->execute();

        if ($consulta2->affected_rows > 0) {
            echo "Se ha cancelado la cita.";
        } else {
            echo "No se ha cancelado la cita.";
        }
    }
}

function borrarCita($conexionBD, $id_socio, $id_servicio)
{


    $sentencia = "DELETE FROM citas WHERE id_socio=? AND id_servicio=? AND cancelada=1";
    $consulta = $conexionBD->prepare($sentencia);

    $consulta->bind_param("ii", $id_socio, $id_servicio);

    $consulta->execute();

    if ($consulta->affected_rows > 0) {
        echo "Se ha borrado la cita.";
    } else {
        echo "No se ha borrado la nueva cita posiblemente no exista o no este cancelada.";
    }
}


function listarCitasPorNombreSocio($conexionBD, $nombreSocio)
{
    $id_socio = 0;
    $id_servicio = 0;
    $fecha = "";
    $hora = "";
    $cancelada = 0;


    $sentencia = "SELECT * FROM citas WHERE id_socio =(SELECT id FROM socio WHERE nombre=?)";
    $consulta = $conexionBD->prepare($sentencia);
    $cadena = strtolower($nombreSocio);

    $consulta->bind_param("s", $cadena);

    $consulta->bind_result($id_socio, $id_servicio, $fecha, $hora, $cancelada);
    $consulta->execute();

    echo "<table border=1px>";
    echo "<tr><th>SOCIO</th><th>SERVICIO</th><th>FECHA</th><th>HORA</th></tr>";

    while ($consulta->fetch()) {
        echo "<tr><td>$id_socio</td><td>$id_servicio</td><td>$fecha</td><td>$hora</td></tr>";
    }
    echo "</table>";
}

function listarCitasPorNombreServicio($conexionBD, $nombreServicio)
{
    $id_socio = 0;
    $id_servicio = 0;
    $fecha = "";
    $hora = "";
    $cancelada = 0;


    $sentencia = "SELECT * FROM citas WHERE id_servicio =(SELECT id FROM servicio WHERE descripcion=?)";
    $consulta = $conexionBD->prepare($sentencia);
    $cadena = strtolower($nombreServicio);

    $consulta->bind_param("s", $cadena);

    $consulta->bind_result($id_socio, $id_servicio, $fecha, $hora, $cancelada);
    $consulta->execute();

    echo "<table border=1px>";
    echo "<tr><th>SOCIO</th><th>SERVICIO</th><th>FECHA</th><th>HORA</th></tr>";

    while ($consulta->fetch()) {
        echo "<tr><td>$id_socio</td><td>$id_servicio</td><td>$fecha</td><td>$hora</td></tr>";
    }
    echo "</table>";
}

function listarCitasPorFecha($conexionBD, $date)
{
    $id_socio = 0;
    $id_servicio = 0;
    $fecha = "";
    $hora = "";
    $cancelada = 0;


    $sentencia = "SELECT * FROM citas WHERE fecha =?";
    $consulta = $conexionBD->prepare($sentencia);


    $consulta->bind_param("s", $date);

    $consulta->bind_result($id_socio, $id_servicio, $fecha, $hora, $cancelada);
    $consulta->execute();

    echo "<table border=1px>";
    echo "<tr><th>SOCIO</th><th>SERVICIO</th><th>FECHA</th><th>HORA</th></tr>";

    while ($consulta->fetch()) {
        echo "<tr><td>$id_socio</td><td>$id_servicio</td><td>$fecha</td><td>$hora</td></tr>";
    }
    echo "</table>";
}
?>


<!-- CREAR NAV -->
<?php

function nav()
{
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
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
                        <a class="nav-link text-primary bg-white rounded px-3 py-2 mx-1" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item mb-2 mb-md-2">
                        <a class="nav-link text-primary bg-white rounded px-3 py-2 mx-1" href="socios.php">Socios</a>
                    </li>
                    <li class="nav-item mb-2 mb-md-2">
                        <a class="nav-link text-primary bg-white rounded px-3 py-2 mx-1" href="#">Servicios</a>
                    </li>
                    <li class="nav-item mb-2 mb-md-2">
                        <a class="nav-link text-primary bg-white rounded px-3 py-2 mx-1" href="#">Noticias</a>
                    </li>
                    <li class="nav-item mb-2 mb-md-2">
                        <a class="nav-link text-primary bg-white rounded px-3 py-2 mx-1" href="#">Testimonios</a>
                    </li>
                    <li class="nav-item mb-2 mb-md-2">
                        <a class="nav-link text-primary bg-white rounded px-3 py-2 mx-1" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>';
}

function footer()
{
    echo '    <footer class="bg-light text-center py-3">
        <p>© 2024 Club Deportivo - Todos los derechos reservados.</p>
    </footer>';
}
?>