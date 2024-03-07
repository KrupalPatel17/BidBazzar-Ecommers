-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 01:20 PM
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
CREATE DATABASE IF NOT EXISTS `bid_bazzar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bid_bazzar`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addtocart`
--

CREATE TABLE `tbl_addtocart` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `s_no` int(30) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_image` varchar(1000) NOT NULL,
  `category` varchar(30) NOT NULL,
  `p_details` varchar(100) NOT NULL,
  `p_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_addtocart`
--

INSERT INTO `tbl_addtocart` (`product_id`, `user_id`, `s_no`, `p_name`, `p_image`, `category`, `p_details`, `p_price`) VALUES
(15, 66, 12132, 'Gameing PC', 'img/gameing pc.jpeg', 'gameing', '32GB Ram,RGB, 2tb SSD,RTX 3040 Graphics Card', 2000000),
(17, 66, 9001121, 'Gameing Keybord', 'img/krybord.jpeg', 'gameing', 'Keyboard Type: Mechanical\r\nSwitch Type: Otmu\r\nKeycap Material: ABS or PBT\r\nConnectivity: Wired USB\r\n', 2000),
(16, 66, 212212231, 'Gameing Mouse', 'img/mouse.jpeg', 'gameing', '6 Function Button ,RGB,Optical Sensor,Push To Talk ', 1000),
(16, 66, 212212231, 'Gameing Mouse', 'img/mouse.jpeg', 'gameing', '6 Function Button ,RGB,Optical Sensor,Push To Talk ', 1000),
(26, 66, 4795948, 'i Phone 15', 'img/iphone.jpeg', 'phone', 'Display: Super Retina XDR display (specify size and resolution)\r\nProcessor: A15 Bionic chip\r\nCamera:', 120000),
(26, 66, 4795948, 'i Phone 15', 'img/iphone.jpeg', 'phone', 'Display: Super Retina XDR display (specify size and resolution)\r\nProcessor: A15 Bionic chip\r\nCamera:', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `s_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_image` varchar(10000) NOT NULL,
  `category` varchar(50) NOT NULL,
  `p_detail` varchar(700) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_price` int(11) NOT NULL,
  `vid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`s_no`, `product_id`, `p_name`, `p_image`, `category`, `p_detail`, `p_quantity`, `p_price`, `vid`) VALUES
