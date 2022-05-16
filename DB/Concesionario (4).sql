-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-05-2022 a las 16:20:15
-- Versión del servidor: 10.5.15-MariaDB-1:10.5.15+maria~focal
-- Versión de PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Concesionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(1) NOT NULL,
  `brand_name` varchar(20) DEFAULT NULL,
  `brand_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`id_brand`, `brand_name`, `brand_img`) VALUES
(1, 'Mercedes', 'view/img/brands_img/mercedes_logo.png'),
(2, 'Audi', 'view/img/brands_img/audi_logo.png'),
(3, 'BMW', 'view/img/brands_img/bmw_logo.png'),
(4, 'Lamborguini', 'view/img/brands_img/lamborguini_logo.png'),
(5, 'porsche', 'view/img/brands_img/porsche_logo.png'),
(6, 'Tesla', 'view/img/brands_img/tesla_logo.png'),
(7, 'Volkswagen', 'view/img/brands_img/volkswagen_logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `matricula` varchar(7) DEFAULT NULL,
  `numBastidor` varchar(17) DEFAULT NULL,
  `id_brand` int(1) DEFAULT NULL,
  `id_model` int(1) DEFAULT NULL,
  `id_category` int(1) DEFAULT NULL,
  `id_setting` int(2) DEFAULT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `kilometres` int(10) DEFAULT NULL,
  `caballos` int(4) DEFAULT NULL,
  `puertas` int(1) DEFAULT NULL,
  `id_type` int(1) DEFAULT NULL,
  `extras` varchar(20) DEFAULT NULL,
  `color` varchar(9) DEFAULT NULL,
  `img_car` varchar(100) NOT NULL,
  `province` varchar(15) DEFAULT NULL,
  `town` varchar(15) DEFAULT NULL,
  `lat` varchar(50) NOT NULL,
  `lon` varchar(50) NOT NULL,
  `price` int(7) DEFAULT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cars`
--

INSERT INTO `cars` (`id`, `matricula`, `numBastidor`, `id_brand`, `id_model`, `id_category`, `id_setting`, `fecha`, `kilometres`, `caballos`, `puertas`, `id_type`, `extras`, `color`, `img_car`, `province`, `town`, `lat`, `lon`, `price`, `count`) VALUES
(1, '1234ABC', '1234567894561456l', 1, 2, 2, 1, '15/02/2020', 20000, 50, 5, 1, '1', 'negro', 'view/img/allCarsImg/coche_electrico.jpg', 'Valencia', 'Cofrentes', '39.2325946093136', '-1.0625292741041974', 12000, 22),
(2, '1234ABC', '1234567894561456l', 4, 2, 2, 2, '15/02/2020', 19000, 50, 5, 1, '1', 'negro', 'view/img/allCarsImg/coche_nuevo.jpg', 'Valencia', 'Gandia', '38.965790086261464', '-0.1835195344823781', 11000, 160),
(3, '1234ABC', '1234567894561456l', 1, 2, 2, 1, '15/02/2020', 25000, 50, 5, 1, '1', 'negro', 'view/img/allCarsImg/coche_electrico.jpg', 'Valencia', 'Alcoy', '38.702161244174036', '-0.44994994801531973', 10000, 12),
(4, '1234ABC', '1234567894561456l', 2, 1, 1, 2, '15/02/2020', 17000, 50, 5, 2, '1', 'negro', 'view/img/allCarsImg/coche_electrico.jpg', 'Murcia', 'Murcia', '37.99276531994364', '-1.1028070314844134', 10000, 64);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(11) DEFAULT NULL,
  `category_img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`, `category_img`) VALUES
