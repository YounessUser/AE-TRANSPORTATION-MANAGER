-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2018 at 02:59 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionreconciliation`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Art'),
(2, 'PRODUCTION');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` datetime DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `first_name`, `last_name`, `birth_date`, `address`, `cin`, `permit`) VALUES
(1, 'Karim', 'Karim', '2013-02-01 02:04:00', 'Hay Salam', 'EE1235', '12368M'),
(2, 'Youness', 'Yousseefi', '2013-02-01 00:00:00', 'El Massira', 'EF956', '11248L'),
(3, 'Youssef', 'SAKKAL', '2018-08-22 00:00:00', 'Marrakech', 'x23658', '2364');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_reconciliation`
--

CREATE TABLE `fuel_reconciliation` (
  `id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `liters` double NOT NULL,
  `taux_by_liter` double NOT NULL,
  `is_payed` tinyint(1) NOT NULL,
  `amount` double NOT NULL,
  `remarks` longtext COLLATE utf8_unicode_ci,
  `gas_station_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fuel_reconciliation`
--

INSERT INTO `fuel_reconciliation` (`id`, `department_id`, `driver_id`, `date_creation`, `liters`, `taux_by_liter`, `is_payed`, `amount`, `remarks`, `gas_station_id`, `project_id`, `user_id`, `vehicle_id`) VALUES
(1, 1, 1, '2018-08-17 03:04:15', 50, 10.03, 1, 501.5, 'NICE', 1, 1, NULL, 1),
(2, 2, 3, '2018-08-19 17:13:18', 25, 10.03, 1, 250.75, 'well', 1, 2, NULL, 2),
(3, 2, 2, '2018-08-19 22:37:51', 30, 11, 1, 330, 'ok', 1, 1, NULL, 1),
(4, 1, 3, '2018-08-19 22:39:10', 10, 12, 1, 120, 'ok', 1, 1, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gas_station`
--

CREATE TABLE `gas_station` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gas_station`
--

INSERT INTO `gas_station` (`id`, `name`) VALUES
(1, 'Total');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`) VALUES
(1, 'Titanic'),
(2, 'TEST');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `gender` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `gender`, `birth_date`, `country`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'test@example.com', 'test@example.com', 1, NULL, '$2y$13$pf1s91zDkzfOJma0Qs9td.Xs5Lcs4zdhFrtn.KhO/A0uuCL3.k7Dy', '2018-08-20 23:48:51', 'KkazpX-6X3lA3SpV_fakqNujhkkiiwRC4uQClRZN-0Q', '2018-08-18 22:17:13', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `mat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kilometrage` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `mat`, `kilometrage`, `type`, `brand`) VALUES
(1, 'XY-123-A', 12036, 'Toyota', ''),
(2, '139422WW', 1858, 'FLAT', 'MC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_reconciliation`
--
ALTER TABLE `fuel_reconciliation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F2145B1AE80F5DF` (`department_id`),
  ADD KEY `IDX_F2145B1C3423909` (`driver_id`),
  ADD KEY `IDX_F2145B1916BFF50` (`gas_station_id`),
  ADD KEY `IDX_F2145B1166D1F9C` (`project_id`),
  ADD KEY `IDX_F2145B1A76ED395` (`user_id`),
  ADD KEY `IDX_F2145B1545317D1` (`vehicle_id`);

--
-- Indexes for table `gas_station`
--
ALTER TABLE `gas_station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fuel_reconciliation`
--
ALTER TABLE `fuel_reconciliation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gas_station`
--
ALTER TABLE `gas_station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fuel_reconciliation`
--
ALTER TABLE `fuel_reconciliation`
  ADD CONSTRAINT `FK_F2145B1166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `FK_F2145B1545317D1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`),
  ADD CONSTRAINT `FK_F2145B1916BFF50` FOREIGN KEY (`gas_station_id`) REFERENCES `gas_station` (`id`),
  ADD CONSTRAINT `FK_F2145B1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_F2145B1AE80F5DF` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `FK_F2145B1C3423909` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
