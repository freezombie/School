-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26.02.2018 klo 18:04
-- Palvelimen versio: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `programmer_query`
--
CREATE DATABASE IF NOT EXISTS `programmer_query` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `programmer_query`;

-- --------------------------------------------------------

--
-- Rakenne taululle `programmer_data`
--

CREATE TABLE `programmer_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `age` tinyint(3) UNSIGNED NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `experience_years` tinyint(4) NOT NULL,
  `programming` tinyint(4) NOT NULL,
  `web_frontend` tinyint(4) NOT NULL,
  `web_backend` tinyint(4) NOT NULL,
  `mobile_native` tinyint(4) NOT NULL,
  `mobile_hybrid` tinyint(4) NOT NULL,
  `relational_database` tinyint(4) NOT NULL,
  `nosql_database` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vedos taulusta `programmer_data`
--

INSERT INTO `programmer_data` (`id`, `age`, `gender`, `experience_years`, `programming`, `web_frontend`, `web_backend`, `mobile_native`, `mobile_hybrid`, `relational_database`, `nosql_database`) VALUES
(1, 15, 0, 0, 1, 1, 1, 1, 1, 1, 1),
(2, 65, 0, 50, 5, 5, 5, 5, 5, 5, 5),
(3, 32, 0, 10, 3, 3, 3, 3, 3, 3, 3),
(4, 27, 0, 6, 4, 4, 3, 1, 5, 3, 1),
(5, 21, 1, 3, 3, 4, 2, 1, 2, 4, 2),
(6, 24, 2, 5, 5, 5, 4, 5, 2, 4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `programmer_data`
--
ALTER TABLE `programmer_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `programmer_data`
--
ALTER TABLE `programmer_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
