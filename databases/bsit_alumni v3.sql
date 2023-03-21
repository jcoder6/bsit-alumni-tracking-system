-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 04:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsit_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `bio`
--

CREATE TABLE `bio` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `contactno` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `house` varchar(50) NOT NULL,
  `municipal` varchar(50) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `province` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bio`
--

INSERT INTO `bio` (`id`, `user_id`, `firstname`, `middlename`, `lastname`, `contactno`, `email`, `gender`, `birthdate`, `status`, `house`, `municipal`, `zipcode`, `province`, `country`) VALUES
(30, 31, 'Jomer', 'Tamayo', 'Dorego', 912312312, 'jdorego@gmail.com', 'male', '2001-11-06', 'married', '12,Gangnam', 'Seoul', 1111, 'Korea', 'North'),
(31, 34, 'Lester', 'Cayago', 'Taguiam', 9123456781, 'lester@gmail.com', 'male', '2001-11-07', 'single', '#115, Donya st, Aliaga', 'Malasiqui', 2421, 'Pangasinan', 'Philippines'),
(32, 36, 'Shekina', 'Diego', 'Cayago', 912321312, 'shek@gmail.com', 'female', '2001-06-24', 'single', '#000,Centro,Lepa', 'Malasiqui', 2421, 'Pangasinan', 'Philippines'),
(34, 38, 'Ivan Gerard', 'De', 'Deguzman', 912312321, 'ivan@gmail.com', 'male', '2012-06-27', 'single', '#311,dunno,Pobliacion', 'Malasiqui', 2311, 'Pangasinan', 'Philippines'),
(35, 44, 'Danya', 'sor', 'Realon', 23123123213, 'danya@gmail.com', 'female', '2022-10-30', 'married', 'Sanlibu', 'Bayambang', 2423, 'Pangasinan', 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `course_code`) VALUES
(1, 'BS Information Technology', 'BSIT'),
(3, 'Bachelor of Public Administration', 'BPA');

-- --------------------------------------------------------

--
-- Table structure for table `educ`
--

CREATE TABLE `educ` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educ`
--

INSERT INTO `educ` (`id`, `user_id`, `course`, `batch`) VALUES
(25, 31, 'BS Information Technology', 2001),
(26, 34, 'BS Information Technology', 2024),
(27, 36, 'BS Information Technology', 2024),
(29, 38, 'BS Information Technology', 1231),
(30, 44, 'BS Information Technology', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employed` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`id`, `user_id`, `employed`, `company`, `position`, `salary`) VALUES
(25, 31, 'employed', 'Microsoft', 'Project Manager', '100,001-200,000'),
(26, 34, 'employed', '123', '123', '10,001-50,000'),
(27, 36, 'employed', 'Amazon', 'Graphic Designer', '100,001-200,000'),
(29, 38, 'unemployed', 'unemployed', 'unemployed', 'unemployed'),
(30, 44, 'employed', 'Basta', 'Basta', '200,001 above');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `description`, `img`) VALUES
(10, 'Midterm Exam', '2022-11-28', '<p>Goodluck in Midterm! Fighting.</p>\r\n', 'School_Event_995.webp'),
(11, 'Christmas', '2022-12-25', '<p>Merry Christmas</p>\r\n', 'School_Event_910.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gallery_img` varchar(100) NOT NULL,
  `img_year` int(11) NOT NULL,
  `img_description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_img`, `img_year`, `img_description`, `created_at`) VALUES
(1, 'IMG_GALLERY_0000.jpg', 2020, 'Image in 2020', '2022-11-11 10:17:56'),
(2, 'IMG_GALLERY_0001.jpg', 2021, 'Image in 2020', '2022-11-11 10:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `page_email` varchar(50) NOT NULL,
  `page_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_name`, `contact_no`, `page_email`, `page_img`) VALUES
(1, 'BSIT Alumni Tracking Management System', '+6391096929721', 'psuats@gmail.com', 'MAIN_PHOTO_963.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_img` varchar(50) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_img`, `is_verified`, `username`, `password`, `category`, `date_created`) VALUES
(0, '', 1, 'omer', 'admin123', 0, '2022-06-21 13:06:48'),
(31, 'USER_AVATAR_164.webp', 1, 'user', 'f54f1d149881fa506e8595fabe557400', 1, '2022-06-20 14:52:52'),
(34, 'USER_AVATAR_559.webp', 1, 'lest', 'f54f1d149881fa506e8595fabe557400', 1, '2022-06-23 12:26:10'),
(36, 'USER_AVATAR_538.webp', 1, 'shek', '202cb962ac59075b964b07152d234b70', 1, '2022-06-23 16:18:14'),
(38, 'USER_AVATAR_818.webp', 1, 'ivan', 'f54f1d149881fa506e8595fabe557400', 1, '2022-06-23 19:43:11'),
(44, 'USER_AVATAR_395.jpg', 1, 'danyasorr', '202cb962ac59075b964b07152d234b70', 1, '2022-11-11 06:55:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bio`
--
ALTER TABLE `bio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educ`
--
ALTER TABLE `educ`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bio`
--
ALTER TABLE `bio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `educ`
--
ALTER TABLE `educ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
