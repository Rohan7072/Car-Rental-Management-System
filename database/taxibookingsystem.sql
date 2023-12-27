-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 02:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxibookingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabregistration`
--

CREATE TABLE `cabregistration` (
  `id` int(10) NOT NULL,
  `cabmodel` varchar(30) NOT NULL,
  `cabtype` varchar(20) NOT NULL,
  `cabcolor` varchar(20) NOT NULL,
  `cabnumber` varchar(20) NOT NULL,
  `cabfare` int(20) NOT NULL,
  `carfueltype` varchar(100) NOT NULL,
  `carrentalfee` varchar(50) NOT NULL,
  `currentmilage` varchar(100) NOT NULL,
  `yearofmanufacture` varchar(100) NOT NULL,
  `photo` blob NOT NULL,
  `caravailability` enum('Available','Not Available') NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cabregistration`
--

INSERT INTO `cabregistration` (`id`, `cabmodel`, `cabtype`, `cabcolor`, `cabnumber`, `cabfare`, `carfueltype`, `carrentalfee`, `currentmilage`, `yearofmanufacture`, `photo`, `caravailability`) VALUES
(6, 'altroz', '', 'blue', 'MH 12 UD 2394', 15, 'Petrol, CNG & Diesel', '800', '23.64 kmpl / 1-litre', '2020', 0x616c74726f7a2e6a7067, 'Available'),
(7, 'CRETA', '', 'Black', 'MH 12 UD 2234', 15, 'Petrol & Diesel', '1000', '21.4 Kmpl. / 1-litre', '2015', 0x6372656174612e6a7067, 'Available'),
(8, 'AURA', '', 'Silver', 'MH 12 UD 2020', 16, 'Petrol/CNG', '900', '17.5 - 23 km/l', '2020', 0x617572612e6a7067, 'Available'),
(9, 'HARRIER', '', 'Light-Blue', 'MH 12 AS 4034', 20, 'Diesel', '2000', '14.6 kmpl', '2021', 0x686172726965722e6a7067, 'Available'),
(10, 'SAFARI', '', 'Blue', 'MH 12 HS 9876', 20, 'Diesel', '3000', '14.08 - 16.14 kmpl', '2022', 0x7361666172692e6a7067, 'Available'),
(11, 'TIAGO', '', 'red', 'MH 12 VF 4000', 15, 'petrol', '700', '26.49 km/kg', '2019', 0x746961676f2e6a7067, 'Available'),
(12, 'VERNA', '', 'Black', 'MH 12 UD 2020', 20, 'petrol', '1500', '20.6 kmpl', '2019', 0x7665726e612e706e67, 'Available'),
(13, 'VENUE', '', 'red', 'MH 12 HS 2349', 20, 'petrol', '1500', '16.0 kmpl', '2020', 0x76656e75652e6a7067, 'Available'),
(14, 'GRAND i10', '', 'red', 'MH 12 UD 2020', 12, 'petrol', '600', '17.0 kmpl', '2015', 0x4772616e745f6931302e6a7067, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(256) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driverregistration`
--

CREATE TABLE `driverregistration` (
  `id` int(3) NOT NULL,
  `name` varchar(80) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `email` varchar(80) NOT NULL,
  `age` int(3) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `liecenseno` varchar(21) NOT NULL,
  `address` varchar(400) NOT NULL,
  `experiance` varchar(40) NOT NULL,
  `pancard` varchar(100) NOT NULL,
  `photo` blob NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` varchar(3) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `address` varchar(100) NOT NULL,
  `aadharnumber` int(100) NOT NULL,
  `panno` varchar(100) NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tripexpense`
--

CREATE TABLE `tripexpense` (
  `id` int(10) NOT NULL,
  `tripid` int(50) NOT NULL,
  `food` int(10) NOT NULL,
  `parking` int(10) NOT NULL,
  `fuel` int(10) NOT NULL,
  `generalmaintainance` int(10) NOT NULL,
  `tolltax` int(10) NOT NULL,
  `rtofines` int(10) NOT NULL,
  `medicalinsurance` int(10) NOT NULL,
  `roadsideassistance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tripregister`
--

CREATE TABLE `tripregister` (
  `tripid` int(100) NOT NULL,
  `pickuptime` varchar(50) NOT NULL,
  `pickupdate` datetime NOT NULL,
  `dropoffdate` datetime NOT NULL,
  `pickupaddress` varchar(100) NOT NULL,
  `dropoffadress` varchar(100) NOT NULL,
  `carno` varchar(10) NOT NULL,
  `carname` varchar(100) NOT NULL,
  `carrentalfee` varchar(50) NOT NULL,
  `driverid` varchar(10) NOT NULL,
  `drivername` varchar(100) NOT NULL,
  `customerid` varchar(10) NOT NULL,
  `customername` varchar(100) NOT NULL,
  `customeremail` varchar(100) NOT NULL,
  `customerphone` varchar(10) NOT NULL,
  `customeraddress` varchar(400) NOT NULL,
  `triproute` varchar(100) NOT NULL,
  `triptime` varchar(6) NOT NULL,
  `tripratekm` varchar(100) NOT NULL,
  `tripcost` varchar(20) NOT NULL,
  `tripkilometers` int(10) NOT NULL,
  `tripstatus` varchar(50) NOT NULL,
  `payment_status` int(1) NOT NULL COMMENT '0=NotPaid\r\n1=paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabregistration`
--
ALTER TABLE `cabregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driverregistration`
--
ALTER TABLE `driverregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tripexpense`
--
ALTER TABLE `tripexpense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tripregister`
--
ALTER TABLE `tripregister`
  ADD PRIMARY KEY (`tripid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabregistration`
--
ALTER TABLE `cabregistration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driverregistration`
--
ALTER TABLE `driverregistration`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tripexpense`
--
ALTER TABLE `tripexpense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tripregister`
--
ALTER TABLE `tripregister`
  MODIFY `tripid` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
