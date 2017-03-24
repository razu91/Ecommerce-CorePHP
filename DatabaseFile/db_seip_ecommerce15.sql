-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- হোষ্ট: 127.0.0.1
-- তৈরী করতে ব্যবহৃত সময়: মার 24, 2017 at 05:21 ???????
-- সার্ভার সংস্করন: 10.1.19-MariaDB
-- পিএইছপির সংস্করন: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- ডাটাবেইজ: `db_seip_ecommerce15`
--

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email_address` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `access_level` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `email_address`, `password`, `access_level`, `deletion_status`) VALUES
(12, 'Md. Shahnaouz Razu', 'shahnaouzrazu21@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `deletion_status`) VALUES
(9, 'Mens', 'T-Shirt,Denim,Jeans,Panjabi', 1, 1),
(10, 'Womens', 'Lorem IpsumLorem IpsumLorem IpsumLorem Ipsum<br>', 1, 1),
(11, 'Mobile & Tab', 'Lorem IpsumLorem IpsumLorem IpsumLorem Ipsum<br>', 1, 1),
(12, 'Computer & Accessories', 'Lorem IpsumLorem IpsumLorem IpsumLorem Ipsum<br>', 1, 1),
(13, 'Backpack', 'Lorem IpsumLorem IpsumLorem IpsumLorem Ipsum<br>', 1, 1),
(14, 'Sports', 'Lorem IpsumLorem IpsumLorem IpsumLorem Ipsum<br>', 1, 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(10) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `first_name`, `last_name`, `email_address`, `password`, `address`, `phone_number`, `city`, `country`, `deletion_status`) VALUES
(43, 'Md. Shahnaouz ', 'Razu', 'r_shahnaouz21@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '4/30, Block-D, Mirpur-1216', '01825555144', 'Dhaka', 'BD', 0);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_manufacture`
--

