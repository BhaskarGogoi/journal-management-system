-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 03:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `history`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `phone`, `password`) VALUES
(2, 'Admin', 'Admin', 'admin@admin.com', 1234567890, '$2y$10$jFzGVGVtssVhqnI8U/uIEe4FB5yNMN9j4D4Em4LB8Fhh2.LNvVMPi'),
(5, 'Bhaskarjyoti', 'Gogoi', 'thebhaskargogoi@gmail.com', 7002072619, '$2y$10$jSXMq8/T47ofdh47Smki9unlhKS3T9HHCiYWcOvXz8gMukitrichS');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `journal_id` int(9) NOT NULL,
  `title` varchar(500) NOT NULL,
  `author` varchar(200) NOT NULL,
  `filename` varchar(500) NOT NULL,
  `unique_visitors` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `journal_id`, `title`, `author`, `filename`, `unique_visitors`) VALUES
(208, 1, 'All Articles', 'Department of History, DU', '13052022090518.pdf', 1),
(209, 2, 'All Articles', 'Department of History, DU', '13052022090825.pdf', 1),
(210, 5, 'All Articles', 'Department of History, DU', '13052022091115.pdf', 0),
(211, 6, 'All Articles', 'Department of History, DU', '13052022091212.pdf', 0),
(212, 7, 'All Articles', 'Department of History, DU', '13052022091258.pdf', 1),
(213, 8, 'All Articles', 'Department of History, DU', '13052022091444.pdf', 1),
(214, 9, 'All Articles', 'Department of History, DU', '13052022091525.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `contact_msg`
--

CREATE TABLE `contact_msg` (
  `id` int(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_msg`
--

INSERT INTO `contact_msg` (`id`, `name`, `email`, `message`, `date`) VALUES
(1, 'sadsda', 'saddsfds@jvnjv.com', 'sadasdsad', '2022-05-12 18:21:19'),
(2, 'People', 'thebhaskargogoi@gmail.com', 'sdhsaif dfhuidshf sdfhuidsfh sdf', '2022-05-12 18:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `journal_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `published_date` varchar(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Not Published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`journal_id`, `title`, `date`, `published_date`, `status`) VALUES
(1, 'Vol 1', '2022-04-29 14:29:05', '13-05-2022', 'Published'),
(2, 'Vol 4', '2022-04-29 14:40:04', '13-05-2022', 'Published'),
(5, 'Vol 5', '2022-05-10 19:50:56', '13-05-2022', 'Published'),
(6, 'Vol 7', '2022-05-13 07:11:48', '13-05-2022', 'Published'),
(7, 'Vol 8', '2022-05-13 07:12:38', '13-05-2022', 'Published'),
(8, 'Vol 9', '2022-05-13 07:14:13', '13-05-2022', 'Published'),
(9, 'Vol 11', '2022-05-13 07:14:59', '13-05-2022', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_count`
--

CREATE TABLE `visitor_count` (
  `visitor_id` int(9) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `article_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_count`
--

INSERT INTO `visitor_count` (`visitor_id`, `ip_address`, `article_id`) VALUES
(1, '0', 192),
(2, '0', 10),
(3, '0', 16),
(4, '0', 15),
(5, '0', 208),
(6, '0', 209),
(7, '0', 222),
(8, '0', 223),
(9, '0', 217),
(10, '0', 214),
(11, '1270', 214),
(12, '0', 212),
(13, '::1', 214),
(14, '::1', 213);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `contact_msg`
--
ALTER TABLE `contact_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`journal_id`);

--
-- Indexes for table `visitor_count`
--
ALTER TABLE `visitor_count`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `contact_msg`
--
ALTER TABLE `contact_msg`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `visitor_count`
--
ALTER TABLE `visitor_count`
  MODIFY `visitor_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
