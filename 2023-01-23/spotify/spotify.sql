-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 21, 2023 at 09:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `name`, `user_id`, `author`, `created`) VALUES
(1, 'Break & Enter', '4', '%s', '2023-02-18 15:30:28'),
(2, 'Narayan', '4', '%s', '2023-02-18 15:30:28'),
(3, 'Like Toy Soldiers', '4', '%s', '2023-02-18 15:30:28'),
(4, 'Never Enough', '4', '%s', '2023-02-18 15:30:28'),
(5, 'Business', '4', '%s', '2023-02-18 15:30:28'),
(15, 'Evil Deeds', '3', 'Eminem', '2023-02-19 13:15:58'),
(16, 'White America', '3', 'Eminem', '2023-02-19 13:15:58'),
(17, 'Business', '3', 'Eminem', '2023-02-19 13:15:58'),
(22, 'Break & Enter', '3', 'Prodigy', '2023-02-20 09:12:55'),
(23, 'Full Throttle', '3', 'Prodigy', '2023-02-20 09:12:55'),
(26, 'Poison', '3', 'Prodigy', '2023-02-20 19:54:31'),
(27, 'Breathe', '3', 'Prodigy', '2023-02-20 19:54:31'),
(28, 'Like Toy Soldiers', '8', 'Eminem', '2023-02-20 19:56:11'),
(29, 'Never Enough', '8', 'Eminem', '2023-02-20 19:56:11'),
(30, 'Business', '8', 'Eminem', '2023-02-20 19:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `author` varchar(250) NOT NULL,
  `album` varchar(250) NOT NULL,
  `year` varchar(50) NOT NULL,
  `link` varchar(250) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `author`, `album`, `year`, `link`, `photo`, `created`) VALUES
(1, 'Break & Enter', 'Prodigy', 'Music for the Jilted Generation', '1994', '', '1676643346.jpg', '2023-02-17 16:15:46'),
(2, 'Full Throttle', 'Prodigy', 'Music for the Jilted Generation', '1994', '', '1676643388.jpg', '2023-02-17 16:16:28'),
(3, 'Poison', 'Prodigy', 'Music for the Jilted Generation', '1994', '', '1676643443.jpg', '2023-02-17 16:17:23'),
(4, 'Breathe', 'Prodigy', 'The Fat of the Land', '1997', '', '1676643520.jpg', '2023-02-17 16:18:40'),
(5, 'Narayan', 'Prodigy', 'The Fat of the Land', '1997', '', '1676643568.jpg', '2023-02-17 16:19:28'),
(6, 'Firestarter', 'Prodigy', 'The Fat of the Land', '1997', '', '1676643619.jpg', '2023-02-17 16:20:19'),
(7, 'Like Toy Soldiers', 'Eminem', 'Encore', '2004', '', '1676643870.jpg', '2023-02-17 16:24:30'),
(8, 'Evil Deeds', 'Eminem', 'Encore', '2004', '', '1676643916.jpg', '2023-02-17 16:25:16'),
(9, 'Never Enough', 'Eminem', 'Encore', '2004', '', '1676643945.jpg', '2023-02-17 16:25:45'),
(10, 'Yellow Brick Road', 'Eminem', 'Encore', '2004', '', '1676643976.jpg', '2023-02-17 16:26:16'),
(11, 'My 1st Single', 'Eminem', 'Encore', '2004', '', '1676644052.jpg', '2023-02-17 16:27:32'),
(12, 'White America', 'Eminem', 'The EminemShow', '2002', '', '1676644130.jpeg', '2023-02-17 16:28:50'),
(13, 'Business', 'Eminem', 'The EminemShow', '2002', '', '1676644178.jpeg', '2023-02-17 16:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `password`, `role`, `created`) VALUES
(3, 'vtomys', 'tomas@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, '2023-02-15 16:51:26'),
(4, 'gaublys', 'kajus@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 0, '2023-02-15 18:13:23'),
(5, 'maribu', 'marius@gmail.com', '2be9bd7a3434f7038ca27d1918de58bd', 1, '2023-02-15 18:13:44'),
(8, 'TadasB', 'tadas@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', 0, '2023-02-20 19:55:38'),
(9, 'pietris', 'petras@gmail.com', '6074c6aa3488f3c2dddff2a7ca821aab', 0, '2023-02-20 19:57:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
