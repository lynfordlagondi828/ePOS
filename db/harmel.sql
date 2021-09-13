-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 08:20 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harmel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `product_id` int(50) NOT NULL,
  `product_description` text NOT NULL,
  `qty` int(10) NOT NULL,
  `price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `id_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `lastname`, `firstname`, `middlename`, `address`, `id_type`, `id_number`) VALUES
(1, 1212, 'Lagondi', 'Lynford', 'Abondiente', 'Milagrosa, Sta. Catalina, Negros Oriental', '4p\'s', '1212304');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `cash` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `change_amount` double(10,2) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_no`, `cash`, `total`, `change_amount`, `user_id`, `customer_id`, `created_at`) VALUES
(1, '20201', 100.00, 29.00, 71.00, '1', '', '2020-11-27'),
(4, '20202', 20.00, 20.00, 0.00, '2', '', '2020-11-27'),
(5, '20203', 50.00, 40.00, 10.00, '2', '', '2020-11-27'),
(6, '20204', 20.00, 18.00, 2.00, '2', '', '2020-11-27'),
(7, '20205', 55.00, 55.00, 0.00, '2', '', '2020-11-27'),
(8, '20206', 80.00, 76.00, 4.00, '2', '', '2020-11-27'),
(9, '20207', 10.00, 9.00, 1.00, '2', '', '2020-11-27'),
(10, '20208', 100.00, 30.00, 70.00, '1', '', '2020-11-27'),
(11, '20209', 20.00, 20.00, 0.00, '2', '', '2020-11-27'),
(12, '202010', 10.00, 10.00, 0.00, '2', '', '2020-11-27'),
(13, '202011', 100.00, 55.00, 45.00, '2', '', '2020-11-27'),
(14, '202012', 100.00, 70.00, 30.00, '2', '', '2020-11-27'),
(15, '202013', 20.00, 7.00, 13.00, '2', '', '2020-11-27'),
(16, '202014', 10.00, 7.00, 3.00, '2', '', '2020-11-27'),
(17, '202015', 100.00, 20.00, 80.00, '2', '', '2020-11-28'),
(18, '202016', 100.00, 74.00, 26.00, '2', '', '2020-11-28'),
(19, '202017', 20.00, 20.00, 0.00, '2', '', '2020-11-28'),
(20, '202018', 5.00, 5.00, 0.00, '2', '', '2020-11-28'),
(21, '202019', 100.00, 70.00, 30.00, '2', '', '2020-11-28'),
(22, '202020', 15.00, 15.00, 0.00, '2', '', '2020-11-28'),
(23, '202021', 50.00, 20.00, 30.00, '2', '', '2020-11-28'),
(24, '202022', 1000.00, 190.00, 810.00, '2', '', '2020-11-28'),
(25, '202023', 20.00, 7.00, 13.00, '2', '', '2020-11-29'),
(26, '202024', 1000.00, 848.00, 152.00, '2', '', '2020-11-29'),
(27, '202025', 50.00, 40.00, 10.00, '2', '', '2020-11-29'),
(28, '202026', 4000.00, 3784.00, 216.00, '2', '', '2020-11-29'),
(29, '202027', 800.00, 755.00, 45.00, '2', '', '2020-11-29'),
(30, '202028', 755.00, 755.00, 0.00, '2', '', '2020-12-14'),
(31, '202129', 100.00, 100.00, 0.00, '2', '', '2021-01-12'),
(32, '202130', 25.00, 22.00, 3.00, '1', '', '2021-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `code` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `cost` double(10,2) NOT NULL,
  `price` double(10,2) NOT NULL,
  `total_cost` double(10,2) NOT NULL,
  `stocks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `product_description`, `cost`, `price`, `total_cost`, `stocks`) VALUES
