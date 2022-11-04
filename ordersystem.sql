-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-01-03 18:38:45
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ordersystem`
--

-- --------------------------------------------------------

--
-- 資料表結構 `allorder`
--

CREATE TABLE `allorder` (
  `order_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_locked` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `allorder`
--

INSERT INTO `allorder` (`order_id`, `member_id`, `product_id`, `quantity`, `is_locked`) VALUES
(10, 1, 'A001', 6, 1),
(13, 1, 'A002', 7, 1),
(14, 1, 'A003', 3, 1),
(19, 1, 'A001', 1, 1),
(20, 1, 'A001', 1, 0),
(21, 1, 'A003', 1, 0),
(22, 1, 'A004', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `member_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`member_id`, `name`, `phone`, `email`, `password`) VALUES
(1, '666', 666, '666', '666'),
(5, '1', 1, '1', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `menu`
--

CREATE TABLE `menu` (
  `product_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `calories` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `menu`
--

INSERT INTO `menu` (`product_id`, `name`, `calories`, `price`) VALUES
('A001', 'Chicken Burger', 490, 120),
('A002', 'Spicy Chicken Burger', 500, 120),
('A003', 'Bacon Chicken Burger', 720, 150),
('A004', 'Bacon Cheeseburger', 760, 120),
('A005', 'Bacon Cheeseburger Double', 1030, 150),
('A006', 'Bacon Cheeseburger Triple', 1330, 180),
('B001', 'Cheeseburger Combo', 480, 210),
('B002', 'Cheeseburger Double Combo', 670, 240),
('B003', 'Hamburger Combo', 390, 150),
('C001', 'Fries', 529, 60),
('C002', 'Fried Chicken', 747, 60),
('C003', 'Nuggets', 449, 60),
('C004', 'Apple Pie', 229, 40),
('D001', 'Coca-Cola', 298, 40),
('D002', 'Pepsi', 195, 40),
('D003', 'Sprite', 327, 40);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `allorder`
--
ALTER TABLE `allorder`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `key` (`product_id`),
  ADD KEY `member` (`member_id`) USING BTREE;

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- 資料表索引 `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`product_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `allorder`
--
ALTER TABLE `allorder`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `allorder`
--
ALTER TABLE `allorder`
  ADD CONSTRAINT `allorder_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `menu` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `allorder_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
