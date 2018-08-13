-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2018 at 08:44 AM
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
  `post_id` int(11) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_text`, `post_id`, `report_id`, `comment_by`, `comment_at`) VALUES
(66, '<p><strong>jafjadljadjljl</strong></p>', 26, NULL, 2, '2018-07-31 16:54:04'),
(67, '<p><strong><span style=\"font-size: 60px;\">AAAAAaahahahahahahhaahahahhahahaha</span></strong></p>', 26, NULL, 2, '2018-07-31 17:04:04'),
(68, '<p><br><img src=\"uploads/e7dedd4b0a63b09c9a885d7fba260f20f01ff1c4.jpg\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p><p>This is a post with a picture!</p>', 26, NULL, 2, '2018-07-31 17:06:32'),
(69, '<p>hey</p>', 37, NULL, 3, '2018-07-31 17:42:44'),
(71, '<p>hey</p>', 38, NULL, 4, '2018-08-01 15:57:21'),
(80, '<p>hey</p>', 38, NULL, 4, '2018-08-02 15:06:13'),
(81, '<p>hoy ka</p>', 37, NULL, 4, '2018-08-09 16:45:03'),
(87, '<p><strong>ehe!</strong></p>', 38, NULL, 3, '2018-08-06 11:14:23'),
(88, '<p>gleen&nbsp;</p>', 38, NULL, 2, '2018-08-10 13:42:14'),
(89, '<p>heysssss</p>', 38, NULL, 2, '2018-08-10 13:58:03'),
(90, '<p>first comment</p>', NULL, 3, 3, '2018-08-10 14:46:57'),
(91, '<p><img src=\"uploads/6784acc9144977e8a6b89476ac5e1c12f912a582.jpg\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p>', 40, NULL, 3, '2018-08-13 14:41:30');

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
(1, 25, 2),
(3, 28, 2),
(8, 26, 2),
(9, 37, 3),
(22, 38, 2),
(24, 37, 4),
(25, 40, 3);

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
  `comments` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `posted_at`, `likes`, `comments`, `user_id`) VALUES
(24, 'This is the fucking new post', 'asdkadajdawdjawljdadjldjdkladjawdljawldjawdljdljadljawdawkljdawldjawldjawdljadljawdlajdlkdjwdklawjdklawjdlawkdjawkldjawldjwdklawjdklawdjawkldjklfgallkghfjkdfawjfkljfawklfjkgjfkllfgkagjgkj;ajgawfjkfjawfkjkafjasfgkafkfjirjffajf.ajfw', '2018-07-24 15:12:22', 0, 0, 2),
(25, 'Image upload try 1', '<p><img src=\"https://i.froala.com/assets/photo4.jpg\" data-id=\"4\" data-type=\"image\" data-name=\"Image 2018-07-19 at 17:07:59.jpg\" style=\"width: 292px;\" class=\"fr-fic fr-dib fr-shadow fr-rounded\"></p><p><strong><span style=\"font-family: Impact, Charcoal, sans-serif; font-size: 30px;\">This is a sample image in this post</span></strong></p>', '2018-07-26 10:20:05', 1, 0, 2),
(26, 'Another great update!!!!!!', '<p>Lorem ipsum dolor sit amet, ad justo doctus delenit sed, mea agam repudiandae interpretaris id. Ei mea congue decore officiis, eu vim ullum officiis reformidans. Duo et noster phaedrum, no nullam praesent petentium has, impedit meliore nostrum vim ei. Hinc labore maiestatis mei ea, diceret iracundia ei est. Apeirian temporibus philosophia ut vis. Vim an sonet tantas legendos, sed nisl vivendum et.Lorem ipsum dolor sit amet, ad justo doctus delenit sed, mea agam repudiandae interpretaris id. Ei mea congue decore officiis, eu vim ullum officiis reformidans. Duo et noster phaedrum, no nullam praesent petentium has, impedit meliore nostrum vim ei. Hinc labore maiestatis mei ea, diceret iracundia ei est. Apeirian temporibus philosophia ut vis. Vim an sonet tantas legendos, sed nisl vivendum et.Lorem ipsum dolor sit amet, ad justo doctus delenit sed, mea agam repudiandae interpretaris id. Ei mea congue decore officiis, eu vim ullum officiis reformidans. Duo et noster phaedrum, no nullam praesent petentium has, impedit meliore nostrum vim ei. Hinc labore maiestatis mei ea, diceret iracundia ei est. Apeirian temporibus philosophia ut vis. Vim an sonet tantas legendos, sed nisl vivendum et.Lorem ipsum dolor sit amet, ad justo doctus delenit sed, mea agam repudiandae interpretaris id. Ei mea congue decore officiis, eu vim ullum officiis reformidans. Duo et noster phaedrum, no nullam praesent petentium has, impedit meliore nostrum vim ei. Hinc labore maiestatis mei ea, diceret iracundia ei est. Apeirian temporibus philosophia ut vis. Vim an sonet tantas legendos, sed nisl vivendum et.Lorem ipsum dolor sit amet, ad justo doctus delenit sed, mea agam repudiandae interpretaris id. Ei mea congue decore officiis, eu vim ullum officiis reformidans. Duo et noster phaedrum, no nullam praesent petentium has, impedit meliore nostrum vim ei. Hinc labore maiestatis mei ea, diceret iracundia ei est. Apeirian temporibus philosophia ut vis. Vim an sonet tantas legendos, sed nisl vivendum et.</p><ol><li>ÙˆØ§Ø³ØªÙ…Ø± Ø§Ù„Ø¹ØµØ¨Ø© Ø¶Ø±Ø¨ Ù‚Ø¯. ÙˆØ¨Ø§Ø¡Øª Ø§Ù„Ø£Ù…Ø±ÙŠÙƒÙŠ Ø§Ù„Ø£ÙˆØ±Ø¨ÙŠÙŠÙ† Ù‡Ùˆ Ø¨Ù‡ØŒ, Ù‡Ùˆ Ø§Ù„Ø¹Ø§Ù„Ù…ØŒ Ø§Ù„Ø«Ù‚ÙŠÙ„Ø© Ø¨Ø§Ù„. Ù…Ø¹ ÙˆØ§ÙŠØ±Ù„Ù†Ø¯Ø§ Ø§Ù„Ø£ÙˆØ±ÙˆØ¨ÙŠÙ‘ÙˆÙ† ÙƒØ§Ù†, Ù‚Ø¯ Ø¨Ø­Ù‚ Ø£Ø³Ø§Ø¨ÙŠØ¹ Ø§Ù„Ø¹Ø¸Ù…Ù‰ ÙˆØ§Ø¹ØªÙ„Ø§Ø¡. Ø§Ù†Ù‡ ÙƒÙ„ ÙˆØ¥Ù‚Ø§Ù…Ø© Ø§Ù„Ù…ÙˆØ§Ø¯. &nbsp;</li><li>ÙˆØ§Ø³ØªÙ…Ø± Ø§Ù„Ø¹ØµØ¨Ø© Ø¶Ø±Ø¨ Ù‚Ø¯. ÙˆØ¨Ø§Ø¡Øª Ø§Ù„Ø£Ù…Ø±ÙŠÙƒÙŠ Ø§Ù„Ø£ÙˆØ±Ø¨ÙŠÙŠÙ† Ù‡Ùˆ Ø¨Ù‡ØŒ, Ù‡Ùˆ Ø§Ù„Ø¹Ø§Ù„Ù…ØŒ Ø§Ù„Ø«Ù‚ÙŠÙ„Ø© Ø¨Ø§Ù„. Ù…Ø¹ ÙˆØ§ÙŠØ±Ù„Ù†Ø¯Ø§ Ø§Ù„Ø£ÙˆØ±ÙˆØ¨ÙŠÙ‘ÙˆÙ† ÙƒØ§Ù†, Ù‚Ø¯ Ø¨Ø­Ù‚ Ø£Ø³Ø§Ø¨ÙŠØ¹ Ø§Ù„Ø¹Ø¸Ù…Ù‰ ÙˆØ§Ø¹ØªÙ„Ø§Ø¡. Ø§Ù†Ù‡ ÙƒÙ„ ÙˆØ¥Ù‚Ø§Ù…Ø© Ø§Ù„Ù…ÙˆØ§Ø¯. &nbsp;</li><li>ÙˆØ§Ø³ØªÙ…Ø± Ø§Ù„Ø¹ØµØ¨Ø© Ø¶Ø±Ø¨ Ù‚Ø¯. ÙˆØ¨Ø§Ø¡Øª Ø§Ù„Ø£Ù…Ø±ÙŠÙƒÙŠ Ø§Ù„Ø£ÙˆØ±Ø¨ÙŠÙŠÙ† Ù‡Ùˆ Ø¨Ù‡ØŒ, Ù‡Ùˆ Ø§Ù„Ø¹Ø§Ù„Ù…ØŒ Ø§Ù„Ø«Ù‚ÙŠÙ„Ø© Ø¨Ø§Ù„. Ù…Ø¹ ÙˆØ§ÙŠØ±Ù„Ù†Ø¯Ø§ Ø§Ù„Ø£ÙˆØ±ÙˆØ¨ÙŠÙ‘ÙˆÙ† ÙƒØ§Ù†, Ù‚Ø¯ Ø¨Ø­Ù‚ Ø£Ø³Ø§Ø¨ÙŠØ¹ Ø§Ù„Ø¹Ø¸Ù…Ù‰ ÙˆØ§Ø¹ØªÙ„Ø§Ø¡. Ø§Ù†Ù‡ ÙƒÙ„ ÙˆØ¥Ù‚Ø§Ù…Ø© Ø§Ù„Ù…ÙˆØ§Ø¯. &nbsp;</li><li>ÙˆØ§Ø³ØªÙ…Ø± Ø§Ù„Ø¹ØµØ¨Ø© Ø¶Ø±Ø¨ Ù‚Ø¯. ÙˆØ¨Ø§Ø¡Øª Ø§Ù„Ø£Ù…Ø±ÙŠÙƒÙŠ Ø§Ù„Ø£ÙˆØ±Ø¨ÙŠÙŠÙ† Ù‡Ùˆ Ø¨Ù‡ØŒ, Ù‡Ùˆ Ø§Ù„Ø¹Ø§Ù„Ù…ØŒ Ø§Ù„Ø«Ù‚ÙŠÙ„Ø© Ø¨Ø§Ù„. Ù…Ø¹ ÙˆØ§ÙŠØ±Ù„Ù†Ø¯Ø§ Ø§Ù„Ø£ÙˆØ±ÙˆØ¨ÙŠÙ‘ÙˆÙ† ÙƒØ§Ù†, Ù‚Ø¯ Ø¨Ø­Ù‚ Ø£Ø³Ø§Ø¨ÙŠØ¹ Ø§Ù„Ø¹Ø¸Ù…Ù‰ ÙˆØ§Ø¹ØªÙ„Ø§Ø¡. Ø§Ù†Ù‡ ÙƒÙ„ ÙˆØ¥Ù‚Ø§Ù…Ø© Ø§Ù„Ù…ÙˆØ§Ø¯. &nbsp;</li><li>ÙˆØ§Ø³ØªÙ…Ø± Ø§Ù„Ø¹ØµØ¨Ø© Ø¶Ø±Ø¨ Ù‚Ø¯. ÙˆØ¨Ø§Ø¡Øª Ø§Ù„Ø£Ù…Ø±ÙŠÙƒÙŠ Ø§Ù„Ø£ÙˆØ±Ø¨ÙŠÙŠÙ† Ù‡Ùˆ Ø¨Ù‡ØŒ, Ù‡Ùˆ Ø§Ù„Ø¹Ø§Ù„Ù…ØŒ Ø§Ù„Ø«Ù‚ÙŠÙ„Ø© Ø¨Ø§Ù„. Ù…Ø¹ ÙˆØ§ÙŠØ±Ù„Ù†Ø¯Ø§ Ø§Ù„Ø£ÙˆØ±ÙˆØ¨ÙŠÙ‘ÙˆÙ† ÙƒØ§Ù†, Ù‚Ø¯ Ø¨Ø­Ù‚ Ø£Ø³Ø§Ø¨ÙŠØ¹ Ø§Ù„Ø¹Ø¸Ù…Ù‰ ÙˆØ§Ø¹ØªÙ„Ø§Ø¡. Ø§Ù†Ù‡ ÙƒÙ„ ÙˆØ¥Ù‚Ø§Ù…Ø© Ø§Ù„Ù…ÙˆØ§Ø¯. &nbsp;</li></ol>', '2018-07-27 14:24:28', 1, 2, 3),
(27, 'Image', '<p><img src=\"blob:http://localhost/f34f7773-6e60-4d78-81ae-86f5491ba2e1\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"><img src=\"blob:http://localhost/29e81828-b680-43cc-a2b7-ad686ddab356\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p>', '2018-07-30 11:12:18', 0, 0, 2),
(28, 'Image upload try number three', '<p><img src=\"blob:http://localhost/15d726a2-c8ad-4f3c-9835-8d2a5a2d8f25\" style=\"width: 404px;\" class=\"fr-fic fr-dib\"></p><p><strong><span style=\"color: rgb(226, 80, 65);\">I don&#39;t how this thing work! Fck that!</span></strong></p>', '2018-07-30 11:14:37', 1, 0, 2),
(29, 'dkjakd', '<p><img src=\"blob:http://localhost/b1d7e66f-d264-4105-b098-2d2d1b9218b1\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p><p>Image upload try number 4</p>', '2018-07-30 11:21:47', 0, 0, 2),
(30, 'test 1234', '<p><strong><span style=\"font-family: Verdana, Geneva, sans-serif; font-size: 48px; color: rgb(41, 105, 176);\">i love you baron &lt;3</span></strong></p>', '2018-07-30 11:59:57', 0, 0, 2),
(31, 'Hello', '<p><br><span class=\"fr-img-caption fr-fic fr-dib\" style=\"width: 300px; width: 300px;\"><span class=\"fr-img-wrap\"><img src=\"blob:http://localhost/065bf4fb-24e4-4c9f-b602-f02b302ea891\"><span class=\"fr-inner\">this is a image caption!</span></span></span></p>', '2018-07-30 12:04:01', 0, 0, 2),
(32, 'Haadadkadkad', '<p><img src=\"blob:http://localhost/4955051c-3aa1-4add-93fd-aef14430e81b\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p>', '2018-07-30 12:08:35', 0, 0, 2),
(33, 'ajsd', '<p><img src=\"blob:http://localhost/6d587402-7b87-44fc-a2e1-732c57f55c26\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p>', '2018-07-30 12:33:25', 0, 0, 2),
(34, 'dkasld', '<p><img src=\"blob:http://localhost/26f63b13-4311-480a-bb1a-895941548140\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p>', '2018-07-30 12:33:50', 0, 0, 2),
(35, 'post', '<p><img src=\"blob:http://localhost/b345738a-736a-4789-8969-b51670735cae\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p>', '2018-07-31 14:55:04', 0, 0, 2),
(36, 'CLICK THE IMAGE PLS', '<p><span style=\"color: rgb(44, 130, 201);\">Click the image below</span></p><p><a href=\"http://www.pornhub.com\"><img src=\"blob:http://localhost/8f56da9f-c758-4016-8134-c784bcf07bf9\" style=\"width: 387px;\" class=\"fr-fic fr-fil fr-dii\"></a></p>', '2018-08-10 13:45:47', 0, 0, 2),
(37, 'Baron love me yey <3', '<p><br></p><p>this is &nbsp;a post fucking postszzzzz</p>', '2018-08-10 13:41:00', 2, 2, 2),
(38, 'Test report', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>', '2018-08-01 15:24:16', 1, 5, 4),
(39, 'Click the image belows', '<p><a href=\"http://www.pornhub.com\"><img src=\"uploads/6eff271d31844df2283abf8369195699f3efb314.jpg\" style=\"width: 300px;\" class=\"fr-fic fr-dib fr-fil\"></a></p><p>CLICK THE IMAGE PLEASE!</p>', '2018-08-10 13:57:54', 0, 0, 2),
(40, 'click the image ', '<p><a href=\"https://www.facebook.com/gleen025\"><img src=\"uploads/5d41d1ef2439663287034a5ff048c11c4357406f.png\" style=\"width: 520px;\" class=\"fr-fic fr-dib\"></a></p>', '2018-08-10 14:31:26', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `reply_text` varchar(255) NOT NULL,
  `reply_at` datetime NOT NULL,
  `comment_id` int(11) NOT NULL,
  `reply_by` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `reply_text`, `reply_at`, `comment_id`, `reply_by`, `post_id`, `report_id`) VALUES
(10, '<p>heysssss</p>', '2018-08-10 14:28:54', 69, 2, 37, NULL),
(11, '<p>hey pa</p>', '2018-08-01 14:21:12', 69, 2, 37, NULL),
(19, '<p>hey ka man lels</p>', '2018-08-02 15:08:14', 69, 4, 37, NULL),
(20, '<p>kjakjda</p>', '2018-08-02 15:09:06', 69, 4, 37, NULL),
(21, '<p><strong>iadawidawuidawiudi</strong></p>', '2018-08-02 15:09:35', 69, 4, 37, NULL),
(22, '<p>hahahahahaahahaaah</p>', '2018-08-02 15:10:44', 69, 4, 37, NULL),
(23, '<p>hahahahahaahahaaah</p>', '2018-08-02 15:11:02', 69, 4, 37, NULL),
(24, '<p>reply to this comment by tantan</p>', '2018-08-06 10:38:22', 80, 2, 38, NULL),
(26, '<p>second&nbsp; comment with third comment</p>', '2018-08-10 14:52:17', 90, 2, NULL, 3),
(27, '<p><img src=\"blob:http://localhost/1b8b862d-3b05-404b-b19a-ee08f8d1d93e\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p>', '2018-08-13 14:42:31', 91, 2, 40, NULL);

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
(3, 'Private report', '<p>mgkasgjakjakdjakdawjdjadiajdjdamdkadakdjwdkjadjadkdjakdjakd;jaiaifjafioafjawfa</p>', '2018-08-10 14:45:59', 3);

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
  ADD KEY `comment_by` (`comment_by`),
  ADD KEY `report_id` (`report_id`);

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
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `reply_id` (`reply_by`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `report_id` (`report_id`),
  ADD KEY `report_id_2` (`report_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `likepost`
--
ALTER TABLE `likepost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`comment_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`reply_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_4` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