(12132, 15, 'Gameing PC', 'img/gameing pc.jpeg', 'gameing', '32GB Ram,RGB, 2tb SSD,RTX 3040 Graphics Card', 5, 2000000, 24),
(212212231, 16, 'Gameing Mouse', 'img/mouse.jpeg', 'gameing', '6 Function Button ,RGB,Optical Sensor,Push To Talk ', 10, 1000, 22),
(9001121, 17, 'Gameing Keybord', 'img/krybord.jpeg', 'gameing', 'Keyboard Type: Mechanical\r\nSwitch Type: Otmu\r\nKeycap Material: ABS or PBT\r\nConnectivity: Wired USB\r\nCable Length: 4 Meters\r\nWeight: 800gm\r\nSupported Operating Systems: Windows, Mac', 15, 2000, 22),
(21212, 18, 'Gameing Controller', 'img/controll.jpeg', 'gameing', 'Controller Type: X Box\r\nConnectivity:  wireless\r\nCompatibility: PC,X Box, MAC\r\nBattery Life:4 Hours\r\nWeight: 50gm\r\nColor:Black\r\nHaptic Feedback', 7, 1790, 22),
(56471, 20, 'Dell Laptop Insprion 7415 Notbook', 'img/laptop.jpeg', 'electronics', 'Processor:  AMD model\r\nDisplay: 14-inch Full HD (1920 x 1080)\r\nMemory: Up to 16GB DDR4 RAM\r\nStorage: 512 SSD \r\nGraphics: Integrated Intel or AMD Radeon graphics\r\nOperating System: Windows 10 Home\r\nConnectivity: Wi-Fi 6, Bluetooth, USB Type-C, HDMI, SD card reader\r\nBattery: Up to 7 Hours\r\nWeight: 2.70KG', 3, 75000, 24),
(121211, 23, 'Gameing HeadPhones', 'img/gaming-headphones.jpg', 'gameing', 'Color:Orange,Black\r\nUSB Cable Support \r\nRGB', 20, 2191, 22),
(76842, 24, 'Gameing Cooling Pad', 'img/laptop colling pad.jpg', 'gameing', 'Fan Size: 6\r\nMaterial: Metal\r\nCompatibility: Compatible with laptops up to 27 ich\r\nPower: USB-powered\r\nAdjustable Height: Yes\r\nAdjustable Fan Speed: Yes\r\nLED Lighting: Yes', 7, 1799, 22),
(89009, 25, 'Gameing Moniter', 'img/64cd3ab12547c20cbf103ac6-lg-27-ultragear-fhd-1ms-165hz-gaming.jpg', 'gameing', 'Screen Size: 27 inch\r\nResolution: 144hz\r\nRefresh Rate: 200fps\r\nPanel Type:  panel IPS\r\nResponse Time: 0.1ms\r\nHDR Support: Yes\r\nAdaptive Sync Technology: Yes\r\nConnectivity: HDMI, DisplayPort, USB\r\nAdjustable Stand: Yes\r\nWeight: 5kg\r\n\r\nPackage Contents:\r\nGaming Monitor\r\nStand\r\nPower Cable\r\nHDMI Cable\r\nDisplayPort Cable\r\nUser Manual', 9, 25999, 22),
(4795948, 26, 'i Phone 15', 'img/iphone.jpeg', 'phone', 'Display: Super Retina XDR display (specify size and resolution)\r\nProcessor: A15 Bionic chip\r\nCamera: Advanced camera system with16mp\r\nConnectivity: 5G, Wi-Fi 6, Bluetooth 5.2\r\nSecurity: Face ID facial recognition, Secure Enclave technology\r\nOperating System: iOS 16\r\nBattery: 5000mh\r\nWeight: 80gm\r\nColors: Available in multiple colors Black, White ,Mid-Night Bule', 6, 120000, 24),
(2543534, 27, 'Samsung Galaxy Z Flip', 'img/zflip.jpg', 'phone', 'Display: Foldable Dynamic AMOLED\r\nProcessor: Qualcomm Snapdragon \r\nRAM: 16GB\r\nStorage: 128GB\r\nCamera: Dual rear cameras (Main camera + Ultra-wide camera)\r\nBattery:4000mh\r\nOperating System: Android (latest version)\r\nConnectivity: 5G, Wi-Fi, Bluetooth, NFC, USB Type-C\r\nDimensions (Folded): (Specify dimensions)\r\nDimensions (Unfolded): (Specify dimensions)\r\nWeight: 90gm', 15, 80000, 24),
(743168, 28, 'Samsung Galaxy S23 Ultra', 'img/s23.avif', 'phone', 'Display: 6.8-inch Dynamic AMOLED display\r\nProcessor: Exynos 2200 (or Snapdragon 8 Gen 2)\r\nRAM: Up to 16GB\r\nStorage: Up to 512GB\r\nCamera: Quad-camera setup (108MP main, 12MP ultra-wide, 10MP telephoto, depth sensor)\r\nBattery: 5,000mAh with fast charging and wireless charging support\r\nOperating System: Android 12 with One UI 4.0\r\nConnectivity: 5G, Wi-Fi 6E, Bluetooth 5.2\r\nBiometric Authentication: Ultrasonic fingerprint sensor, facial recognition\r\nWeight: 77.9gm\r\nColors: Silver,Black ', 7, 130000, 24),
(14323213, 29, 'Black Tshirt', 'img/pexels-anna-nekrashevich-8532616.jpg', 'clothing', 'Material: 100% Cotton\r\nColor: Black\r\nSizes: Available in S, M, L, XL, XXL\r\nNeckline: Crew Neck\r\nSleeve Length: Short Sleeve\r\nCare Instructions: Machine Washable', 22, 798, 25),
(4238421, 30, 'White Tshirt ', 'img/t-shirt-1976334_1280.webp', 'clothing', 'Material: 100% Cotton\r\nColor: White\r\nSizes: Available in S, M, L, XL, XXL\r\nNeckline: Crew Neck\r\nSleeve Length: Short Sleeve\r\nCare Instructions: Machine Washable', 25, 899, 25),
(2134, 31, 'Polo T-shirt', 'img/polo-shirt-163562_1280.webp', 'clothing', 'Material: 100% Cotton\r\nColor: Black,Green,Blue\r\nSizes: Available in S, M, L, XL, XXL\r\nNeckline: Crew Neck\r\nSleeve Length: Short Sleeve\r\nCare Instructions: Machine Washable', 19, 1299, 25),
(23523, 32, 'Blue Jens', 'img/woman-2799490_1280.jpg', 'clothing', 'Material: Denim\r\nColor: Blue\r\nClosure: Zipper fly with button closure\r\nFit: Straight-leg\r\nWaistband: Elasticized with belt loops\r\nPockets: Front pockets, back pockets, coin pocket', 7, 1597, 25),
(2134525, 33, 'Denim Jacket', 'img/silhouette-600485_1280.jpg', 'clothing', 'Material: Denim\r\nClosure: Button-up front\r\nPockets: Two chest pockets with button closures\r\nSleeve Style: Long sleeves with buttoned cuffs\r\nFit: Regular fit\r\nAvailable Sizes: XS, S, M, L, XL, XXL (Refer to size chart for accurate measurements)\r\nCare Instructions: Machine wash cold, tumble dry low', 29, 1999, 25),
(2134235, 41, 'Nike Air Jorden Red&Black', 'img/images.jpeg', 'clothing', 'Upper Material: Leather, suede, mesh\r\nMidsole Material: Nike Air cushioning technology\r\nOutsole Material: Rubber\r\nClosure: Lace-up\r\nDesign: High-top\r\nColor Options: Various colorways available\r\nSizes: Available in mens, womens, and kids sizes', 12, 13999, 24),
(4522141, 42, 'HD T.V', 'img/download (6).jpeg', 'electronics', 'Screen Size: Available in various sizes (e.g., 55 inches, 65 inches)\r\nResolution: 4K Ultra HD\r\nHDR Support: Yes\r\nSmart TV Platform: Android TV, Roku, or proprietary operating system\r\nConnectivity: HDMI, USB, Ethernet, Wi-Fi\r\nAudio: Dolby Audio\r\nVoice Control: Yes, with built-in voice assistants\r\nDimensions: Varies by screen size\r\nWeight: Varies by screen size\r\nEnergy Efficiency: Energy Star certified', 7, 90000, 25),
(325124, 43, 'Camera', 'img/916GGqnsG+L._AC_UF1000,1000_QL80_.jpg', 'electronics', 'Sensor Type: (Specify sensor type, e.g., CMOS or CCD)\r\nMegapixels: (Specify megapixel count)\r\nISO Range: (Specify ISO range)\r\nAutofocus Points: (Specify autofocus points)\r\nContinuous Shooting Speed: (Specify fps)\r\nVideo Resolution: 4K Ultra HD (3840 x 2160)\r\nLCD Screen: (Specify screen size and type, e.g., 3-inch tilting LCD)\r\nConnectivity: Wi-Fi, NFC\r\nBattery Life: (Specify battery life)\r\nDimensions: (Specify dimensions)\r\nWeight: (Specify weight)', 9, 89999, 25),
(213414, 45, 'Spoon', 'img/download (8).jpeg', 'home', 'Material: Stainless steel\r\nSet Includes: 10pces\r\nDishwasher Safe: Yes\r\nHeat Resistant: Yes', 50, 299, 25),
(12422, 46, 'Kitchen Set', 'img/download (10).jpeg', 'home', 'Material: Stainless steel\r\nSet Includes: 5 Spoon,Pen , Plates,Bowl\r\nDishwasher Safe: Yes\r\nHeat Resistant: Yes', 9, 1999, 25),
(523123, 47, 'Foke Spoon', 'img/download (9).jpeg', 'home', 'Material: Stainless steel\r\nQuantity: Set of four spoons\r\nWeight: 10gm\r\nDishwasher Safe: Yes', 13, 399, 25);

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
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `email`, `address`, `phone_number`, `username`, `password`) VALUES
(37, 'neertanuwal.7@gmail.com', 'mora', 2147483647, 'neerta', '202cb962ac59075b964b07152d234b'),
(51, 'mahekprajapati0603@gmail.com', 'Krishana Nagar', 2147483647, 'Mahek Patel', '202cb962ac59075b964b07152d234b'),
(66, 'patelkrupal679@gmail.com', 'abcdd', 1234567890, 'admin', '202cb962ac59075b964b07152d234b70'),
(67, 'krupal679@gmail.com', 'surat gujarat', 122334556, 'krupal', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vender`
--

CREATE TABLE `tbl_vender` (
  `vid` int(11) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `vemail` varchar(30) NOT NULL,
  `vaddress` varchar(60) NOT NULL,
  `vphone_no` int(10) NOT NULL,
  `vuser_name` varchar(15) NOT NULL,
  `vpassword` varchar(50) NOT NULL,
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

INSERT INTO `tbl_vender` (`vid`, `vname`, `vemail`, `vaddress`, `vphone_no`, `vuser_name`, `vpassword`, `vsh_name`, `vsh_number`, `vsh_address`, `pincode`, `gst_no`, `bank_name`, `account_no`) VALUES
(22, 'Krupal p', 'krupal@gmail.com', 'suratt', 989822122, 'venderr', '202cb962ac59075b964b07152d234b70', 'abcc', 13, 'suratt', 123455, 2423544, 'hdfcc', 12345677),
(24, 'vender2', 'krupal679@gmail.com', 'surat gujarat', 23123, 'vender2', '202cb962ac59075b964b07152d234b70', 'croma', 2, 'adajan', 395005, 2134566676, 'sbi', 112233445),
(25, 'vender3', 'krupal679@gmail.com', 'surat gujarat', 12134334, 'vender3', '202cb962ac59075b964b07152d234b70', 'dmart', 6, 'pal', 395005, 2134566676, 'bob', 2133534536);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addtocart`
--
ALTER TABLE `tbl_addtocart`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `s.no` (`s_no`),
  ADD KEY `Vids` (`vid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_vender`
--
ALTER TABLE `tbl_vender`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_vender`
--
ALTER TABLE `tbl_vender`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Database: `db_chatapplication`
--
CREATE DATABASE IF NOT EXISTS `db_chatapplication` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_chatapplication`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `password`) VALUES
('admin', 'Admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_community`
--

CREATE TABLE `tbl_community` (
  `comm_id` int(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `name` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `uid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_community`
--

INSERT INTO `tbl_community` (`comm_id`, `email`, `name`, `message`, `uid`) VALUES
(1, 'abc@gmail.com', 'Ganjwala Manav', 'hi', 1),
(2, 'xyz@gmail.com', 'Parekh Virag', 'hi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `msgid` int(100) NOT NULL,
  `incomingmsgid` int(100) NOT NULL,
  `outgoingmsgid` int(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`msgid`, `incomingmsgid`, `outgoingmsgid`, `message`) VALUES
(1, 2, 1, 'hi'),
(2, 1, 2, 'hi'),
(3, 2, 1, 'what are you doing?'),
(4, 1, 2, 'nothing'),
(5, 1, 2, 'and what about you?'),
(6, 2, 1, 'same as you'),
(7, 4, 1, 'Hi'),
(8, 1, 4, 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `doj` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `dob`, `email`, `mobileno`, `password`, `doj`, `color`, `status`) VALUES
(1, 'Ganjwala Manav', 'manav', '2001-11-11', 'abc@gmail.com', '7894561235', '202cb962ac59075b964b07152d234b70', '24-Feb-2024', '#42427e', '0'),
(2, 'Parekh Virag', 'virag', '2002-05-13', 'xyz@gmail.com', '4416852135', '202cb962ac59075b964b07152d234b70', '26-Feb-2024', '#585879', '0'),
(3, 'Gohil Jemish', 'jemish', '1997-03-22', 'pqr@gmail.com', '7645665656', '202cb962ac59075b964b07152d234b70', '26-Feb-2024', '#3b3b45', '0'),
(4, 'Dhimmar Abhi', 'abhi', '1999-07-01', 'qwe@gmail.com', '4585234452', '202cb962ac59075b964b07152d234b70', '26-Feb-2024', '#2020ac', '0'),
(6, 'Madhvani Bhavya', 'bhavya', '2001-03-06', 'vbn@gmail.com', '1258795415', '202cb962ac59075b964b07152d234b70', '26-Feb-2024', '#e31c1c', '0'),
(7, 'Champaneriya Mohit', 'mohit', '2003-12-16', 'rty@gmail.com', '5654635456', '202cb962ac59075b964b07152d234b70', '26-Feb-2024', '#1bafee', '0'),
(8, 'Ganjawala Prany', 'pranay', '2004-11-10', 'plo@gmail.com', '1558765654', '202cb962ac59075b964b07152d234b70', '26-Feb-2024', '#4d4105', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_community`
--
ALTER TABLE `tbl_community`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`msgid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobileno` (`mobileno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_community`
--
ALTER TABLE `tbl_community`
  MODIFY `comm_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `msgid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"shopify\",\"table\":\"tbl_user\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-01-02 15:48:32', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `age`) VALUES
(37, 'Krupal  patel', 22),
(39, 'abc3', 20),
(40, 'abc4', 20),
(41, 'abc5', 20),
(42, 'abc6', 24),
(43, 'abc7', 22),
(44, 'abc8', 27),
(45, 'abc9', 21),
(48, 'abc10', 30),
(49, 'abc11', 32),
(50, 'abc12', 33),
(51, 'abc13', 35),
(52, 'abc14', 39),
(53, 'abc15', 40),
(54, 'RAM', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Officec` varchar(20) NOT NULL,
  `Age` int(3) NOT NULL,
  `StartDate` int(10) NOT NULL,
  `Salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
