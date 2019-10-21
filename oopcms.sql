-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 06:29 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oopcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `body` text COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`) VALUES
(1, 13, 'me', 'The photo should be changes, since it\'s not appropriate'),
(3, 13, 'sadas', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus\r\n						scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum\r\n						in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac\r\n						nisi vulputate fringilla. Donec lacinia congue felis in faucibus.'),
(4, 17, 'Asana', 'Very beautiful wulf'),
(5, 15, 'Kazkas', 'Labai baisus dizainas. Reikia taisyti....'),
(7, 13, 'XXX', 'Privaloma greičiau keisti. Negaliu daugiau žiūrėti!! :(');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `description` text COLLATE utf8_lithuanian_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alt_text`, `type`, `size`) VALUES
(12, 'Some meaningfule title', 'Dummy text', 'Descritpion description, not caption', 'a9264dd7_154b_43ff_824a_0b620bc3aece.jpg', 'Alternate tets', 'image/jpeg', 45377),
(13, 'ne ne nene', 'dana', 'nada asasasasas asa as as as as as a', '5fe259be-f9bc-4771-8a1a-fd22e87c472c.jpg', 'kalnai', 'image/jpeg', 217383),
(15, 'screenshgot', 'ana', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel lorem dolor. Proin eu semper urna. Maecenas auctor velit facilisis porta tincidunt. Aliquam erat volutpat. Donec facilisis accumsan dolor quis dignissim. Donec ac elit lobortis, facilisis quam at, mattis nulla. Vestibulum tellus dolor, auctor sed vehicula eget, aliquam quis lacus. Mauris aliquet nibh vel quam tincidunt, eu pellentesque nulla hendrerit. Cras feugiat mauris dolor, vitae porta tellus efficitur quis. Donec fringilla at magna id condimentum. Curabitur eleifend libero non ultricies tristique. Integer eget mollis orci, nec varius enim. Nulla efficitur lacus quis augue feugiat, in rhoncus justo tincidunt. Quisque in ligula augue. Nulla a mattis nibh, ullamcorper pretium est. ', 'Screenshot_2019-10-04-13-09-24-068_com.android.browser.png', '123', 'image/png', 269174),
(17, 'sssss', '', '', '1d13e4c9-2854-43d2-9fa2-ae6e5d2370af_14.jpg', '', 'image/jpeg', 665599),
(19, 'kuma', '', '', '2ae86584-3ed3-4536-b499-4fc1aa1485f0_6.jpg', '', 'image/jpeg', 640746),
(20, 'kazkas kazkas dar moonlioght', '', '', '23.jpg', '', 'image/jpeg', 91639),
(21, 'papy', '', '', '6efa28a1-18f0-44b6-b27c-2816b3c0a1f9_7.jpg', '', 'image/jpeg', 727420),
(25, '', '', '', 'images-12.jpg', '', 'image/jpeg', 18540),
(26, '', '', '', 'images-11 copy.jpg', '', 'image/jpeg', 27916),
(27, '', '', '', 'images-11.jpg', '', 'image/jpeg', 27916);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `filename`) VALUES
(1, 'rico', '123', 'John', 'Dowe', 'user.png'),
(6, 'lala', '123', 'Joahna', 'Michaels', '7.png'),
(7, 'nana', 'dna', 'John', 'Doe', 'Steve-Lowry-2.png'),
(11, 'kakashka', '111', 'Diana', 'Sweet', '4.png'),
(15, 'klank', 'spa', 'Luke', 'Millers', '23.jpg'),
(16, 'nimka', 'ddd', 'Jonas', 'Ramonas', '6efa28a1-18f0-44b6-b27c-2816b3c0a1f9_7.jpg'),
(18, 'kimi', 'w4u', 'Fumiko', 'Sasane', '2bc9df77-6cef-48cb-a3e0-47dfa006e9ab_6.jpg'),
(21, 'mamama', '5569', 'Martyna', 'Jonaite', '0da4e6b9-0f73-47b8-83eb-be74517adf9f_6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