(1, '20201', 'Redhorse 1 liter', 80.00, 120.00, 2720.00, 34),
(2, '20202', '1(one) Case Redhorse 1 liter 6 bottles', 516.00, 720.00, 6192.00, 10),
(3, '20203', 'Fish Crackers Size Large (24g)', 5.00, 7.00, 50.00, 8),
(4, '20204', 'Gatorade (350ml)', 30.00, 35.00, 450.00, 15),
(5, '20205', 'Kopiko twin pack', 10.00, 14.00, 100.00, 10),
(6, '20206', 'Kopiko Brown', 6.21, 9.00, 447.12, 71),
(7, '20207', 'Bear Brand Nestle (114grams)', 50.00, 70.00, 1000.00, 20),
(8, '20208', 'Bear Brand Nestle (320 grams)', 100.00, 130.00, 500.00, 5),
(9, '20209', 'Milo Nestle(220 grams)', 60.00, 80.00, 300.00, 5),
(10, '202010', 'Bear Brand Nestle (33grams)', 10.00, 13.00, 200.00, 20),
(11, '202011', 'Cream All (80 grams)', 20.00, 25.00, 400.00, 20),
(12, '202012', 'Premium Great Taste 25 grams', 20.00, 25.00, 400.00, 20),
(13, '202013', 'Nail (Lansang) Universal Size 1 kilo', 80.00, 100.00, 800.00, 10),
(14, '202014', 'Coke 1. 5 liters', 40.00, 70.00, 400.00, 10),
(15, '202015', 'Pepsi 1(one liter)', 30.00, 40.00, 300.00, 10),
(16, '202016', 'Pan by pack', 8.00, 10.00, 40.00, 1),
(17, '202017', 'Ready Mix (per kilo)', 30.00, 38.00, 300.00, 9),
(18, '202018', 'Chick booster', 35.00, 38.00, 350.00, 3),
(19, '202019', 'Rice per kilo', 40.00, 50.00, 1000.00, 25),
(20, '202020', 'Corn per kilo', 30.00, 35.00, 750.00, 25),
(21, '202021', 'Cobra 240 ml', 15.00, 20.00, 285.00, 19),
(22, '202022', 'Mountain Dew (355 ml)', 15.00, 20.00, 150.00, 10),
(23, '202023', 'Sprite (200 ml)', 12.00, 15.00, 240.00, 20),
(24, '202024', 'coke (200ml)', 13.00, 15.00, 260.00, 20),
(25, '202025', 'Royal 1.5 liter', 60.00, 70.00, 600.00, 10),
(26, '202026', 'Mirinda (237 ml)', 8.00, 12.00, 80.00, 10),
(27, '202027', 'Fried Rice/Bulad', 60.00, 120.00, 900.00, 15),
(28, '202028', 'Mountain Dew 750ml', 20.00, 30.00, 200.00, 10),
(29, '202029', 'Beer na Bear 320ml', 30.00, 35.00, 300.00, 8),
(30, '202030', 'Rice Pellets', 60.00, 70.00, 300.00, 5),
(31, '202031', 'Silka Whitening Herbal Soap (65g)', 18.00, 22.00, 90.00, 4),
(32, '202032', 'Shampoo Palmolive', 5.00, 7.00, 50.00, 9),
(33, '202033', '7 up (1 liter)', 30.00, 35.00, 300.00, 7),
(34, '202034', 'Betet (17.5g)', 30.00, 35.00, 60.00, 2),
(35, '202035', 'Natures Spring 500ml', 15.00, 20.00, 225.00, 15),
(36, '202036', 'Natures Spring 350ml', 12.00, 15.00, 120.00, 10),
(37, '202037', 'Natures Spring 1000ml', 20.00, 25.00, 200.00, 10),
(38, '202038', 'Nail (lansang) 1/4kgs', 20.00, 25.00, 180.00, 9),
(39, '202039', 'Tongog', 20.00, 30.00, 200.00, 8),
(40, '202040', 'Energen (40g)', 7.00, 9.00, 70.00, 10),
(41, '202041', 'Milo(24g)', 5.00, 8.00, 50.00, 10),
(42, '202042', 'Nail (lansang) 1/2kgs', 40.00, 50.00, 400.00, 10),
(43, '202043', 'Topz per bar', 20.00, 28.00, 160.00, 8),
(44, '202044', 'Topz per piece', 5.00, 7.00, 40.00, 6),
(45, '202045', 'Nescafe Classic 2grams', 2.00, 3.00, 40.00, 17),
(46, '202046', 'Premium 2g', 2.00, 2.50, 40.00, 20),
(47, '202047', 'Colgate (22grams, 24 grams)', 8.00, 10.00, 80.00, 10),
(48, '202048', 'Shampoo Head & Shoulders', 5.00, 7.00, 50.00, 10),
(49, '202049', 'Keratin plus 20 grams', 10.00, 12.00, 100.00, 10),
(50, '202050', 'Cream Silk 11ml', 5.00, 7.00, 50.00, 10),
(51, '202051', 'Safeguard (60grams)', 18.00, 22.00, 90.00, 5),
(52, '202052', 'Cream All 5grams', 2.00, 2.50, 20.00, 10),
(53, '202053', 'Magnetic Lighter (Cricket)', 8.00, 10.00, 400.00, 48),
(54, '202054', 'Lighter LCC', 8.00, 10.00, 400.00, 50),
(55, '202055', 'Hair Blacking Shampoo', 8.00, 10.00, 80.00, 9),
(56, '202056', 'Lucky me Pancit Canton', 9.00, 12.00, 90.00, 10),
(57, '202057', 'Lucky me instant noodles', 9.00, 10.00, 90.00, 10),
(58, '202058', 'Aceiti de Alcamforado', 18.00, 22.00, 90.00, 4),
(59, '202059', 'Efficascent Oil 25ml', 35.00, 40.00, 350.00, 10),
(60, '202060', 'Baby Oil Mommy\'s like 25ml', 15.00, 18.00, 150.00, 8),
(61, '202061', 'Aceite de manzanilla 25ml', 20.00, 22.00, 200.00, 5),
(62, '202062', 'Eskinol 75ml', 40.00, 50.00, 200.00, 5),
(63, '202063', 'Trust Pill Ferrous', 50.00, 70.00, 200.00, 3),
(64, '202064', 'Tender Care baby poweder 50grams', 20.00, 27.00, 40.00, 2),
(65, '202065', 'Johnson\'s Baby powder 25grams', 20.00, 22.00, 100.00, 5),
(66, '202066', 'LED Flashlight 5 W', 300.00, 320.00, 300.00, 1),
(67, '202067', 'LED Flashlight 0.5 W', 80.00, 100.00, 160.00, 2),
(68, '202068', 'PP Feeding Bottle', 60.00, 75.00, 180.00, 3),
(69, '202069', 'Disposable Surgical Mask', 8.00, 10.00, 80.00, 8),
(70, '202070', 'Flying Tiger', 40.00, 55.00, 240.00, 6),
(71, '202071', 'Golden Dragon(Mikki)', 48.50, 55.00, 970.00, 20),
(72, '202072', 'Vetracin Gold', 23.00, 30.00, 345.00, 15),
(73, '202073', 'Vetracin Premium', 17.00, 25.00, 85.00, 5),
(74, '202074', 'Kopelax', 5.00, 10.00, 75.00, 12),
(75, '202075', 'Kopiko Black', 6.21, 9.00, 447.00, 72),
(76, '202076', 'Oishi 24 grams', 5.00, 7.00, 50.00, 9),
(77, '202077', '123 Powder 50 grams', 20.00, 35.00, 380.00, 17),
(78, '202078', 'Bugayana', 7.00, 9.00, 56.00, 8),
(79, '202079', 'Mighty  per stick', 3.00, 5.00, 60.00, 19),
(80, '202080', 'Mighty per pack', 90.00, 100.00, 900.00, 10),
(81, '202081', 'Candle Small', 1.00, 1.00, 10.00, 4),
(82, '202082', 'Doxylac Tablet', 10.00, 12.00, 100.00, 6),
(83, '202083', 'Tanduay 375ml (Senior)', 60.00, 70.00, 1200.00, 19),
(84, '202084', 'Royal 200ml', 13.00, 15.00, 260.00, 19),
(85, '202085', 'Sweet Baby Diaper L', 10.00, 12.00, 200.00, 20),
(86, '202086', 'Sweet baby Small and Medium', 10.00, 12.00, 200.00, 20),
(87, '202087', 'Sisters with wings', 5.00, 6.00, 100.00, 20),
(88, '202088', 'Wings Powder', 6.00, 8.00, 60.00, 10),
(89, '202089', 'Tanduay 750ml', 100.00, 120.00, 1000.00, 10),
(90, '202090', 'Chlorine', 50.00, 1.00, 500.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) NOT NULL,
  `invoice_no` int(50) NOT NULL,
  `product_description` text NOT NULL,
  `qty` int(10) NOT NULL,
  `price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_no`, `product_description`, `qty`, `price`, `total`, `payment_method`, `created_at`) VALUES
