-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2020 at 05:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phoebehuangdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `street`, `city`, `state`, `zip`, `phone`, `email`) VALUES
(1, 'Phoebe Huang', '452 Sierra Ct', 'Mahwah', 'NJ', '07430', '2019620268', 'phoebe94huang@gmail.com'),
(2, 'Justin Huang', '452 Sierra Ct', 'Mahwah', 'NJ', '07430', '2019620266', 'justin452huang@gmail.com'),
(3, 'Kipper Dog', '254 Clifford Ave', 'New York', 'NY', '10119', '5477377829', 'kipper@kipperhotel.com'),
(4, 'Rocky Red Hawk', '1 Normal Ave', 'Montclair', 'NJ', '07043', '9736554000', 'rocky@montclair.edu'),
(5, 'Scooby Doo', '123 Scooby St', 'Los Angeles', 'CA', '90001', '7266293661', 'scoobydoo@scooby.com'),
(6, 'Santa Claus', '1 North Pole Ln', 'Juneau', 'AK', '99801', '7268225287', 'santa@theclaus.org'),
(7, 'Barack Obama', '1600 Pennsylvania Ave NW', 'Washington', 'DC', '20500', '2024561111', 'thepresident@usa.gov');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `checkIn` date DEFAULT NULL,
  `checkOut` date DEFAULT NULL,
  `guestName` varchar(255) DEFAULT NULL,
  `roomID` int(11) DEFAULT NULL,
  `totalPrice` decimal(7,2) NOT NULL,
  `numRooms` int(11) NOT NULL,
  `numAdults` int(11) NOT NULL,
  `numKids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `checkIn`, `checkOut`, `guestName`, `roomID`, `totalPrice`, `numRooms`, `numAdults`, `numKids`) VALUES
(1, '2020-05-04', '2020-05-12', 'Phoebe Huang', 5, '3392.52', 1, 4, 0),
(2, '2020-07-01', '2020-07-13', 'Justin Huang', 3, '2593.17', 1, 6, 0),
(3, '2020-05-06', '2020-05-11', 'Kipper Dog', 4, '1358.90', 1, 1, 0),
(4, '2020-08-08', '2020-08-15', 'Rocky Red Hawk', 2, '2142.14', 2, 4, 2),
(5, '2020-07-03', '2020-07-08', 'Scooby Doo', 1, '1369.60', 2, 4, 3),
(6, '2020-08-09', '2020-08-13', 'Santa Claus', 1, '614.65', 1, 2, 0),
(7, '2020-04-20', '2020-05-04', 'Barack Obama', 1, '2151.28', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sqft` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `type`, `sqft`, `price`, `image`) VALUES
(1, 'Standard King', '350 sq ft', '143.61', '/phoebeHuangHotel/images/kingStandard.png'),
(2, 'Standard Double', '362 sq ft', '143.66', '/phoebeHuangHotel/images/doubleStandard.png'),
(3, 'Silver Suite', '743 sq ft', '201.96', '/phoebeHuangHotel/images/silverSuite.png'),
(4, 'Gold Suite', '808 sq ft', '401.99', '/phoebeHuangHotel/images/goldSuite.png'),
(5, 'Presidential Suite', '1208 sq ft', '452.94', '/phoebeHuangHotel/images/presidentialSuite.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomID` (`roomID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
