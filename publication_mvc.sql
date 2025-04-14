-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2025 a las 09:30:04
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
-- Base de datos: `publication_mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ordering` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `filename`, `uploaded_at`, `ordering`) VALUES
(18, 8, 'uploads/gallery/1744599155_44b535793ff5350d3843.png', '2025-04-14 08:52:35', 0),
(19, 8, 'uploads/gallery/1744599163_23f30e954e8f56c5a6f1.jpg', '2025-04-14 08:52:43', 0),
(20, 8, 'uploads/gallery/1744599183_b7e1ddc0cd8d3b889f46.jpg', '2025-04-14 08:53:03', 0),
(21, 8, 'uploads/gallery/1744599197_0560c2f55b21bc72d85b.jpg', '2025-04-14 08:53:17', 0),
(22, 12, 'uploads/gallery/1744599225_fbcd33e4bb207bd1d84f.jpg', '2025-04-14 08:53:45', 0),
(23, 12, 'uploads/gallery/1744599232_aec1e1d390ee3f2abb5e.jpg', '2025-04-14 08:53:52', 0),
(24, 12, 'uploads/gallery/1744599240_bf297e22914accb81796.jpg', '2025-04-14 08:54:00', 0),
(25, 12, 'uploads/gallery/1744599259_94a325a1121cdb3304f7.jpg', '2025-04-14 08:54:19', 0),
(26, 16, 'uploads/gallery/1744599289_ebe0f8e25e1baf914966.jpg', '2025-04-14 08:54:49', 0),
(27, 16, 'uploads/gallery/1744599296_694949fd008c84cbad12.jpg', '2025-04-14 08:54:56', 0),
(28, 16, 'uploads/gallery/1744599305_73bda351275b63746b46.jpg', '2025-04-14 08:55:05', 0),
(29, 19, 'uploads/gallery/1744599347_31a1e3e5dd846aec745d.jpg', '2025-04-14 08:55:47', 0),
(30, 19, 'uploads/gallery/1744599355_af92ac82aa467793039d.jpg', '2025-04-14 08:55:55', 0),
(31, 8, 'uploads/gallery/1744599379_be7b53b4e66254720b27.jpg', '2025-04-14 08:56:19', 0),
(32, 8, 'uploads/gallery/1744599386_008cd93430e5523ad708.jpg', '2025-04-14 08:56:26', 0),
(33, 8, 'uploads/gallery/1744599396_2917756998f8add6d0d2.png', '2025-04-14 08:56:36', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publication`
--

CREATE TABLE `publication` (
  `id` int(10) NOT NULL,
  `user` int(10) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `posted_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publication`
--

INSERT INTO `publication` (`id`, `user`, `content`, `posted_time`) VALUES
(12, 1, '333', '2025-04-08 07:59:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `login` varchar(128) DEFAULT NULL,
  `password` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `login`, `password`) VALUES
(1, 'pedro', 'sanchez', '1234'),
(2, 'maria', 'garcia', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `role`) VALUES
(8, 'Pedro Alvarez Garza', 'pedro@gmail.com', '1234', '2025-04-09 09:12:02', '2025-04-14 08:23:02', 'user'),
(9, 'Joel Tamayo de Anda', 'joel@gmail.com', '12345', '2025-04-09 13:03:45', '2025-04-14 08:23:28', 'admin'),
(12, 'Alex Gerardo', 'alex@gmail.com', '1234', '2025-04-12 14:58:35', '2025-04-14 08:25:35', 'user'),
(16, 'Javier Alberto Guetierrez Hernandez', 'javier@gmail.com', '1234', '2025-04-14 07:55:24', '2025-04-14 08:25:08', 'user'),
(19, 'Alberto Alarcon', 'alberto@gmail.com', '1234', '2025-04-14 08:38:39', '2025-04-14 10:22:49', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
