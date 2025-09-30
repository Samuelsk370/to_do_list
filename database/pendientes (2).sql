-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2025 a las 15:35:28
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
-- Base de datos: `pendientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_puntoventa`
--

CREATE TABLE `cliente_puntoventa` (
  `id_client_pv` int(10) NOT NULL,
  `name_locality_fk_pv` int(10) NOT NULL,
  `nombre_pv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente_puntoventa`
--

INSERT INTO `cliente_puntoventa` (`id_client_pv`, `name_locality_fk_pv`, `nombre_pv`) VALUES
(1, 1, 'Maria (AP)'),
(2, 1, 'ALfredo'),
(3, 2, 'Sra del AP'),
(4, 1, 'Cayetano'),
(5, 1, 'Cayetano'),
(6, 1, 'Vanesa'),
(7, 4, 'Oliver'),
(8, 4, 'Oliver 2'),
(9, 4, 'Oliver 2'),
(10, 6, 'Doña Silvia'),
(11, 6, 'Doña Silvia'),
(12, 6, 'Karina'),
(13, 1, 'Nayeli'),
(14, 1, 'Taller Mecánico'),
(15, 10, 'Estética'),
(16, 10, 'Vicente'),
(17, 16, 'Ana María'),
(18, 16, 'Sheyla'),
(19, 16, 'Tienda Zacapala'),
(20, 11, 'Antonia'),
(21, 16, 'Odilon'),
(22, 16, 'Jesus'),
(23, 21, 'Tienda Dago'),
(24, 22, 'Yuri'),
(25, 24, 'Magali'),
(26, 25, 'Senaido'),
(27, 25, 'Tienda Papelería'),
(28, 14, 'Repe cancha'),
(29, 9, '(AP) Torre'),
(30, 17, 'Viri'),
(31, 4, 'Oliver4'),
(32, 4, 'Oliver4'),
(33, 4, 'oliver5'),
(34, 4, 'oliver 6'),
(35, 4, 'Oliver7'),
(36, 4, 'Oliver7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cortes_fichas`
--

CREATE TABLE `cortes_fichas` (
  `id_corte_ficha` int(10) NOT NULL,
  `id_client_pv` int(10) NOT NULL,
  `fecha_corte` datetime NOT NULL,
  `ticket_pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(10) NOT NULL,
  `name_empleado` varchar(255) NOT NULL,
  `apellidos_empleado` varchar(255) NOT NULL,
  `tipo_puesto` varchar(100) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `passw_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `name_empleado`, `apellidos_empleado`, `tipo_puesto`, `name_user`, `passw_user`) VALUES
(1, 'Samuel', 'CM', 'Técnico', 'samuel', 'samuel123'),
(2, 'Leslie', 'NR', 'Administración', 'leslie', 'leslie123'),
(3, 'Isaac', 'GB', 'Lider', 'leslie', 'isaac123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas_disponibles`
--

CREATE TABLE `fichas_disponibles` (
  `id_ficha_disponible` int(10) NOT NULL,
  `ult_contidad_add` int(10) NOT NULL,
  `cantidad_total` int(10) NOT NULL,
  `fecha_regis_cantidad` datetime NOT NULL,
  `id_plan_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id_localidad` int(11) NOT NULL,
  `name_locality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id_localidad`, `name_locality`) VALUES
(1, 'Zempazulco'),
(2, 'Arroyo Seco'),
(4, 'El Salto'),
(6, 'Las Lomitas'),
(7, 'El Porvenir'),
(8, 'Playa Larga Vieja'),
(9, 'El Arenal'),
(10, 'Estero Verde'),
(11, 'Alto de Ventura'),
(12, 'Nuevo Tecomulapa'),
(13, 'Los Tamarindos'),
(14, 'El Zapote'),
(15, 'Santa Clara'),
(16, 'La Soledad'),
(17, 'Chamizal'),
(18, 'Cantarrana'),
(19, 'Chautengo'),
(20, 'Jalapa'),
(21, 'La Lima'),
(22, 'Cuacoyulichan'),
(23, 'El Limoncito'),
(24, 'Limon Grande'),
(25, 'El Coquillo'),
(26, 'Cuilutla'),
(27, 'Cruz Grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pend_finalizados`
--

CREATE TABLE `pend_finalizados` (
  `id_pend_fin` int(10) NOT NULL,
  `fecha_finalizado` datetime NOT NULL,
  `id_pendiente_fk` int(10) NOT NULL,
  `id_empleado_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_fichas`
--

CREATE TABLE `plan_fichas` (
  `id_plan_ficha` int(10) NOT NULL,
  `nombre_plan` varchar(100) NOT NULL,
  `precio_plan` decimal(10,0) NOT NULL,
  `id_cliente_pv_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas_pendientes`
--

CREATE TABLE `tareas_pendientes` (
  `id_pend` int(10) NOT NULL,
  `titulo_pend` varchar(255) NOT NULL,
  `name_client` varchar(255) NOT NULL,
  `numero_tel` int(15) NOT NULL,
  `calle_refer` varchar(300) NOT NULL,
  `descrip_pend` text NOT NULL,
  `estado_pend` varchar(20) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `id_locality_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas_pendientes`
--

INSERT INTO `tareas_pendientes` (`id_pend`, `titulo_pend`, `name_client`, `numero_tel`, `calle_refer`, `descrip_pend`, `estado_pend`, `fecha_creacion`, `id_locality_fk`) VALUES
(1, 'Reporte Falla', 'Sacam Gorobi', 1234567890, 'no hay', 'Internet lento', 'Pendiente', '2025-09-23 10:14:15', 1),
(2, 'Quitar equipos', 'Nacho JS', 1234567884, 'Atras de la tienda', 'Iya no los quiere', 'Urgente', '2025-09-23 10:15:53', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente_puntoventa`
--
ALTER TABLE `cliente_puntoventa`
  ADD PRIMARY KEY (`id_client_pv`),
  ADD KEY `name_locality_fk_pv` (`name_locality_fk_pv`);

--
-- Indices de la tabla `cortes_fichas`
--
ALTER TABLE `cortes_fichas`
  ADD PRIMARY KEY (`id_corte_ficha`),
  ADD KEY `id_client_pv` (`id_client_pv`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `fichas_disponibles`
--
ALTER TABLE `fichas_disponibles`
  ADD PRIMARY KEY (`id_ficha_disponible`),
  ADD KEY `id_plan_fk` (`id_plan_fk`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id_localidad`);

--
-- Indices de la tabla `pend_finalizados`
--
ALTER TABLE `pend_finalizados`
  ADD PRIMARY KEY (`id_pend_fin`),
  ADD KEY `id_pendiente_fk` (`id_pendiente_fk`),
  ADD KEY `id_empleado_fk` (`id_empleado_fk`);

--
-- Indices de la tabla `plan_fichas`
--
ALTER TABLE `plan_fichas`
  ADD PRIMARY KEY (`id_plan_ficha`),
  ADD KEY `id_cliente_pv_fk` (`id_cliente_pv_fk`);

--
-- Indices de la tabla `tareas_pendientes`
--
ALTER TABLE `tareas_pendientes`
  ADD PRIMARY KEY (`id_pend`),
  ADD KEY `id_locality_fk` (`id_locality_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente_puntoventa`
--
ALTER TABLE `cliente_puntoventa`
  MODIFY `id_client_pv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `cortes_fichas`
--
ALTER TABLE `cortes_fichas`
  MODIFY `id_corte_ficha` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fichas_disponibles`
--
ALTER TABLE `fichas_disponibles`
  MODIFY `id_ficha_disponible` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `pend_finalizados`
--
ALTER TABLE `pend_finalizados`
  MODIFY `id_pend_fin` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plan_fichas`
--
ALTER TABLE `plan_fichas`
  MODIFY `id_plan_ficha` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tareas_pendientes`
--
ALTER TABLE `tareas_pendientes`
  MODIFY `id_pend` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente_puntoventa`
--
ALTER TABLE `cliente_puntoventa`
  ADD CONSTRAINT `cliente_puntoventa_ibfk_1` FOREIGN KEY (`name_locality_fk_pv`) REFERENCES `localidad` (`id_localidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cortes_fichas`
--
ALTER TABLE `cortes_fichas`
  ADD CONSTRAINT `cortes_fichas_ibfk_1` FOREIGN KEY (`id_client_pv`) REFERENCES `cliente_puntoventa` (`id_client_pv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fichas_disponibles`
--
ALTER TABLE `fichas_disponibles`
  ADD CONSTRAINT `fichas_disponibles_ibfk_1` FOREIGN KEY (`id_plan_fk`) REFERENCES `plan_fichas` (`id_plan_ficha`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pend_finalizados`
--
ALTER TABLE `pend_finalizados`
  ADD CONSTRAINT `pend_finalizados_ibfk_1` FOREIGN KEY (`id_empleado_fk`) REFERENCES `empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pend_finalizados_ibfk_2` FOREIGN KEY (`id_pendiente_fk`) REFERENCES `tareas_pendientes` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `plan_fichas`
--
ALTER TABLE `plan_fichas`
  ADD CONSTRAINT `plan_fichas_ibfk_1` FOREIGN KEY (`id_cliente_pv_fk`) REFERENCES `cliente_puntoventa` (`id_client_pv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareas_pendientes`
--
ALTER TABLE `tareas_pendientes`
  ADD CONSTRAINT `tareas_pendientes_ibfk_1` FOREIGN KEY (`id_locality_fk`) REFERENCES `localidad` (`id_localidad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
