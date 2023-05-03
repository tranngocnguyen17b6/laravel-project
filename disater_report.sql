-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 27, 2023 lúc 09:14 AM
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
-- Cơ sở dữ liệu: `disater_report`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `name_address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`address_id`, `name_address`) VALUES
(1, 'ThaiBinh'),
(2, 'Hanoi'),
(3, 'NamDinh'),
(4, 'HaiPhong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `permision` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `password`, `permision`) VALUES
(1, '1234', 'a'),
(2, '9999', 'b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_title` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `answer_title`, `created_at`, `updated_at`) VALUES
(359, 203, NULL, '2023-04-25 06:34:24', '2023-04-25 06:34:24'),
(360, 204, NULL, '2023-04-25 06:34:29', '2023-04-25 06:34:29'),
(367, 202, '123123', '2023-04-25 15:15:53', '2023-04-25 15:15:53'),
(368, 202, '123123', '2023-04-25 15:15:53', '2023-04-25 15:15:53'),
(369, 202, '123213', '2023-04-25 15:15:53', '2023-04-25 15:15:53'),
(370, 202, '12312312', '2023-04-25 15:15:53', '2023-04-25 15:15:53'),
(371, 202, '312312', '2023-04-25 15:15:53', '2023-04-25 15:15:53'),
(372, 202, '3213123', '2023-04-25 15:15:53', '2023-04-25 15:15:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `disater_category`
--

CREATE TABLE `disater_category` (
  `disater_id` int(11) NOT NULL,
  `disater_tiltle` varchar(250) NOT NULL,
  `disater_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `disater_category`
--

INSERT INTO `disater_category` (`disater_id`, `disater_tiltle`, `disater_status`, `created_at`, `updated_at`) VALUES
(24, 'asdssssds', 0, '2023-04-27 06:07:19', '2023-04-27 06:07:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `disater_question`
--

CREATE TABLE `disater_question` (
  `id_disater_question` int(11) NOT NULL,
  `disater_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `num_row` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `disater_question`
--

INSERT INTO `disater_question` (`id_disater_question`, `disater_id`, `question_id`, `num_row`, `created_at`, `updated_at`) VALUES
(18, 21, 199, NULL, '2023-04-27 05:01:31', '2023-04-27 05:01:31'),
(19, 21, 200, NULL, '2023-04-27 05:01:31', '2023-04-27 05:01:31'),
(20, 21, 202, NULL, '2023-04-27 05:01:31', '2023-04-27 05:01:31'),
(21, 22, 200, NULL, '2023-04-27 06:04:43', '2023-04-27 06:04:43'),
(22, 22, 201, NULL, '2023-04-27 06:04:43', '2023-04-27 06:04:43'),
(23, 22, 202, NULL, '2023-04-27 06:04:43', '2023-04-27 06:04:43'),
(24, 23, 199, NULL, '2023-04-27 06:05:45', '2023-04-27 06:05:45'),
(25, 23, 200, NULL, '2023-04-27 06:05:45', '2023-04-27 06:05:45'),
(26, 24, 201, NULL, '2023-04-27 06:07:19', '2023-04-27 06:07:19'),
(27, 24, 202, NULL, '2023-04-27 06:07:19', '2023-04-27 06:07:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `picture_report`
--

CREATE TABLE `picture_report` (
  `report_id` int(11) NOT NULL,
  `picture_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question_title` varchar(250) NOT NULL,
  `question_typeof` varchar(250) NOT NULL,
  `question_duress` int(11) NOT NULL DEFAULT 1,
  `question_status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`question_id`, `question_title`, `question_typeof`, `question_duress`, `question_status`, `created_at`, `updated_at`) VALUES
(201, 'e234234234', 'form', 0, 0, '2023-04-25 15:16:51', '2023-04-25 15:16:51'),
(202, 'nguyentran', 'checkbox', 0, 1, '2023-04-25 15:15:52', '2023-04-25 15:15:52'),
(203, '123423123', 'form', 0, 0, '2023-04-25 06:34:24', '2023-04-25 06:34:24'),
(204, '12323123133', 'form', 0, 0, '2023-04-25 06:34:29', '2023-04-25 06:34:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `disater_id` int(11) NOT NULL,
  `report_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `report_comment` varchar(400) NOT NULL,
  `position_name` varchar(250) NOT NULL,
  `position_person` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `report`
--

INSERT INTO `report` (`report_id`, `school_id`, `disater_id`, `report_date`, `report_comment`, `position_name`, `position_person`) VALUES
(1, 1, 1, '2023-04-14 08:02:49', 'abc', 'director', 'nguyen'),
(2, 0, 0, '2023-04-14 08:02:49', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report_answer`
--

CREATE TABLE `report_answer` (
  `report_answer_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `answer_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `school_name` varchar(250) NOT NULL,
  `school_phone` varchar(11) NOT NULL,
  `school_mail` varchar(250) NOT NULL,
  `school_note` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `school`
--

INSERT INTO `school` (`school_id`, `address_id`, `school_name`, `school_phone`, `school_mail`, `school_note`) VALUES
(1, 1, 'thpt abc', '1223312', 'aaa@gmail.com', 'nothing'),
(2, 1, 'thpt adb', '1234343', 'bbb@gmail.com', 'everything'),
(3, 2, 'thcs ann', '223112', 'bcs@gmail.com', 'hello world'),
(4, 1, 'thcssss', '1235232312', 'kkk@gmail.com', 'under world');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Chỉ mục cho bảng `disater_category`
--
ALTER TABLE `disater_category`
  ADD PRIMARY KEY (`disater_id`);

--
-- Chỉ mục cho bảng `disater_question`
--
ALTER TABLE `disater_question`
  ADD PRIMARY KEY (`id_disater_question`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Chỉ mục cho bảng `report_answer`
--
ALTER TABLE `report_answer`
  ADD PRIMARY KEY (`report_answer_id`);

--
-- Chỉ mục cho bảng `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=409;

--
-- AUTO_INCREMENT cho bảng `disater_category`
--
ALTER TABLE `disater_category`
  MODIFY `disater_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `disater_question`
--
ALTER TABLE `disater_question`
  MODIFY `id_disater_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `report_answer`
--
ALTER TABLE `report_answer`
  MODIFY `report_answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
