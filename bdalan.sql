-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 05-10-2024 a las 05:06:25
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdalan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catastro`
--

CREATE TABLE `catastro` (
  `id` int(11) NOT NULL,
  `Xfin` decimal(10,2) DEFAULT NULL,
  `Xini` decimal(10,2) DEFAULT NULL,
  `Yfin` decimal(10,2) DEFAULT NULL,
  `Yini` decimal(10,2) DEFAULT NULL,
  `zona` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catastro`
--

INSERT INTO `catastro` (`id`, `Xfin`, `Xini`, `Yfin`, `Yini`, `zona`) VALUES
(10000, 200.50, 200.00, 300.50, 300.00, 'Zona C'),
(15001, 300.50, 300.00, 400.50, 400.00, 'Zona E'),
(20000, 150.50, 150.00, 250.50, 250.00, 'Zona B'),
(20450, 110.50, 130.00, 280.50, 180.00, 'Zona C'),
(25002, 350.50, 350.00, 450.50, 450.00, 'Zona F'),
(25004, 450.50, 450.00, 550.50, 550.00, 'Zona H'),
(30000, 100.50, 100.00, 200.50, 200.00, 'Zona A'),
(30001, 250.50, 250.00, 350.50, 350.00, 'Zona D'),
(35003, 400.50, 400.00, 500.50, 500.00, 'Zona G');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id`, `nombre`) VALUES
(1, 'Distrito 1'),
(2, 'Distrito 2'),
(3, 'Distrito 3'),
(4, 'Distrito 4'),
(5, 'Distrito 5'),
(6, 'Distrito 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` varchar(20) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `paterno` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `paterno`) VALUES
('11223344', 'Carlos', 'González'),
('12345678', 'Juan', 'Pérez'),
('22334455', 'Luis', 'Torres'),
('33445566', 'María', 'Fernández'),
('55667788', 'Isabel', 'Ramírez'),
('57975371', 'Franco', 'Salas'),
('68329762', 'Alan', 'Troche'),
('87654321', 'Ana', 'López'),
('92378947', 'Monica', 'Jimenez'),
('98765432', 'Sofía', 'Martínez'),
('99887766', 'Diego', 'Salazar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_catastro`
--

CREATE TABLE `persona_catastro` (
  `persona_ci` varchar(20) NOT NULL,
  `catastro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona_catastro`
--

INSERT INTO `persona_catastro` (`persona_ci`, `catastro_id`) VALUES
('11223344', 10000),
('11223344', 30000),
('12345678', 30000),
('22334455', 25002),
('33445566', 30001),
('55667788', 35003),
('68329762', 15001),
('68329762', 20450),
('87654321', 20000),
('98765432', 15001),
('99887766', 25004);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ci` varchar(15) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ci`, `id`, `password`, `role`, `username`) VALUES
('12345678', 1, 'password1', 'user', 'juanp'),
('87654321', 2, 'password2', 'user', 'anaa'),
('11223344', 3, 'password3', 'user', 'carlg'),
('33445566', 4, 'password4', 'user', 'mariaf'),
('32897431', 5, '$2y$10$6Nz.w1d0KoeLeN9cl.TppunnPdLsKbX3Vi6nOSFQDFZhPVK5bgdTq', 'admin', 'admin2'),
('68329762', 15, '$2y$10$7N3SmB7Ao/.Yn0fQceaQKuRFWLL10t.Dwvq6Cpjx71SlPzfaRejby', 'user', 'usuario1'),
('98765432', 37, 'password5', 'user', 'sofim'),
('22334455', 38, 'password6', 'user', 'luistor'),
('55667788', 39, 'password7', 'user', 'isabelr'),
('99887766', 40, 'password8', 'user', 'diegos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `distrito_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id`, `nombre`, `distrito_id`) VALUES
(1, 'Zona A', 1),
(2, 'Zona B', 1),
(3, 'Zona C', 2),
(4, 'Zona D', 3),
(5, 'Zona E', 5),
(6, 'Zona F', 5),
(7, 'Zona G', 6),
(8, 'Zona H', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `persona_catastro`
--
ALTER TABLE `persona_catastro`
  ADD PRIMARY KEY (`persona_ci`,`catastro_id`),
  ADD KEY `catastro_id` (`catastro_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distrito_id` (`distrito_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catastro`
--
ALTER TABLE `catastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35004;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona_catastro`
--
ALTER TABLE `persona_catastro`
  ADD CONSTRAINT `persona_catastro_ibfk_1` FOREIGN KEY (`persona_ci`) REFERENCES `persona` (`ci`) ON DELETE CASCADE,
  ADD CONSTRAINT `persona_catastro_ibfk_2` FOREIGN KEY (`catastro_id`) REFERENCES `catastro` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `zona_ibfk_1` FOREIGN KEY (`distrito_id`) REFERENCES `distrito` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
