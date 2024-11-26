-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2024 a las 13:05:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_socio` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cancelada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_socio`, `id_servicio`, `fecha`, `hora`, `cancelada`) VALUES
(1, 2, '2024-11-25', '10:00:00', 0),
(2, 3, '2024-11-26', '11:30:00', 1),
(3, 1, '2024-11-27', '15:00:00', 0),
(4, 4, '2024-11-28', '09:00:00', 0),
(5, 2, '2024-11-29', '14:00:00', 1),
(6, 3, '2024-11-30', '16:30:00', 0),
(7, 1, '2024-12-01', '08:00:00', 0),
(8, 4, '2024-12-02', '12:30:00', 1),
(9, 2, '2024-12-03', '13:00:00', 0),
(10, 3, '2024-12-04', '17:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `contenido` varchar(50000) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `contenido`, `imagen`, `fecha`) VALUES
(1, 'Nueva Clase de Yoga', 'Estamos emocionados de presentar una nueva clase de yoga que promete transformar la forma en que cuidas tu cuerpo y mente. Este curso está diseñado para adaptarse a principiantes y personas con experiencia intermedia que buscan profundizar en la práctica del yoga. Con un enfoque en el fortalecimiento del núcleo, mejora de la flexibilidad y técnicas de respiración, esta clase será impartida por instructores certificados con años de experiencia. Durante las sesiones, aprenderás posturas fundamentales, secuencias de flujo y ejercicios de relajación que ayudarán a reducir el estrés y aumentar tu bienestar general. Las clases se llevarán a cabo los martes y jueves a las 7:00 AM en nuestra sala principal. Se recomienda traer tu propio tapete de yoga, aunque también estarán disponibles para alquilar en las instalaciones. ¡No pierdas la oportunidad de unirte a esta experiencia transformadora!', '../imagenesNoticias/yoga.jpg', '2024-11-25'),
(2, 'Torneo de Pesas', 'El torneo anual de pesas es uno de los eventos más esperados por nuestra comunidad, y este año no será la excepción. En esta competencia, los participantes tendrán la oportunidad de mostrar su fuerza y habilidades en un entorno competitivo pero amigable. El torneo estará dividido en varias categorías basadas en el peso corporal y el nivel de experiencia para asegurar que todos tengan una oportunidad justa de participar. Los ejercicios principales incluirán levantamiento de pesas en banco, peso muerto y sentadillas. Además, contaremos con jueces certificados que garantizarán la imparcialidad y el cumplimiento de las reglas. Los ganadores recibirán premios que van desde membresías gratuitas por un año, equipo deportivo de alta calidad, hasta reconocimientos oficiales del gimnasio. ¡No olvides inscribirte antes del 30 de noviembre! Te esperamos para disfrutar de un día lleno de energía y camaradería.', '../imagenesNoticias/pesas.jpg', '2024-11-26'),
(3, 'Reapertura de la Piscina', 'Tras semanas de renovaciones, estamos encantados de anunciar que nuestra piscina estará nuevamente abierta al público. Ahora, equipada con un sistema de filtración de última generación, la piscina ofrece una experiencia más limpia y segura para todos los usuarios. Además, hemos ampliado los carriles para facilitar la práctica de natación recreativa y profesional. Durante la semana de reapertura, ofreceremos clases de iniciación gratuitas para aquellos interesados en aprender a nadar, así como entrenamientos avanzados para nadadores experimentados. La piscina estará abierta de 6:00 AM a 10:00 PM, brindándote más flexibilidad para planificar tus sesiones. También estamos implementando medidas adicionales de seguridad, como salvavidas certificados en todo momento y capacitaciones regulares en primeros auxilios. Ven y redescubre la magia de nadar con nosotros.', '../imagenesNoticias/piscina.jpg', '2024-11-27'),
(4, 'Descuento en Membresías', '¡Esta es tu oportunidad de dar el paso hacia un estilo de vida más saludable! Durante todo este mes, estamos ofreciendo un increíble 50% de descuento en nuestras membresías anuales y mensuales. Al unirte al gimnasio, tendrás acceso a una amplia variedad de instalaciones, que incluyen salas de pesas, clases grupales, piscina, sauna y áreas de relajación. Además, contarás con el apoyo de nuestro equipo de entrenadores profesionales, quienes estarán disponibles para orientarte y diseñar un plan de entrenamiento personalizado. Este descuento también aplica para renovaciones, así que no importa si eres nuevo o ya formas parte de nuestra familia: ¡aprovecha esta oferta limitada y comienza tu viaje de fitness hoy mismo!', '../imagenesNoticias/descuento.png', '2024-11-28'),
(5, 'Nueva Maquinaria', 'Siempre nos esforzamos por ofrecerte lo mejor, y por eso hemos renovado completamente nuestra sala de equipos con máquinas de última tecnología. Entre las nuevas adquisiciones se encuentran cintas de correr con sistemas de inclinación y declive, elípticas con monitores de frecuencia cardíaca y bicicletas estáticas con programas de entrenamiento virtual. También hemos incorporado estaciones multifuncionales para entrenamientos de fuerza, ideales para ejercicios compuestos que trabajan varios grupos musculares al mismo tiempo. Estas mejoras buscan hacer tu experiencia de entrenamiento más efectiva, cómoda y divertida. Nuestro personal estará disponible para brindarte una introducción a los nuevos equipos y responder a cualquier pregunta que tengas. ¡Ven y descubre cómo la tecnología puede llevar tu rutina de ejercicios al siguiente nivel!', '../imagenesNoticias/maquinas.jpg', '2024-11-29'),
(6, 'Horario Extendido', 'Entendemos que cada persona tiene un horario diferente, y por eso, durante todo el mes de diciembre, nuestro gimnasio estará abierto las 24 horas del día. Esta iniciativa tiene como objetivo brindarte mayor flexibilidad para que puedas planificar tus entrenamientos según tu disponibilidad. Ya sea que prefieras entrenar temprano en la mañana, durante la noche o incluso en la madrugada, ahora tendrás la libertad de hacerlo. Además, nuestro personal estará disponible en turnos rotativos para garantizar tu seguridad y comodidad en cualquier momento del día. También ofreceremos café y snacks saludables en nuestra cafetería para complementar tu experiencia de entrenamiento. ¡No dejes que el tiempo sea un obstáculo para alcanzar tus metas de fitness!', '../imagenesNoticias/horario.jpg', '2024-11-30'),
(7, 'Clase de Crossfit', '¿Buscas un desafío? Nuestras clases de Crossfit están diseñadas para llevar tus límites al máximo mientras mejoras tu fuerza, resistencia y capacidad cardiovascular. Este entrenamiento de alta intensidad combina movimientos funcionales, levantamiento de pesas, ejercicios de calistenia y rutinas metabólicas en un entorno motivador y enérgico. Los entrenadores están altamente capacitados y adaptarán los ejercicios a tu nivel de habilidad para garantizar una experiencia segura y efectiva. Además, estas clases fomentan el trabajo en equipo y el sentido de comunidad, haciendo que cada sesión sea una oportunidad para conectarte con otros miembros. Las clases se llevarán a cabo de lunes a viernes a las 6:00 PM. ¡Atrévete a ser parte del cambio!', '../imagenesNoticias/crossfit.jpg', '2024-12-01'),
(8, 'Sesiones de Nutrición', 'La nutrición es una parte esencial de cualquier plan de fitness, y ahora ofrecemos consultas personalizadas con un nutricionista certificado. Durante estas sesiones, recibirás orientación experta para diseñar un plan de alimentación que se ajuste a tus metas, ya sea perder peso, ganar masa muscular o simplemente mantener un estilo de vida saludable. Aprenderás a calcular tus necesidades calóricas, a balancear macronutrientes y a elegir alimentos que respalden tu salud a largo plazo. Además, ofrecemos seguimiento mensual para evaluar tu progreso y realizar ajustes según sea necesario. ¡Comienza hoy a construir una relación más saludable con la comida!', '../imagenesNoticias/nutricion.jpg', '2024-12-02'),
(9, 'Competencia de Natación', '¡El evento acuático del año ya está aquí! Nuestra competencia de natación está abierta a todos los niveles, desde principiantes hasta nadadores avanzados. Este evento contará con diversas categorías, incluyendo estilo libre, espalda, mariposa y relevos. Habrá premios para los tres primeros lugares en cada categoría, así como diplomas de participación para todos. Durante el evento, también ofreceremos actividades paralelas, como juegos en el agua para niños y demostraciones de técnicas de nado avanzado por parte de nuestros instructores. No te pierdas esta oportunidad de pasar un día divertido y deportivo en compañía de otros amantes de la natación.', '../imagenesNoticias/natacion.jpg', '2024-12-03'),
(10, 'Taller de Meditación', 'En un mundo lleno de estrés y distracciones, aprender a meditar puede marcar una gran diferencia en tu bienestar. Por eso hemos organizado un taller de meditación que te enseñará técnicas prácticas para reducir el estrés, mejorar tu concentración y vivir en el presente. Este taller será guiado por expertos en mindfulness, quienes compartirán ejercicios de respiración, visualización y relajación profunda. No importa si eres principiante o tienes experiencia previa; este taller está diseñado para adaptarse a todos. ¡Inscríbete hoy y da el primer paso hacia una vida más plena y consciente!', '../imagenesNoticias/meditacion.jpg', '2024-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `duracion` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `descripcion`, `duracion`, `precio`) VALUES
(1, 'Yoga', 60, 500),
(2, 'Crossfit', 45, 700),
(3, 'Piscina', 30, 300),
(4, 'Zumba', 50, 400),
(5, 'Spinning', 60, 600),
(6, 'Kickboxing', 45, 800),
(7, 'Pilates', 60, 500),
(8, 'Nutrición', 30, 1000),
(9, 'Entrenador Personal', 60, 1500),
(10, 'Sauna', 20, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `id` int(3) NOT NULL,
  `nombre` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `usuario` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefono` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`id`, `nombre`, `edad`, `usuario`, `password`, `telefono`, `foto`) VALUES
(1, 'juan perez', 30, 'juanp', '12345', '+34986093478', '../imagenesSocios/juan.jpg'),
(2, 'Ana Lopez', 28, 'analo', '67890', '+34968440176', '../imagenesSocios/ana.jpg'),
(3, 'Luis Torres', 35, 'luist', 'abcde', '+34967018564', '../imagenesSocios/luis.jpg'),
(4, 'Maria Gomez', 25, 'mariag', 'vwxyz', '+34548925491', '../imagenesSocios/maria.jpg'),
(5, 'Carlos Ruiz', 40, 'carlr', 'qwert', '+34986036548', '../imagenesSocios/carlos.jpg'),
(6, 'Lucia Martinez', 32, 'luciam', 'asdfg', '+34918017531', '../imagenesSocios/lucia.jpg'),
(7, 'Pedro Silva', 29, 'pedros', 'zxcvb', '+34689854101', '../imagenesSocios/pedro.jpg'),
(8, 'Elena Vega', 26, 'elenav', 'poiuy', '+34984108456', '../imagenesSocios/elena.jpg'),
(9, 'Andres Flores', 33, 'andresf', 'lkjhg', '+34987160165', '../imagenesSocios/andres.jpg'),
(10, 'Sofia Nuñez', 27, 'sofian', 'mnbvc', '+34890718564', '../imagenesSocios/sofia.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonio`
--

CREATE TABLE `testimonio` (
  `id` int(11) NOT NULL,
  `autor` varchar(15) NOT NULL,
  `contenido` varchar(200) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `testimonio`
--

INSERT INTO `testimonio` (`id`, `autor`, `contenido`, `fecha`) VALUES
(1, 'Juan Perez', 'Excelente gimnasio, muy completo.', '2024-11-25'),
(2, 'Ana Lopez', 'Las clases de yoga son increíbles.', '2024-11-26'),
(3, 'Luis Torres', 'Muy buena atención y ambiente.', '2024-11-27'),
(4, 'Maria Gomez', 'Las instalaciones están muy limpias.', '2024-11-28'),
(5, 'Carlos Ruiz', 'Entrenadores muy profesionales.', '2024-11-29'),
(6, 'Lucia Martinez', 'Recomiendo las clases de crossfit.', '2024-11-30'),
(7, 'Pedro Silva', 'Gran variedad de servicios.', '2024-12-01'),
(8, 'Elena Vega', 'El sauna es mi lugar favorito.', '2024-12-02'),
(9, 'Andres Flores', 'Me encanta la piscina.', '2024-12-03'),
(10, 'Sofia Nuñez', 'Horarios muy flexibles.', '2024-12-04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD UNIQUE KEY `id_socio` (`id_socio`,`fecha`,`hora`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo_2` (`titulo`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descripcion` (`descripcion`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `testimonio`
--
ALTER TABLE `testimonio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contenido` (`contenido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `socio`
--
ALTER TABLE `socio`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `testimonio`
--
ALTER TABLE `testimonio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `cita_socio` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
