-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 05 日 15:39
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
  `user_name` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `images`
--

INSERT INTO `images` (`id`, `img_name`, `user_name`) VALUES
(11, '17853812563b6dd80ae22f3.96345597.JPG', 'test_user_1'),
(12, '90338563663b6df695bc809.63606160.JPG', 'test_user_1'),
(13, '134109413363b6e009b1c486.18846504.JPG', 'test_user_1'),
(14, '110265731663b6e012239234.82620843.JPG', 'test_user_1'),
(15, '169749818563b6e01b1be783.75324160.JPG', 'test_user_1');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(124) NOT NULL,
  `mail` varchar(124) NOT NULL,
  `pass` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `mail`, `pass`) VALUES
(1, 'test_user', 'aaa@gmail.com', '$2y$10$1pleigFaZViK6bhPz4Urf.hUlL6AaA1j.78YKMm92SWEai8Ull6fC'),
(2, 'test_user_1', 'abcdefg@gmail', '$2y$10$2nQEH8BZ5S5lhexw1g.5cueat4ijZmdVxojJ1MWvkEe0yQY4lwYmy'),
(3, 'test_user_2', 'abc123@gmail', '$2y$10$m4uWktGZjahVXdiKJyLGHOMPaAnVkIG8xrp7YUJ9gd4afb0YCozyO'),
(4, 'test_user_1', 'test_user_1@test', '$2y$10$EdHZtcWAUZQLa24.wew2DOVFRg5pu/geXgJBZFPNj2XHErlGCGvu2');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
