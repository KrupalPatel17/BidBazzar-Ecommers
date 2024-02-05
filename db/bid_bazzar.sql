-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 02:27 PM
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
-- Database: `bid_bazzar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `email`, `address`, `phone_number`, `username`, `password`) VALUES
(1, 'ram@gmail.com', '32, parijat society gavendar Jahangirpura', 2147483647, 'ram', 'ram'),
(33, 'patelkrupal679@gmail.com', '32, parijat society gavendar Jahangirpura', 2147483647, 'Krupal', '123'),
(37, 'neertanuwal.7@gmail.com', 'mora', 2147483647, 'neerta', '202cb962ac59075b964b07152d234b'),
(51, 'mahekprajapati0603@gmail.com', 'Krishana Nagar', 2147483647, 'Mahek Patel', '202cb962ac59075b964b07152d234b'),
(52, 'liralpatel@gmail.com', '56te', 456, 'l', '2db95e8e1a9267b7a1188556b2013b'),
(53, 'mahekprajapati0603@gmail.com', 'Krishana Nagar', 2147483647, 'Mahek Patel K.', '202cb962ac59075b964b07152d234b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vender`
--

CREATE TABLE `tbl_vender` (
  `vid_id` int(11) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `vemail` varchar(30) NOT NULL,
  `vaddress` varchar(60) NOT NULL,
  `vphone_no` int(10) NOT NULL,
  `vuser_name` varchar(15) NOT NULL,
  `vpassword` varchar(20) NOT NULL,
  `vsh_name` varchar(20) NOT NULL,
  `vsh_number` int(5) NOT NULL,
  `vsh_address` varchar(40) NOT NULL,
  `pincode` int(6) NOT NULL,
  `gst_no` int(15) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `account_no` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vender`
--

INSERT INTO `tbl_vender` (`vid_id`, `vname`, `vemail`, `vaddress`, `vphone_no`, `vuser_name`, `vpassword`, `vsh_name`, `vsh_number`, `vsh_address`, `pincode`, `gst_no`, `bank_name`, `account_no`) VALUES
(1, 'ram', '', 'ram@gmail.com', 0, '123456', '4641999a7679fcaef2df', 'abc', 1, ' xyz', 395005, 123456, 'pqr', 123456789),
(2, 'ram', '', 'ram@gmail.com', 0, '123456', '4641999a7679fcaef2df', 'abc', 1, ' xyz', 395005, 123456, 'pqr', 123456789),
(3, 'ram', '', 'krupal561@gmail.com', 0, '123456', '4641999a7679fcaef2df', 'abc', 1, ' xyz', 395005, 123456, 'pqr', 123456789),
(4, 'Krupal', 'liralpatel@gmail.com', 'surat', 98982212, 'liral', '202cb962ac59075b964b', 'abc', 12, 'surat', 12345, 242354, 'hdfc', 1234567);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_vender`
--
ALTER TABLE `tbl_vender`
  ADD PRIMARY KEY (`vid_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_vender`
--
ALTER TABLE `tbl_vender`
  MODIFY `vid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
