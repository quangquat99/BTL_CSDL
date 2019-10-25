-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 11, 2019 lúc 08:26 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyacclienminh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `acc_lol_chitiet`
--

CREATE TABLE `acc_lol_chitiet` (
  `id_nick_lol` int(11) NOT NULL,
  `ten_dang_nhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_nhan_vat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `so_luong_tuong` int(11) NOT NULL,
  `so_luong_trang_phuc` int(11) NOT NULL,
  `rank` varchar(50) CHARACTER SET utf8 NOT NULL,
  `gia_ban` int(11) NOT NULL,
  `trang_thai` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `acc_lol_chitiet`
--

INSERT INTO `acc_lol_chitiet` (`id_nick_lol`, `ten_dang_nhap`, `mat_khau`, `ten_nhan_vat`, `so_luong_tuong`, `so_luong_trang_phuc`, `rank`, `gia_ban`, `trang_thai`) VALUES
(1, 'quanghehe123', 'matkhau1', 'SKTQuang_Quat', 15, 20, 'bạch kim', 75000, 'chưa bán'),
(2, 'nick_lol_02', 'matkhaulol02', 'nhanvat02', 10, 20, 'bạc', 30000, 'chưa bán'),
(3, 'nick_lol_03', 'matkhaulol03', 'nhanvat03', 30, 50, 'kim cương', 150000, 'chưa bán'),
(4, 'nick_lol_04', 'matkhaulol04', 'nhanvat04', 20, 10, 'bạc', 35000, 'đã bán'),
(5, 'nick_lol_05', 'matkhaulol05', 'nhanvat05', 10, 0, 'đồng', 10000, 'đã bán'),
(6, 'quangthitcho99', 'quangquat123', 'THIT_CHO_10B', 29, 10, 'kim cương', 100000, 'chưa bán'),
(7, 'hello123', 'goodbye456', 'SuperSonicc', 4, 5, 'đồng', 50000, 'chưa bán'),
(9, 'fdsa', 'fdsafdsa', 'fdsafdsafdsafdsafdsa', 500, 32, 'đồng', 50000, 'chưa bán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `SDT`, `Email`) VALUES
(1, 'admin01', 'password_admin01', '0384221001', 'admin01@gmail.com'),
(2, 'admin02', 'password_admin02', '0384221002', 'admin02@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hoa_don` int(50) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `id_nicklol` int(11) NOT NULL,
  `ngay_lap_hoa_don` date NOT NULL,
  `thanh_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id_hoa_don`, `id_admin`, `id_khach_hang`, `id_nicklol`, `ngay_lap_hoa_don`, `thanh_tien`) VALUES
(1, 1, 2, 4, '2019-05-03', 35000),
(2, 2, 3, 5, '2019-05-11', 10000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon_nhapvao`
--

CREATE TABLE `hoadon_nhapvao` (
  `id_hoa_don_nhap_vao` int(50) NOT NULL,
  `id_nick` int(50) NOT NULL,
  `id_admin_mua_vao` int(50) NOT NULL,
  `ngay_nhap_vao` date NOT NULL,
  `gia_tien` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_khach_hang` int(11) NOT NULL,
  `ten_tai_khoan_dang_nhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_khach_hang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int(11) NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Sodu_TK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_khach_hang`, `ten_tai_khoan_dang_nhap`, `mat_khau`, `ten_khach_hang`, `SDT`, `Email`, `Sodu_TK`) VALUES
(2, 'taikhoan02', 'mk02', 'khachhang02', 2, 'khachhang02@gmail.com', 150000),
(3, 'taikhoan03', 'mk03', 'khachhang03', 3, 'khachhang03@gmail.com', 100000),
(4, 'taikhoan04', 'mk04', 'khachhang04', 4, 'khachhang04@gmail.com', 500000),
(5, 'taikhoan05', 'mk05', 'khachhang05', 5, 'khachhang05@gmail.com', 200000),
(9, 'taikhoan06', 'mk06', 'khachhang06', 6, 'khachhang06@gmail.com', 250000),
(11, 'taikhoan08', 'mk08', 'khachhang08', 8, 'khachhang08@gmail.com', 135000),
(16, 'taikhoan09', 'mk09', 'khachhang09', 9, 'khachhang09@gmail.com', 20000),
(17, 'taikhoan10', 'mk10', 'khachhang10', 10, 'khachhang10@gmail.com', 0),
(18, 'taikhoan11', 'mk11', 'khachhang11', 11, 'khachhang11@gmail.com', 10000),
(19, 'fds', 'fdsa', 'fdsa', 16, 'fdsa@gmail.com', 15615),
(20, 'taikhoan090', 'fasfsa', 'khachvip1', 6530150, 'vip@gmail.com', 50000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `acc_lol_chitiet`
--
ALTER TABLE `acc_lol_chitiet`
  ADD PRIMARY KEY (`id_nick_lol`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hoa_don`),
  ADD KEY `fk_id_admin` (`id_admin`),
  ADD KEY `fk_id_khach_hang` (`id_khach_hang`),
  ADD KEY `fk_nicklol` (`id_nicklol`);

--
-- Chỉ mục cho bảng `hoadon_nhapvao`
--
ALTER TABLE `hoadon_nhapvao`
  ADD PRIMARY KEY (`id_hoa_don_nhap_vao`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khach_hang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `acc_lol_chitiet`
--
ALTER TABLE `acc_lol_chitiet`
  MODIFY `id_nick_lol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hoa_don` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoadon_nhapvao`
--
ALTER TABLE `hoadon_nhapvao`
  MODIFY `id_hoa_don_nhap_vao` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_khach_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `fk_id_khach_hang` FOREIGN KEY (`id_khach_hang`) REFERENCES `khachhang` (`id_khach_hang`),
  ADD CONSTRAINT `fk_nicklol` FOREIGN KEY (`id_nicklol`) REFERENCES `acc_lol_chitiet` (`id_nick_lol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
