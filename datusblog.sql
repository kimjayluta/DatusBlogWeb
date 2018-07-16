-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2018 at 09:24 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datusblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_text`, `post_id`, `comment_by`, `comment_at`) VALUES
(32, 'hi there bitches', 15, 2, '2018-07-14 21:08:31'),
(33, 'another comment hahah', 15, 2, '2018-07-14 21:09:51'),
(34, 'dadadadada', 15, 2, '2018-07-14 22:29:05'),
(35, 'Hey bud!', 19, 2, '2018-07-15 20:03:07'),
(36, 'hey\r\n', 21, 4, '2018-07-16 15:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `likepost`
--

CREATE TABLE `likepost` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likepost`
--

INSERT INTO `likepost` (`id`, `post_id`, `user_id`) VALUES
(5, 16, 2),
(6, 19, 2),
(10, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `posted_at` datetime NOT NULL,
  `likes` int(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `posted_at`, `likes`, `user_id`) VALUES
(10, 'luis', 'kfajfakfjajfkafaf', '2018-07-14 19:56:00', 0, 2),
(11, 'kimjay', 'ajdakldajlwdjadjlad', '2018-07-14 20:11:19', 0, 3),
(12, 'tantan', 'dadadadada', '2018-07-14 20:11:28', 0, 4),
(13, 'daddklajdawjdajdj', 'ajdaldawldajwda\r\n', '2018-07-14 20:11:33', 0, 3),
(14, 'myfirstpost', 'kflafkalfkalfafaf', '2018-07-14 20:11:38', 0, 4),
(15, 'dadkakdakdak', 'jklasfajfafjlafjlafjlawfa', '2018-07-14 20:11:42', 0, 2),
(16, 'from luis', 'kdajkdakjdk', '2018-07-14 20:56:49', 1, 2),
(17, 'kadklaldkadkla', 'akdajkdjawdjkadjkadja', '2018-07-15 19:50:44', 0, 2),
(18, 'this is from luis account', 'faldjkala', '2018-07-15 19:53:32', 1, 2),
(19, 'Update post here', 'kadjadkjadjdkjdw', '2018-07-15 20:02:46', 5, 2),
(20, 'Hey', '<p>ahjdahdajdh</p>', '2018-07-16 14:56:00', 0, 2),
(21, 'adjadjadjladjlajl', '<p><strong></strong><strong>ajdjawdldadjdal</strong></p>', '2018-07-16 15:00:53', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `reply_text` text NOT NULL,
  `comment_id` int(11) NOT NULL,
  `reply_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `send_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `title`, `description`, `send_at`, `user_id`) VALUES
(1, 'Kimdjadkajdajk', '<p><em>jafjajafljafajlfjla<sub>dkad</sub><sup>ajkdadl</sup></em></p>', '2018-07-16 15:14:39', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `type`) VALUES
(2, 'luismiranda', '$2y$10$LgvM.jR0XwoiUKgoXz8TZeqZEKRrXjdlLmkE5J9W5vq3U1psIVp06', 'luislovekate@gmail.com', 'luis', 'miranda', 1),
(3, 'kimjayluta', '$2y$10$bJ5vNLMAzH1UF7wBHE9yQO.YxHteqtfiUwtJzKBpvB0HjMHoPWik.', 'kimjay_luta@yahoo.com', 'kim', 'luta', 0),
(4, 'tantan', '$2y$10$MK3Lrlrp5h2D3cgnk3EFXO29O2ajL2r6Qy9XIdKr2BlmEdMrD.8RG', 'tantan@gmail.com', 'tan', 'tan', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `comment_by` (`comment_by`);

--
-- Indexes for table `likepost`
--
ALTER TABLE `likepost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comment_id` (`comment_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `likepost`
--
ALTER TABLE `likepost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`comment_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likepost`
--
ALTER TABLE `likepost`
  ADD CONSTRAINT `likepost_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likepost_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
