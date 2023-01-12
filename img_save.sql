-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 12 日 15:48
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
  `memo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `images`
--

INSERT INTO `images` (`id`, `img_name`, `user_name`, `memo`) VALUES
(11, '17853812563b6dd80ae22f3.96345597.JPG', 'test_user_1', ''),
(12, '90338563663b6df695bc809.63606160.JPG', 'test_user_1', ''),
(13, '134109413363b6e009b1c486.18846504.JPG', 'test_user_1', ''),
(14, '110265731663b6e012239234.82620843.JPG', 'test_user_1', ''),
(15, '169749818563b6e01b1be783.75324160.JPG', 'test_user_1', ''),
(16, '56271528663b8beaa915151.01539173.JPG', 'test_user_1', ''),
(17, '19612980163b8bf5e8a5d37.95234370.JPG', 'test_user_1', ''),
(18, '206622622563b8bf7716d137.14648548.JPG', 'test_user_1', ''),
(19, '120622939963b8c167f35c35.72059489.jpeg', 'test_user_2', ''),
(20, '149966773563b8c170796861.93292423.jpeg', 'test_user_2', ''),
(21, '81994984363b8c179e02883.28102608.jpeg', 'test_user_2', ''),
(22, '182515985563b8c18315df86.70011729.jpeg', 'test_user_2', ''),
(23, '64200374263b8c18d21d458.77444126.jpeg', 'test_user_2', ''),
(24, '121189691463b8c195b69da8.29465799.jpeg', 'test_user_2', ''),
(25, '83332517163b8c19f85c184.46222193.jpeg', 'test_user_2', ''),
(26, '105543793063b8c1a7e55845.62437673.jpeg', 'test_user_2', ''),
(27, '39615518863b8c1ab740766.69506136.jpeg', 'test_user_2', ''),
(29, '66916408863b8c299944569.28693452.JPG', 'test_user_1', ''),
(30, '101672480663b8c33a18f1c4.37480298.jpeg', 'test_user_2', ''),
(31, '95991411463b9275b7cc317.13553274.JPG', 'test_user_1', ''),
(32, '47699984763b97cf632d786.24032243.JPG', 'test_user_1', ''),
(33, '41223625863b98c9f9d1e09.45546440.jpeg', 'test_user_2', ''),
(34, '126279436863b98d7c9433b1.60662002.JPG', 'momo_love', ''),
(35, '98632925663b98d89416f55.20206645.JPG', 'momo_love', ''),
(36, '10465249163b98d952f64a0.98053853.JPG', 'momo_love', ''),
(37, '17610008163b98da4b88559.86088438.JPG', 'momo_love', ''),
(38, '9846180963b98db3a55463.34137300.JPG', 'momo_love', ''),
(39, '137669051963b98dbbed8f55.12606984.JPG', 'momo_love', ''),
(40, '130472153763b98dc582b7e8.54869958.JPG', 'momo_love', ''),
(41, '67919337963bcfd565e5f19.00650087.JPG', 'momo_love', NULL),
(42, '191797447063bcfdce135435.10915971.JPG', 'momo_love', NULL),
(43, '127672570863bcfe4e2adb40.34989571.JPG', 'momo_love', NULL),
(44, '22313008663bcfe85d60689.36886835.JPG', 'momo_love', 'momo in box'),
(45, '116176942063bcfec1d5dd05.35531689.JPG', 'momo_love', 'ロングmomo'),
(46, '146176969163bd0439562274.17430081.JPG', 'momo_love', 'momo_sitdown'),
(47, '20668533463bd04929d7ac5.36359978.JPG', 'momo_love', 'momo_sitdown'),
(48, '126431692163bd704e0e4972.51370746.JPG', 'momo_love', 'momo'),
(50, '176432730763beecb95b4c89.36070681.jpeg', 't_love', 'トーハク'),
(51, '42947540563beecfa6efcf5.47978746.jpeg', 't_love', '極大包平'),
(54, '22671956763c01c68158082.15070013.jpeg', 't_love', 'ももこんのすけ');

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
(4, 'test_user_1', 'test_user_1@test', '$2y$10$EdHZtcWAUZQLa24.wew2DOVFRg5pu/geXgJBZFPNj2XHErlGCGvu2'),
(5, 'test_user_2', 'abc1111@dmail', '$2y$10$fInwTX4hKX0ao0EAAstIjOg.K3HZZrWwodozjKKt6VnDaLAhLvXkK'),
(6, 'momo_love', 'momo_love@momo', '$2y$10$IqAxifxpv22AXZp3ZzydnuSbnWPpo/IjUScD8lGtO4UBMP1lTkYBS'),
(7, 't_love', 't_love@t_love', '$2y$10$J8j38vE0WvXrCcDj2BuXIuxLVTSCyCm4VBiyIaw5JDLkkiu2qUyMq');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
