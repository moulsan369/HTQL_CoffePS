-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 17, 2023 lúc 04:32 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `taobang`
--
CREATE DATABASE IF NOT EXISTS `taobang` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `taobang`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdonorder`
--

CREATE TABLE `ctdonorder` (
  `MaDon` varchar(5) NOT NULL,
  `MaDoUong` varchar(5) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `GhiChu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ctdonorder`
--

INSERT INTO `ctdonorder` (`MaDon`, `MaDoUong`, `Soluong`, `GhiChu`) VALUES
('D0001', 'DU001', 2, ''),
('D0002', 'DU001', 1, ''),
('D0003', 'DO3', 1, ''),
('D0003', 'DU001', 2, 'Không đá');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucdouong`
--

CREATE TABLE `danhmucdouong` (
  `MaDoUong` varchar(5) NOT NULL,
  `TenDoUong` varchar(50) NOT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `LinkAnh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucdouong`
--

INSERT INTO `danhmucdouong` (`MaDoUong`, `TenDoUong`, `DonGia`, `LinkAnh`) VALUES
('DO3', 'Bạc xỉu', 25000, 'Lovepik_com-401324250-coffee-cup6.png'),
('DU001', 'Cà phê đen', 27000, 'Lovepik_com-401324250-coffee-cup1.png'),
('DU002', 'Cà phê sữa', 30000, 'Lovepik_com-401324250-coffee-cup3.png'),
('DU003', 'Caramel', 55000, 'Lovepik_com-401324250-coffee-cup4.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donorder`
--

CREATE TABLE `donorder` (
  `MaDon` varchar(5) NOT NULL,
  `SoBan` varchar(2) NOT NULL,
  `ThoiGianOrder` datetime DEFAULT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donorder`
--

INSERT INTO `donorder` (`MaDon`, `SoBan`, `ThoiGianOrder`, `TrangThai`) VALUES
('D0001', '1', '2023-05-16 02:23:31', 'Chưa chế biến'),
('D0002', '3', '2023-05-16 03:41:55', 'Chưa chế biến'),
('D0003', '1', '2023-05-17 16:27:30', 'Chưa chế biến');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctdonorder`
--
ALTER TABLE `ctdonorder`
  ADD PRIMARY KEY (`MaDon`,`MaDoUong`),
  ADD KEY `MaDoUong` (`MaDoUong`);

--
-- Chỉ mục cho bảng `danhmucdouong`
--
ALTER TABLE `danhmucdouong`
  ADD PRIMARY KEY (`MaDoUong`);

--
-- Chỉ mục cho bảng `donorder`
--
ALTER TABLE `donorder`
  ADD PRIMARY KEY (`MaDon`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctdonorder`
--
ALTER TABLE `ctdonorder`
  ADD CONSTRAINT `ctdonorder_ibfk_1` FOREIGN KEY (`MaDon`) REFERENCES `donorder` (`MaDon`),
  ADD CONSTRAINT `ctdonorder_ibfk_2` FOREIGN KEY (`MaDoUong`) REFERENCES `danhmucdouong` (`MaDoUong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