CREATE TABLE `tbl_manufacture` (
  `manufacture_id` int(5) NOT NULL,
  `manufacture_name` varchar(100) NOT NULL,
  `manufacture_description` text NOT NULL,
  `publication_status` varchar(100) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_manufacture`
--

INSERT INTO `tbl_manufacture` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `publication_status`, `deletion_status`) VALUES
(4, 'Walmart', 'T-Shirt', '1', 1),
(5, 'Craft', 'Panjabi, Fatua<br>', '1', 1),
(6, 'Nike', 'Lorem Ipsum<br>', '1', 1),
(7, 'Arang', 'Lorem Ipsum<br>', '1', 1),
(8, 'Samsung', 'Lorem Ipsum<br>', '1', 1),
(9, 'Lion', 'Lorem Ipsum<br>', '1', 1),
(10, 'Cosonic', 'Lorem Ipsum<br>', '1', 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(250) NOT NULL,
  `payment_status` varchar(250) NOT NULL DEFAULT 'pending',
  `order_status` varchar(250) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `payment_status`, `order_status`) VALUES
(1, 7, 4, 2, '1150', '', 'pending'),
(2, 9, 5, 3, '1380', 'pending', 'pending'),
(3, 23, 6, 4, '3105', 'pending', 'pending'),
(4, 23, 7, 5, '1725', 'pending', 'pending'),
(5, 23, 8, 6, '1725', 'pending', 'pending'),
(6, 23, 9, 7, '1725', 'pending', 'pending'),
(7, 23, 10, 8, '1380', 'pending', 'pending'),
(8, 23, 11, 9, '1725', 'pending', 'pending'),
(9, 33, 12, 10, '1725', 'pending', 'pending'),
(10, 23, 13, 11, '1380', 'pending', 'pending'),
(11, 23, 14, 12, '1725', 'pending', 'pending'),
(12, 23, 15, 13, '1725', 'pending', 'pending'),
(13, 23, 16, 14, '1725', 'pending', 'pending'),
(14, 23, 17, 15, '1725', 'pending', 'pending'),
(15, 23, 18, 16, '1725', 'pending', 'pending'),
(16, 23, 19, 17, '1725', 'pending', 'pending'),
(17, 23, 20, 18, '1380', 'pending', 'pending'),
(18, 23, 21, 19, '1380', 'pending', 'pending'),
(19, 34, 22, 20, '3450', 'pending', 'pending'),
(20, 34, 23, 21, '3105', 'pending', 'pending'),
(21, 27, 25, 22, '1725', 'pending', 'pending'),
(22, 27, 26, 23, '2760', 'pending', 'pending'),
(23, 27, 27, 24, '1725', 'pending', 'pending'),
(24, 27, 28, 25, '1380', 'pending', 'pending'),
(25, 27, 29, 26, '1725', 'pending', 'pending'),
(33, 40, 37, 34, '1932', 'pending', 'pending'),
(34, 40, 38, 35, '552', 'pending', 'pending'),
(35, 41, 39, 36, '552', 'pending', 'pending'),
(36, 41, 40, 37, '1380', 'pending', 'pending'),
(37, 41, 42, 38, '552', 'pending', 'pending'),
(38, 41, 43, 39, '1380', 'pending', 'pending'),
(39, 41, 44, 40, '1380', 'pending', 'pending'),
(40, 41, 45, 41, '1380', 'pending', 'pending'),
(41, 41, 46, 42, '552', 'pending', 'pending'),
(42, 41, 47, 43, '1380', 'pending', 'pending'),
(43, 41, 48, 44, '1380', 'pending', 'pending');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_price` varchar(250) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`) VALUES
(1, 1, 3, 'Hello Product', '1000.00', 1),
(2, 2, 6, 'T-Shirt', '1200.00', 1),
(3, 3, 1, 'Mobile', '1500.00', 1),
(4, 3, 6, 'T-Shirt', '1200.00', 1),
(5, 4, 4, 'product Two', '1500.00', 1),
(6, 5, 1, 'Mobile', '1500.00', 1),
(7, 6, 4, 'product Two', '1500.00', 1),
(8, 7, 6, 'T-Shirt', '1200.00', 1),
(9, 8, 1, 'Mobile', '1500.00', 1),
(10, 9, 4, 'product Two', '1500.00', 1),
(11, 10, 6, 'T-Shirt', '1200.00', 1),
(12, 11, 1, 'Mobile', '1500.00', 1),
(13, 12, 4, 'product Two', '1500.00', 1),
(14, 13, 4, 'product Two', '1500.00', 1),
(15, 14, 4, 'product Two', '1500.00', 1),
(16, 15, 4, 'product Two', '1500.00', 1),
(17, 16, 4, 'product Two', '1500.00', 1),
(18, 17, 3, 'Hello Product', '1000.00', 1),
(19, 17, 4, 'product Two', '1500.00', 2),
(20, 18, 3, 'Hello Product', '1000.00', 1),
(21, 18, 4, 'product Two', '1500.00', 2),
(22, 19, 1, 'Mobile', '1500.00', 1),
(23, 19, 4, 'product Two', '1500.00', 1),
(24, 20, 3, 'Hello Product', '1000.00', 1),
(25, 20, 4, 'product Two', '1500.00', 2),
(39, 33, 9, 'Polo T-Shirt', '480.00', 1),
(40, 33, 8, 'Jents Panjabi', '1200.00', 1),
(41, 34, 9, 'Polo T-Shirt', '480.00', 1),
(42, 35, 9, 'Polo T-Shirt', '480.00', 1),
(43, 36, 8, 'Jents Panjabi', '1200.00', 1),
(44, 37, 9, 'Polo T-Shirt', '480.00', 1),
(45, 38, 8, 'Jents Panjabi', '1200.00', 1),
(46, 39, 8, 'Jents Panjabi', '1200.00', 1),
(47, 40, 8, 'Jents Panjabi', '1200.00', 1),
(48, 41, 9, 'Polo T-Shirt', '480.00', 1),
(49, 42, 8, 'Jents Panjabi', '1200.00', 1),
(50, 43, 8, 'Jents Panjabi', '1200.00', 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_type`, `payment_status`) VALUES
(34, 'cash_on_delivary', 'pending'),
(35, 'cash_on_delivary', 'pending'),
(36, 'cash_on_delivary', 'pending'),
(37, 'cash_on_delivary', 'pending'),
(38, 'cash_on_delivary', 'pending'),
(39, 'cash_on_delivary', 'pending'),
(40, 'cash_on_delivary', 'pending'),
(41, 'cash_on_delivary', 'pending'),
(42, 'cash_on_delivary', 'pending'),
(43, 'cash_on_delivary', 'pending'),
(44, 'cash_on_delivary', 'pending');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(7) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category_id` int(3) NOT NULL,
  `manufacture_id` int(5) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `product_short_description` text NOT NULL,
  `product_long_description` text NOT NULL,
  `product_image` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '1',
  `hit_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `manufacture_id`, `product_price`, `product_quantity`, `product_short_description`, `product_long_description`, `product_image`, `publication_status`, `deletion_status`, `hit_count`) VALUES
