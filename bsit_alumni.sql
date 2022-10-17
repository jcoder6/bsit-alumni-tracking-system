-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 04:41 PM
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
(31, 34, 'Lester', 'Cayago', 'Taguiam', 9123456789, 'lester@gmail.com', 'male', '2001-11-07', 'single', '#115, Donya st, Aliaga', 'Malasiqui', 2421, 'Pangasinan', 'Philippines'),
(32, 36, 'Shekina', 'Diego', 'Cayago', 912321312, 'shek@gmail.com', 'female', '2001-06-24', 'married', '#000,Centro,Lepa', 'Malasiqui', 2421, 'Pangasinan', 'Philippines'),
(33, 37, 'Jennifer', 'Padua', 'Bulatao', 999823812, 'jen@gmail.com', 'female', '2001-03-20', 'single', '#123,Capes, Aliaga', 'Malasiqui', 2421, 'Pangasinan', 'Philippines'),
(34, 38, 'Ivan Gerard', 'De', 'Deguzman', 912312321, 'ivan@gmail.com', 'male', '2012-06-27', 'single', '#311,dunno,Pobliacion', 'Malasiqui', 2311, 'Pangasinan', 'Philippines');

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
(2, 'BS Nursing', 'BSN'),
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
(28, 37, 'BS Information Technology', 2031),
(29, 38, 'BS Information Technology', 1231);

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
(26, 34, 'employed', 'Google', 'Software Engineer', '100,001-200,000'),
(27, 36, 'employed', 'Amazon', 'Graphic Designer', '100,001-200,000'),
(28, 37, 'unemployed', 'unemployed', 'unemployed', 'unemployed'),
(29, 38, 'unemployed', 'unemployed', 'unemployed', 'unemployed');

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
(3, 'Face-To-Face Classes', '2022-04-25', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id reprehenderit libero, laudantium quo eveniet ea deserunt nulla est voluptate. Aut obcaecati dolor nesciunt laboriosam sint nostrum veritatis cupiditate qui suscipit nisi, ab, quibusdam quidem enim, quo hic quisquam accusamus totam est similique culpa ea possimus? Ex reiciendis blanditiis ab provident.</p>\\r\\n', 'School_Event_888.jpg'),
(4, 'Mr. & Ms. PSU Bayambang Centennial', '2022-03-29', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id reprehenderit libero, laudantium quo eveniet ea deserunt nulla est voluptate. Aut obcaecati dolor nesciunt laboriosam sint nostrum veritatis cupiditate qui suscipit nisi, ab, quibusdam quidem enim, quo hic quisquam accusamus totam est similique culpa ea possimus? Ex reiciendis blanditiis ab provident.</p>\\r\\n', 'School_Event_818.jpg'),
(5, '12th Anniversary Celebration', '2022-06-06', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id reprehenderit libero, laudantium quo eveniet ea deserunt nulla est voluptate. Aut obcaecati dolor nesciunt laboriosam sint nostrum veritatis cupiditate qui suscipit nisi, ab, quibusdam quidem enim, quo hic quisquam accusamus totam est similique culpa ea possimus? Ex reiciendis blanditiis ab provident.</p>\\r\\n', 'School_Event_211.jpg'),
(6, 'Heart Awareness Month', '2022-02-18', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id reprehenderit libero, laudantium quo eveniet ea deserunt nulla est voluptate. Aut obcaecati dolor nesciunt laboriosam sint nostrum veritatis cupiditate qui suscipit nisi, ab, quibusdam quidem enim, quo hic quisquam accusamus totam est similique culpa ea possimus? Ex reiciendis blanditiis ab provident.</p>\\r\\n', 'School_Event_215.png');

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
(31, '', 1, 'user', '6ad14ba9986e3615423dfca256d04e3f', 1, '2022-06-20 14:52:52'),
(34, 'USER_AVATAR_509.PNG', 1, 'lest', '202cb962ac59075b964b07152d234b70', 1, '2022-06-23 12:26:10'),
(36, '', 1, 'shek', '588373a2d9425127ba6ff425594c2533', 1, '2022-06-23 16:18:14'),
(37, '', 0, 'jen', '4db63cb2f0bde8c4a2582b0e66fe4c7a', 1, '2022-06-23 19:41:21'),
(38, '', 0, 'ivan', 'b7727d252be76bc6d142e19315cfc8fd', 1, '2022-06-23 19:43:11');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `educ`
--
ALTER TABLE `educ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
