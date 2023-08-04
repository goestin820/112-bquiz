-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-08-04 07:40:11
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db22`
--

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text NOT NULL,
  `movie` text NOT NULL,
  `date` date NOT NULL,
  `session` text NOT NULL,
  `qt` int(10) UNSIGNED NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seats`) VALUES
(1, '202309110001', '院線片01', '2023-09-10', '14:00~16:00', 1, 'a:1:{i:0;i:0;}'),
(2, '202309110002', '院線片02', '2023-09-11', '16:00~18:00', 2, 'a:2:{i:0;i:2;i:1;i:3;}'),
(3, '202309110003', '院線片03', '2023-09-09', '18:00~20:00', 3, 'a:3:{i:0;i:4;i:1;i:5;i:2;i:6;}'),
(4, '202309110004', '院線片01', '2023-09-10', '14:00~16:00', 4, 'a:4:{i:0;i:10;i:1;i:11;i:2;i:12;i:3;i:13;}'),
(5, '202309110005', '院線片02', '2023-09-11', '14:00~16:00', 1, 'a:1:{i:0;i:1;}'),
(6, '202309110006', '院線片03', '2023-09-09', '16:00~18:00', 2, 'a:2:{i:0;i:11;i:1;i:12;}'),
(7, '202309110007', '院線片01', '2023-09-12', '18:00~20:00', 3, 'a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;}'),
(8, '202309110008', '院線片02', '2023-09-13', '14:00~16:00', 4, 'a:4:{i:0;i:1;i:1;i:2;i:2;i:13;i:3;i:14;}');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
