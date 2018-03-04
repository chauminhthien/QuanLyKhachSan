-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 05:49 PM
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nameKhongDau` varchar(50) NOT NULL,
  `ngaysinh` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text,
  `gioitinh` int(2) NOT NULL DEFAULT '0',
  `cmnd` text NOT NULL,
  `remove` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `nameKhongDau`, `ngaysinh`, `phone`, `email`, `diachi`, `gioitinh`, `cmnd`, `remove`) VALUES
(1, 'Châu Minh Thiện', 'chau-minh-thien', '01.01', '0963501008', 'minhthien1305@gmail.com', '572 luỹ bán bích', 1, '123456', 0),
(2, 'Ai My Tran', 'ai-my-tran', '11/11/2011', '(011) 111-1111', 'chauminhthien0212@gmail.com', NULL, 0, '0125852', 0);

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
(3, 'lầu 3', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `id` int(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `nameKhongDau` varchar(50) DEFAULT NULL,
  `st` int(3) NOT NULL DEFAULT '0',
  `remove` int(2) NOT NULL DEFAULT '0',
  `gia` int(255) DEFAULT NULL,
  `idHangPhong` int(255) DEFAULT NULL,
  `idLau` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`id`, `name`, `nameKhongDau`, `st`, `remove`, `gia`, `idHangPhong`, `idLau`) VALUES
(1, '101', '101', 0, 0, 150000, 1, 1),
(2, 'A101', 'a101', 0, 0, 150000, 1, 2),
(3, 'test xoá', 'test-xoa', 0, 0, 150000, 1, 1),
(4, 'Minh Thiện', 'minh-thien', 0, 0, 1500000, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `id` int(255) NOT NULL,
  `name` varchar(90) NOT NULL,
  `url` text NOT NULL,
  `remove` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`id`, `name`, `url`, `remove`) VALUES
(1, 'Dashboard', 'dashboard', 0),
(2, 'Quản lý nhân viên', 'cate/employees/view/danh-sach-nhan-vien.html', 0),
(3, 'test xoa', 'ascasca', 1);

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remove` int(2) NOT NULL DEFAULT '0',
  `quyen` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nameKhongDau`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `remove`, `quyen`) VALUES
(1, 'Châu Minh Thiện', 'chau-minh-thien', 'chauminhthien0212@gmail.com', '$2y$10$limtzCE7nM7jIm7peZh07uEHQrh8VnOYJ3RManFOQbwWQJRk6ut/C', 'jDpdLHFU5gKkw7T6FXY9zD9e268AY306hcgMGAwRlqMAYysUZ95WQSrfh8iQ', '2018-03-03 02:57:52', '2018-02-27 07:50:42', 0, '1'),
(2, 'Minh Thiện', 'minh-thien', 'minhthien1305@gmail.com', '$2y$10$limtzCE7nM7jIm7peZh07uEHQrh8VnOYJ3RManFOQbwWQJRk6ut/C', '6XUl36TYN6GjanPndKosL6gkdni6lDPztsxVcNE2f41vpdAheU1gei4zdr6z', '2018-03-04 08:09:59', '2018-03-04 01:09:59', 0, '1,2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hangphong`
--
ALTER TABLE `hangphong`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `infokhachsan`
--
ALTER TABLE `infokhachsan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lau`
--
ALTER TABLE `lau`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