(9, 'Jents Panjabi', 9, 5, 1200.00, 50, 'Jents Panjabi by K Craft<br>', 'Jents Panjabi by K Craft-Made By Bangladesh<br>', 'product_image/smallImage1.jpg', 1, 1, 6),
(10, 'Polo T-Shirt', 9, 4, 780.00, 25, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/17.jpg', 1, 1, 9),
(11, 'Full Sweater', 9, 6, 1000.00, 20, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/imagers.jpg', 1, 1, 9),
(12, 'Salowar', 10, 7, 1500.00, 25, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumvLorem Ipsum<br>', 'product_image/28.jpg', 1, 1, 5),
(13, 'Nico Salower', 10, 7, 1500.00, 25, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/29.jpg', 1, 1, 1),
(14, 'Samsung Duos X2', 11, 8, 7500.00, 15, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/alcatel_onetouch_fierce_xl.jpg', 1, 1, 0),
(15, 'Samsung Zeo', 11, 8, 6500.00, 20, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/m1.jpg', 1, 1, 0),
(16, 'Lion Cycle', 14, 9, 7800.00, 15, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/cycle.jpg', 1, 1, 1),
(17, 'Football', 14, 6, 1200.00, 25, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/Football.png', 1, 1, 0),
(18, 'Cosonic Headphone ', 12, 10, 450.00, 25, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/headphone.jpg', 1, 1, 2),
(19, 'Digital Camera', 12, 8, 8000.00, 10, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/camera.jpg', 1, 1, 4),
(20, 'Blue Frog', 10, 4, 4500.00, 15, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/pic6.jpg', 1, 1, 1),
(21, 'Tourist Bag', 13, 6, 780.00, 25, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/bag.jpg', 1, 1, 2),
(22, 'Diamond Ring', 10, 4, 16000.00, 10, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/n3.jpg', 1, 1, 0),
(23, 'Samsun A4T', 11, 8, 12000.00, 15, 'Lorem Ipsum<br>', 'Lorem IpsumLorem IpsumLorem Ipsum<br>', 'product_image/m.jpg', 1, 1, 0),
(24, 'Wrist Watch', 9, 6, 3600.00, 15, 'Lorem Ipsum<br>', 'Lorem IpsumLorem Ipsum<br>', 'product_image/p2.jpg', 1, 1, 5);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(7) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `full_name`, `email_address`, `address`, `phone_number`, `city`, `country`, `deletion_status`) VALUES
(37, 'a', 'r_shahnaouz21@yahoo.com', 'da', '232', 'd', 'BD', 0),
(38, 'a', 'r_shahnaouz21@yahoo.com', 'a', '34343', 'd', 'BD', 0),
(39, 'a', 'r_shahnaouz21@yahoo.com', 'a', '4232', 'd', 'BD', 0),
(40, 'a', 'r_shahnaouz21@yahoo.com', 'a', '33', '2', 'BD', 0),
(41, 'a', 'r_shahnaouz21@yahoo.com', 'ad', '34', 'd', 'BD', 0),
(42, 'a', 'r_shahnaouz21@yahoo.com', 'a', '34', 'd', 'BD', 0),
(43, 'a', 'r_shahnaouz21@yahoo.com', 'a', '343', 'd', 'BD', 0),
(44, 'r', 'r_shahnaouz21@yahoo.com', 'a', '343', 'd', 'BD', 0),
(45, 'a', 'r_shahnaouz21@yahoo.com', 'a', '34', 'd', 'BD', 0),
(46, 'a', 'r_shahnaouz21@yahoo.com', 'a', '3', 'd', 'BD', 0),
(47, 'a', 'r_shahnaouz21@yahoo.com', 'a', '33', 'd', 'BD', 0),
(48, 'a', 'r_shahnaouz21@yahoo.com', 'd', '343', 'd', 'BD', 0);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_temp_cart`
--

CREATE TABLE `tbl_temp_cart` (
  `temp_cart_id` int(3) NOT NULL,
  `product_id` int(7) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` text NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_temp_cart`
--

INSERT INTO `tbl_temp_cart` (`temp_cart_id`, `product_id`, `session_id`, `product_name`, `product_image`, `product_price`, `product_quantity`) VALUES
(123, 8, '7ag2ctj5vb1m1lusv4k8et9cu6', 'Jents Panjabi', 'product_image/smallImage1.jpg', 1200.00, 1),
(125, 9, 'afnjnienbeilq3pchq05d0vtj5', 'Polo T-Shirt', 'product_image/poloshirt.jpg', 480.00, 2),
(126, 8, 'afnjnienbeilq3pchq05d0vtj5', 'Jents Panjabi', 'product_image/smallImage1.jpg', 1200.00, 1),
(149, 21, '8bjqmk6eq7bm7nmk0uudqqkhu0', 'Tourist Bag', 'product_image/bag.jpg', 780.00, 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `wish_product_id` int(11) NOT NULL,
  `wish_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- স্তুপকৃত টেবলের ইনডেক্স
--

--
-- টেবিলের ইনডেক্সসমুহ `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_temp_cart`
--
ALTER TABLE `tbl_temp_cart`
  ADD PRIMARY KEY (`temp_cart_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- স্তুপকৃত টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT)
--

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  MODIFY `manufacture_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_temp_cart`
--
ALTER TABLE `tbl_temp_cart`
  MODIFY `temp_cart_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
