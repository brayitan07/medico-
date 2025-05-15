-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2024 a las 17:45:07
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `centro_medico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas_medicas`
--

CREATE TABLE `citas_medicas` (
  `id` int(11) NOT NULL,
  `tipo_identificacion` varchar(2) NOT NULL,
  `numero_identificacion` varchar(20) NOT NULL,
  `nombre_paciente` varchar(100) NOT NULL,
  `apellido_paciente` varchar(100) NOT NULL,
  `telefono_paciente` varchar(15) NOT NULL,
  `correo_paciente` varchar(100) NOT NULL,
  `fecha_cita` datetime NOT NULL,
  `motivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas_medicas`
--

INSERT INTO `citas_medicas` (`id`, `tipo_identificacion`, `numero_identificacion`, `nombre_paciente`, `apellido_paciente`, `telefono_paciente`, `correo_paciente`, `fecha_cita`, `motivo`) VALUES
(1, 'CC', '1234567890', 'Juan', 'Perez', '3001234567', 'juan.perez@example.com', '2024-09-23 00:00:00', 'Consulta general'),
(2, 'TI', '2345678901', 'Maria', 'Gómez', '3002345678', 'maria.gomez@example.com', '2024-09-24 00:00:00', 'Chequeo anual'),
(3, 'CE', '3456789012', 'Carlos', 'Rodríguez', '3003456789', 'carlos.rodriguez@example.com', '2024-09-25 00:00:00', 'Dolor de cabeza'),
(4, 'CC', '4567890123', 'Ana', 'Martínez', '3004567890', 'ana.martinez@example.com', '2024-09-26 00:00:00', 'Revisión de presión'),
(5, 'TI', '5678901234', 'Luis', 'Hernández', '3005678901', 'luis.hernandez@example.com', '2024-09-27 00:00:00', 'Consulta pediátrica'),
(6, 'TI', '1014200683', 'BRAYAN', 'CRUZ', '3022119850', 'bc320418@gmail.com', '2024-09-19 08:30:00', 'Tiene constantes arritmias cardiacas '),
(7, 'CE', '6789012345', 'Laura', 'López', '3006789012', 'laura.lopez@example.com', '2024-09-28 00:00:00', 'Control de diabetes'),
(8, 'CC', '7890123456', 'Jorge', 'González', '3007890123', 'jorge.gonzalez@example.com', '2024-09-29 00:00:00', 'Consulta dermatológica'),
(9, 'TI', '8901234567', 'Elena', 'Díaz', '3008901234', 'elena.diaz@example.com', '2024-09-30 00:00:00', 'Chequeo prenatal'),
(10, 'CE', '9012345678', 'Pedro', 'Ramírez', '3009012345', 'pedro.ramirez@example.com', '2024-10-01 00:00:00', 'Consulta cardiológica'),
(11, 'CC', '0123456789', 'Sofía', 'Torres', '3000123456', 'sofia.torres@example.com', '2024-10-02 00:00:00', 'Revisión de colesterol'),
(12, 'CC', '1014200683', 'BRAYAN', 'CRUZ', '3022119850', 'bc320418@gmail.com', '2025-05-17 00:00:00', 'tiene demasiada gripa hace 5 dias ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `especialidad_id` int(11) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id`, `nombre`, `apellido`, `especialidad_id`, `telefono`, `correo`, `usuario_id`) VALUES
(1, 'Juan', 'Pérez', 1, '3001234567', 'juan.perez@example.com', NULL),
(2, 'Ana', 'Martínez', 2, '3004567890', 'ana.martinez@example.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `nombre`) VALUES
(1, 'Cardiología'),
(3, 'Dermatología'),
(2, 'Pediatría');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `tipo_identificacion` enum('CC','TI','CE') DEFAULT NULL,
  `numero_identificacion` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `apellido`, `tipo_identificacion`, `numero_identificacion`, `telefono`, `correo`) VALUES
(1, 'Juan', 'Pérez', '', '1234567890', '3001234567', 'juan.perez@example.com'),
(2, 'María', 'Gómez', '', '2345678901', '3002345678', 'maria.gomez@example.com'),
(3, 'Carlos', 'Rodríguez', '', '3456789012', '3003456789', 'carlos.rodriguez@example.com'),
(4, 'Ana', 'Martínez', '', '4567890123', '3004567890', 'ana.martinez@example.com'),
(5, 'Luis', 'Hernández', '', '5678901234', '3005678901', 'luis.hernandez@example.com'),
(6, 'Laura', 'López', '', '6789012345', '3006789012', 'laura.lopez@example.com'),
(7, 'Jorge', 'González', '', '7890123456', '3007890123', 'jorge.gonzalez@example.com'),
(8, 'Elena', 'Díaz', '', '8901234567', '3008901234', 'elena.diaz@example.com'),
(9, 'Pedro', 'Ramírez', '', '9012345678', '3009012345', 'pedro.ramirez@example.com'),
(10, 'Sofía', 'Torres', '', '0123456789', '3000123456', 'sofia.torres@example.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` enum('user','doctor','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `correo`, `contrasena`, `rol`) VALUES
(9, 'Brayan Cruz', 'bc320418@gmail.com', '$2y$10$6eqj2mkLBLJ/NbTphFiPCuMTQbyS7eqWDXPC4pPCFocA/z1F6JHb.', 'admin'),
(10, 'Diego Acosta ', 'diego@gmail.com', '$2y$10$t.AqcBo1Ujnn4iGg7rY8z.NSRoG6fn3IvEVFlNvwFOJGzeLwzysB6', 'doctor'),
(11, 'Fransico Cruz', 'pacho21cruz@gmail.com', '$2y$10$jxTM6R.DGOofMGLl0n3s0uNND7ozNfeTzYl4b0U2qX6MB45M/FgKC', 'user'),
(12, 'Alejandro Cuellar', 'br4yanelcr4ck@gmail.com', '$2y$10$r9N.p69oLZL2M1e8Vzfa.O/zuEy6p6yiEG5VsWgOKeOccDm3/awSW', 'doctor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `especialidad_id` (`especialidad_id`),
  ADD KEY `fk_usuario_doctor` (`usuario_id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_identificacion` (`numero_identificacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidades` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_usuario_doctor` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
