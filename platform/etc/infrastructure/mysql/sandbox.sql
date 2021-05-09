-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 09-05-2021 a las 21:09:33
-- Versión del servidor: 5.5.43
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sandbox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
                           `id` int(11) NOT NULL,
                           `country_id` int(11) DEFAULT NULL,
                           `vat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
                           `id` int(11) NOT NULL,
                           `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crop`
--

CREATE TABLE `crop` (
                        `id` int(11) NOT NULL,
                        `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
                                               `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
                                               `executed_at` datetime DEFAULT NULL,
                                               `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210509173146', '2021-05-09 17:34:55', 67),
('DoctrineMigrations\\Version20210509192700', '2021-05-09 19:27:07', 87),
('DoctrineMigrations\\Version20210509195717', '2021-05-09 19:57:22', 96),
('DoctrineMigrations\\Version20210509200258', '2021-05-09 20:03:02', 69),
('DoctrineMigrations\\Version20210509200438', '2021-05-09 20:04:42', 77),
('DoctrineMigrations\\Version20210509201147', '2021-05-09 20:11:52', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gang`
--

CREATE TABLE `gang` (
                        `id` int(11) NOT NULL,
                        `user_id` int(11) DEFAULT NULL,
                        `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_offer`
--

CREATE TABLE `job_offer` (
                             `id` int(11) NOT NULL,
                             `company_id` int(11) DEFAULT NULL,
                             `user_id` int(11) DEFAULT NULL,
                             `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                             `vacancies` int(11) NOT NULL DEFAULT '0',
                             `publication_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
                             `job_start_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
                             `job_end_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_offer_crop`
--

CREATE TABLE `job_offer_crop` (
                                  `job_offer_id` int(11) NOT NULL,
                                  `crop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_offer_machinery`
--

CREATE TABLE `job_offer_machinery` (
                                       `job_offer_id` int(11) NOT NULL,
                                       `machinery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `machinery`
--

CREATE TABLE `machinery` (
                             `id` int(11) NOT NULL,
                             `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
                        `id` int(11) NOT NULL,
                        `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
                        `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `company_id` int(11) DEFAULT NULL,
                        `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `roles`, `password`, `company_id`, `deleted`) VALUES
(1, 'user@user.com', 'user@user.com', 'user@user.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$k1Yyy8FXo9EOtQLGLuZsmg$0Va6zkh4VE2UDbv6pUpsJEWpi6J/YZ/orAX5EGbtj+Q', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_crop`
--

CREATE TABLE `user_crop` (
                             `user_id` int(11) NOT NULL,
                             `crop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_gang`
--

CREATE TABLE `user_gang` (
                             `user_id` int(11) NOT NULL,
                             `gang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_machinery`
--

CREATE TABLE `user_machinery` (
                                  `user_id` int(11) NOT NULL,
                                  `machinery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4FBF094F84B32233` (`vat`),
  ADD KEY `IDX_4FBF094FF92F3E70` (`country_id`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5373C96677153098` (`code`);

--
-- Indices de la tabla `crop`
--
ALTER TABLE `crop`
    ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
    ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `gang`
--
ALTER TABLE `gang`
    ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E6080363A76ED395` (`user_id`);

--
-- Indices de la tabla `job_offer`
--
ALTER TABLE `job_offer`
    ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_288A3A4E979B1AD6` (`company_id`),
  ADD KEY `IDX_288A3A4EA76ED395` (`user_id`);

--
-- Indices de la tabla `job_offer_crop`
--
ALTER TABLE `job_offer_crop`
    ADD PRIMARY KEY (`job_offer_id`,`crop_id`),
  ADD KEY `IDX_794D83913481D195` (`job_offer_id`),
  ADD KEY `IDX_794D8391888579EE` (`crop_id`);

--
-- Indices de la tabla `job_offer_machinery`
--
ALTER TABLE `job_offer_machinery`
    ADD PRIMARY KEY (`job_offer_id`,`machinery_id`),
  ADD KEY `IDX_74D375B73481D195` (`job_offer_id`),
  ADD KEY `IDX_74D375B7C1282CE4` (`machinery_id`);

--
-- Indices de la tabla `machinery`
--
ALTER TABLE `machinery`
    ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD KEY `IDX_8D93D649979B1AD6` (`company_id`);

--
-- Indices de la tabla `user_crop`
--
ALTER TABLE `user_crop`
    ADD PRIMARY KEY (`user_id`,`crop_id`),
  ADD KEY `IDX_97437152A76ED395` (`user_id`),
  ADD KEY `IDX_97437152888579EE` (`crop_id`);

--
-- Indices de la tabla `user_gang`
--
ALTER TABLE `user_gang`
    ADD PRIMARY KEY (`user_id`,`gang_id`),
  ADD KEY `IDX_9C894FAAA76ED395` (`user_id`),
  ADD KEY `IDX_9C894FAA9266B5E` (`gang_id`);

--
-- Indices de la tabla `user_machinery`
--
ALTER TABLE `user_machinery`
    ADD PRIMARY KEY (`user_id`,`machinery_id`),
  ADD KEY `IDX_3C6ACAF8A76ED395` (`user_id`),
  ADD KEY `IDX_3C6ACAF8C1282CE4` (`machinery_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `crop`
--
ALTER TABLE `crop`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gang`
--
ALTER TABLE `gang`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `job_offer`
--
ALTER TABLE `job_offer`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `machinery`
--
ALTER TABLE `machinery`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `company`
--
ALTER TABLE `company`
    ADD CONSTRAINT `FK_4FBF094FF92F3E70` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Filtros para la tabla `gang`
--
ALTER TABLE `gang`
    ADD CONSTRAINT `FK_E6080363A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `job_offer`
--
ALTER TABLE `job_offer`
    ADD CONSTRAINT `FK_288A3A4E979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `FK_288A3A4EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `job_offer_crop`
--
ALTER TABLE `job_offer_crop`
    ADD CONSTRAINT `FK_794D8391888579EE` FOREIGN KEY (`crop_id`) REFERENCES `crop` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_794D83913481D195` FOREIGN KEY (`job_offer_id`) REFERENCES `job_offer` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `job_offer_machinery`
--
ALTER TABLE `job_offer_machinery`
    ADD CONSTRAINT `FK_74D375B7C1282CE4` FOREIGN KEY (`machinery_id`) REFERENCES `machinery` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_74D375B73481D195` FOREIGN KEY (`job_offer_id`) REFERENCES `job_offer` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
    ADD CONSTRAINT `FK_8D93D649979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Filtros para la tabla `user_crop`
--
ALTER TABLE `user_crop`
    ADD CONSTRAINT `FK_97437152888579EE` FOREIGN KEY (`crop_id`) REFERENCES `crop` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_97437152A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_gang`
--
ALTER TABLE `user_gang`
    ADD CONSTRAINT `FK_9C894FAA9266B5E` FOREIGN KEY (`gang_id`) REFERENCES `gang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9C894FAAA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_machinery`
--
ALTER TABLE `user_machinery`
    ADD CONSTRAINT `FK_3C6ACAF8C1282CE4` FOREIGN KEY (`machinery_id`) REFERENCES `machinery` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3C6ACAF8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
