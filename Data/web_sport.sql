-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 06, 2024 lúc 03:06 PM
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
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `_id` int(10) NOT NULL,
  `program_id` int(10) NOT NULL,
  `team` varchar(40) NOT NULL,
  `typeEvent` varchar(40) NOT NULL,
  `scheduleType` varchar(40) NOT NULL,
  `location` varchar(40) NOT NULL,
  `startDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `games`
--

CREATE TABLE `games` (
  `_id` int(10) NOT NULL,
  `program_id` int(10) NOT NULL,
  `team1` varchar(40) NOT NULL,
  `team2` varchar(40) NOT NULL,
  `typeGame` varchar(40) NOT NULL,
  `scheduleType` varchar(40) NOT NULL,
  `location` varchar(40) NOT NULL,
  `startDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `team1Score` int(3) NOT NULL,
  `team2Score` int(3) NOT NULL,
  `gameNote` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `members`
--

CREATE TABLE `members` (
  `_id` int(10) NOT NULL,
  `organization_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'PKA_FC', 4, '', 'Dương Nội 2, Yên Nghĩa, Hà Đông, Hà Nội', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `priceoptions`
--

CREATE TABLE `priceoptions` (
  `_id` int(10) NOT NULL,
  `regisRequire_id` int(10) NOT NULL,
  `priceName` varchar(40) NOT NULL,
  `price` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(13, 4, 'PKA_FB', '', '', 'Football', 'League', 0, 0, '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 4, 'No_club', '', '', 'VolleyBall', 'Tounament', 0, 0, '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 4, 'PKA_FC', '', '', 'VolleyBall', 'Tounament', 0, 0, '', '', 0, 0, '', '', '2024-03-02', '07:20', 30, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `registrationrequires`
--

CREATE TABLE `registrationrequires` (
  `_id` int(10) NOT NULL,
  `program_id` int(10) NOT NULL,
  `name_email` tinyint(1) NOT NULL,
  `phone` tinyint(1) NOT NULL,
  `birthday` tinyint(1) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `individualPlayer` tinyint(1) NOT NULL,
  `teamPlayer` tinyint(1) NOT NULL,
  `coach` tinyint(1) NOT NULL,
  `staff` tinyint(1) NOT NULL,
  `individual` tinyint(1) NOT NULL,
  `startDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endDate` date NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `registrationrequires`
--

INSERT INTO `registrationrequires` (`_id`, `program_id`, `name_email`, `phone`, `birthday`, `gender`, `individualPlayer`, `teamPlayer`, `coach`, `staff`, `individual`, `startDate`, `startTime`, `endDate`, `endTime`) VALUES
(3, 18, 1, 1, 0, 1, 1, 1, 0, 0, 0, '2024-03-01', '06:00:00', '2024-03-10', '17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `registrations`
--

CREATE TABLE `registrations` (
  `_id` int(10) NOT NULL,
  `program_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `organization_id` int(10) NOT NULL,
  `role` varchar(40) NOT NULL,
  `team` varchar(40) NOT NULL,
  `priceOption` int(3) NOT NULL,
  `note` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'quanghe203', '33333333', 'Nguyễn Quang Hệ', 'Quanghe2003@gmail.com', '2003-01-25', 'Male', '0377556203', '../Image/IMG_3087.JPG'),
(5, 'Long2024', '2024', 'Hồ Văn Long', 'Long2024@gmail.com', '2024-01-01', 'Female', '012345678', '../Image/profile.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_program_id_event` (`program_id`);

--
-- Chỉ mục cho bảng `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_programid_game` (`program_id`);

--
-- Chỉ mục cho bảng `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_organization_id` (`organization_id`);

--
-- Chỉ mục cho bảng `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_owner` (`owner`);

--
-- Chỉ mục cho bảng `priceoptions`
--
ALTER TABLE `priceoptions`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_regisRequire_id` (`regisRequire_id`);

--
-- Chỉ mục cho bảng `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_organizationid` (`organization_id`);

--
-- Chỉ mục cho bảng `registrationrequires`
--
ALTER TABLE `registrationrequires`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Chỉ mục cho bảng `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_registration_program_id` (`program_id`),
  ADD KEY `fk_res_organization_id` (`organization_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `games`
--
ALTER TABLE `games`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `members`
--
ALTER TABLE `members`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `organizations`
--
ALTER TABLE `organizations`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `priceoptions`
--
ALTER TABLE `priceoptions`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `programs`
--
ALTER TABLE `programs`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `registrationrequires`
--
ALTER TABLE `registrationrequires`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `registrations`
--
ALTER TABLE `registrations`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_program_id_event` FOREIGN KEY (`program_id`) REFERENCES `programs` (`_id`);

--
-- Các ràng buộc cho bảng `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk_programid_game` FOREIGN KEY (`program_id`) REFERENCES `programs` (`_id`);

--
-- Các ràng buộc cho bảng `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `fk_member_id` FOREIGN KEY (`_id`) REFERENCES `users` (`_id`),
  ADD CONSTRAINT `fk_organization_id` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`_id`);

--
-- Các ràng buộc cho bảng `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`owner`) REFERENCES `users` (`_id`);

--
-- Các ràng buộc cho bảng `priceoptions`
--
ALTER TABLE `priceoptions`
  ADD CONSTRAINT `fk_regisRequire_id` FOREIGN KEY (`regisRequire_id`) REFERENCES `registrationrequires` (`_id`);

--
-- Các ràng buộc cho bảng `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `fk_organizationid` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`_id`);

--
-- Các ràng buộc cho bảng `registrationrequires`
--
ALTER TABLE `registrationrequires`
  ADD CONSTRAINT `program_id` FOREIGN KEY (`program_id`) REFERENCES `programs` (`_id`);

--
-- Các ràng buộc cho bảng `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `fk_registration_program_id` FOREIGN KEY (`program_id`) REFERENCES `programs` (`_id`),
  ADD CONSTRAINT `fk_res_organization_id` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
