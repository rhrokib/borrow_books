-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 11:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('bb_rokib', 'testPass'),
('bb_brinto', 'testPass');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(13) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `name` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `Total_like` int(10) NOT NULL DEFAULT 0,
  `total_dislike` int(10) NOT NULL DEFAULT 0,
  `borrowed_to` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `time` datetime NOT NULL,
  `username` varchar(30) NOT NULL,
  `cost` double NOT NULL DEFAULT 50,
  `isDonated` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `isbn`, `name`, `author`, `Total_like`, `total_dislike`, `borrowed_to`, `image`, `description`, `time`, `username`, `cost`, `isDonated`) VALUES
(7, '9788435001915', 'The Forever War', 'Joe Haldeman', 0, 0, '', 'Screenshot_1.jpg', 'The condition is good and the comic is superb.', '2021-06-13 16:44:32', 'rhrokib', 50, 'No'),
(8, '9789845021272', 'দেয়াল', 'হুমায়ূন আহমেদ', 0, 0, '', 'deyal.jpeg', 'অসাধারণ একটি বই । ', '2021-06-13 16:47:36', 'rhrokib', 50, 'Yes'),
(9, '9781441715333', 'Uncle Toms Cabin', 'Harriet Beecher Stowe', 0, 0, '', 'utc.jpg', 'An amazing novel', '2021-06-13 16:53:43', 'rhrokib', 50, 'Yes'),
(10, '9632587411537', 'I Hate PHP', 'Roqibul Islam', 0, 0, '', 'poorPHP.jpg', 'A good read for those who hate PHP for no reason.', '2021-06-13 17:03:45', 'abeed', 50, 'Yes'),
(11, '9632587423148', 'মেয়েরা যেমন হয়', 'সমরেশ মজুমদার', 0, 0, '', 'Meyera-Jemon-Hoy.jpg', 'Self-explanatory', '2021-06-13 17:11:05', 'abeed', 50, 'No'),
(12, '9632587110156', 'The Da Vinci Code', 'Dan Brown', 0, 0, '', 'e5498395498dc9e4ed924f4b82da54c4.jpg', '💙💜🤎', '2021-06-13 17:19:19', 'abeed', 50, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'On the way',
  `delivery_man_id` int(11) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `toBePaid` float NOT NULL,
  `rating` decimal(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryman`
--

INSERT INTO `deliveryman` (`id`, `name`, `location`, `phone`, `toBePaid`, `rating`) VALUES
(1, 'Shakir', 'Dhaka South', '01521433870', 0, '0'),
(2, 'Alex', 'Dhaka North', '01521433871', 0, '0'),
(3, 'Rokib', 'Dhaka East', '01521433872', 0, '0'),
(4, 'Rafi', 'Dhaka West', '01521433873', 0, '0'),
(5, 'Sakib', 'Jamalpur', '01521433874', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `trxid` int(11) NOT NULL,
  `amount` double NOT NULL,
  `method` varchar(10) NOT NULL,
  `time` datetime NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Not Accepted',
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`trxid`, `amount`, `method`, `time`, `status`, `username`) VALUES
(6, 100, 'bKash', '2021-06-13 16:57:56', 'Accepted', 'abeed'),
(7, 500, 'bKash', '2021-06-13 16:58:01', 'Not Accepted', 'abeed'),
(8, 1000, 'bKash', '2021-06-13 16:58:52', 'Not Accepted', 'abeed'),
(9, 1000, 'Paypal', '2021-06-13 17:00:44', 'Accepted', 'rhrokib');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description_text` varchar(10000) NOT NULL,
  `loved` int(11) NOT NULL DEFAULT 0,
  `book_name` varchar(30) NOT NULL,
  `book_author` varchar(30) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `title`, `description_text`, `loved`, `book_name`, `book_author`, `time`) VALUES
(8, 'abeed', '**** Title that will get reported', 'The key to The DaVinci Code is that it&#039;s filled with startling plot twists, and almost every chapter ends with a &#039;&#039;cliffhanger,&#039;&#039; so you have to keep reading to see what will happen. Using this formula, I wrote the following blockbuster novel, titled The Constitution Conundrum. It&#039;s fairly short now, but when I get a huge publishing contract, I&#039;ll flesh it out to 100,000 words by adding sentences.\r\n\r\nCHAPTER ONE: Handsome yet unmarried historian Hugh Heckman stood in the National Archives Building in Washington, D.C., squinting through the bulletproof glass at the U.S. Constitution. Suddenly, he made an amazing discovery.', 5, 'The Da Vinci Code', 'Dan Brown', '2021-06-13 17:21:35'),
(9, 'rhrokib', 'ইতিহাস যখন উপন্যাস', 'ভারতীয় উপমহাদেশে মুঘলদের ইতিহাস এক উত্থান-পতনের ইতিহাস। এখানে যেমন বাবরের জয়ের ইতিহাস রয়েছে, তেমন হুমায়ুনের পরাজয় এবং শাহজাহানের ভালোবাসারও অমর ইতিহাস রয়েছে। বিভিন্ন ঐতিহাসিক, কবি-সাহিত্যিকরা মনের মতো করে সাজিয়ে লেখেছেন তাদের জীবন ও কর্ম। বিশিষ্ট কথাসাহিত্যিক হুমায়ূন আহমেদও জীবনের শেষ প্রান্তে এসে লেখেছিলেন ‘বাদশাহ নামদার’ শিরোনামে একটি উপন্যাস। বইটি পাঠকদের কাছে যেমন সুপাঠ্য, তেমন গবেষকদের কাছেও ঐতিহাসিক দলিল হিসেবে সমাদৃত।', 5, 'বাদশাহ নামদার', 'হুমায়ূন আহমেদ', '2021-06-17 14:46:54'),
(10, 'rhrokib', 'Masterpiece Mystery Thriller', 'The Da Vinci Code follows &quot;symbologist&quot; Robert Langdon and cryptologist Sophie Neveu after a murder in the Louvre Museum in Paris cause them to become involved in a battle between the Priory of Sion and Opus Dei over the possibility of Jesus Christ and Mary Magdalene having had a child together.', 4, 'The Da Vinci Code', 'Dan Brown', '2021-06-17 14:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `time` datetime NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `post_id`, `time`, `text`) VALUES
(35, 8, '2021-06-13 17:22:24', 'I&#039;m offended by the title 🙄🙄🙄');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `reqId` int(11) NOT NULL,
  `requester_name` varchar(30) NOT NULL,
  `time` datetime NOT NULL,
  `accepted` varchar(50) NOT NULL DEFAULT 'processing',
  `username` varchar(30) NOT NULL,
  `book_id` int(13) DEFAULT NULL,
  `deliveryManid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`reqId`, `requester_name`, `time`, `accepted`, `username`, `book_id`, `deliveryManid`) VALUES
(31, 'abeed', '2021-06-13 17:19:28', 'Declined', 'rhrokib', 7, 0),
(32, 'abeed', '2021-06-13 17:19:29', 'Declined', 'rhrokib', 8, 0),
(33, 'abeed', '2021-06-13 17:19:29', 'processing', 'rhrokib', 9, 0),
(34, 'rhrokib', '2021-06-13 17:19:33', 'processing', 'abeed', 10, 0),
(35, 'rhrokib', '2021-06-13 17:19:34', 'processing', 'rhrokib', 9, 0),
(36, 'rhrokib', '2021-06-13 17:19:35', 'On the way', 'abeed', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `totalCredit` float NOT NULL,
  `totalRead` int(11) NOT NULL DEFAULT 0,
  `totalGiven` int(11) NOT NULL DEFAULT 0,
  `rating` int(11) NOT NULL DEFAULT 0,
  `dp_path` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `firstname`, `lastname`, `phone`, `location`, `city`, `totalCredit`, `totalRead`, `totalGiven`, `rating`, `dp_path`) VALUES
('abeed', 'abeed@asteroid.com', 'b62a565853f37fb1ec1efc287bfcebf9', 'Abeedul', 'Kadir', '01521433871', 'Notunbazar, Vatara', 'abeed', 700, 0, 0, 0, './../media/profile_picture/place.png'),
('rhrokib', 'rokib.hridoy@gmail.com', 'b62a565853f37fb1ec1efc287bfcebf9', 'Roqibul', 'Islam', '01521433870', 'Noyapara', 'Jamalpur, Dhaka', 1000, 0, 0, 0, './../media/profile_picture/DP.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_book` (`username`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_delivery` (`book_id`),
  ADD KEY `user_delivery` (`username`),
  ADD KEY `delivery_man` (`delivery_man_id`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`trxid`),
  ADD KEY `user_payment` (`username`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_post` (`username`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_post` (`post_id`) USING BTREE;

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`reqId`),
  ADD KEY `book_request_index` (`book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliveryman`
--
ALTER TABLE `deliveryman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `trxid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `reqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`delivery_man_id`) REFERENCES `deliveryman` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
