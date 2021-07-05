-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 01:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jarsproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `description`, `photo`, `user_id`) VALUES
(1, 'Jordan 4 \"Breds\"', 'Chicago feels', './uploads/posts/2019-05-16 01.01.35 1.jpg', 1),
(2, 'Adidas Ultraboost \"Undefeated\"', 'God Bless America!', './uploads/posts/2019-05-31 09.43.55 1.jpg', 1),
(3, 'Jordan 1 SBB 3.0', 'Halloween vibes!', './uploads/posts/2019-10-31 05.40.38 1.jpg', 1),
(4, 'Nike Air Fear of God 1 \"Oatmeal\"', 'Holy Grails!', './uploads/posts/2019-11-09 10.41.53 1.jpg', 1),
(5, 'Nike Air Max 97 \"Neon Seoul\"', 'Koreaaa', './uploads/posts/2020-03-26 01.15.25 1.jpg', 1),
(6, 'Nike Air Force 1 Customs', 'Honey ', './uploads/posts/2020-02-26 07.24.12 2.jpg', 1),
(7, 'Jordan 1 Chicago to Paris', 'SB Shoes', './uploads/posts/2019-12-19 02.01.52 1.jpg', 1),
(8, 'Nike Air Fear of God 1 SA \"Reflective\"', 'Reflective shoes', './uploads/posts/2020-01-25 03.14.56 1.jpg', 1),
(9, 'Stacks', 'My Entire collection', './uploads/posts/2019-12-30 11.26.32 1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_id`, `firstname`, `lastname`, `bio`, `image`) VALUES
(1, 'Ricky Martin', 'Roman', 'Hi! I am a sneaker enthusiast.', './uploads/user_profile/20200209_171718.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emailadd` varchar(255) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `emailadd`, `code`) VALUES
(1, 'rsquared0417', 'password', 'rickymartinroman@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_post_ID` (`user_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD KEY `user_ID` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `user_post_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
