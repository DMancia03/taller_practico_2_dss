-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-04-2022 a las 17:28:46
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calendar_taller`
--
CREATE DATABASE IF NOT EXISTS `calendar_taller` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `calendar_taller`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `idEvent` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `Description` varchar(45) DEFAULT NULL,
  `Avilable` varchar(1) NOT NULL DEFAULT 's',
  `User_idUser` int(11) NOT NULL,
  PRIMARY KEY (`idEvent`),
  KEY `fk_Event_User_idx` (`User_idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `event`
--

INSERT INTO `event` (`idEvent`, `name`, `StartDate`, `Description`, `Avilable`, `User_idUser`) VALUES
(1, 'Grabar vídeo para taller de DSS', '2022-04-30', 'Tengo que grabar el video expo del segundo ta', 's', 3),
(2, 'Probando', '2022-04-29', 'Hola mundo', 's', 3),
(3, 'Hola mundo!', '2022-05-01', 'Hola', 's', 1),
(4, 'Grabar vídeo para taller de DSS', '2022-04-30', 'Tenemos que grabar el vídeo para el segundo t', 's', 1),
(5, 'Exposición de ADS', '2022-05-03', 'Tenemos que defender nuestra nota de ADS.', 's', 1),
(6, 'Exposición de SPL', '2022-05-06', 'Tenemos que defender nuestro server de Ubuntu', 's', 1),
(7, 'Mi cumpleaños', '2022-04-03', 'Es mi cumpleaños.', 's', 1),
(8, 'Cumpleaños de keñe', '2022-01-04', 'Si todavía puedo decirle feliz cumpleaños.', 's', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `Name`, `LastName`, `Username`, `Password`) VALUES
(1, 'Diego', 'Mancía', 'admin', '$2y$10$cNcc9pbMBalZL4WSMvOikOFwvv0LDwrzhgT1IJnGhKXtzZaR7z2BK'),
(2, 'Probando', 'Registro', 'test', '$2y$10$Hv2NxwMlYEcX7mScXL8TBOu02y4lFKh.VqFbD2In4TJYDRwLNwJEC'),
(3, 'Ana', 'Lisseth', 'test2', '$2y$10$MosAJVPsyTAnoYzjQhkCDejyFpS4W/bcd3uPhxN/6fL5FgCsZErnu'),
(4, 'Keneth', 'Nolasco', 'keñe', '$2y$10$ZB0T9YFzcgt7g0R/aVlxEehMhU57rqOrc7q1psusD0HJbOs/qATAK');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_Event_User` FOREIGN KEY (`User_idUser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
