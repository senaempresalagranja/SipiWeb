-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2018 a las 01:27:56
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sipiweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_Area` bigint(20) NOT NULL,
  `Nombre_Unidad` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_Area`, `Nombre_Unidad`) VALUES
(7, 'Agricola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

CREATE TABLE `elemento` (
  `id_Elemento` bigint(20) NOT NULL,
  `Nombre_Elemento` varchar(30) NOT NULL,
  `Nombre_Comercial` varchar(60) NOT NULL,
  `Id_Empaque` bigint(20) NOT NULL,
  `id_unidad_medida` bigint(25) NOT NULL,
  `valor_Elemento` double NOT NULL,
  `Tipo_Materia_Prima` varchar(25) NOT NULL,
  `Existencia` double NOT NULL,
  `stock` int(11) NOT NULL,
  `Costo_Promedio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `elemento`
--

INSERT INTO `elemento` (`id_Elemento`, `Nombre_Elemento`, `Nombre_Comercial`, `Id_Empaque`, `id_unidad_medida`, `valor_Elemento`, `Tipo_Materia_Prima`, `Existencia`, `stock`, `Costo_Promedio`) VALUES
(1, 'Maiz', 'Mazorca', 1, 1, 2000, 'Materia Prima', 0, 2, 0),
(2, 'Pasto', 'Hierba Verde', 1, 1, 1000, 'Materia Prima', 0, 1000, 0),
(3, 'Arrox', 'Granudi', 1, 1, 123, 'Insumo', 0, 10, 0),
(4, 'Leche', 'Lechita', 1, 1, 4, 'Materia Prima', 0, 4, 0),
(5, 'Harina', 'Harinita', 2, 2, 1, 'Materia Prima', 0, 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empaques`
--

CREATE TABLE `empaques` (
  `Id_Empaque` bigint(20) NOT NULL,
  `Empaque` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empaques`
--

INSERT INTO `empaques` (`Id_Empaque`, `Empaque`) VALUES
(1, 'SACO'),
(2, 'CANECA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loteproduccion`
--

CREATE TABLE `loteproduccion` (
  `id_Lote_Produccion` bigint(20) NOT NULL,
  `id_Pedido_Producto` bigint(20) NOT NULL,
  `Fecha_Produccion` datetime NOT NULL,
  `Cantidad` double NOT NULL,
  `Fecha_Vencimiento` datetime DEFAULT NULL,
  `Estado` varchar(30) NOT NULL,
  `Fecha_Finalizada` datetime DEFAULT NULL,
  `id_Usuario` bigint(20) NOT NULL,
  `Observacion` varchar(25) DEFAULT NULL,
  `Responsable` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `loteproduccion`
--

INSERT INTO `loteproduccion` (`id_Lote_Produccion`, `id_Pedido_Producto`, `Fecha_Produccion`, `Cantidad`, `Fecha_Vencimiento`, `Estado`, `Fecha_Finalizada`, `id_Usuario`, `Observacion`, `Responsable`) VALUES
(1, 2, '2018-08-30 18:24:21', 1, NULL, 'Terminado', NULL, 1, NULL, NULL),
(2, 1, '2018-08-30 18:24:35', 1, NULL, 'Terminado', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loteproduccion_elemento`
--

CREATE TABLE `loteproduccion_elemento` (
  `id_Lote_Produccion_Elemento` bigint(20) NOT NULL,
  `id_Lote_Produccion` bigint(20) NOT NULL,
  `id_Elemento` bigint(20) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Cantidad` double NOT NULL,
  `Id_Unidad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `loteproduccion_elemento`
--

INSERT INTO `loteproduccion_elemento` (`id_Lote_Produccion_Elemento`, `id_Lote_Produccion`, `id_Elemento`, `Fecha`, `Cantidad`, `Id_Unidad`) VALUES
(1, 1, 5, '2018-08-30 18:24:21', 1, 2),
(2, 1, 2, '2018-08-30 18:24:21', 1, 1),
(3, 1, 4, '2018-08-30 18:24:21', 1, 1),
(4, 1, 3, '2018-08-30 18:24:21', 1, 1),
(5, 1, 1, '2018-08-30 18:24:21', 1, 1),
(6, 2, 5, '2018-08-30 18:24:36', 4, 2),
(7, 2, 3, '2018-08-30 18:24:36', 4, 1),
(8, 2, 4, '2018-08-30 18:24:36', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `id_Novedades` bigint(20) NOT NULL,
  `id_Elemento` bigint(20) DEFAULT NULL,
  `id_Producto` bigint(20) DEFAULT NULL,
  `id_Tipo_Novedad` bigint(20) NOT NULL,
  `Fecha_Novedad` datetime NOT NULL,
  `Valor_Novedad` double DEFAULT NULL,
  `Cantidad` float NOT NULL,
  `Id_Unidad` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`id_Novedades`, `id_Elemento`, `id_Producto`, `id_Tipo_Novedad`, `Fecha_Novedad`, `Valor_Novedad`, `Cantidad`, `Id_Unidad`) VALUES
(11, 1, NULL, 1, '2018-08-20 11:15:03', 0, 0, 0),
(12, 2, NULL, 1, '2018-08-20 11:37:01', 0, 0, 0),
(13, 3, NULL, 1, '2018-08-20 18:58:46', 0, 0, 0),
(14, 4, NULL, 1, '2018-08-22 14:50:36', 0, 0, 0),
(15, 5, 0, 1, '2018-08-22 14:50:55', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_Pedido` bigint(20) NOT NULL,
  `id_Unidad` bigint(20) NOT NULL,
  `Estado_Pedido` varchar(25) NOT NULL,
  `Total_Pedido` double NOT NULL,
  `Fecha_Pedido` datetime NOT NULL,
  `Id_Usuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_Pedido`, `id_Unidad`, `Estado_Pedido`, `Total_Pedido`, `Fecha_Pedido`, `Id_Usuario`) VALUES
(1, 6, 'Terminado', 0, '2018-08-30 18:23:40', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `id_Pedido_Producto` bigint(20) NOT NULL,
  `id_Pedido` bigint(20) NOT NULL,
  `id_Producto` bigint(20) NOT NULL,
  `Unidad_Medida` bigint(20) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Cantidad` double NOT NULL,
  `Valor_Producto` double NOT NULL,
  `Estado` varchar(40) NOT NULL DEFAULT 'Registrado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`id_Pedido_Producto`, `id_Pedido`, `id_Producto`, `Unidad_Medida`, `Fecha`, `Cantidad`, `Valor_Producto`, `Estado`) VALUES
(1, 1, 3, 1, '2018-08-30 18:23:40', 1, 0, 'Terminado'),
(2, 1, 6, 1, '2018-08-30 18:23:40', 1, 0, 'Terminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_Producto` bigint(20) NOT NULL,
  `id_Unidad` bigint(20) NOT NULL,
  `Nombre_Producto` varchar(30) NOT NULL,
  `id_Empaque` bigint(20) NOT NULL,
  `Precio_venta` double NOT NULL,
  `id_Unidad_Medida` bigint(20) NOT NULL,
  `Cantidad_Empaque` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_Producto`, `id_Unidad`, `Nombre_Producto`, `id_Empaque`, `Precio_venta`, `id_Unidad_Medida`, `Cantidad_Empaque`) VALUES
(1, 6, 'Concentrado de Iniciacion', 1, 4000, 1, 50),
(2, 6, 'Concetrado de Levante', 1, 50000, 1, 50),
(3, 6, 'Concentrado de Crianza', 2, 4000, 1, 50),
(4, 6, 'Concentrado para enfermos', 1, 4000, 2, 5000),
(5, 7, 'iniciacion', 1, 1000, 1, 50),
(6, 6, 'Concentrado de Cura', 1, 5000, 1, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_elemento`
--

CREATE TABLE `producto_elemento` (
  `id_Producto_Elemento` bigint(20) NOT NULL,
  `id_Producto` bigint(20) NOT NULL,
  `id_Elemento` bigint(20) NOT NULL,
  `Cantidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto_elemento`
--

INSERT INTO `producto_elemento` (`id_Producto_Elemento`, `id_Producto`, `id_Elemento`, `Cantidad`) VALUES
(1, 1, 2, 5),
(2, 1, 1, 5),
(3, 2, 2, 5),
(4, 2, 1, 5),
(5, 3, 3, 4),
(6, 3, 4, 4),
(7, 3, 5, 4),
(8, 4, 3, 4),
(9, 4, 5, 4),
(10, 4, 4, 4),
(11, 5, 5, 1),
(12, 5, 4, 1),
(13, 5, 3, 1),
(14, 6, 3, 1),
(15, 6, 4, 1),
(16, 6, 2, 1),
(17, 6, 1, 1),
(18, 6, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_novedad`
--

CREATE TABLE `tip_novedad` (
  `Id_Tip_Novedad` bigint(20) NOT NULL,
  `Nombre_Novedad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tip_novedad`
--

INSERT INTO `tip_novedad` (`Id_Tip_Novedad`, `Nombre_Novedad`) VALUES
(1, 'Entradas'),
(2, 'Salidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traslado`
--

CREATE TABLE `traslado` (
  `id_Traslado` bigint(20) NOT NULL,
  `id_Unidad` bigint(20) NOT NULL,
  `id_Pedido` bigint(20) NOT NULL,
  `Fecha_Traslado` datetime NOT NULL,
  `id_Elemento` bigint(20) NOT NULL,
  `id_Producto` bigint(20) NOT NULL,
  `Catidad` double NOT NULL,
  `Responsable` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id_Unidad` bigint(20) NOT NULL,
  `Nombre_Unidad` varchar(30) NOT NULL,
  `id_Area` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id_Unidad`, `Nombre_Unidad`, `id_Area`) VALUES
(6, 'Pollos', 7),
(7, 'Peces', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `Id_Unidad` bigint(20) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Unidad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`Id_Unidad`, `Codigo`, `Unidad`) VALUES
(1, 123, 'Kilogramos'),
(2, 1234, 'Gramo'),
(3, 123456, 'Bulto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` bigint(20) NOT NULL,
  `Nombre_Usuario` varchar(30) NOT NULL,
  `Usuario` varchar(60) NOT NULL,
  `Rol` varchar(16) NOT NULL,
  `Contrasena` varchar(200) NOT NULL,
  `Activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Nombre_Usuario`, `Usuario`, `Rol`, `Contrasena`, `Activo`) VALUES
(1, 'Luisa Cardoso', 'lulu', 'Administrador', 'fc3707fa908df1e82e30ecbdae3d094804a8f87d', 0),
(2, 'Katerine Rodriguez', 'katerine', 'Administrador', 'fc3707fa908df1e82e30ecbdae3d094804a8f87d', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_Area`);

--
-- Indices de la tabla `elemento`
--
ALTER TABLE `elemento`
  ADD PRIMARY KEY (`id_Elemento`);

--
-- Indices de la tabla `empaques`
--
ALTER TABLE `empaques`
  ADD PRIMARY KEY (`Id_Empaque`);

--
-- Indices de la tabla `loteproduccion`
--
ALTER TABLE `loteproduccion`
  ADD PRIMARY KEY (`id_Lote_Produccion`);

--
-- Indices de la tabla `loteproduccion_elemento`
--
ALTER TABLE `loteproduccion_elemento`
  ADD PRIMARY KEY (`id_Lote_Produccion_Elemento`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`id_Novedades`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_Pedido`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`id_Pedido_Producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_Producto`);

--
-- Indices de la tabla `producto_elemento`
--
ALTER TABLE `producto_elemento`
  ADD PRIMARY KEY (`id_Producto_Elemento`);

--
-- Indices de la tabla `tip_novedad`
--
ALTER TABLE `tip_novedad`
  ADD PRIMARY KEY (`Id_Tip_Novedad`);

--
-- Indices de la tabla `traslado`
--
ALTER TABLE `traslado`
  ADD PRIMARY KEY (`id_Traslado`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id_Unidad`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`Id_Unidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_Area` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `elemento`
--
ALTER TABLE `elemento`
  MODIFY `id_Elemento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empaques`
--
ALTER TABLE `empaques`
  MODIFY `Id_Empaque` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `loteproduccion`
--
ALTER TABLE `loteproduccion`
  MODIFY `id_Lote_Produccion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `loteproduccion_elemento`
--
ALTER TABLE `loteproduccion_elemento`
  MODIFY `id_Lote_Produccion_Elemento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `id_Novedades` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_Pedido` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  MODIFY `id_Pedido_Producto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_Producto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto_elemento`
--
ALTER TABLE `producto_elemento`
  MODIFY `id_Producto_Elemento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tip_novedad`
--
ALTER TABLE `tip_novedad`
  MODIFY `Id_Tip_Novedad` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `traslado`
--
ALTER TABLE `traslado`
  MODIFY `id_Traslado` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id_Unidad` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `Id_Unidad` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
