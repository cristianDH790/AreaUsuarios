-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2023 a las 22:33:58
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `areausuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `IdBanco` int(11) NOT NULL,
  `NumeroCuenta` text NOT NULL,
  `NombreBanco` text NOT NULL,
  `NombreTitular` text NOT NULL,
  `Saldo` double(10,2) NOT NULL,
  `TipoCuenta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`IdBanco`, `NumeroCuenta`, `NombreBanco`, `NombreTitular`, `Saldo`, `TipoCuenta`) VALUES
(1, '123456789987654321', 'BCP', 'CRISTIAN DE LA CRUZ HUARANCCA', 25.50, 'AHORROS'),
(6, '1223123', 'BBBBB', 'ASDASDADSASD', 0.00, 'AHORROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `Email` text NOT NULL,
  `Contrasena` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `Email`, `Contrasena`) VALUES
(1, 'cd463627@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE `convenios` (
  `IdConvenio` int(11) NOT NULL,
  `NombreInstitucion` text NOT NULL,
  `Decano` text NOT NULL,
  `TextoFirmaDecano` text NOT NULL,
  `DirectorAcademico` text NOT NULL,
  `TextoFirmaDirector` text NOT NULL,
  `Logo` text NOT NULL,
  `FirmaDecano` text NOT NULL,
  `FirmaDirector` text NOT NULL,
  `Sello` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `convenios`
--

INSERT INTO `convenios` (`IdConvenio`, `NombreInstitucion`, `Decano`, `TextoFirmaDecano`, `DirectorAcademico`, `TextoFirmaDirector`, `Logo`, `FirmaDecano`, `FirmaDirector`, `Sello`) VALUES
(1, 'prueba1', 'prueba2', 'prueba3', 'prueba4', 'prueba5', 'WhatsApp Image 2023-12-05 at 5.05.03 PM.jpeg', '406350001_2288713624652881_7034288025796199883_n.png', 'WhatsApp Image 2023-11-13 at 7.39.47 PM.jpeg', 'WhatsApp Image 2023-11-10 at 5.10.05 PM.jpeg'),
(7, 'asd', 'asd', 'asd', 'asd', 'asd', 'pato.jpg', 'jake.png', 'moto.png', 'fin.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `IdEstado` int(10) NOT NULL,
  `Estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`IdEstado`, `Estado`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `IdRol` int(10) NOT NULL,
  `Rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`IdRol`, `Rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'VENTA'),
(3, 'VALIDADOR'),
(4, 'CLIENTE\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuarios` int(10) NOT NULL,
  `Dni` text NOT NULL,
  `ApellidoPaterno` text NOT NULL,
  `ApellidoMaterno` text NOT NULL,
  `Nombre` text NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Email` text NOT NULL,
  `EmailEnvio` text NOT NULL,
  `IdRol` int(11) DEFAULT NULL,
  `IdEstado` int(11) DEFAULT NULL,
  `Contrasena` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuarios`, `Dni`, `ApellidoPaterno`, `ApellidoMaterno`, `Nombre`, `Telefono`, `Email`, `EmailEnvio`, `IdRol`, `IdEstado`, `Contrasena`) VALUES
(1, '73042638', 'DE LA CRUZ      ', 'HUARANCCA', 'CRISTIAN', 965191168, 'luisito_619_@hotmail.com', 'luisito_619_@hotmail.com', 1, 1, '73042638'),
(2, '123456789', 'perez', 'quispe', 'jorge', 990410400, 'cd463627@gmail.com', 'cd463627@gmail.com', 4, 1, '123456789'),
(3, '45698744', 'DE LA CRUZ        ', 'HUARANCCA', 'WILDER', 987654321, 'wilder@hotmail.com', 'wilder@hotmail.com', 3, 2, '123456789');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`IdBanco`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`IdConvenio`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`IdEstado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuarios`),
  ADD UNIQUE KEY `Dni` (`Dni`) USING HASH,
  ADD KEY `Usuario-Rol` (`IdRol`),
  ADD KEY `Usuario-Estado` (`IdEstado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `IdBanco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `convenios`
--
ALTER TABLE `convenios`
  MODIFY `IdConvenio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `IdEstado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `IdRol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuarios` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `Usuario-Estado` FOREIGN KEY (`IdEstado`) REFERENCES `estado` (`IdEstado`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Usuario-Rol` FOREIGN KEY (`IdRol`) REFERENCES `rol` (`IdRol`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
