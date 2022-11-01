-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 02:17 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `ACTIVATED` tinyint(1) NOT NULL,
  `SECURITY_CODE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `PASSWORD`, `EMAIL`, `ACTIVATED`, `SECURITY_CODE`) VALUES
(32, 'amany', '123456', 'amany123@gmail.com', 1, '5d65111387c1b17fac134381618c437f'),
(33, 'rayan', '123456', 'rayan@gmail.com', 1, 'e4f47c1a8e6314694ad67c9fa1f5d17f'),
(35, 'Amora Goda', '123456', 'amora@gmail.com', 1, '3450ef159f176a9d0561a22af7cea181'),
(38, 'alaa', '123456', 'alaa@gmail.com', 1, '0e7894f5e8d08b174a1bfbc28a050e5d'),
(40, 'hamzaa', 'e10adc3949ba59abbe56e057f20f883e', 'hamza@gmail.com', 1, '9bd1fcc627001458ea88c8742e61c692'),
(41, 'mariam', 'e10adc3949ba59abbe56e057f20f883e', 'mariam@gmail.com', 1, '338a9c48d600ee2fc9f8630911c7dea1'),
(84, 'abeer', 'e10adc3949ba59abbe56e057f20f883e', 'abeer@gmail.com', 0, '3cdd7a84796f0bcca4bbef4e18014a89');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
