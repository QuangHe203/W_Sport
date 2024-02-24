-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2024 lúc 10:57 AM
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `programs`
--

CREATE TABLE `programs` (
  `_id` int(10) NOT NULL,
  `organization_id` int(10) NOT NULL,
  `title` varchar(40) NOT NULL,
  `subTitle` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `sport` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `openRegister` tinyint(1) NOT NULL,
  `teams` varchar(40) NOT NULL,
  `groups` varchar(40) NOT NULL,
  `publicGame` tinyint(1) NOT NULL,
  `publicEvent` tinyint(1) NOT NULL,
  `regisRequire` varchar(40) NOT NULL,
  `location` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `dailyStart` varchar(40) NOT NULL,
  `duration` int(10) NOT NULL,
  `dailyMatch` int(10) NOT NULL,
  `createdAT` datetime NOT NULL,
  `updateAT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `programs`
--

INSERT INTO `programs` (`_id`, `organization_id`, `title`, `subTitle`, `description`, `sport`, `type`, `public`, `openRegister`, `teams`, `groups`, `publicGame`, `publicEvent`, `regisRequire`, `location`, `startDate`, `dailyStart`, `duration`, `dailyMatch`, `createdAT`, `updateAT`) VALUES
(1, 0, 'FirstProgram', '', '', 'VolleyBall', 'Tounament', 0, 0, '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `_id` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `avatar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`_id`, `username`, `password`, `name`, `email`, `birthday`, `gender`, `phone`, `avatar`) VALUES
(1, '', '', '', '', '', '', '', ''),
(2, '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', ''),
(4, 'quanghe203', '33333333', 'Nguyễn Quang Hệ', 'Quanghe2003@gmail.com', '2003-01-25', 'Male', '0377556203', '../Image/Screenshot (80).png'),
(5, 'Long2024', '2024', 'Hồ Văn Long', 'Long2024@gmail.com', '2024-01-01', 'Female', '012345678', '../Image/profile.jpg');

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
-- Chỉ mục cho bảng `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `organizations`
--
ALTER TABLE `organizations`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `programs`
--
ALTER TABLE `programs`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
