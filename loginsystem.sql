-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 07:05 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

CREATE TABLE `roster` (
  `r_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `shift_time` varchar(50) DEFAULT NULL,
  `day` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roster`
--

INSERT INTO `roster` (`r_id`, `user_name`, `shift_time`, `day`) VALUES
(2, 'RRPrime', '10 pm to 8 am', 'Saturday'),
(3, 'RRPrime', '2 pm to 8 pm', 'Tuesday'),
(5, 'rakib1', '10 pm to 8 am', 'Friday'),
(6, 'rakib1', '8 am to 2 pm', 'Saturday'),
(7, 'rakib1', '8 am to 2 pm', 'Monday');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_fullname` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_gender` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_phonenumber` int(11) NOT NULL,
  `user_address` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_fullname`, `user_name`, `user_gender`, `user_email`, `user_phonenumber`, `user_address`, `user_pwd`, `user_type`) VALUES
('Rakib', 'rakib1', 'Male', 'rakib@gmail.com', 175607450, 'B/A,Hatirjheel', '$2y$10$xi3b/c4CYr6abXVkgGcwseOr4Rfa93AgfCIlTdoVZZyuTPvUYgnX6', 'User'),
('Raiyan', 'RRPrime', 'Male', 'raiyanrashidprodhan@gmail.com', 1756074508, '130/10/1-c,madartek', '$2y$10$Hyqhnzcg72l6O4kYpLNJCuIKGeQHtD.DYq8b6GEMi7vMHsgogTFne', 'Admin'),
('Sadia', 'sadia1', 'Female', 'sadia@gmail.com', 175607450, '11/B,Banasree', '$2y$10$CWYxQ06VFEWrvazqRobZAesSJKg.Y.FLQktch0RfXWInqpk7m50Oy', 'User'),
('Shishir', 'shishir1', 'Male', 'shishir@gmail.com', 8932489, '150/3/Jurain,Shyampur', '$2y$10$Y9kEI6KMX.BtK/9bU8SeB.7fOfobVC5tKl1Znpq2WhvWxf0RDvJSy', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roster`
--
ALTER TABLE `roster`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roster`
--
ALTER TABLE `roster`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roster`
--
ALTER TABLE `roster`
  ADD CONSTRAINT `roster_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
