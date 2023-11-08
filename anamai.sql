-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 09:29 AM
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
-- Database: `anamai`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `nametitle` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `IDcard` varchar(100) NOT NULL,
  `Tel` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `descriptions` varchar(100) NOT NULL,
  `start_datetime` date NOT NULL,
  `CT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`id`, `title`, `nametitle`, `name`, `IDcard`, `Tel`, `description`, `descriptions`, `start_datetime`, `CT`) VALUES
(1, 'คิวที่ 1 เวลา 8:30น.', 'นาย', 'ลุงแดง', '2222222222222', '22-2222-2222', 'ถอนฟัน', 'ๅๅๅๅๅๅๅๅๅๅๅๅๅๅๅๅๅๅๅๅๅๅๅๅๅๅ', '2023-10-01', '0000-00-00'),
(2, 'คิวที่ 5 เวลา 10:30น.', 'นาย', 'ลุงแดง', '2222222222222', '22-2222-2222', 'ขูดหินปูน', '64654', '2023-09-20', '0000-00-00'),
(3, 'คิวที่ 1 เวลา 8:30น.', 'นาย', 'ลุงแดง', '2222222222222', '22-2222-2222', 'ขูดหินปูน', '64654', '2023-09-20', '0000-00-00'),
(4, 'คิวที่ 6 เวลา 11:00น.', 'นาย', 'ลุงแดง', '2222222222222', '22-2222-2222', 'ขูดหินปูน', '64654', '2023-09-20', '0000-00-00'),
(5, 'คิวที่ 6 เวลา 11:00น.', 'นาย', 'ลุงแดง', '2222222222222', '22-2222-2222', 'ขูดหินปูน', '64654', '2023-09-20', '0000-00-00'),
(6, 'คิวที่ 7 เวลา 13:00น.', 'นาย', 'คณิน  อมรสวัสดิ์ชัย', '1111111111111', '11-1111-1111', 'อุดฟัน', '', '2023-10-01', '0000-00-00'),
(7, 'คิวที่ 4 เวลา 10.00น.', 'นาย', 'คณิน', '1111111111111', '11-1111-1111', 'อุดฟัน', '', '2023-10-04', '2023-10-04'),
(8, 'คิวที่ 4 เวลา 10.00น.', 'นาย', 'คณิน', '1111111111111', '11-1111-1111', 'เคลือบฟลูออไรด์', '', '2023-10-28', '2023-10-21'),
(9, 'คิวที่ 1 เวลา 8:30น.', 'นาย', 'คณิน', '1111111111111', '11-1111-1111', 'อุดฟัน', '', '2023-10-21', '2023-10-21'),
(10, 'คิวที่ 2 เวลา 9.00น.', 'นาย', 'คณิน', '1111111111111', '11-1111-1111', 'ตรวจสุขภาพฟัน', '', '2023-10-21', '2023-10-21'),
(11, 'คิวที่ 3 เวลา 9.30น.', 'นาย', 'คณิน', '1111111111111', '11-1111-1111', 'ตรวจสุขภาพฟัน', '', '2023-10-21', '2023-10-21'),
(12, 'คิวที่ 4 เวลา 10.00น.', 'นาย', 'คณิน', '1111111111111', '11-1111-1111', 'ตรวจสุขภาพฟัน', '', '2023-10-21', '2023-10-21'),
(13, 'คิวที่ 5 เวลา 10:30น.', 'นาย', 'คณิน', '1111111111111', '11-1111-1111', 'ตรวจสุขภาพฟัน', '', '2023-10-21', '2023-10-21'),
(14, 'คิวที่ 2 เวลา 9.00น.', 'นางสาว', 'gfgfghfghfghfghfghfg', '2222222222222', '22-2222-2222', 'ขูดหินปูน', '', '2023-10-20', '2023-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(100) NOT NULL,
  `nametitle` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `IDcard` varchar(100) NOT NULL,
  `Tel` varchar(100) NOT NULL,
  `HBD` varchar(100) NOT NULL,
  `SexBG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `nametitle`, `name`, `IDcard`, `Tel`, `HBD`, `SexBG`) VALUES
(1, 'นาย', 'ทดสอบ', '0000000000000', '00-0000-0000', '04 / พฤษภาคม / 2478', 'ชาย'),
(2, 'นางสาว', 'gfgfghfghfghfghfghfg', '2222222222222', '22-2222-2222', '02 / มกราคม / 2476', 'หญิง'),
(3, '', 'ผู้ดูแล', 'dt-bangyai@dtby.com', '99-9999-9999', '', ''),
(5, 'นาย', 'คณิน', '1111111111111', '11-1111-1111', '14 / เมษายน / 2490', 'ชาย'),
(6, 'นาย', 'ทดสอบ', '3333333333333', '33-3333-3333', '13 / พฤษภาคม / 2490', 'ชาย');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
