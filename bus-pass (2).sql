-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 01:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus-pass`
--

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

CREATE TABLE `amount` (
  `a_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `a_fare` float NOT NULL,
  `a_date` date NOT NULL DEFAULT current_timestamp(),
  `a_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`a_id`, `type_id`, `cat_id`, `a_fare`, `a_date`, `a_status`) VALUES
(3, 1, 1, 20, '2025-05-06', ''),
(4, 1, 2, 20, '2025-05-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `buspassapplications`
--

CREATE TABLE `buspassapplications` (
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(300) NOT NULL,
  `application_date` date NOT NULL DEFAULT current_timestamp(),
  `a_id` int(11) NOT NULL,
  `pass_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buspassapplications`
--

INSERT INTO `buspassapplications` (`application_id`, `user_id`, `status`, `application_date`, `a_id`, `pass_id`) VALUES
(1, 1, 'conformed', '0000-00-00', 1, 1),
(6, 1, '', '0000-00-00', 1, 3),
(7, 1, '', '2025-05-06', 3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `buspasses`
--

CREATE TABLE `buspasses` (
  `pass_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `aemail` varchar(300) NOT NULL,
  `aphone` bigint(20) NOT NULL,
  `age` int(11) NOT NULL,
  `valid_from` varchar(300) NOT NULL,
  `image` varchar(400) NOT NULL,
  `f_price` float NOT NULL,
  `pass_status` varchar(400) NOT NULL,
  `pass_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buspasses`
--

INSERT INTO `buspasses` (`pass_id`, `user_id`, `a_id`, `name`, `aemail`, `aphone`, `age`, `valid_from`, `image`, `f_price`, `pass_status`, `pass_date`) VALUES
(15, 1, 3, 'hjh', 'user@gmail.com', 1234567899, 20, '1', 'uploader/bg2222.jpeg', 4000, 'pending', '2025-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `caste_category`
--

CREATE TABLE `caste_category` (
  `ccat_id` int(11) NOT NULL,
  `ccat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caste_category`
--

INSERT INTO `caste_category` (`ccat_id`, `ccat_name`) VALUES
(1, 'General'),
(2, 'SC'),
(3, 'ST'),
(4, 'OBC'),
(5, 'EWS');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(300) NOT NULL,
  `f_email` varchar(300) NOT NULL,
  `f_sub` varchar(300) NOT NULL,
  `f_msg` longtext NOT NULL,
  `f_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_name`, `f_email`, `f_sub`, `f_msg`, `f_date`) VALUES
(1, 'Likhitha K R k r', 'likhitha@gmail.com', 'aaa', 'akjd dij weiudjqe', '2025-04-24'),
(2, 'Likhitha K R k r', 'likhitha@gmail.com', 'aaa', 'akjd dij weiudjqe', '2025-04-24'),
(3, 'Likhitha K R k r', 'likhitha@gmail.com', 'aaa', 'wmdi wdhiwhedihe iueduw', '2025-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `date` date NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pass_category`
--

CREATE TABLE `pass_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(300) NOT NULL,
  `cat_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pass_category`
--

INSERT INTO `pass_category` (`cat_id`, `cat_name`, `cat_date`) VALUES
(1, 'Student', '2025-04-21'),
(2, 'General', '2025-04-21'),
(3, 'SeniorCitizen', '2025-04-21'),
(4, 'Disabled', '2025-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `pass_type`
--

CREATE TABLE `pass_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(300) NOT NULL,
  `type_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pass_type`
--

INSERT INTO `pass_type` (`type_id`, `type_name`, `type_date`) VALUES
(1, 'Monthly', '2025-04-21'),
(2, 'Quarterly', '2025-04-21'),
(3, 'HalfYearly', '2025-04-21'),
(4, 'Annual', '2025-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(300) NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `pay_status` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pass_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_type`, `transaction_id`, `amount`, `payment_date`, `pay_status`, `user_id`, `pass_id`) VALUES
(1, 'scanner', 2384282748, 1300, '0000-00-00', '', 1, 1),
(2, 'scanner', 2384282748, 1300, '0000-00-00', 'conformed', 1, 1),
(3, 'cash', 0, 4000, '0000-00-00', ' ', 1, 15),
(4, 'cash', 0, 4000, '0000-00-00', ' ', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `r_id` int(11) NOT NULL,
  `from` varchar(300) NOT NULL,
  `to` varchar(300) NOT NULL,
  `price` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `r_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`r_id`, `from`, `to`, `price`, `date`, `r_status`) VALUES
(1, 'hsadkh', 'sdjkjfk', 20000, '2025-05-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `profile` varchar(400) NOT NULL,
  `role` varchar(300) NOT NULL,
  `u_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `profile`, `role`, `u_status`) VALUES
(1, 'user', 'a1b2518cd2973233da5392240ff5d680', 'user@gmail.com', 'uploader/133700921115420828.jpg', 'user', 0),
(2, 'user', 'a1b2518cd2973233da5392240ff5d680', 'user@gmail.com', 'uploader/133700921115420828.jpg', 'user', 0),
(3, 'admin', 'a1b2518cd2973233da5392240ff5d680', 'admin@gmail.com', '', 'admin', 0),
(4, 'hjasj', 'a1b2518cd2973233da5392240ff5d680', 'a@gmail.com', 'uploader/133700921115420828.jpg', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amount`
--
ALTER TABLE `amount`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `buspassapplications`
--
ALTER TABLE `buspassapplications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `buspasses`
--
ALTER TABLE `buspasses`
  ADD PRIMARY KEY (`pass_id`);

--
-- Indexes for table `caste_category`
--
ALTER TABLE `caste_category`
  ADD PRIMARY KEY (`ccat_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `pass_category`
--
ALTER TABLE `pass_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `pass_type`
--
ALTER TABLE `pass_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amount`
--
ALTER TABLE `amount`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buspassapplications`
--
ALTER TABLE `buspassapplications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `buspasses`
--
ALTER TABLE `buspasses`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `caste_category`
--
ALTER TABLE `caste_category`
  MODIFY `ccat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pass_category`
--
ALTER TABLE `pass_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pass_type`
--
ALTER TABLE `pass_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
