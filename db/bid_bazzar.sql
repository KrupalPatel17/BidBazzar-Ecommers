-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 07:24 AM
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
(0, 16, 22, '212212231', 'Gameing Mouse', 'img/mouse.jpeg', 'gameing', 6),
(28, 67, 743168, 'Samsung Galaxy S23 Ultra', 'img/s23.avif', 'phone', 'Display: 6.8-inch Dynamic AMOLED display\r\nProcessor: Exynos 2200 (or Snapdragon 8 Gen 2)\r\nRAM: Up to', 130000),
(16, 67, 212212231, 'Gameing Mouse', 'img/mouse.jpeg', 'gameing', '6 Function Button ,RGB,Optical Sensor,Push To Talk ', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auction`
--

CREATE TABLE `tbl_auction` (
  `a_id` int(11) NOT NULL,
  `product_id` int(100) NOT NULL,
  `v_id` int(255) NOT NULL,
  `s_no` int(255) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_image` varchar(1000) NOT NULL,
  `category` varchar(50) NOT NULL,
  `p_details` varchar(1000) NOT NULL,
  `p_price` int(255) NOT NULL,
  `a_price` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `user_id` int(100) NOT NULL,
  `bid_price` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_auction`
--

INSERT INTO `tbl_auction` (`a_id`, `product_id`, `v_id`, `s_no`, `p_name`, `p_image`, `category`, `p_details`, `p_price`, `a_price`, `date`, `time`, `user_id`, `bid_price`, `user_name`) VALUES
(28, 28, 24, 743168, 'Samsung Galaxy S23 Ultra', 'img/s23.avif', 'phone', 'Display: 6.8-inch Dynamic AMOLED display\r\nProcessor: Exynos 2200 (or Snapdragon 8 Gen 2)\r\nRAM: Up to 16GB\r\nStorage: Up to 512GB\r\nCamera: Quad-camera setup (108MP main, 12MP ultra-wide, 10MP telephoto, depth sensor)\r\nBattery: 5,000mAh with fast charging and wireless charging support\r\nOperating System: Android 12 with One UI 4.0\r\nConnectivity: 5G, Wi-Fi 6E, Bluetooth 5.2\r\nBiometric Authentication: Ultrasonic fingerprint sensor, facial recognition\r\nWeight: 77.9gm\r\nColors: Silver,Black ', 130000, 100000, '2024-03-15', '14:14:00', 66, 90000, 'admin'),
(44, 17, 22, 9001121, 'Gameing Keybord', 'img/krybord.jpeg', 'gameing', 'Keyboard Type: Mechanical\r\nSwitch Type: Otmu\r\nKeycap Material: ABS or PBT\r\nConnectivity: Wired USB\r\nCable Length: 4 Meters\r\nWeight: 800gm\r\nSupported Operating Systems: Windows, Mac', 2000, 1900, '2024-03-18', '16:27:00', 67, 0, 'krupal'),
(45, 23, 22, 121211, 'Gameing HeadPhones', 'img/gaming-headphones.jpg', 'gameing', 'Color:Orange,Black\r\nUSB Cable Support \r\nRGB', 2191, 2200, '2024-03-19', '11:32:00', 67, 0, 'krupal');

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
(66, 'krupal561@gmail.com', 'abcdd', 1234567890, 'admin', '202cb962ac59075b964b07152d234b70'),
(67, 'krupal561@gmail.com', 'surat gujarat', 122334556, 'krupal', '202cb962ac59075b964b07152d234b70'),
(68, 'krupal561@gmail.com', 'mahek', 2147483647, 'mahek', '202cb962ac59075b964b07152d234b70'),
(69, 'krupal561@gmail.com', '32, parijat society gavendar Jahangirpura', 2147483647, 'Robert', '202cb962ac59075b964b07152d234b70'),
(70, 'krupal561@gmail.com', '32, parijat society gavendar Jahangirpura', 2147483647, 'abc', '202cb962ac59075b964b07152d234b70'),
(71, 'krupal561@gmail.com', '32, parijat society gavendar Jahangirpura', 2147483647, 'adminn', '202cb962ac59075b964b07152d234b70');

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
(25, 'vender3', 'krupal679@gmail.com', 'surat gujarat', 12134334, 'vender3', '202cb962ac59075b964b07152d234b70', 'dmart', 6, 'pal', 395005, 2134566676, 'bob', 2133534536),
(26, 'asd', 'krupal561@gmail.com', '32, parijat society gavendar Jahangirpura', 2147483647, 'vender5', '202cb962ac59075b964b07152d234b70', 'abc', 1, 'xyz', 395005, 123456, 'pqr', 213313),
(27, 'ram', 'krupal561@gmail.com', '32, parijat society gavendar Jahangirpura', 2147483647, 'aabb', '202cb962ac59075b964b07152d234b70', 'asd', 324, 'da', 342, 234, 'esef', 234),
(28, 'asd', 'krupal561@gmail.com', '32, parijat society gavendar Jahangirpura', 972435840, 'dsa', '202cb962ac59075b964b07152d234b70', 'asd', 432, 'ads', 1243, 234, 'asd', 124),
(29, 'Krupal', 'krupal561@gmail.com', 'pqr', 2147483647, 'qaz', '202cb962ac59075b964b07152d234b70', 'abc', 12, 'surat', 12345, 242354, 'hdfc', 1234567),
(30, 'Krupal', 'krupal561@gmail.com', 'pqr', 2147483647, 'qazz', '202cb962ac59075b964b07152d234b70', 'abc', 12, 'surat', 12345, 242354, 'hdfc', 1234567);

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
-- Indexes for table `tbl_auction`
--
ALTER TABLE `tbl_auction`
  ADD PRIMARY KEY (`a_id`);

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
-- AUTO_INCREMENT for table `tbl_auction`
--
ALTER TABLE `tbl_auction`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_vender`
--
ALTER TABLE `tbl_vender`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
