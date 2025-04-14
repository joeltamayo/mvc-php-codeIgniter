-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2025 a las 00:16:37
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
(5, 12, 'uploads/gallery/1744491430_68876c87cc98d068d185.jpg', '2025-04-13 02:57:10', 0),
(10, 9, 'uploads/gallery/1744494227_81cae82006cc7d91866e.png', '2025-04-13 03:43:47', 0),
(11, 9, 'uploads/gallery/1744494316_08aff668dec84e474b9d.jpg', '2025-04-13 03:45:16', 0);

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
(8, 'pedro 2.1', 'pedro@gmail.com', '1234', '2025-04-09 09:12:02', '2025-04-12 16:43:26', 'user'),
(9, 'joel tamayo 2', 'joel@gmail.com', '12345', '2025-04-09 13:03:45', '2025-04-12 16:51:37', 'admin'),
(10, 'juan', 'juan@gmail.com', 'juan123', '2025-04-09 13:17:53', '2025-04-09 13:17:53', 'user'),
(11, 'pablo 2', 'pablo@gmail.com', '1234', '2025-04-12 14:57:24', '2025-04-12 14:57:40', 'admin'),
(12, 'sancho 2', 'sancho@gmail.com', '1234', '2025-04-12 14:58:35', '2025-04-12 16:44:00', 'user');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
