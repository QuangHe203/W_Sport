-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 23, 2024 lúc 10:21 AM
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
-- Cơ sở dữ liệu: `web_sport`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `organizations`
--

CREATE TABLE `organizations` (
  `_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `owner` int(10) NOT NULL,
  `tagline` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `publish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `organizations`
--

INSERT INTO `organizations` (`_id`, `name`, `owner`, `tagline`, `description`, `publish`) VALUES
(1, 'PKA_FC', 4, '', 'Ha Noi, Viet Nam', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_owner` (`owner`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `organizations`
--
ALTER TABLE `organizations`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`owner`) REFERENCES `users` (`_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
