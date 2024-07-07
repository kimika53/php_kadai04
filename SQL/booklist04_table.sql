-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 06:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_kadai02`
--

-- --------------------------------------------------------

--
-- Table structure for table `booklist_table`
--

CREATE TABLE `booklist_table` (
  `id` int(12) NOT NULL,
  `author` varchar(40) NOT NULL,
  `title` text NOT NULL,
  `publisher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booklist_table`
--

INSERT INTO `booklist_table` (`id`, `author`, `title`, `publisher`) VALUES
(1, 'Michael Pettis', 'The Great Rebalancing: Trade, Conflict, and the Perilous Road Ahead for the World Economy ', 'Princeton Univ Pr'),
(2, 'Cally Blackman ', '100 Years of Fashion Illustration mini', 'Laurence King Publishing'),
(3, 'Ronen Bergman ', 'Rise and Kill First: The Secret History of Israel\'s Targeted Assassinations', 'John Murray'),
(4, 'Morgan Housel ', 'The Psychology of Money: Timeless lessons on wealth, greed, and happiness', 'Harriman House'),
(5, 'Charles D. Ellis,Burton Malkiel ', 'Winning the Loser\'s Game: Timeless Strategies for Successful Investing, Eighth Edition', 'McGraw Hill'),
(7, '徳井 淑子', '図説 ヨーロッパ服飾史 (ふくろうの本/世界の歴史)', '河出書房新社'),
(8, '文化学園服飾博物館', '世界の民族衣装図鑑', 'ラトルズ'),
(9, '島根県立石見美術館,国立新美術館 ', 'ファッション イン ジャパン 1945-2020ー流行と社会', '青幻舎');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booklist_table`
--
ALTER TABLE `booklist_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booklist_table`
--
ALTER TABLE `booklist_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
