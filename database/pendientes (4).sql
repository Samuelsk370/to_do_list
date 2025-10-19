-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2025 a las 23:09:11
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
  `ticket_pdf` varchar(255) NOT NULL,
  `id_empleado_cobro` int(10) NOT NULL
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
  `ult_cantidad_add` int(10) NOT NULL,
  `cantidad_total` int(10) NOT NULL,
  `fecha_regis_cantidad` datetime NOT NULL,
  `id_plan_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fichas_disponibles`
--

INSERT INTO `fichas_disponibles` (`id_ficha_disponible`, `ult_cantidad_add`, `cantidad_total`, `fecha_regis_cantidad`, `id_plan_fk`) VALUES
(1, 20, 30, '2025-10-08 08:47:18', 8),
(2, 1, 201, '2025-10-08 08:57:12', 6),
(3, 1, 121, '2025-10-08 08:43:41', 2),
(4, 300, 300, '2025-10-06 00:54:42', 9),
(5, 1, 101, '2025-10-08 09:25:17', 3),
(6, 2, 90, '2025-10-09 02:55:54', 1),
(7, 100, 100, '2025-10-08 06:06:02', 4),
(8, 107, 314, '2025-10-09 11:02:41', 10),
(9, 10, 50, '2025-10-09 11:23:33', 12),
(10, 200, 200, '2025-10-09 08:39:52', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_fichas_agregadas`
--

CREATE TABLE `historial_fichas_agregadas` (
  `id_fichs_add` int(10) NOT NULL,
  `last_quantity_added` int(10) NOT NULL,
  `register_date` datetime NOT NULL,
  `id_plan_fk_history` int(10) NOT NULL,
  `id_client_history` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_fichas_agregadas`
--

INSERT INTO `historial_fichas_agregadas` (`id_fichs_add`, `last_quantity_added`, `register_date`, `id_plan_fk_history`, `id_client_history`) VALUES
(2, 13, '2025-10-09 08:05:09', 12, 2),
(3, 200, '2025-10-09 08:39:52', 5, 1),
(4, 100, '2025-10-09 11:01:04', 10, 2),
(5, 100, '2025-10-09 11:01:04', 10, 2),
(6, 107, '2025-10-09 11:02:41', 10, 2),
(7, 50, '2025-10-09 11:16:05', 1, 2),
(8, 27, '2025-10-09 11:19:38', 12, 2),
(9, 10, '2025-10-09 11:23:32', 12, 2),
(10, 10, '2025-10-09 11:23:33', 12, 2),
(11, 30, '2025-10-09 11:24:12', 1, 2),
(12, 1, '2025-10-09 12:04:22', 1, 2),
(13, 2, '2025-10-09 02:54:24', 1, 2),
(14, 2, '2025-10-09 02:55:54', 1, 2);

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
  `precio_plan` decimal(10,2) NOT NULL,
  `id_cliente_pv_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plan_fichas`
--

INSERT INTO `plan_fichas` (`id_plan_ficha`, `nombre_plan`, `precio_plan`, `id_cliente_pv_fk`) VALUES
(1, '1hra', 10.00, 2),
(2, '5 horas', 15.00, 1),
(3, '24hras', 20.00, 1),
(4, '5hras', 15.00, 2),
(5, '8hras', 18.00, 1),
(6, '1Semana', 100.00, 1),
(7, '1Dia', 25.00, 1),
(8, '1mes', 250.00, 1),
(9, '2meses', 500.00, 2),
(10, '2dias', 40.00, 2),
(12, '10Horas', 60.00, 2),
(13, '1hora', 5.00, 6),
(14, '1hora', 10.00, 10);

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
  ADD KEY `id_client_pv` (`id_client_pv`),
  ADD KEY `id_empleado_cobro` (`id_empleado_cobro`);

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
-- Indices de la tabla `historial_fichas_agregadas`
--
ALTER TABLE `historial_fichas_agregadas`
  ADD PRIMARY KEY (`id_fichs_add`),
  ADD KEY `id_plan_fk_history` (`id_plan_fk_history`),
  ADD KEY `id_client_history` (`id_client_history`);

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
  MODIFY `id_ficha_disponible` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `historial_fichas_agregadas`
--
ALTER TABLE `historial_fichas_agregadas`
  MODIFY `id_fichs_add` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id_plan_ficha` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `cortes_fichas_ibfk_1` FOREIGN KEY (`id_client_pv`) REFERENCES `cliente_puntoventa` (`id_client_pv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cortes_fichas_ibfk_2` FOREIGN KEY (`id_empleado_cobro`) REFERENCES `empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fichas_disponibles`
--
ALTER TABLE `fichas_disponibles`
  ADD CONSTRAINT `fichas_disponibles_ibfk_1` FOREIGN KEY (`id_plan_fk`) REFERENCES `plan_fichas` (`id_plan_ficha`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_fichas_agregadas`
--
ALTER TABLE `historial_fichas_agregadas`
  ADD CONSTRAINT `historial_fichas_agregadas_ibfk_1` FOREIGN KEY (`id_plan_fk_history`) REFERENCES `plan_fichas` (`id_plan_ficha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_fichas_agregadas_ibfk_2` FOREIGN KEY (`id_client_history`) REFERENCES `cliente_puntoventa` (`id_client_pv`) ON DELETE CASCADE ON UPDATE CASCADE;

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
