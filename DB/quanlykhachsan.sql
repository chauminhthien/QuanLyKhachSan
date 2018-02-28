-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2018 at 05:57 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlykhachsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `hangphong`
--

CREATE TABLE `hangphong` (
  `id` int(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hangphong`
--

INSERT INTO `hangphong` (`id`, `name`, `gia`) VALUES
(1, 'Thường', '150000'),
(2, 'Hạng 2', '200000'),
(3, 'Hạng 3', '1500000');

-- --------------------------------------------------------

--
-- Table structure for table `infokhachsan`
--

CREATE TABLE `infokhachsan` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(13) DEFAULT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `infokhachsan`
--

INSERT INTO `infokhachsan` (`id`, `name`, `email`, `phone`, `fax`, `address`) VALUES
(1, 'Châu Minh Thiện', 'chauminhthien0212@gmail.com', '(0168) 227-3829', NULL, '572 Luỹ Bán Bích');

-- --------------------------------------------------------

--
-- Table structure for table `lau`
--

CREATE TABLE `lau` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `vitri` text,
  `mota` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lau`
--

INSERT INTO `lau` (`id`, `name`, `vitri`, `mota`) VALUES
(1, 'Lầu 1', NULL, NULL),
(2, 'Lầu 2', NULL, NULL),
(3, 'lầu 3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `nameKhongDau` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `remember_token` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nameKhongDau`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Châu Minh Thiện', 'chau-minh-thien', 'chauminhthien0212@gmail.com', '$2y$10$limtzCE7nM7jIm7peZh07uEHQrh8VnOYJ3RManFOQbwWQJRk6ut/C', 'WLHU94k5ndFsj3em7lqoevzVOoPvO7azZJBKxua65Rk6dEhww7EboffIFECB', '2018-02-28 14:54:45', '2018-02-27 07:50:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hangphong`
--
ALTER TABLE `hangphong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infokhachsan`
--
ALTER TABLE `infokhachsan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lau`
--
ALTER TABLE `lau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hangphong`
--
ALTER TABLE `hangphong`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `infokhachsan`
--
ALTER TABLE `infokhachsan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lau`
--
ALTER TABLE `lau`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
