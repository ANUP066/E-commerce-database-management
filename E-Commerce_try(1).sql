-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2019 at 07:48 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `E-Commerce_try`
--

-- --------------------------------------------------------

--
-- Table structure for table `BRAND`
--

CREATE TABLE `BRAND` (
  `Brand_id` int(11) NOT NULL,
  `Brand_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BRAND`
--

INSERT INTO `BRAND` (`Brand_id`, `Brand_Name`) VALUES
(1, 'Motorolla'),
(2, 'Classmate');

-- --------------------------------------------------------

--
-- Table structure for table `BRAND_N_CATEGORY`
--

CREATE TABLE `BRAND_N_CATEGORY` (
  `Category_id` int(11) DEFAULT NULL,
  `Brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BRAND_N_CATEGORY`
--

INSERT INTO `BRAND_N_CATEGORY` (`Category_id`, `Brand_id`) VALUES
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `CART`
--

CREATE TABLE `CART` (
  `Cart_id` int(11) NOT NULL,
  `Total_Cost` int(11) DEFAULT NULL,
  `Customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CART`
--

INSERT INTO `CART` (`Cart_id`, `Total_Cost`, `Customer_id`) VALUES
(1, 0, 60),
(2, 20000, 53),
(3, 0, 1),
(4, 75000, 51),
(5, 450, 45),
(6, 0, 25),
(7, 30000, 50),
(8, 20000, 61),
(9, 10000, 62),
(10, 0, 63),
(11, 0, 64),
(12, 0, 65),
(13, 0, 66),
(14, 300, 67),
(15, 0, 68),
(16, 0, 69),
(17, 0, 70),
(18, 75000, 71),
(19, 0, 72),
(20, 0, 73);

-- --------------------------------------------------------

--
-- Table structure for table `CART_ITEM`
--

CREATE TABLE `CART_ITEM` (
  `Cart_Item_id` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Cost` int(11) DEFAULT NULL,
  `Cart_id` int(11) DEFAULT NULL,
  `Product_id` int(11) DEFAULT NULL,
  `Customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CART_ITEM`
--

INSERT INTO `CART_ITEM` (`Cart_Item_id`, `Quantity`, `Cost`, `Cart_id`, `Product_id`, `Customer_id`) VALUES
(58, 1, 15000, 3, 4, 1),
(60, 1, 15000, 3, 4, 1),
(61, 1, 15000, 3, 4, 1),
(96, 10, 30000, 7, 5, 50),
(99, 5, 75000, 4, 4, 51),
(100, 3, 450, 5, 6, 45),
(107, 2, 20000, 8, 5, 61),
(113, 1, 10000, 9, 5, 62),
(119, 2, 300, 14, 6, 67),
(126, 5, 75000, 18, 4, 71),
(128, 1, 35000, 2, 8, 53);

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORY`
--

CREATE TABLE `CATEGORY` (
  `Category_id` int(11) NOT NULL,
  `Category_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CATEGORY`
--

INSERT INTO `CATEGORY` (`Category_id`, `Category_Name`) VALUES
(1, 'Books'),
(2, 'Phones');

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `Customer_id` int(6) NOT NULL,
  `FirstName` varchar(55) NOT NULL,
  `LastName` varchar(55) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`Customer_id`, `FirstName`, `LastName`, `Address`, `Country`, `email`, `password`) VALUES
(1, 'Jon', 'Snow', 'Deluxe Apartments,Atlanta', 'Canada', 'johnsnow@gmail.com', 'john13snow'),
(25, 'Lupe', ' Austin', '124 Ashland St Beloit, WI  53511', 'USA', 'lupe@gmail.com', 'lupe@123'),
(28, 'Josiah', ' Booth', '681 Lemoyer Blvd Detroit, MI  48233', 'USA', 'josiah@gmail.com', 'jose@123'),
(43, 'Anup', 'Bujurke', 'ABV Apartments,Gulbarga', 'USA', 'anup.bujurke@gmail.com', 'anup12'),
(44, 'Chetan', ' M', 'Galaxy Apartments,Bombay', 'USA', 'chetan@gmail.com', 'chetanl@12'),
(45, 'Bilal', ' Shakil', 'Galaxy Apartments,Indore', 'India', 'bilal@gmail.com', 'bilal@123'),
(48, 'Ashish', 'Sanu', 'Panjim,Goa', 'Grenada', 'sanu@gmail.com', 'sanu'),
(49, 'Avinash', 'Chavan', 'Wadi,Gulbarga', 'Barbados', 'avinash@gmail.com', 'avinahs'),
(50, 'Albert ', 'Einstein', 'Illinois', 'USA', 'albert@gmail.com', 'albert@123'),
(51, 'Paulette', ' Mcpherson', '98 Cedarwood Ln Irving, TX', 'USA', 'Paulette@gmail.com', 'paul@123'),
(52, 'bjgg', 'fhfh', 'hghgg', 'Afghanistan', 'kytmg@gma', 'jgv'),
(53, 'Avinash', 'S', 'Gulbarga', 'India', 'ash@gmail.com', 'avi'),
(54, 'Ali', 'Baba', 'Sahara Desert', 'Egypt', 'alibaba@gmail.com', 'ali'),
(55, 'Ali', 'Baba', 'Sahara Desert', 'Argentina', 'alibaba@gmail.com', 'ali'),
(56, 'Ali', 'Baba', 'Sahara', 'Afghanistan', 'alibaba@gmail.com', 'ali'),
(57, 'Ali', 'Baba', 'sahara', 'Afghanistan', 'alibaba@gmail.com', 'ali'),
(60, 'Ali', 'Baba', 'Sahara', 'Afghanistan', 'alibaba@gmail.com', 'ali'),
(61, 'Chetn', 'G', 'agag', 'India', 'ch@gmail.com', 'ch'),
(62, 'Pritam', 'Pyaare', 'Bombay', 'India', 'p@gmail.com', 'p'),
(63, 'Manohar', 'M', 'Bangalore', 'India', 'm@gmail.com', 'm'),
(64, 'Manohar', 'M', 'Bangalore', 'India', 'm@gmail.com', 'm'),
(65, 'Manohar', 'M', 'Bangalore', 'India', 'm@gmail.com', 'm'),
(66, 'Manohar', 'M', 'Bangalore', 'India', 'm@gmail.com', 'm'),
(67, 'Chandan', 'Shetty', 'Bangalore', 'Bahamas', 'chandan@gmail.com', 'chandan'),
(68, 'abs', 'vadn', 'anvn', 'Afghanistan', 'ab@gmail.com', 'ab'),
(69, 'afcab', 'uyguyg', 'uyg8', 'Afghanistan', 'ad@gmail.com', 'ad'),
(70, 'wasdds', 'sff', 'uygyuASddjg', 'Afghanistan', 'che@gma.com', 'asafgdsds'),
(71, 'akshay', 'jambagi', 'bangalore', 'India', 'akshay@gmail.com', 'akshay'),
(72, 'asdad', 'asd', 'asds', 'Bahrain', 'asdg@dg.cm', 'asd'),
(73, 'ashish', 'sanu', 'goa', 'India', 'sanu@gmail.com', 'sanu');

-- --------------------------------------------------------

--
-- Table structure for table `DELIVERY`
--

CREATE TABLE `DELIVERY` (
  `Cart_id` int(11) DEFAULT NULL,
  `Shipper_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DELIVERY`
--

INSERT INTO `DELIVERY` (`Cart_id`, `Shipper_id`) VALUES
(7, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(9, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(7, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 2),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(14, 2),
(14, 2),
(2, 1),
(2, 1),
(2, 2),
(2, 1),
(2, 1),
(18, 1),
(18, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ORDERS`
--

CREATE TABLE `ORDERS` (
  `Order_id` int(11) NOT NULL,
  `Sch_date` date DEFAULT NULL,
  `Total_Cost` int(11) DEFAULT NULL,
  `Cart_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ORDERS`
--

INSERT INTO `ORDERS` (`Order_id`, `Sch_date`, `Total_Cost`, `Cart_id`) VALUES
(7, '2018-03-26', 50300, 2),
(9, '2018-03-26', 50300, 2),
(10, '2018-03-26', 50300, 2),
(11, '2018-03-26', 30000, 7),
(12, '2018-03-26', 30000, 7),
(13, '2018-03-26', 50300, 2),
(14, '2018-03-26', 50300, 2),
(15, '2018-03-26', 30000, 7),
(16, '2018-03-26', 30000, 7),
(17, '2018-03-26', 30000, 7),
(18, '2018-03-26', 30000, 7),
(19, '2018-03-26', 30000, 7),
(21, '2018-03-26', 50300, 2),
(23, '2018-03-26', 25000, 8),
(27, '2018-03-26', 50300, 2),
(28, '2018-03-26', 50300, 2),
(29, '2018-03-26', 60450, 2),
(30, '2018-03-26', 60450, 2),
(31, '2018-03-26', 60450, 2),
(32, '2018-03-26', 30000, 7),
(33, '2018-03-27', 450, 2),
(34, '2018-03-28', 2600, 2),
(35, '2018-03-28', 2600, 2),
(36, '2018-03-28', 2600, 2),
(37, '2018-03-28', 2600, 2),
(38, '2018-03-28', 2600, 2),
(39, '2018-03-28', 2600, 2),
(40, '2018-03-28', 2600, 2),
(41, '2018-03-28', 2600, 2),
(42, '2018-03-28', 2600, 2),
(43, '2018-03-28', 2600, 2),
(44, '2018-03-28', 2600, 2),
(45, '2018-03-28', 2600, 2),
(46, '2018-03-28', 2600, 2),
(47, '2018-03-28', 2600, 2),
(48, '2018-03-28', 2600, 2),
(49, '2018-03-28', 2600, 2),
(50, '2018-03-28', 2600, 2),
(51, '2018-03-28', 2600, 2),
(52, '2018-03-28', 2600, 2),
(57, '2018-03-28', 27600, 2),
(58, '2018-03-28', 27600, 2),
(59, '2018-03-28', 27600, 2),
(60, '2018-03-28', 10000, 9),
(63, '2018-03-28', 12600, 2),
(68, '2018-03-28', 12600, 2),
(69, '2018-03-28', 12600, 2),
(71, '2018-03-29', 12600, 2),
(72, '2018-03-29', 12600, 2),
(73, '2018-04-01', 30000, 2),
(75, '2018-04-02', 15000, 2),
(77, '2018-04-16', 20000, 2),
(78, '2018-04-16', 300, 14),
(79, '2018-04-16', 300, 14),
(80, '2018-04-23', 600, 2),
(81, '2018-04-23', 20000, 2),
(82, '2018-04-23', 75000, 18),
(83, '2018-04-23', 75000, 18),
(84, '2018-04-23', 20000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `PAYMENT`
--

CREATE TABLE `PAYMENT` (
  `Payment_id` int(11) NOT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Mod_pay` varchar(20) DEFAULT NULL,
  `Customer_id` int(11) DEFAULT NULL,
  `Order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PAYMENT`
--

INSERT INTO `PAYMENT` (`Payment_id`, `Amount`, `Mod_pay`, `Customer_id`, `Order_id`) VALUES
(5, 50300, 'Net Banking', 53, 7),
(13, 50300, 'Card', 53, 27),
(14, 60450, 'Card', 53, 29),
(15, 60450, 'Card', 53, 30),
(16, 60450, 'Card', 53, 30),
(17, 60450, 'Card', 53, 30),
(18, 60450, 'Card', 53, 30),
(19, 60450, 'Card', 53, 30),
(20, 60450, 'Card', 53, 30),
(21, 60450, 'Card', 53, 30),
(22, 60450, 'Card', 53, 31),
(23, 60450, 'Card', 53, 31),
(24, 60450, 'Card', 53, 31),
(25, 60450, 'Card', 53, 31),
(26, 60450, 'Card', 53, 31),
(27, 60450, 'Card', 53, 31),
(28, 60450, 'Card', 53, 31),
(29, 60450, 'Card', 53, 31),
(30, 60450, 'Card', 53, 31),
(31, 60450, 'Card', 53, 31),
(32, 60450, 'Card', 53, 31),
(33, 60450, 'Card', 53, 31),
(34, 30000, 'Net Banking', 50, 32),
(35, 2600, 'Card', 53, 47),
(36, 2600, 'Card', 53, 51),
(37, 2600, 'Card', 53, 51),
(38, 2600, 'Card', 53, 51),
(39, 2600, 'Card', 53, 51),
(40, 2600, 'Card', 53, 51),
(41, 2600, 'Card', 53, 51),
(42, 2600, 'Card', 53, 51),
(43, 2600, 'Card', 53, 51),
(44, 2600, 'Card', 53, 51),
(45, 2600, 'Card', 53, 52),
(46, 2600, 'Card', 53, 52),
(47, 2600, 'Card', 53, 52),
(48, 2600, 'Card', 53, 52),
(49, 2600, 'Card', 53, 52),
(64, 27600, 'Cash', 53, 57),
(65, 27600, 'Cash', 53, 57),
(66, 27600, 'Card', 53, 59),
(69, 12600, 'Card', 53, 63),
(82, 12600, 'Net Banking', 53, 68),
(83, 12600, 'Net Banking', 53, 68),
(85, 15000, 'Net Banking', 53, 75),
(87, 20000, 'Net Banking', 53, 77),
(88, 20000, 'Net Banking', 53, 77),
(89, 300, 'Cash', 67, 79),
(90, 600, 'Net Banking', 53, 80),
(91, 20000, 'Card', 53, 81),
(92, 20000, 'Cash', 53, 84);

-- --------------------------------------------------------

--
-- Table structure for table `PORTAL`
--

CREATE TABLE `PORTAL` (
  `Portal_id` int(11) NOT NULL,
  `Portal_Name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PORTAL`
--

INSERT INTO `PORTAL` (`Portal_id`, `Portal_Name`) VALUES
(1, 'Amazon'),
(2, 'Flipkart'),
(3, 'Ebay');

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `Product_id` int(11) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Price` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Model` varchar(20) DEFAULT NULL,
  `Brand_id` int(11) DEFAULT NULL,
  `Supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` (`Product_id`, `Product_Name`, `Price`, `Rating`, `Model`, `Brand_id`, `Supplier_id`) VALUES
(4, 'Galaxy S5', 15000, 4, 'R', 1, 1),
(5, 'Freesdom 251', 10000, 5, 'Big', 1, 1),
(6, 'Soft Ruled book', 150, 3, 'Single Line', 2, 2),
(7, 'Green Book', 650, 2, 'Double lined', 2, 1),
(8, 'Rounded Edge', 35000, 3, 'Rounded', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `SHIPPER`
--

CREATE TABLE `SHIPPER` (
  `Shipper_id` int(11) NOT NULL,
  `Shipper_Name` varchar(50) NOT NULL,
  `Supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SHIPPER`
--

INSERT INTO `SHIPPER` (`Shipper_id`, `Shipper_Name`, `Supplier_id`) VALUES
(1, 'Gabbar Shippers', 1),
(2, 'Ajanta Logistics', 2);

-- --------------------------------------------------------

--
-- Table structure for table `SUPPLIER`
--

CREATE TABLE `SUPPLIER` (
  `Supplier_id` int(11) NOT NULL,
  `Supplier_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SUPPLIER`
--

INSERT INTO `SUPPLIER` (`Supplier_id`, `Supplier_Name`) VALUES
(1, 'Ghanshyam Suppliers'),
(2, 'Ramu Suppliers');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BRAND`
--
ALTER TABLE `BRAND`
  ADD PRIMARY KEY (`Brand_id`);

--
-- Indexes for table `BRAND_N_CATEGORY`
--
ALTER TABLE `BRAND_N_CATEGORY`
  ADD KEY `Category_id` (`Category_id`),
  ADD KEY `Brand_id` (`Brand_id`);

--
-- Indexes for table `CART`
--
ALTER TABLE `CART`
  ADD PRIMARY KEY (`Cart_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `CART_ITEM`
--
ALTER TABLE `CART_ITEM`
  ADD PRIMARY KEY (`Cart_Item_id`),
  ADD KEY `Cart_id` (`Cart_id`),
  ADD KEY `Product_id` (`Product_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `DELIVERY`
--
ALTER TABLE `DELIVERY`
  ADD KEY `Cart_id` (`Cart_id`),
  ADD KEY `Shipper_id` (`Shipper_id`);

--
-- Indexes for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `Cart_id` (`Cart_id`);

--
-- Indexes for table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `Customer_id` (`Customer_id`),
  ADD KEY `Order_id` (`Order_id`);

--
-- Indexes for table `PORTAL`
--
ALTER TABLE `PORTAL`
  ADD PRIMARY KEY (`Portal_id`);

--
-- Indexes for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `Brand_id` (`Brand_id`),
  ADD KEY `Supplier_id` (`Supplier_id`);

--
-- Indexes for table `SHIPPER`
--
ALTER TABLE `SHIPPER`
  ADD PRIMARY KEY (`Shipper_id`),
  ADD KEY `Supplier_id` (`Supplier_id`);

--
-- Indexes for table `SUPPLIER`
--
ALTER TABLE `SUPPLIER`
  ADD PRIMARY KEY (`Supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BRAND`
--
ALTER TABLE `BRAND`
  MODIFY `Brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `CART`
--
ALTER TABLE `CART`
  MODIFY `Cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `CART_ITEM`
--
ALTER TABLE `CART_ITEM`
  MODIFY `Cart_Item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `Customer_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `ORDERS`
--
ALTER TABLE `ORDERS`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  MODIFY `Payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `PORTAL`
--
ALTER TABLE `PORTAL`
  MODIFY `Portal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `SHIPPER`
--
ALTER TABLE `SHIPPER`
  MODIFY `Shipper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `SUPPLIER`
--
ALTER TABLE `SUPPLIER`
  MODIFY `Supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BRAND_N_CATEGORY`
--
ALTER TABLE `BRAND_N_CATEGORY`
  ADD CONSTRAINT `BRAND_N_CATEGORY_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `CATEGORY` (`Category_id`),
  ADD CONSTRAINT `BRAND_N_CATEGORY_ibfk_2` FOREIGN KEY (`Brand_id`) REFERENCES `BRAND` (`Brand_id`);

--
-- Constraints for table `CART`
--
ALTER TABLE `CART`
  ADD CONSTRAINT `CART_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `CUSTOMER` (`Customer_id`);

--
-- Constraints for table `CART_ITEM`
--
ALTER TABLE `CART_ITEM`
  ADD CONSTRAINT `CART_ITEM_ibfk_1` FOREIGN KEY (`Cart_id`) REFERENCES `CART` (`Cart_id`),
  ADD CONSTRAINT `CART_ITEM_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `PRODUCT` (`Product_id`),
  ADD CONSTRAINT `CART_ITEM_ibfk_3` FOREIGN KEY (`Customer_id`) REFERENCES `CUSTOMER` (`Customer_id`);

--
-- Constraints for table `DELIVERY`
--
ALTER TABLE `DELIVERY`
  ADD CONSTRAINT `DELIVERY_ibfk_1` FOREIGN KEY (`Cart_id`) REFERENCES `CART` (`Cart_id`),
  ADD CONSTRAINT `DELIVERY_ibfk_2` FOREIGN KEY (`Shipper_id`) REFERENCES `SHIPPER` (`Shipper_id`),
  ADD CONSTRAINT `DELIVERY_ibfk_3` FOREIGN KEY (`Cart_id`) REFERENCES `CART` (`Cart_id`),
  ADD CONSTRAINT `DELIVERY_ibfk_4` FOREIGN KEY (`Shipper_id`) REFERENCES `SHIPPER` (`Shipper_id`);

--
-- Constraints for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD CONSTRAINT `ORDERS_ibfk_1` FOREIGN KEY (`Cart_id`) REFERENCES `CART` (`Cart_id`);

--
-- Constraints for table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  ADD CONSTRAINT `PAYMENT_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `CUSTOMER` (`Customer_id`),
  ADD CONSTRAINT `PAYMENT_ibfk_2` FOREIGN KEY (`Order_id`) REFERENCES `ORDERS` (`Order_id`);

--
-- Constraints for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD CONSTRAINT `PRODUCT_ibfk_1` FOREIGN KEY (`Brand_id`) REFERENCES `BRAND` (`Brand_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `PRODUCT_ibfk_2` FOREIGN KEY (`Supplier_id`) REFERENCES `SUPPLIER` (`Supplier_id`) ON UPDATE CASCADE;

--
-- Constraints for table `SHIPPER`
--
ALTER TABLE `SHIPPER`
  ADD CONSTRAINT `SHIPPER_ibfk_1` FOREIGN KEY (`Supplier_id`) REFERENCES `SUPPLIER` (`Supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
