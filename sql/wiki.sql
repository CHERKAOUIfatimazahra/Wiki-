-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2024 at 05:43 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int NOT NULL,
  `categoryName` varchar(225) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(10, 'Informatique'),
(11, 'Cuisine'),
(12, 'Voyages'),
(13, 'Sports'),
(14, 'Nature'),
(15, 'Music'),
(16, 'Technology'),
(17, 'Travel'),
(18, 'Health and Wellness'),
(19, 'Science'),
(20, 'Fashion'),
(21, 'Personal Development'),
(22, 'Mobile App ');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tagID` int NOT NULL,
  `tagName` varchar(225) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tagID`, `tagName`) VALUES
(12, 'Destination'),
(13, 'Football'),
(14, 'Biodiversité'),
(15, 'Peinture Moderne'),
(18, 'Machine Learning'),
(19, 'Adventure'),
(21, 'Astronomy'),
(22, 'Biology'),
(23, 'Physics'),
(24, 'html');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) DEFAULT '0',
  `password` varchar(255) DEFAULT '0',
  `role` int DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `password`, `role`, `email`, `id`) VALUES
('zahra auteur', '$2y$10$EG/qJVIVZYZvQMIMDC/ujeAOY.4n07wijCw2zpJwd6pR/imXE4Gp.', 2, 'auteur@gmail.com', 1),
('auteurtest', '$2y$10$EwqFdwRA9edJVuNvJTg8SuUYFeZXlEhP6wiTE.9VU/Rp9Wr1He6Be', 1, 'test@gmail.com', 2),
('test', '$2y$10$pbcle3Z4ZcdPbJNyxFdr3OzsGelSlpp/y3zcPmRAZ4mjE8Ocb9jK.', 2, 'test@gmail.com', 3),
('fati', '$2y$10$1MKT8pBmdA.hsjrPUiUfn.Jttbru4vaMIOCLVnBaLQRSdoPSzmP.u', 2, 'fati@gmail.com', 4),
('auteur3', '$2y$10$lwQL5uoPAZF0RnBtg3RVMehha1mjgXcSzdusHSZo7grmHZgYAfwo6', 2, 'auteur3@gmail.com', 5),
('fatima zahra', '$2y$10$mxEbmOlr/dQP7x.GBHxLDO4rlXGRHaaiDfcGDcpDuGwynN50.U63u', 2, 'zahra456@gmail.com', 6),
('admin', '$2y$10$/g54NhhSVFjLDCe0ds3oF.VLx3hCXiEoewIv1teuRI/L2eAZg3rAK', 1, 'admin@gmail.com', 7);

-- --------------------------------------------------------

--
-- Table structure for table `wiki`
--

CREATE TABLE `wiki` (
  `wikiID` int NOT NULL,
  `title` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categoryID` int NOT NULL,
  `tagID` int DEFAULT NULL,
  `status` enum('Published','Archived') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Archived',
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wiki`
--

INSERT INTO `wiki` (`wikiID`, `title`, `content`, `categoryID`, `tagID`, `status`, `creationDate`, `userId`) VALUES
(4, 'How to Build a Responsive Website', 'In this tutorial, we\'ll explore the step-by-step process of building a responsive website using HTML, CSS, and JavaScript. We\'ll cover key techniques for creating a layout that adapts to different screen sizes and devices.', 10, NULL, 'Published', '2024-01-16 17:20:54', 1),
(5, 'Healthy Cooking Tips', 'Discover a variety of healthy cooking tips to enhance your culinary skills. From incorporating more vegetables into your diet to mastering portion control, these tips will help you create delicious and nutritious meals.', 11, NULL, 'Published', '2024-01-16 21:18:59', 4),
(6, 'Web Design Trends 2024', 'Explore the latest web design trends for 2024, including responsive design, dark mode, and immersive user experiences. Stay ahead in the ever-evolving world of web development.', 10, NULL, 'Published', '2024-01-16 21:20:11', 4),
(7, 'Introduction to Python Programming', 'In this tutorial, we\'ll cover the basics of Python programming, including data types, control structures, and functions.', 10, NULL, 'Published', '2024-01-16 23:13:30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `wikitags`
--

CREATE TABLE `wikitags` (
  `tag_id` int NOT NULL,
  `wiki_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wikitags`
--

INSERT INTO `wikitags` (`tag_id`, `wiki_id`) VALUES
(12, 4),
(15, 4),
(14, 5),
(14, 6),
(18, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tagID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wiki`
--
ALTER TABLE `wiki`
  ADD PRIMARY KEY (`wikiID`),
  ADD UNIQUE KEY `wikiID` (`wikiID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `wiki_ibfk_1` (`userId`);

--
-- Indexes for table `wikitags`
--
ALTER TABLE `wikitags`
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `wikitags_ibfk_2` (`wiki_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tagID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wiki`
--
ALTER TABLE `wiki`
  MODIFY `wikiID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wiki`
--
ALTER TABLE `wiki`
  ADD CONSTRAINT `wiki_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wiki_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wikitags`
--
ALTER TABLE `wikitags`
  ADD CONSTRAINT `wikitags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tagID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wikitags_ibfk_2` FOREIGN KEY (`wiki_id`) REFERENCES `wiki` (`wikiID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
