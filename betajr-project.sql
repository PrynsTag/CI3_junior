-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 02:15 PM
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
-- Database: `betajr-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_description` varchar(255) NOT NULL,
  `post_photo` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_description`, `post_photo`, `user_id`) VALUES
(3, 'Jordan 4 \"Breds\"', 'Chicago feels', '2019-05-16 01.01.35 1.jpg 	', 1),
(5, 'Jordan 1 SBB 3.0', 'Halloween vibes!', '2019-10-31 05.40.38 1.jpg', 1),
(6, 'Nike Air Fear of God 1 \"Oatmeal\"', 'Holy Grails!', '2019-11-09 10.41.53 1.jpg', 1),
(7, 'Nike Air Max 97 \"Neon Seoul\"', 'Koreaaa', '2020-03-26 01.15.25 1.jpg', 1),
(8, 'Nike Air Force 1 Customs', 'Honey ', '2020-02-26 07.24.12 2.jpg', 1),
(9, 'Jordan 1 Chicago to Paris', 'SB Shoes', '2019-12-19 02.01.52 1.jpg', 1),
(10, 'Nike Air Fear of God 1 SA \"Reflective\"', 'Reflective shoes', '2020-01-25 03.14.56 1.jpg', 1),
(11, 'Stacks', 'My Entire collection', '2019-12-30 11.26.32 1.jpg', 1),
(13, 'Orange', 'Orange Version :>', 'orange.png', 2),
(14, 'Blue', 'Blue Version :)', '695DB932-632B-41AE-9D46-0254BFDBD9D2.png', 2),
(15, 'Green', 'Green Version (:', '12554673-DDFB-424F-B40B-CEA8C2DBDE36.png', 2),
(16, 'Apple Music', 'Treasure\'s Songs &lt;3', '012D820C-CF08-4CE3-8640-A9B682907A9A.png', 2),
(17, 'Kihno', 'Play Music >>', 'F8EE1192-A04D-490C-8CFB-02DC16E9CB84.png', 2),
(18, 'Apple Music but bigger', 'iPad Perks :]', '920EEA1F-D3E3-426B-8C19-2FA2F9EE4C8A.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(75) NOT NULL,
  `user_code` varchar(50) NOT NULL,
  `user_verification` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_email`, `user_code`, `user_verification`) VALUES
(1, 'rsquared0417', 'password123', 'rickymartinroman@gmail.com', '', 1),
(2, 'itsjuliebird', '123456789', 'itsjuliebird@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userinfo_id` int(11) NOT NULL,
  `userinfo_firstname` varchar(100) NOT NULL,
  `userinfo_lastname` varchar(100) NOT NULL,
  `userinfo_bio` varchar(255) NOT NULL,
  `userinfo_image` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userinfo_id`, `userinfo_firstname`, `userinfo_lastname`, `userinfo_bio`, `userinfo_image`, `user_id`) VALUES
(1, 'Ricky Martin', 'Roman', 'Hi! I am a sneaker enthusiast.', '20200209_171718.jpg', 1),
(2, 'Julie', 'Jamolo', 'Hi! I am a TEUME and this is my KPOP Collection.', 'julie-photo.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `userinfo FK user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userinfo_id`),
  ADD KEY `FK_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userinfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `userinfo FK user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
