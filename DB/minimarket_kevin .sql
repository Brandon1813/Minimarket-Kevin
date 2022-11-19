-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2022 a las 03:39:22
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `minimarket_kevin`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_inventario` (IN `Salida` VARCHAR(20))   BEGIN
     SELECT * FROM inventario WHERE  Inv_Salida = Salida;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_productos` ()   BEGIN
     SELECT * FROM Productos;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ListarProductos` ()   SELECT a.ProPrecio, a.ProNombre
FROM productos a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ListarVentas` ()   SELECT a.Ven_Total, a.Ven_Fecha
FROM ventas a$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriainv`
--

CREATE TABLE `categoriainv` (
  `categoria_id` int(7) NOT NULL,
  `categoria_nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `categoria_ubicacion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad_proveedores`
--

CREATE TABLE `ciudad_proveedores` (
  `ProvNombre` varchar(15) NOT NULL,
  `ProvCalle` varchar(10) NOT NULL,
  `ProvNumero` int(11) NOT NULL,
  `ProvBarrio` varchar(20) NOT NULL,
  `ProvCiudad_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `CliID` int(11) NOT NULL,
  `CliPrimerNombre` varchar(15) NOT NULL,
  `CliSegundoNombre` varchar(15) DEFAULT NULL,
  `CliPrimerApellido` varchar(15) NOT NULL,
  `CliSegundoApellido` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correocliente`
--

CREATE TABLE `correocliente` (
  `CorCli_ID` int(11) NOT NULL,
  `CorEmail` varchar(25) NOT NULL,
  `CorEmail2` varchar(25) DEFAULT NULL,
  `CliCor_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `Inv_Codigo_Producto` int(11) NOT NULL,
  `Inv_Entrada` varchar(20) NOT NULL,
  `Inv_Salida` varchar(20) NOT NULL,
  `Inv_FechaIngreso` date NOT NULL,
  `Inv_Stock` int(11) NOT NULL,
  `usuarioID` int(11) DEFAULT NULL,
  `IDPro_Inventario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoinv`
--

CREATE TABLE `productoinv` (
  `producto_id` int(20) NOT NULL,
  `producto_codigo` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `producto_nombre` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `producto_precio` decimal(30,2) NOT NULL,
  `producto_stock` int(25) NOT NULL,
  `producto_foto` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `categoria_id` int(7) NOT NULL,
  `usuario_id` int(10) NOT NULL,
  `producto_activo` tinyint(4) DEFAULT NULL,
  `producto_descripcion` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_proveedores`
--

CREATE TABLE `productos_proveedores` (
  `ProProv_ID` int(11) NOT NULL,
  `ProductosID_FK` int(11) DEFAULT NULL,
  `ProveedoresID_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `ProvRut` int(11) NOT NULL,
  `ProvNombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonocliente`
--

CREATE TABLE `telefonocliente` (
  `TelCli_ID` int(11) NOT NULL,
  `TelNumero1` int(11) NOT NULL,
  `TelNumero2` int(11) DEFAULT NULL,
  `CliTel_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonoproveedor`
--

CREATE TABLE `telefonoproveedor` (
  `TelPro_ID` int(11) NOT NULL,
  `TelNumero1` int(11) NOT NULL,
  `TelNumero2` int(11) DEFAULT NULL,
  `ProTel_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(11) NOT NULL,
  `nombre_completo` varchar(70) NOT NULL,
  `usuario_apellido` varchar(50) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioinv`
--

CREATE TABLE `usuarioinv` (
  `usuario_id` int(10) NOT NULL,
  `usuario_nombre` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_apellido` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_clave` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_email` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(11) NOT NULL,
  `Ven_Nombre` varchar(30) NOT NULL,
  `Ven_Fecha` varchar(30) NOT NULL,
  `Ven_Total` int(11) NOT NULL,
  `UsuVen_ID` int(11) DEFAULT NULL,
  `CliVenta_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_productos`
--

CREATE TABLE `ventas_productos` (
  `VenPro_ID` int(11) NOT NULL,
  `VenCantidad` int(11) NOT NULL,
  `VentValorUnitario` decimal(12,2) NOT NULL,
  `VenTotal` decimal(12,2) NOT NULL,
  `VentasID_FK` int(11) DEFAULT NULL,
  `Productos_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriainv`
--
ALTER TABLE `categoriainv`
  ADD PRIMARY KEY (`categoria_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `ciudad_proveedores`
--
ALTER TABLE `ciudad_proveedores`
  ADD PRIMARY KEY (`ProvNombre`),
  ADD KEY `ProvCiudad_FK` (`ProvCiudad_FK`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`CliID`);

--
-- Indices de la tabla `correocliente`
--
ALTER TABLE `correocliente`
  ADD PRIMARY KEY (`CorCli_ID`),
  ADD UNIQUE KEY `CorEmail` (`CorEmail`),
  ADD UNIQUE KEY `CorEmail2` (`CorEmail2`),
  ADD KEY `CliCor_FK` (`CliCor_FK`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`Inv_Codigo_Producto`),
  ADD KEY `usuarioID` (`usuarioID`),
  ADD KEY `IDPro_Inventario` (`IDPro_Inventario`);

--
-- Indices de la tabla `productoinv`
--
ALTER TABLE `productoinv`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `id_categoria` (`categoria_id`,`usuario_id`) USING BTREE;

--
-- Indices de la tabla `productos_proveedores`
--
ALTER TABLE `productos_proveedores`
  ADD PRIMARY KEY (`ProProv_ID`),
  ADD KEY `ProductosID_FK` (`ProductosID_FK`),
  ADD KEY `ProveedoresID_FK` (`ProveedoresID_FK`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ProvRut`);

--
-- Indices de la tabla `telefonocliente`
--
ALTER TABLE `telefonocliente`
  ADD PRIMARY KEY (`TelCli_ID`),
  ADD KEY `CliTel_FK` (`CliTel_FK`);

--
-- Indices de la tabla `telefonoproveedor`
--
ALTER TABLE `telefonoproveedor`
  ADD PRIMARY KEY (`TelPro_ID`),
  ADD KEY `ProTel_FK` (`ProTel_FK`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- Indices de la tabla `usuarioinv`
--
ALTER TABLE `usuarioinv`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UsuVen_ID` (`UsuVen_ID`),
  ADD KEY `CliVenta_ID` (`CliVenta_ID`);

--
-- Indices de la tabla `ventas_productos`
--
ALTER TABLE `ventas_productos`
  ADD PRIMARY KEY (`VenPro_ID`),
  ADD KEY `VentasID_FK` (`VentasID_FK`),
  ADD KEY `Productos_FK` (`Productos_FK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriainv`
--
ALTER TABLE `categoriainv`
  MODIFY `categoria_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `CliID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `correocliente`
--
ALTER TABLE `correocliente`
  MODIFY `CorCli_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `Inv_Codigo_Producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productoinv`
--
ALTER TABLE `productoinv`
  MODIFY `producto_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos_proveedores`
--
ALTER TABLE `productos_proveedores`
  MODIFY `ProProv_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ProvRut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefonocliente`
--
ALTER TABLE `telefonocliente`
  MODIFY `TelCli_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefonoproveedor`
--
ALTER TABLE `telefonoproveedor`
  MODIFY `TelPro_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarioinv`
--
ALTER TABLE `usuarioinv`
  MODIFY `usuario_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ventas_productos`
--
ALTER TABLE `ventas_productos`
  MODIFY `VenPro_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad_proveedores`
--
ALTER TABLE `ciudad_proveedores`
  ADD CONSTRAINT `ciudad_proveedores_ibfk_1` FOREIGN KEY (`ProvCiudad_FK`) REFERENCES `proveedores` (`ProvRut`);

--
-- Filtros para la tabla `correocliente`
--
ALTER TABLE `correocliente`
  ADD CONSTRAINT `correocliente_ibfk_1` FOREIGN KEY (`CliCor_FK`) REFERENCES `clientes` (`CliID`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`usuarioID`) REFERENCES `usuario` (`ID_usuario`),
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`IDPro_Inventario`) REFERENCES `inventario` (`Inv_Codigo_Producto`);

--
-- Filtros para la tabla `productoinv`
--
ALTER TABLE `productoinv`
  ADD CONSTRAINT `productoinv_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarioinv` (`usuario_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_proveedores`
--
ALTER TABLE `productos_proveedores`
  ADD CONSTRAINT `productos_proveedores_ibfk_1` FOREIGN KEY (`ProductosID_FK`) REFERENCES `productoinv` (`producto_id`);

ALTER TABLE `productos_proveedores`
  ADD CONSTRAINT `productos_proveedores_ibfk_2` FOREIGN KEY (`ProveedoresID_FK`) REFERENCES `proveedores` (`ProvRut`);

--
-- Filtros para la tabla `telefonocliente`
--
ALTER TABLE `telefonocliente`
  ADD CONSTRAINT `telefonocliente_ibfk_1` FOREIGN KEY (`CliTel_FK`) REFERENCES `clientes` (`CliID`);

--
-- Filtros para la tabla `telefonoproveedor`
--
ALTER TABLE `telefonoproveedor`
  ADD CONSTRAINT `telefonoproveedor_ibfk_1` FOREIGN KEY (`ProTel_FK`) REFERENCES `proveedores` (`ProvRut`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`UsuVen_ID`) REFERENCES `usuario` (`ID_usuario`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`CliVenta_ID`) REFERENCES `clientes` (`CliID`);

--
-- Filtros para la tabla `ventas_productos`
--
ALTER TABLE `ventas_productos`
  ADD CONSTRAINT `ventas_productos_ibfk_1` FOREIGN KEY (`VentasID_FK`) REFERENCES `ventas` (`ID`);

ALTER TABLE `ventas_productos`
  ADD CONSTRAINT `ventas_productos_ibfk_2` FOREIGN KEY (`Productos_FK`) REFERENCES `productoinv` (`producto_id`);
COMMIT;

--
-- Volcado de datos para la tabla `usuarioinv`
--

INSERT INTO `usuarioinv` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_usuario`, `usuario_clave`, `usuario_email`) VALUES
(1, 'Administrador', 'Principal', 'Administrador', '$2y$10$EPY9LSLOFLDDBriuJICmFOqmZdnDXxLJG8YFbog5LcExp77DBQvgC', ''),
(2, 'Brandon', 'Viveros', 'Admin1', '$2y$10$se.HthW462f/AvKZGA.NHOej9Gpmzs.BIGiqOYkDbRaTZVzfOUxhW', 'brandon18@gmail.com');

--
-- Volcado de datos para la tabla `categoriainv`
--

INSERT INTO `categoriainv` (`categoria_id`, `categoria_nombre`, `categoria_ubicacion`) VALUES
(4, 'abarrotes', 'fila 1'),
(5, 'Frutas', 'Fila1');

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `nombre_completo`, `usuario_apellido`, `correo`, `usuario`, `contrasena`) VALUES
(1, 'Administrador', 'Principal', 'admin18@gmail.com', 'Administrador', '$2y$10$EPY9LSLOFLDDBriuJICmFOqmZdnDXxLJG8YFbog5LcE'),
(5, 'yeison garcia', '', 'yeison123@gmail.com', 'yeison12', '123'),
(6, 'Brandon Viveros', '', 'brandon18@gmail.com', 'Brandon18', 'Brandon1813'),
(7, 'Leo', '', 'leo123@gmail.com', 'leo4040', '123456'),
(10, 'Administrador', 'Principal', '', 'Administrador', 'BrandonAlexis1813');

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID`, `Ven_Nombre`, `Ven_Fecha`, `Ven_Total`, `UsuVen_ID`, `CliVenta_ID`) VALUES
(11, 'Atun', '2022-06-28', 9000, NULL, NULL),
(12, 'Cerveza', '2019-02-28', 25000, NULL, NULL),
(13, 'papa', '2022-02-01', 117300, NULL, NULL),
(14, 'Vino', '2022-06-05', 900000, NULL, NULL),
(15, 'leche', '2022-02-08', 249200, NULL, NULL),
(16, 'frijoles', '2022-06-15', 60000, NULL, NULL);

--
-- Volcado de datos para la tabla `ventas_productos`
--

INSERT INTO `ventas_productos` (`VenPro_ID`, `VenCantidad`, `VentValorUnitario`, `VenTotal`, `VentasID_FK`, `Productos_FK`) VALUES
(1, 5, '1800.00', '9000.00', NULL, NULL),
(2, 10, '2500.00', '25000.00', NULL, NULL),
(3, 89, '2800.00', '249200.00', NULL, NULL),
(4, 30, '30000.00', '900000.00', NULL, NULL),
(5, 15, '4000.00', '60000.00', NULL, NULL),
(6, 51, '2300.00', '117300.00', NULL, NULL),
(7, 20, '1800.00', '36000.00', NULL, NULL);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
