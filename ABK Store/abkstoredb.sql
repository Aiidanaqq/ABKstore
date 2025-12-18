-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2018 at 09:47 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abkstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'Sony'),
(5, 'LG'),
(6, 'Cloth Brand');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(2, 7, '::1', 3, 1),
(3, 1, '::1', 3, 5),
(4, 8, '127.0.0.1', 3, 1),
(5, 4, '::1', 3, 1),
(6, 2, '::1', 3, 1),
(7, 17, '::1', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Electronics'),
(2, 'Ladies Wears'),
(3, 'Mens Wear'),
(4, 'Kids Wear'),
(5, 'Furnitures'),
(6, 'Home Appliances'),
(7, 'Electronics Gadgets');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 2, 7, 1, '07M47684BS5725041', 'Completed'),
(2, 2, 2, 1, '07M47684BS5725041', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 2, 'Samsung Galaxy Duos', 499, 'Samsung Galaxy Dous 2 sgh ', 'galaxyduos.jpg', 'samsung mobile electronics'),
(2, 1, 3, 'iPhone X', 1899, 'iphone X', 'iphonex.jpg', 'mobile iphone apple'),
(3, 1, 3, 'iPad Pro', 959, 'ipad apple brand', 'ipadpro.jpg', 'apple ipad tablet'),
(4, 1, 3, 'iPhone 6s', 749, 'Apple iPhone 6s', 'iphone6s.jpg', 'iphone apple mobile'),
(5, 1, 2, 'iPad 2', 899, 'samsung ipad', 'ipad2.jpg', 'ipad tablet samsung'),
(6, 1, 1, 'Hp Laptop r series', 1299, 'Hp Laptop', 'hplaptop.jpg', 'hp laptop '),
(7, 1, 1, 'Laptop Pavillion', 1199, 'Laptop Hp convert', 'hppavillion.jpg', 'Laptop Hp Pavillion'),
(8, 1, 4, 'OnePlus 6T', 879, 'One Plus 6T', 'oneplus.jpg', 'One Plus T 6T'),
(9, 1, 3, 'iPhone 7', 699, 'iphone', 'whiteiphone.jpg', 'iphone apple mobile'),
(10, 2, 6, 'Red Women Dress', 250, 'red dress for women', 'reddress.jpg', 'red dress '),
(11, 2, 6, 'Blue Hoodie', 59, 'Blue hoodie', 'bluehoodie.jpg', 'blue dress cloths'),
(12, 2, 6, 'Ladies Casual Cloths', 150, 'ladies casual summer two colors pleted', 'ladydress.jpg', 'girl dress cloths casual'),
(13, 2, 6, 'SpringAutumnDress', 350, 'girls dress', 'autumn.jpg', 'girl dress'),
(14, 2, 6, 'Casual Dress', 250, 'girl dress', 'casualdress.jpg', 'ladies cloths girl'),
(15, 2, 6, 'Formal Look', 140, 'girl dress', 'formallook.jpg', 'ladies wears dress girl'),
(16, 3, 6, 'Sweater for men', 600, 'Sweater men', 'mensweater.jpg', 'black sweter cloth winter'),
(17, 3, 6, 'Gents formal', 1200, 'gents formal look', 'gentsformal.jpg', 'gents wear cloths'),
(19, 3, 6, 'Winter Coat', 1600, 'Coat', 'coat.jpg', 'coat blazer gents'),
(20, 3, 6, 'Mens Bomber', 550, 'bomber', 'bomber.jpg', 'sweeter gents '),
(21, 3, 6, 'Mens Shirt', 50, 'Mens Shirt Green', 'menshirt.jpg', 'formal t shirt black'),
(22, 4, 6, 'Yellow T shirt ', 99, 'yellow shirt', 'yellowshirt.jpg', 'kids yellow t shirt'),
(23, 4, 6, 'Girls Blue Red Dress', 540, 'Girls blue Red dress', 'girlsdress.jpg', 'formal kids wear dress blue red'),
(24, 4, 6, 'Red Shirt', 399, 'Red Shirt Men', 'redshirt.jpg', 'Red Shirt Men'),
(25, 4, 6, 'Monkey Sweater', 249, 'Monkey Sweater', 'monkey.jpg', 'yellow kids dress'),
(26, 4, 6, 'Blue Dress', 650, 'blue dress', 'bluedress.jpg', 'blue dress'),
(27, 4, 6, 'Classic Suit Kids', 690, 'Kids Suit', 'kidssuit.jpg', 'formal kids dress'),
(32, 5, 0, 'Book Shelf', 250, 'book shelf', 'bookshelf.jpg', 'book shelf furniture'),
(33, 6, 2, 'Refrigerator', 1399, 'Refrigerator', 'refigerator.png', 'refrigerator samsung'),
(34, 6, 4, 'Emergency Light', 799, 'Emergency Light', 'erlight.jpg', 'emergency light'),
(35, 6, 0, 'Vaccum Cleaner', 800, 'Vaccum Cleaner', 'vacuum.jpg', 'Vaccum Cleaner'),
(36, 6, 5, 'Iron', 399, 'Iron', 'iron.jpg', 'iron'),
(37, 6, 5, 'LED TV', 1599, 'LED TV', 'tv.jpg', 'led tv lg'),
(38, 6, 4, 'Microwave Oven', 3500, 'Microwave Oven', 'micro.jpg', 'Microwave Oven'),
(39, 6, 5, 'Mixer Grinder', 2500, 'Mixer Grinder', 'mixer.jpg', 'Mixer Grinder'),
(40, 2, 6, 'Classic Women', 360, 'Womens classic outfit', 'casualwomen.jpg', 'ladies'),
(45, 1, 2, 'Samsung Galaxy Note 8', 950, 'Galaxy Note 8', 'note8.png', 'galaxy note 8'),
(46, 1, 2, 'Samsung Galaxy A6', 899, 'Galaxy A6', 'a6.png', 'Galaxy A 6');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Bekbolsun', 'Bektenov', 'b@bb.com', '645485082bba2c9cb791aeed59eb3894', '8322287571', '2418 S Voss Rd, Houston, TX 77057', 'apt L211'),
(2, 'Kalysbek', 'Isaev', 'isaev@na.edu', 'e2ec9f889068b3c3c33bd8709cc1ac8e', '8325655482', 'askd Street', 'sad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
