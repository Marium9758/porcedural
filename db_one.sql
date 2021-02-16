-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 03:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_one`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `delete_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `body`, `image`, `status`, `date`, `delete_status`) VALUES
(5, 'Book fair 2021', 'Book fair 2021Book fair 2021Book fair 2021Book fair 2021Book fair 2021', '', 1, '2021-02-07', 1),
(6, 'New book collection', 'Book fair new book Book fair new book\r\nBook fair new book\r\nBook fair new book\r\nBook fair new book', '', 1, '2021-02-07', 1),
(7, 'New book collection for 2021', 'google', '', 1, '2021-02-07', 1),
(8, 'bangladehs is a poor country', 'asdf asdlfkj asdlfkj', '', 1, '2021-02-07', 1),
(9, 'goo', 'microsoft', 'images/9_apple.jpg', 1, '2021-02-07', 1),
(10, 'India is a poor country', 'An tu me de L. Ille enim occurrentia nescio quae comminiscebatur; Habes, inquam, Cato, formam eorum, de quibus loquor, philosophorum. Si enim ad populum me vocas, eum. Videsne quam sit magna dissensio? Sed virtutem ipsam inchoavit, nihil amplius. Nam, ut sint illa vendibiliora, haec uberiora certe sunt. Primum quid tu dicis breve? \r\n', '', 1, '2021-02-07', 1),
(11, 'Post edit', 'An tu me de L. Ille enim occurrentia nescio quae comminiscebatur; Habes, inquam, Cato, formam eorum, de quibus loquor, philosophorum. Si enim ad populum me vocas, eum. Videsne quam sit magna dissensio? Sed virtutem ipsam inchoavit, nihil amplius. Nam, ut sint illa vendibiliora, haec uberiora certe sunt. Primum quid tu dicis breve? \r\n', '', 1, '2021-02-07', 1),
(14, 'a', 'b', 'images/tree.jpg', 1, '2021-02-07', 1),
(15, 'new image', 'new image', 'images/tree.jpg', 1, '2021-02-07', 1),
(16, 'banana', 'banana', 'images/tree.jpg', 1, '2021-02-07', 1),
(17, 'new bananda', 'test bananda', 'images/17_apple.jpg', 1, '2021-02-07', 1),
(18, 'Oraange', 'test bananda', 'images/18_orange.png', 1, '2021-02-07', 1),
(19, 'open bannana from bangladesh', 'eat a new bananada', 'images/19_apple.jpg', 1, '2021-02-07', 1),
(20, '8 februayr', 'test', 'images/20_apple.jpg', 1, '2021-02-08', 1),
(21, 'no image', 'no image', 'images/21_Abhar-iran.JPG', 1, '2021-02-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