(1, 20201, 'Silka Whitening Herbal Soap (65g)', 1, 22.00, 22.00, 'Cash', '2020-11-27'),
(2, 20201, 'Shampoo Palmolive', 1, 7.00, 7.00, 'Cash', '2020-11-27'),
(5, 20202, 'Pan by pack', 2, 10.00, 20.00, 'Cash', '2020-11-27'),
(6, 20203, 'Betet (17.5g)', 1, 40.00, 40.00, 'Cash', '2020-11-27'),
(7, 20204, 'Cobra 240 ml', 1, 18.00, 18.00, 'Cash', '2020-11-27'),
(8, 20205, 'Nail (lansang) 1/4', 1, 25.00, 25.00, 'Cash', '2020-11-27'),
(9, 20205, 'Tongog', 1, 30.00, 30.00, 'Cash', '2020-11-27'),
(10, 20206, 'Chick booster', 2, 38.00, 76.00, 'Cash', '2020-11-27'),
(11, 20207, 'Nescafe Classic 2grams', 3, 3.00, 9.00, 'Cash', '2020-11-27'),
(12, 20208, 'Tongog', 1, 30.00, 30.00, 'Cash', '2020-11-27'),
(13, 20209, 'Magnetic Lighter (Cricket)', 2, 10.00, 20.00, 'Cash', '2020-11-27'),
(14, 202010, 'Hair Blacking Shampoo', 1, 10.00, 10.00, 'Cash', '2020-11-27'),
(15, 202011, 'Flying Tiger', 1, 55.00, 55.00, 'Cash', '2020-11-27'),
(16, 202012, 'Trust Pill Ferrous Fumarate 28 tablets', 1, 70.00, 70.00, 'Cash', '2020-11-27'),
(17, 202013, 'Oishi 24 grams', 1, 7.00, 7.00, 'Cash', '2020-11-27'),
(18, 202014, 'Fish Crackers Size Large (24g)', 1, 7.00, 7.00, 'Cash', '2020-11-27'),
(19, 202015, 'Pan by pack', 2, 10.00, 20.00, 'Cash', '2020-11-28'),
(20, 202016, 'Ready Mix (per kilo)', 1, 38.00, 38.00, 'Cash', '2020-11-28'),
(21, 202016, 'Doxylac Tablet', 3, 12.00, 36.00, 'Cash', '2020-11-28'),
(22, 202017, 'Topz per piece', 2, 7.00, 14.00, 'Cash', '2020-11-28'),
(23, 202017, 'Candle Small', 6, 1.00, 6.00, 'Cash', '2020-11-28'),
(24, 202018, 'Mighty  per stick', 1, 5.00, 5.00, 'Cash', '2020-11-28'),
(25, 202019, 'Tanduay 375ml (Senior)', 1, 70.00, 70.00, 'Cash', '2020-11-28'),
(26, 202020, 'Royal 200ml', 1, 15.00, 15.00, 'Cash', '2020-11-28'),
(27, 202021, 'Disposable Surgical Mask', 2, 10.00, 20.00, 'Cash', '2020-11-28'),
(28, 202022, 'Chick booster', 5, 38.00, 190.00, 'Cash', '2020-11-28'),
(29, 202023, 'Fish Crackers Size Large (24g)', 1, 7.00, 7.00, 'Cash', '2020-11-29'),
(30, 202024, '1(one) Case Redhorse 1 liter 6 bottles', 1, 720.00, 720.00, 'Cash', '2020-11-29'),
(31, 202024, 'Aceite de manzanilla 25ml', 5, 22.00, 110.00, 'Cash', '2020-11-29'),
(32, 202024, 'Baby Oil Mommy\'s like 25ml', 1, 18.00, 18.00, 'Cash', '2020-11-29'),
(33, 202025, 'Kopelax', 3, 10.00, 30.00, 'Cash', '2020-11-29'),
(34, 202025, 'Chlorine', 10, 1.00, 10.00, 'Cash', '2020-11-29'),
(35, 202026, '1(one) Case Redhorse 1 liter 6 bottles', 5, 720.00, 3600.00, 'Cash', '2020-11-29'),
(36, 202026, '7 up (1 liter)', 1, 35.00, 35.00, 'Cash', '2020-11-29'),
(37, 202026, 'Beer na Bear 320ml', 1, 35.00, 35.00, 'Cash', '2020-11-29'),
(38, 202026, 'Trust Pill Ferrous', 1, 70.00, 70.00, 'Cash', '2020-11-29'),
(39, 202026, '123 Powder 50 grams', 1, 35.00, 35.00, 'Cash', '2020-11-29'),
(40, 202026, 'Kopiko Brown', 1, 9.00, 9.00, 'Cash', '2020-11-29'),
(41, 202027, '1(one) Case Redhorse 1 liter 6 bottles', 1, 720.00, 720.00, 'Cash', '2020-11-29'),
(42, 202027, '123 Powder 50 grams', 1, 35.00, 35.00, 'Cash', '2020-11-29'),
(43, 202028, '1(one) Case Redhorse 1 liter 6 bottles', 1, 720.00, 720.00, 'Cash', '2020-12-14'),
(44, 202028, '7 up (1 liter)', 1, 35.00, 35.00, 'Cash', '2020-12-14'),
(45, 202129, 'Doxylac Tablet', 1, 12.00, 12.00, 'Cash', '2021-01-12'),
(46, 202129, '7 up (1 liter)', 1, 35.00, 35.00, 'Cash', '2021-01-12'),
(47, 202129, 'Baby Oil Mommy\'s like 25ml', 1, 18.00, 18.00, 'Cash', '2021-01-12'),
(48, 202129, 'Beer na Bear 320ml', 1, 35.00, 35.00, 'Cash', '2021-01-12'),
(49, 202130, 'Aceiti de Alcamforado', 1, 22.00, 22.00, 'Cash', '2021-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `user_type`) VALUES
(1, 'Lynford Lagondi', 'admin', 'admin', 'cashier'),
(2, 'Harrison Ford Lagondi', 'user', 'user', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
