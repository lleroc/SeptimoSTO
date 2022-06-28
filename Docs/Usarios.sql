-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 28-06-2022 a las 01:25:13
-- Versión del servidor: 5.7.34
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `Septimo_STO`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `Usuarios_Id` int(11) NOT NULL,
  `Usuarios_Nombres` text NOT NULL,
  `Usuarios_Apellidos` text NOT NULL,
  `Usuarios_Correo` text NOT NULL,
  `Usuarios_Contrasenia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`Usuarios_Id`, `Usuarios_Nombres`, `Usuarios_Apellidos`, `Usuarios_Correo`, `Usuarios_Contrasenia`) VALUES
(1, 'Luis', 'Llerena', 'lleroc1@gmail.com', '123'),
(2, 'otro', 'usuario', 'otro@gmail.com', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`Usuarios_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `Usuarios_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
