-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 11:04 PM
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
-- Database: `borrow_books`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbn` char(13) NOT NULL,
  `name` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `rating` int(1) DEFAULT NULL,
  `borrowedTo` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `time` datetime NOT NULL,
  `username` varchar(30) NOT NULL,
  `cost` double NOT NULL DEFAULT 50,
  `isDonated` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `name`, `author`, `rating`, `borrowedTo`, `image`, `description`, `time`, `username`, `cost`, `isDonated`) VALUES
('978038553785', 'Inferno', 'Dan Brown', 0, '', NULL, NULL, '2021-05-29 13:47:46', 'asteroidX', 25, 0),
('978038553789', 'Uncle Tom\'s Cabin', 'Harriet Beecher Stowe', 5, '', NULL, NULL, '2021-05-29 19:30:03', 'I_hate_PHP', 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `totalDelivery` int(10) NOT NULL DEFAULT 0,
  `toBePaid` float NOT NULL,
  `rating` int(1) DEFAULT NULL,
  `city` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `trxId` int(11) NOT NULL,
  `amount` double NOT NULL,
  `payerId` int(10) NOT NULL,
  `method` varchar(3) NOT NULL,
  `time` datetime NOT NULL,
  `isDone` int(1) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `loved` int(10) NOT NULL DEFAULT 0,
  `isbn` char(13) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `loved`, `isbn`, `username`) VALUES
(1, 'Masterpiece Mystery Thriller', 'Dan Brown\'s fourth Robert Langdon book, Inferno, throws the clever professor into another complex mystery with global consequences. Langdon faces a scientist bent on destruction: a scientist who finds inspiration in Dante Alighieri\'s Inferno. Langdon awakes in a Venice hospital with no memory of how he got there. He has little time to collect his thoughts or make sense of the visions that tell him to \"seek and find\" before an assassin arrives. Langdon must set off to put the pieces together. This comprehensive review gives you a complete overview of the plot, key characters, and the author\'s writing style, both good and bad.', 5, '978038553785', 'asteroidX'),
(2, 'Sorry! Forgot the title', 'Harriet Beecher Stowe\'s main work Uncle Tom\'s Cabin has an incredible legacy. Focusing on the plight of African American slaves in antebellum USA, it was charged by Abraham Lincoln with the outbreak of the American Civil War and it is easy, even in this modern day, to see why: the amazing legacy is matched by the fantastic plot which follows the irresistibly loveable character Uncle Tom through his trials and torments under different slave owners and the intertwining lives of various other slaves. At once thrilling and devastating it is no surprise that the novel had such a profound effect on the people of the day.\r\n\r\nOne of the most pervading themes of the book is faith, most importantly its inability to be shaken. The inspirational character Tom\'s strong faith is demonstrated throughout the novel and the way that, despite all the hardships he suffers, his faith is unbreakable has had an acute impact on me as a reader. Full of poignant moments, the novel shows Tom\'s admirable and steadfast faith in God until the very end. Particularly profound is the way that the other characters prove contrasting in their ability to trust and hope; unlike Tom, they allow themselves to succumb to the hopelessness of their surroundings.', 4, '978038553789', 'I_hate_PHP'),
(16, 'Test 01', 'qwert', 5, '978038553789', 'asteroidX');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `postid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `reqId` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `accepted` int(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `isbn` char(13) NOT NULL,
  `deliveryManid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `lastname` varchar(20) NOT NULL,
  `location` varchar(60) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `totalCredit` float NOT NULL DEFAULT 0,
  `totalRead` int(10) NOT NULL DEFAULT 0,
  `totalGiven` int(10) NOT NULL DEFAULT 0,
  `rating` int(1) DEFAULT 0,
  `dp_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `firstname`, `phone`, `lastname`, `location`, `city`, `totalCredit`, `totalRead`, `totalGiven`, `rating`, `dp_path`) VALUES
('asteroidX', 'rokib.hridoy@gmail.comn', 'testPass', 'Roqibul', '1521433870', 'Islam', 'H02, R03, Noyapara', 'Jamalpur, Dhaka', 81320, 368, 24, 5, './../media/profile_picture/DP.jpg'),
('I_hate_PHP', 'hatephp@whatever.com', 'testPass', 'Purple', '01789456321', 'Elephant', 'Somewhere on the server', 'The Internet', 8604.99, 256, 128, 3, './../media/profile_picture/poorPHP.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `FKbook798380` (`username`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`trxId`),
  ADD KEY `FKpayment510245` (`username`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKpost381173` (`username`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKreport523919` (`postid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`reqId`),
  ADD KEY `FKrequest865917` (`username`),
  ADD KEY `FKrequest207221` (`isbn`),
  ADD KEY `FKrequest123312` (`deliveryManid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deliveryman`
--
ALTER TABLE `deliveryman`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `trxId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `reqId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FKbook798380` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FKpayment510245` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FKpost381173` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `FKreport523919` FOREIGN KEY (`postid`) REFERENCES `post` (`id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `FKrequest123312` FOREIGN KEY (`deliveryManid`) REFERENCES `deliveryman` (`id`),
  ADD CONSTRAINT `FKrequest207221` FOREIGN KEY (`isbn`) REFERENCES `book` (`isbn`),
  ADD CONSTRAINT `FKrequest865917` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
