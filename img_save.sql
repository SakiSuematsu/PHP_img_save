-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 19 日 14:36
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `img_save`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(250) NOT NULL,
  `user_name` varchar(124) NOT NULL,
  `memo` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `images`
--

INSERT INTO `images` (`id`, `img_name`, `user_name`, `memo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '35579254663c945336bab29.14121823.JPG', 'momo_love', 'baby_momo', '2023-01-19 22:27:15', '2023-01-19 22:27:15', NULL),
(2, '5526506563c9454487f344.64572154.JPG', 'momo_love', 'ももねんね', '2023-01-19 22:27:32', '2023-01-19 22:27:32', NULL),
(3, '171629846363c945539d3768.41467965.JPG', 'momo_love', 'ももふせ', '2023-01-19 22:27:47', '2023-01-19 22:27:47', NULL),
(4, '29743592663c94567a18612.29755474.JPG', 'momo_love', 'momo_sitdown', '2023-01-19 22:28:07', '2023-01-19 22:28:07', '2023-01-19 22:31:23'),
(5, '117357490963c946a2439fe7.27272183.JPG', 'momo_love', 'long_momo', '2023-01-19 22:32:41', '2023-01-19 22:33:22', NULL),
(6, '161000525863c946b32323f7.87529333.JPG', 'momo_love', 'momomo', '2023-01-19 22:33:39', '2023-01-19 22:33:39', NULL),
(7, '163953572263c946d74fbd01.87594166.JPG', 'momo_love', 'ももも', '2023-01-19 22:34:15', '2023-01-19 22:34:15', NULL),
(8, '424629963c946edc4fd74.60954153.JPG', 'momo_love', 'momo in box', '2023-01-19 22:34:37', '2023-01-19 22:34:37', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(124) NOT NULL,
  `mail` varchar(124) NOT NULL,
  `pass` varchar(124) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `mail`, `pass`, `is_admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'momo_love', 'momo_love@momo', '$2y$10$GB9dnR.Quz9ymAtRG3aSduTzu7boJZKDka9mUpP6djpEqFeSmXig6', 0, '2023-01-19 00:27:29', '2023-01-19 00:27:29', NULL),
(2, 'momo_love_admin', 'momo_love_admin@momo', '123450$GB9dnR.Quz9ymAtRG3aSduTzu7boJZKDka9mUpP6djpEqFeSmXig6', 1, '2023-01-19 00:27:29', '2023-01-19 00:27:29', NULL),
(3, '刀剣', 'touken@t_love', '$2y$10$2.5GayEaN/PWU0.sRMB1KOXTtiCtP4iD0jLf0fC2pSXkQz0JAh1Ym', 0, '2023-01-19 01:21:57', '2023-01-19 01:21:57', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
