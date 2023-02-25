-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 08:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted`
--

CREATE TABLE `accepted` (
  `id` int(100) NOT NULL,
  `users_id` varchar(100) NOT NULL,
  `sp_id` varchar(100) NOT NULL,
  `users_name` varchar(100) NOT NULL,
  `acc_name` varchar(100) NOT NULL,
  `acc_price` varchar(100) NOT NULL,
  `acc_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accepted`
--

INSERT INTO `accepted` (`id`, `users_id`, `sp_id`, `users_name`, `acc_name`, `acc_price`, `acc_image`) VALUES
(11, '13', '11', 'anas', 'Electricity Checking', '1000', 'product-1.jpeg'),
(12, '13', '11', 'anas', 'New Electricity Connection', '2000', 'product_3.jpg'),
(13, '13', '11', 'anas', 'Electricity Checking', '1000', 'product-1.jpeg'),
(14, '13', '11', 'anas', 'Electricity Checking', '1000', 'product-1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`) VALUES
(1, 'xt7TBEBX', 'XW367REB7'),
(2, 'asfucyah', 'efcfayt'),
(3, 'qgafgyubqwah', 'wruygdyua');

-- --------------------------------------------------------

--
-- Table structure for table `done`
--

CREATE TABLE `done` (
  `id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `sp_id` varchar(100) NOT NULL,
  `sp_name` varchar(100) NOT NULL,
  `sv_name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `user_city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `catagories` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `catagories`) VALUES
(1, 'Electricity Checking', '1000', 'product-1.jpeg', 'electric'),
(2, 'Connection Change', '1500', 'product-2.jpeg', 'electric'),
(3, 'New Electricity Connection', '2000', 'product_3.jpg', 'electric'),
(4, 'Plumbing', '800', 'product-4.jpeg', 'plumbing'),
(5, 'Interior Decoration', '12000', 'product-5.jpeg', 'Household_services'),
(6, 'Cleaning Services', '1000', 'product-6.jpeg', 'Household_services'),
(7, 'Catering Services', '850', 'product-7.jpeg', 'Household_services'),
(8, 'Home Decoration', '1000', 'product-8.jpeg', 'Household_services');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `sv_catagory` varchar(100) NOT NULL,
  `sv_name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `all_to` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sp`
--

CREATE TABLE `sp` (
  `sp_id` int(100) NOT NULL,
  `sp_name` varchar(100) NOT NULL,
  `sp_email` varchar(100) NOT NULL,
  `sp_password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'service_provider',
  `sp_image` varchar(100) NOT NULL,
  `kyc_status` varchar(100) NOT NULL DEFAULT 'pending',
  `sp_address` varchar(1000) NOT NULL,
  `sp_city` varchar(50) NOT NULL,
  `sp_pincode` varchar(50) NOT NULL,
  `profession` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sp`
--

INSERT INTO `sp` (`sp_id`, `sp_name`, `sp_email`, `sp_password`, `user_type`, `sp_image`, `kyc_status`, `sp_address`, `sp_city`, `sp_pincode`, `profession`) VALUES
(11, 'sumit', 'sd@gmail.com', '123', 'service_provider', 'Rely logo.png', 'pending', 'ambewadi indira nagar road no.22 opposite sansar bakery, wagle estate, thane west', 'thane', '', 'electric');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `pin_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `user_type`, `image`, `city`, `address`, `pin_code`) VALUES
(13, 'anas', 'anas@gmail.com', '123', 'user', 'bird1.png', 'thane', 'ambewadi indira nagar road no.22 opposite sansar bakery, wagle estate, thane west', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted`
--
ALTER TABLE `accepted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `done`
--
ALTER TABLE `done`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted`
--
ALTER TABLE `accepted`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `done`
--
ALTER TABLE `done`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sp`
--
ALTER TABLE `sp`
  MODIFY `sp_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
