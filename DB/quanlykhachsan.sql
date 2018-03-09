-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 05:20 PM
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
-- Table structure for table `danhsachdatphong`
--

CREATE TABLE `danhsachdatphong` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `cmnd` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tgianden` int(255) DEFAULT NULL,
  `tgiandi` int(255) DEFAULT NULL,
  `idPhong` int(255) DEFAULT NULL,
  `pthucthanhtoan` varchar(10) DEFAULT NULL,
  `tientratruoc` int(255) NOT NULL DEFAULT '0',
  `remove` int(2) NOT NULL DEFAULT '0',
  `st` int(2) NOT NULL DEFAULT '0',
  `phongdoi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhsachdatphong`
--

INSERT INTO `danhsachdatphong` (`id`, `name`, `cmnd`, `phone`, `email`, `tgianden`, `tgiandi`, `idPhong`, `pthucthanhtoan`, `tientratruoc`, `remove`, `st`, `phongdoi`) VALUES
(3, 'Châu Minh Thiện', '572 luy ban bich', '7273842858', 'chauminhthien0212@gmail.com', 1520587649, 1520587668, 1, 'Tiền Mặt', 0, 0, 1, NULL),
(4, 'Minh Thiện', '0168227093', '01682273829', 'minhthien1305@gmail.com', 1520590835, NULL, 2, 'Tiền Mặt', 0, 0, 0, NULL);

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
  `idLau` int(255) DEFAULT NULL,
  `isU` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`id`, `name`, `nameKhongDau`, `st`, `remove`, `gia`, `idHangPhong`, `idLau`, `isU`) VALUES
(1, '101', '101', 0, 0, 150000, 1, 1, 0),
(2, 'A101', 'a101', 0, 0, 150000, 1, 2, 1),
(3, 'test xoá', 'test-xoa', 0, 0, 150000, 1, 1, 0),
(4, 'Minh Thiện', 'minh-thien', 0, 0, 1500000, 3, 2, 0);

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
(3, 'test xoa', 'ascasca', 1),
(4, 'Sơ Đồ Phòng', 'phong/so-do-phong.html', 0),
(5, 'Danh Sách Đặt Phòng', 'cate/dat-phong/danh-sach.html', 0),
(6, 'Đặt Phòng có trước', 'phong/dat-phong', 0),
(7, 'Danh Sách Nhân Viên', 'cate/employees/view/danh-sach-nhan-vien.html', 0),
(8, 'Thêm Mới Nhân Viên', 'cate/employees/add/nhan-vien.html', 0),
(9, 'Xem thông tin cá nhân', 'user/profile', 0),
(10, 'Phân Quyền Nhân Viên', 'cate/employees/phan-quyen', 0),
(11, 'Xoá Nhân Viên', 'cate/employees/del', 0),
(12, 'Danh Sách Khách Hàng', 'cate/customer/view/danh-sach-khach-hang.html', 0),
(13, 'Thêm Mới Khách Hàng', 'cate/customer/add/khach-hang.html', 0),
(14, 'Chỉnh sửa khách Hàng', 'cate/customer/edit', 0),
(15, 'Xoá Khách Hàng', 'cate/customer/del', 0),
(16, 'Thêm Quyền Mới', 'setting/quyen/them-quyen-moi.html', 0),
(17, 'Danh Sách Quyền', 'setting/quyen/view/danh-sach.html', 0),
(18, 'Chỉnh sửa quyền', 'setting/quyen/edit', 0),
(19, 'Danh Sách Đặt Phòng', 'cate/phong/view/danh-sach-phong.html', 0),
(20, 'Chi tiết đặt phòng', 'cate/dat-phong/chi-tiet', 0),
(21, 'Đặt phòng mới', 'cate/dat-phong/dat-phong-moi.html', 0),
(22, 'Chỉ sửa phòng', 'cate/phong/edit', 0),
(23, 'Thêm Phòng Mới', 'cate/phong/add/them-phong.html', 0),
(24, 'Xoá phòng', 'cate/phong/del', 0),
(25, 'Cập Nhật Thông Tin Khách Sạn', 'setting/info/thong-tin-khach-san.html', 0),
(26, 'Danh Sách Hạng Phòng', 'setting/hang-phong/view/hang-phong.html', 0),
(27, 'Thêm Hạng Phòng', 'setting/hang-phong/add/hang-phong.html', 0),
(28, 'Chỉnh Sửa Hạng Phòng', 'setting/hang-phong/edit', 0),
(29, 'Xoá Hạng Phòng', 'setting/hang-phong/del', 0),
(30, 'Danh Sách Lầu', 'setting/lau/view/tang-lau.html', 0),
(31, 'Thêm Lầu Mới', 'setting/lau/add/tang-lau.html', 0),
(32, 'Chỉnh sửa lầu', 'setting/lau/edit/', 0),
(33, 'Xoá Lầu', 'setting/lau/del', 0),
(34, 'In Hoá Đơn', 'cate/dat-phong/in', 0),
(35, 'Trả Phòng', 'cate/dat-phong/thanh-toan', 0),
(36, 'Xem Thống Kê Đặt Phòng', 'thong-ke/thong-ke-dat-phong.html', 0),
(37, 'Xem Thống Kê Doanh Thu', 'thong-ke/thong-ke-doanh-thu.html', 0);

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
(1, 'Châu Minh Thiện', 'chau-minh-thien', 'chauminhthien0212@gmail.com', '$2y$10$limtzCE7nM7jIm7peZh07uEHQrh8VnOYJ3RManFOQbwWQJRk6ut/C', 'cQzWQbKPWJtwJUNWgTGou8IdmYP0Inl466XTPslO29n8SrOQERrRI6AUCyuF', '2018-03-09 16:01:01', '2018-02-27 07:50:42', 0, '1,2,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37'),
(2, 'Minh Thiện', 'minh-thien', 'minhthien1305@gmail.com', '$2y$10$limtzCE7nM7jIm7peZh07uEHQrh8VnOYJ3RManFOQbwWQJRk6ut/C', '6XUl36TYN6GjanPndKosL6gkdni6lDPztsxVcNE2f41vpdAheU1gei4zdr6z', '2018-03-07 04:04:55', '2018-03-06 21:04:55', 0, '1,2,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhsachdatphong`
--
ALTER TABLE `danhsachdatphong`
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
-- AUTO_INCREMENT for table `danhsachdatphong`
--
ALTER TABLE `danhsachdatphong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