(1, 'Km0', 'view/img/categories_img/km0.jpg'),
(2, 'Nuevo', 'view/img/categories_img/nuevos.jpeg'),
(3, 'Segundamano', 'view/img/categories_img/segundamano.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Exceptions`
--

CREATE TABLE `Exceptions` (
  `id` int(11) NOT NULL,
  `Exception` varchar(3) NOT NULL,
  `TimeException` varchar(10) NOT NULL,
  `Error` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `id_img` int(11) DEFAULT NULL,
  `img_car` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `img`
--

INSERT INTO `img` (`id`, `id_img`, `img_car`) VALUES
(3, 1, 'view/img/allCarsImg/coche_electrico.jpg'),
(4, 1, 'view/img/allCarsImg/coche_nuevo.jpg'),
(5, 2, 'view/img/allCarsImg/coche_electrico.jpg'),
(6, 2, 'view/img/allCarsImg/coche_electrico.jpg'),
(7, 3, 'view/img/allCarsImg/coche_electrico.jpg'),
(8, 3, 'view/img/allCarsImg/coche_electrico.jpg'),
(9, 4, 'view/img/allCarsImg/coche_electrico.jpg'),
(10, 4, 'view/img/allCarsImg/coche_electrico.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id_like`, `id_vehiculo`, `id_usuario`) VALUES
(105, 1, 1),
(106, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model`
--

CREATE TABLE `model` (
  `id_model` int(11) NOT NULL,
  `model_name` varchar(10) DEFAULT NULL,
  `model_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `model`
--

INSERT INTO `model` (`id_model`, `model_name`, `model_img`) VALUES
(1, 'A1', 'view/img/allCarsImg/coche_electrico.jpg'),
(2, 'Mustang', 'view/img/allCarsImg/coche_nuevo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `setting_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `setting`
--

INSERT INTO `setting` (`id_setting`, `setting_name`) VALUES
(1, 'Manual'),
(2, 'Automatico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `type_name` varchar(10) DEFAULT NULL,
  `type_img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `type`
--

INSERT INTO `type` (`id_type`, `type_name`, `type_img`) VALUES
(1, 'Gasolina', 'view/img/type_img/coche_gasolina.jpg'),
(2, 'Hibrido', 'view/img/type_img/coche_diesel.jpg'),
(3, 'Electrico', 'view/img/type_img/coche_electrico.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(50) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password_user` varchar(100) DEFAULT NULL,
  `email_user` varchar(30) DEFAULT NULL,
  `type_user` varchar(30) DEFAULT NULL,
  `avatar_user` varchar(100) DEFAULT NULL,
  `token_email` varchar(200) DEFAULT NULL,
  `activate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `username`, `password_user`, `email_user`, `type_user`, `avatar_user`, `token_email`, `activate`) VALUES
(1, 'admin', '$2y$06$ktCy1KiCTm7ntXKJyroMnO2Npuv9/u9ZJFqFFwqc/NmfITKswGUze', 'admin@gmail.com', 'admin', 'https://robohash.org/75d23af433e0cea4c0e45a56dba18b30', '', 1),
(109, 'Joan Ferrero Montiel', NULL, 'joan1daw@gmail.com', 'client', NULL, NULL, 1),
(110, 'JoanFerrero', '$2y$06$5/2VjbjOiM4N4XYiCruB4u6bb.xpt6vbsyL41Vzt3MY0IRfA6lQQi', 'joan1smx@gmail.com', 'client', 'https://robohash.org/b53eae30ad1ae77e171b87a20c1189d3', '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indices de la tabla `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_model` (`id_model`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_setting` (`id_setting`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `Exceptions`
--
ALTER TABLE `Exceptions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_img` (`id_img`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_model`);

--
-- Indices de la tabla `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indices de la tabla `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Exceptions`
--
ALTER TABLE `Exceptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4608;

--
-- AUTO_INCREMENT de la tabla `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `model`
--
ALTER TABLE `model`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`),
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`id_model`) REFERENCES `model` (`id_model`),
  ADD CONSTRAINT `cars_ibfk_3` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`),
  ADD CONSTRAINT `cars_ibfk_4` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`),
  ADD CONSTRAINT `cars_ibfk_5` FOREIGN KEY (`id_setting`) REFERENCES `setting` (`id_setting`);

--
-- Filtros para la tabla `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `cars` (`id`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
