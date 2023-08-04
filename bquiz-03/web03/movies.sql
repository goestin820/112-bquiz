-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-08-04 02:50:42
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
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` int(1) UNSIGNED NOT NULL,
  `length` int(10) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(1, '院線片01', 1, 120, '2023-08-04', '院線片01發行商', '院線片01導演', '03B01v.mp4', '03B01.png', '院線片01劇情簡介院線片01劇情簡介', 1, 1),
(2, '院線片02', 2, 120, '2023-08-03', '院線片02發行商', '院線片02導演', '03B02v.mp4', '03B02.png', '院線片02劇情簡介院線片02劇情簡介', 1, 2),
(3, '院線片03', 3, 120, '2023-08-02', '院線片03發行商', '院線片03導演', '03B03v.mp4', '03B03.png', '院線片03劇情簡介院線片03劇情簡介', 1, 3),
(4, '院線片04', 4, 120, '2023-08-04', '院線片04發行商', '院線片04導演', '03B04v.mp4', '03B04.png', '院線片04劇情簡介院線片04劇情簡介', 1, 4),
(5, '院線片05', 1, 120, '2023-08-03', '院線片05發行商', '院線片05導演', '03B05v.mp4', '03B05.png', '院線片05劇情簡介院線片05劇情簡介', 1, 5),
(6, '院線片06', 2, 120, '2023-08-02', '院線片06發行商', '院線片06導演', '03B06v.mp4', '03B06.png', '院線片06劇情簡介院線片06劇情簡介', 1, 6),
(7, '院線片07', 3, 120, '2023-08-04', '院線片07發行商', '院線片07導演', '03B07v.mp4', '03B07.png', '院線片07劇情簡介院線片07劇情簡介', 1, 7),
(8, '院線片08', 4, 120, '2023-08-01', '院線片08發行商', '院線片08導演', '03B08v.mp4', '03B08.png', '院線片08劇情簡介院線片08劇情簡介', 1, 8),
(9, '院線片09', 1, 120, '2023-08-05', '院線片09發行商', '院線片09導演', '03B09v.mp4', '03B09.png', '院線片09劇情簡介院線片09劇情簡介', 1, 9);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
