-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2017 at 12:54 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojekonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_ojek`
--

CREATE TABLE `order_ojek` (
  `order_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `driver_id` int(5) NOT NULL,
  `picking_location` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `user_id` int(5) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_driver` tinyint(1) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`user_id`, `username`, `password`, `nama_lengkap`, `no_hp`, `email`, `is_driver`, `photo`) VALUES
(1, 'annsnrlzhr', '090699', 'annisa', '082134280006', 'annisanurulazhar@yahoo.com', 1, '/assets/image/user_photo/');

-- --------------------------------------------------------

--
-- Table structure for table `preferred_location`
--

CREATE TABLE `preferred_location` (
  `user_id` int(5) NOT NULL,
  `preferred_loc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferred_location`
--

INSERT INTO `preferred_location` (`user_id`, `preferred_loc`) VALUES
(1, 'Cirebon');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `user_id` int(5) NOT NULL,
  `rating_num` int(1) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`user_id`, `rating_num`, `comments`) VALUES
(1, 5, 'luar biasa'),
(1, 3, 'biasa aja'),
(1, 2, 'jelek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_ojek`
--
ALTER TABLE `order_ojek`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `preferred_location`
--
ALTER TABLE `preferred_location`
  ADD PRIMARY KEY (`user_id`,`preferred_loc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `preferred_location`
--
ALTER TABLE `preferred_location`
  ADD CONSTRAINT `preferred_location_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `penumpang` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
