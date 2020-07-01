-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 05:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kubercart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(5, 'Sukhendra', '523sukh@gmail.com', 'think523', 'sukhendra523___BrCRUfqBgLv___.jpg', 'Indonesia', ' This is for IKO', '9588987763', 'Fighter / Actor');

-- --------------------------------------------------------

--
-- Table structure for table `boxes_section`
--

CREATE TABLE `boxes_section` (
  `box_id` int(11) NOT NULL,
  `box_title` text NOT NULL,
  `box_desc` text NOT NULL,
  `box_image` text NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boxes_section`
--

INSERT INTO `boxes_section` (`box_id`, `box_title`, `box_desc`, `box_image`, `position`) VALUES
(1, ' New Title Box Best Offers ', 'New Lorem  dolor sit amet consectetur adipisicing elit. Laborum nam voluptate ipsum, quasi, soluta voluptatem eligendi voluptatum officia sed, molestiae tempore corrupti similique? Deserunt odio fugit facere voluptate consequuntur doloremque?', 'box1.jpg', 1),
(2, 'New Title Box 100% Satisfy ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum nam voluptate ipsum, quasi, soluta voluptatem eligendi voluptatum officia sed, molestiae tempore corrupti similique? Deserunt odio fugit facere voluptate consequuntur doloremque?', 'box2.jpg', 2),
(3, 'New Title Box New Box Title 4 ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, aliquid veritatis amet ad saepe nesciunt eos? Quas ipsum laboriosam hic sunt fugit cumque maiores! Ducimus officiis commodi consequuntur rerum minima.', 'box3.jpg', 3),
(4, 'New Title Box New Box Title 4 ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, aliquid veritatis amet ad saepe nesciunt eos? Quas ipsum laboriosam hic sunt fugit cumque maiores! Ducimus officiis commodi consequuntur rerum minima.', 'box4.jpg', 4),
(5, 'New Title Box New Box Title 4 ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, aliquid veritatis amet ad saepe nesciunt eos? Quas ipsum laboriosam hic sunt fugit cumque maiores! Ducimus officiis commodi consequuntur rerum minima.', 'box5.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text NOT NULL,
  `color` text NOT NULL,
  `name` text NOT NULL,
  `sticker` text NOT NULL,
  `quote` text NOT NULL,
  `image` text NOT NULL,
  `instruction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `p_price`, `size`, `color`, `name`, `sticker`, `quote`, `image`, `instruction`) VALUES
(52, '::1', 1, '755', 'M', 'Green', '', '', '', '', ''),
(20, '::1', 1, '100', 'S', 'Blue', '', '', '', '', ''),
(51, '::1', 1, '900', 'M', 'Yellow', '', '', '', '', ''),
(46, '::1', 1, '688', 'M', 'Blue', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(1, 'Men', 'yes', 'men.jpg'),
(2, 'Women', 'yes', 'women.png'),
(3, 'Kids', 'no', 'kids.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(2, 5, 'Coupon For Black Swan Blouse', '95', 'kupon28183774', 2, 1),
(4, 10, 'Coupon Forn Diamond Heart Ring', '250', '82828288', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_master`
--

CREATE TABLE `coupon_master` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_type` varchar(10) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_master`
--

INSERT INTO `coupon_master` (`id`, `coupon_code`, `coupon_value`, `coupon_type`, `cart_min_value`, `status`) VALUES
(1, 'First50', 1000, 'Rupee', 1500, 1),
(2, 'First60', 20, 'Percentage', 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_last_name` text NOT NULL,
  `customer_gender` text NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_pin_code` int(11) NOT NULL,
  `customer_house_num` text NOT NULL,
  `customer_state` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_last_name`, `customer_gender`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_pin_code`, `customer_house_num`, `customer_state`, `customer_contact`, `customer_address`, `address`, `customer_image`, `customer_ip`) VALUES
(1, 'Sukhendra', '', '', '1816510133@gmail.com', 'think523', '', '', 0, '', '', '7268040393', '', '', '', '::1'),
(2, 'Sukhendra Rajawat', '', '', '7sukhendra@gmail.com', 'think523', 'India', 'Kanpur', 0, '', '', '09588987763', 'Sanjeev Nagar', '', 'sukhendra523___BrCRUfqBgLv___.jpg', '::1'),
(3, 'Sukhendra', 'Rajawat', '', '523sukh@gmail.com', 'think523', 'india', 'kanpur', 208007, '65', 'up', '9588987763', 'ram nagar', 'male', 'sukhendra523___BrCRUfqBgLv___.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `payment_type` text NOT NULL,
  `payment_status` text NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `order_id`, `customer_id`, `product_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `payment_type`, `payment_status`, `order_status`) VALUES
(38, 'ORDS26420249', 3, 51, 900, 1645849016, 1, 'M', '2020-06-22', 'online', 'TXN_FAILURE', 1),
(39, 'ORDS26420249', 3, 46, 688, 1645849016, 1, 'M', '2020-06-22', 'online', 'TXN_FAILURE', 1),
(40, 'ORDS26420249', 3, 52, 755, 1645849016, 1, 'S', '2020-06-22', 'online', 'TXN_FAILURE', 4);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(1, 'Name_2', 'yes', 'man_2.jpg'),
(2, 'Jenny Artha', 'yes', 'man_3.jpg'),
(3, 'Hendra', 'no', 'man_4.jpg'),
(4, 'Name_5', 'no', 'man_5.jpg'),
(5, 'Manufacturer 2', 'no', 'new-jacket-women-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, '523sukhendra@gmail.com'),
(2, '523sukhendra@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`id`, `order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(14, 'ORDS32393537', 3, 2095738319, '32', 1, 'M', 'pending'),
(15, 'ORDS32393537', 3, 2095738319, '28', 1, 'M', 'pending'),
(16, 'ORDS32393537', 3, 2095738319, '5', 1, 'XL', 'pending'),
(17, 'ORDS47900794', 3, 292990560, '30', 1, 'Black', 'pending'),
(18, 'ORDS47900794', 3, 292990560, '31', 1, 'Black', 'pending'),
(19, 'ORDS47900794', 3, 292990560, '29', 1, 'Black', 'pending'),
(20, 'ORDS47900794', 3, 292990560, '35', 3, 'M', 'pending'),
(21, 'ORDS47900794', 3, 292990560, '42', 3, 'M', 'pending'),
(22, 'ORDS47900794', 3, 292990560, '48', 2, 'S', 'pending'),
(23, 'ORDS26528132', 3, 791064836, '20', 2, 'Black', 'pending'),
(24, 'ORDS26528132', 3, 791064836, '11', 4, 'M', 'pending'),
(25, 'ORDS26528132', 3, 791064836, '36', 4, 'L', 'pending'),
(26, 'ORDS26528132', 3, 791064836, '48', 2, 'M', 'pending'),
(27, 'ORDS99111335', 3, 1326172624, '11', 4, 'M', 'pending'),
(28, 'ORDS99111335', 3, 1326172624, '20', 2, 'S', 'pending'),
(29, 'ORDS99111335', 3, 1326172624, '51', 2, 'M', 'pending'),
(30, 'ORDS32541578', 3, 743666583, '26', 1, 'S', 'pending'),
(31, 'ORDS32541578', 3, 743666583, '51', 5, 'M', 'pending'),
(32, 'ORDS32541578', 3, 743666583, '52', 1, 'M', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `p_sub_cat_id` int(11) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `cat` text NOT NULL,
  `product_brand` text NOT NULL,
  `product_cat` text NOT NULL,
  `product_sub_cat` text NOT NULL,
  `product_color1` text NOT NULL,
  `product_color2` text NOT NULL,
  `product_color3` text NOT NULL,
  `product_color4` text NOT NULL,
  `product_size1` text NOT NULL,
  `product_size2` text NOT NULL,
  `product_size3` text NOT NULL,
  `product_size4` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_img4` text NOT NULL,
  `stock` int(11) NOT NULL,
  `product_price` int(10) DEFAULT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_label` text NOT NULL,
  `product_sale` int(100) NOT NULL,
  `product_status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `p_sub_cat_id`, `cat_id`, `manufacturer_id`, `cat`, `product_brand`, `product_cat`, `product_sub_cat`, `product_color1`, `product_color2`, `product_color3`, `product_color4`, `product_size1`, `product_size2`, `product_size3`, `product_size4`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_img4`, `stock`, `product_price`, `product_keywords`, `product_desc`, `product_label`, `product_sale`, `product_status`) VALUES
(1, 1, 5, 1, 3, 'Men', 'Hendra', 'Topwear', 'Jackets', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-04 12:56:51', 'Man Geox Winter Jacket', 'Man-Geox-Winter-jacket-1.jpg', 'Man-Geox-Winter-jacket-2.jpg', 'Man-Geox-Winter-jacket-3.jpg', 'Man-Geox-Winter-jacket-1.jpg', 0, 66, 'Jacket', '<p>Just want to try update</p>', 'sale', 55, '1'),
(2, 1, 36, 3, 3, 'Kids', 'Hendra', 'Topwear', 'Blazers & Coats', 'Green', 'Black', 'White', 'Yellow', 'S', 'M', 'L', 'XL', '2020-06-17 03:43:48', 'Boys Puffer Coa', 'boys-Puffer-Coat-With-Detachable-Hood-1.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-2.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-3.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-1.jpg', 0, 121, 'Hood', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>', 'sale', 100, '1'),
(3, 6, 34, 2, 5, 'Women', 'Manufacturer 2', 'Western Wear', 'T-Shirts', 'Yellow', 'Blue', 'Red', 'Green', 'S', 'M', 'L', 'XL', '2020-06-04 14:10:17', 'Girl Polos T-Shirt', 'g-polos-tshirt-1.jpg', 'g-polos-tshirt-2.jpg', 'g-polos-tshirt-1.jpg', 'g-polos-tshirt-2.jpg', 0, 55, 'Shirt', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>', 'sale', 50, '1'),
(4, 1, 5, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'Jackets', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-04 13:07:51', 'Man Geox Winter Jacket', 'Man-Geox-Winter-jacket-1.jpg', 'Man-Geox-Winter-jacket-2.jpg', 'Man-Geox-Winter-jacket-3.jpg', 'Man-Geox-Winter-jacket-1.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>', 'new', 0, '1'),
(5, 6, 27, 2, 1, 'Women', 'Name_2', 'Western Wear', 'Loungewear', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-04 14:28:59', 'Women Red loungewear', 'loungewear1.jpg', 'loungewear2.jpg', 'loungewear3.jpg', 'loungewear4.jpg', 0, 103, 'Korean Jacket', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>', 'new', 0, '1'),
(6, 5, 23, 2, 2, 'Women', 'Jenny Artha', 'Indian Wear', 'Ethnic Dresses', 'Green', 'Black', 'White', 'Yellow', 'S', 'M', 'L', 'XL', '2020-06-04 14:33:53', 'Woman Waxed Ethnic Wear', 'w-ethnic1.jpg', 'w-ethnic2.jpg', 'w-ethnic3.jpg', 'w-ethnic4.jpg', 0, 211, 'Cotton', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>', 'sale', 200, '1'),
(11, 5, 22, 2, 2, 'Women', 'Jenny Artha', 'Indian Wear', 'Kurtas & Suits', 'Yellow', 'Blue', 'Red', 'Green', 'S', 'M', 'L', 'XL', '2020-06-04 14:52:58', 'women kurtas', 'w-kurta1.jpg', 'w-kurta2.jpg', 'w-kurta3.jpg', 'w-kurta4.jpg', 0, 50, 'Casual', '', 'new', 0, '1'),
(12, 1, 23, 1, 3, 'Women', 'Hendra', 'Indian Wear', 'Ethnic Dresses', 'Yellow', 'Blue', 'Red', 'Green', 'S', 'M', 'L', 'XL', '2020-06-04 15:03:46', 'Man Polo Casual T-Shirt', 'w-ethnic11.jpg', 'w-ethnic22.jpg', 'w-ethnic33.jpg', 'w-ethnic44.jpg', 0, 45, 'Casual', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi rem nemo, autem at ad temporibus, maiores ducimus sed quam enim reprehenderit distinctio similique debitis, quis corrupti est. Sed, rem, voluptatibus!</p>', 'new', 0, '1'),
(13, 5, 24, 2, 3, 'Women', 'Hendra', 'Indian Wear', 'Sarees & Blouses', 'Yellow', 'Blue', 'Red', 'Green', 'S', 'M', 'L', 'XL', '2020-06-04 14:48:58', 'Black Sarees', 'saree1.jpg', 'saree2.jpg', 'saree3.jpg', 'saree4.jpg', 0, 40, 'Casual', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi rem nemo, autem at ad temporibus, maiores ducimus sed quam enim reprehenderit distinctio similique debitis, quis corrupti est. Sed, rem, voluptatibus!</p>', 'sale', 35, '1'),
(14, 1, 5, 1, 4, 'Men', 'Name_5', 'Topwear', 'Jackets', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-04 14:06:20', 'Levi`s Trucker Jacket', 'levis-Trucker-Jacket.jpg', 'levis-Trucker-Jacket-2.jpg', 'levis-Trucker-Jacket-3.jpg', 'levis-Trucker-Jacket.jpg', 0, 98, 'Trucker', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi rem nemo, autem at ad temporibus, maiores ducimus sed quam enim reprehenderit distinctio similique debitis, quis corrupti est. Sed, rem, voluptatibus!</p>', 'sale', 90, '1'),
(16, 5, 22, 2, 2, 'Women', 'Jenny Artha', 'Topwear', 'kurtas & Suits', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-04 14:53:47', 'Edited Women Jacket ', 'new-jacket-women-1.jpg', 'new-jacket-women-2.jpg', 'new-jacket-women-3.jpg', 'new-jacket-women-1.jpg', 0, 68, 'Women Jacket', '<p>This is just description for sampe product of hijab. And Cha cha cha And Cha cha cha And Cha cha cha And Cha cha cha And Cha cha cha And Cha cha cha And Cha cha cha And Cha cha cha And Cha cha cha And Cha cha cha And Cha cha cha</p>', 'new', 0, '1'),
(18, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'Tops', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products1.jpg', 'products2.jpg', 'products3.jpg', 'products4.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>', 'new', 0, '1'),
(19, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'Tops', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products1.jpg', 'products2.jpg', 'products3.jpg', 'products4.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(20, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products2.jpg', 'products3.jpg', 'products4.jpg', 'products5.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(21, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products3.jpg', 'products4.jpg', 'products5.jpg', 'products6.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(22, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-05 11:16:56', 'Man Geox T-Shirt', 'products4.jpg', 'products5.jpg', 'products6.jpg', 'products7.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(23, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products5.jpg', 'products6.jpg', 'products7.jpg', 'products8.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(24, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products6.jpg', 'products7.jpg', 'products8.jpg', 'products9.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(25, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products7.jpg', 'products8.jpg', 'products9.jpg', 'products10.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(26, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products8.jpg', 'products9.jpg', 'products10.jpg', 'products11.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(27, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products9.jpg', 'products10.jpg', 'products11.jpg', 'products12.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(28, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products10.jpg', 'products11.jpg', 'products12.jpg', 'products13.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(29, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products10.jpg', 'products11.jpg', 'products12.jpg', 'products13.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(30, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products11.jpg', 'products12.jpg', 'products13.jpg', 'products14.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(31, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products12.jpg', 'products13.jpg', 'products14.jpg', 'products15.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(32, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products13.jpg', 'products14.jpg', 'products15.jpg', 'products16.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(33, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products14.jpg', 'products15.jpg', 'products16.jpg', 'products17.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(34, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products15.jpg', 'products16.jpg', 'products17.jpg', 'products18.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(35, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products16.jpg', 'products17.jpg', 'products18.jpg', 'products19.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(36, 1, 1, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'T-Shirts', 'White', 'Blue', 'Red', 'Black', 'S', 'M', 'L', 'XL', '2020-06-03 08:40:07', 'Man Geox T-Shirt', 'products17.jpg', 'products18.jpg', 'products19.jpg', 'products20.jpg', 0, 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet,</p>', 'new', 0, '1'),
(37, 2, 17, 1, 1, 'Men', 'Name_2', 'Bottomwear', 'Boxers', 'Red', 'Green', 'White', 'Black', 'S', 'M', 'L', 'XL', '2020-06-06 07:00:06', 'Mens Boxer', 'm-boxer1.jpg', 'm-boxer2.jpg', 'm-boxer1.jpg', 'm-boxer2.jpg', 20, 500, 'boxer', '<p>mens boxer</p>', 'new', 300, '1'),
(38, 1, 2, 1, 2, 'Men', 'Jenny Artha', 'Topwear', 'Sweatshirts', 'Red', 'Green', 'White', 'Black', 'S', 'M', 'L', 'XL', '2020-06-08 14:36:34', 'Men Slogan Graphic Pullover', 'sweatshirt1.jpg', 'sweatshirt2.jpg', 'sweatshirt3.jpg', 'sweatshirt4.jpg', 20, 500, 'sweatshirt', '<p>sweatshirt</p>', 'new', 306, '1'),
(39, 1, 3, 1, 4, 'Men', 'Name_5', 'Topwear', 'Formal Shirts', 'Red', 'Green', 'White', 'Black', 'S', 'M', 'L', 'XL', '2020-06-17 03:44:29', 'Men Grey & Black Slim Fit', 'm-formal-shirts.jpg', 'm-formal-shirts.jpg', 'm-formal-shirts.jpg', 'm-formal-shirts.jpg', 20, 400, 'formal shirts', '', 'new', 234, '1'),
(40, 1, 4, 1, 4, 'Men', 'Name_5', 'Topwear', 'Shirts', 'Red', 'Green', 'White', 'Black', 'S', 'M', 'L', 'XL', '2020-06-17 03:45:17', 'Men Black & Grey Slim Fit ', 'm-shirts.jpg', 'm-shirts.jpg', 'm-shirts.jpg', 'm-shirts.jpg', 20, 400, 'shirts', '', 'new', 234, '1'),
(41, 1, 6, 1, 3, 'Men', 'Hendra', 'Topwear', 'Blazers & Coats', 'Blue', 'Yellow', 'Black', 'Red', 'S', 'M', 'L', 'XL', '2020-06-17 03:45:36', 'Men Sea Green Single-Breas', 'm-blazer.jpg', 'm-blazer.jpg', 'm-blazer.jpg', 'm-blazer.jpg', 20, 400, 'blazer', '', 'new', 399, '1'),
(42, 2, 8, 1, 2, 'Men', 'Jenny Artha', 'Bottomwear', 'Trousers & Chinos', 'Red', 'Green', 'Black', 'Blue', 'S', 'M', 'L', 'XL', '2020-06-17 03:45:46', 'Men Grey Regular Fit', 'trouser.jpg', 'trouser2.jpg', 'trouser3.jpg', 'trouser4.jpg', 20, 500, 'trouser', '', 'new', 266, '1'),
(43, 2, 9, 1, 5, 'Men', 'Manufacturer 2', 'Bottomwear', 'Formal Trousers', 'Red', 'Green', 'White', 'Red', 'S', 'M', 'L', 'XL', '2020-06-17 03:45:53', 'Men Charcoal Grey Slim Fit ', 'formal-trouser2.jpg', 'formal-trouser.jpg', 'formal-trouser3.jpg', 'formal-trouser4.jpg', 20, 600, 'formal trouser ', '', 'new', 644, '1'),
(44, 3, 12, 1, 3, 'Men', 'Hendra', 'Indian Wear', 'Kurtas & Kurta Sets', 'Red', 'Yellow', 'Black', 'Blue', 'S', 'M', 'L', 'XL', '2020-06-17 03:46:17', 'Men Blue Solid Kurta', 'm-kurta.jpg', 'm-kurta2.jpg', 'm-kurta3.jpg', 'm-kurta4.jpg', 20, 900, 'kurta', '', 'new', 877, '1'),
(45, 4, 21, 1, 3, 'Men', 'Hendra', 'Innerwear', 'Sleepwear & Loungewear', 'Red', 'Green', 'White', 'Blue', 'S', 'M', 'L', 'XL', '2020-06-17 03:46:27', 'Men Black Self-Design', 'm-loungewear1.jpg', 'm-loungewear5.jpg', 'm-loungewear3.jpg', 'm-loungewear4.jpg', 20, 899, 'sleepwear', '', 'new', 799, '1'),
(46, 6, 25, 2, 3, 'Women', 'Hendra', 'Western Wear', 'Dresses & Jumpsuits', 'White', 'Black', 'Yellow', 'Blue', 'S', 'M', 'L', 'XL', '2020-06-17 03:46:35', 'Women Maroon Solid ', 'w-dress.jpg', 'w-dress2.jpg', 'w-dress3.jpg', 'w-dress4.jpg', 20, 688, 'dress', '', 'new', 566, '1'),
(47, 6, 26, 2, 2, 'Women', 'Jenny Artha', 'Western Wear', 'Jeans & Jeggings', 'Blue', 'Yellow', 'Black', 'Red', 'S', 'M', 'L', 'XL', '2020-06-17 03:46:56', 'Women Navy Blue Cropped Jeans', 'w-jeans.jpg', 'w-jeans1.jpg', 'w-jeans2.jpg', 'w-jeans3.jpg', 20, 755, 'women jeans', '', 'new', 234, '1'),
(48, 6, 28, 2, 4, 'Women', 'Name_5', 'Western Wear', 'Tops', 'Blue', 'Yellow', 'Black', 'Red', 'S', 'M', 'L', 'XL', '2020-06-17 03:47:14', 'Women Navy Blue T-shirt', 'w-Tops1.jpg', 'w-tops2.jpg', 'w-tops3.jpg', 'w-tops4.jpg', 20, 900, 'tops', '', 'new', 400, '1'),
(49, 2, 18, 1, 2, 'Men', 'Jenny Artha', 'Bottomwear', 'Pyjamas', 'White', 'Green', 'Black', 'Red', 'S', 'M', 'L', 'XL', '2020-06-08 15:51:51', 'Navy Track Pants', 'm-pyjama1.jpg', 'm-pyjama2.jpg', 'm-pyjama3.jpg', 'm-pyjama4.jpg', 30, 900, 'pyjama', '', 'new', 400, '1'),
(50, 6, 32, 2, 2, 'Women', 'Jenny Artha', 'Western Wear', 'Boxers', 'Blue', 'Yellow', 'White', 'Black', 'S', 'M', 'L', 'XL', '2020-06-08 15:58:27', 'Attitude Queen Side Printed Boxer', 'w-boxer.jpg', 'w-boxer1.jpg', 'w-boxer2.jpg', 'w-boxer3.jpg', 20, 899, 'boxer', '', 'new', 400, '1'),
(51, 6, 33, 2, 4, 'Women', 'Name_5', 'Western Wear', 'Pyjamas', 'Red', 'Green', 'Yellow', 'Blue', 'S', 'M', 'L', 'XL', '2020-06-08 16:03:55', 'Neon Orange Pyjama', 'w-pyjama.jpg', 'w-pyjama1.jpg', 'w-pyjama2.jpg', 'w-pyjama.jpg', 20, 900, 'pyjama', '', 'new', 300, '1'),
(52, 2, 7, 1, 2, 'Men', 'Jenny Artha', 'Bottomwear', 'Jeans', 'Red', 'Green', 'Black', 'Blue', 'S', 'M', 'L', 'XL', '2020-06-12 04:42:47', 'Mens Jeans', 'jeans1.jpg', 'jeans2.jpg', 'jeans3.jpg', 'jeans4.jpg', 20, 755, 'jeans', '<p>mens jeans</p>', 'new', 400, '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(1, 1, 'Topwear', 'yes', 'men-topwear.jpg'),
(2, 1, 'Bottomwear', 'no', 'men-bottomwear.jpg'),
(3, 1, 'Indian Wear', 'no', 'men-indianwear.jpg'),
(4, 1, 'Innerwear', 'yes', 'men-innerwear.jpg'),
(5, 2, 'Indian Wear', 'no', 'women-indianwear.jpg'),
(6, 2, 'Western Wear', 'no', 'women-westernwear.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pro_cat_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `top` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sub_categories`
--

INSERT INTO `product_sub_categories` (`id`, `cat_id`, `pro_cat_id`, `title`, `image`, `top`) VALUES
(1, 1, 1, 'T-Shirts', 'topcat1.jpg', 1),
(2, 1, 1, 'Sweatshirts', 'top1.jpg', 2),
(3, 1, 1, 'Formal Shirts', 'top2.jpg', 2),
(4, 1, 1, 'Shirts', 'topcat4.jpg', 1),
(5, 1, 1, 'Jackets', 'jacket.jpg', 4),
(6, 1, 1, 'Blazers & Coats', 'Merlin-Enginner-Jacket.jpg', 4),
(7, 1, 2, 'Jeans', 'topcat3.jpg', 1),
(8, 1, 2, 'Trousers & Chinos', 'topcat5.jpg', 1),
(9, 1, 2, 'Formal Trousers', 'formal-trouser.jpg', 4),
(10, 1, 2, 'Shorts', 'products1.jpg', 4),
(11, 1, 2, 'Track Pants & Joggers', 'products1.jpg', 4),
(12, 1, 3, 'Kurtas & Kurta Sets', 'topcat2.jpg', 1),
(13, 1, 3, 'Sherwanis', 'products1.jpg', 4),
(14, 1, 3, 'Nehru Jackets', 'products1.jpg', 4),
(15, 1, 3, 'Dhotis', 'products1.jpg', 4),
(16, 1, 4, 'Briefs & Trunks', 'products1.jpg', 4),
(17, 1, 2, 'Boxers', 'bottom1.jpg', 3),
(18, 1, 2, 'Pyjamas', 'bottom2.jpg', 3),
(19, 1, 4, 'Vests', 'products1.jpg', 4),
(20, 1, 4, 'Thermals', 'products1.jpg', 4),
(21, 1, 4, 'Sleepwear & Loungewear', 'topcat6.jpg', 1),
(22, 2, 5, 'Kurtas & Suits', 'topcat7.jpg', 1),
(23, 2, 5, 'Ethnic Dresses', 'top3.jpg', 2),
(24, 2, 5, 'Sarees & Blouses', 'topcat9.jpg', 1),
(25, 2, 6, 'Dresses & Jumpsuits', 'topcat10.jpg', 1),
(26, 2, 6, 'Jeans & Jeggings', 'topcat8.jpg', 1),
(27, 2, 6, 'Loungewear', 'topcat11.jpg', 1),
(28, 2, 6, 'Tops', 'topcat12.jpg', 1),
(29, 2, 5, 'Lehenga Cholis', 'products1.jpg', 4),
(30, 2, 5, 'Dupattas & Shawls', 'products1.jpg', 4),
(31, 2, 5, 'Leggings, Salwars & Churidars', 'products1.jpg', 4),
(32, 2, 6, 'Boxers', 'bottom3.jpg', 3),
(33, 2, 6, 'Pyjamas', 'bottom4.jpg', 3),
(34, 2, 6, 'T-shirts', 'top4.jpg', 2),
(36, 3, 1, 'Blazers & Coat', 'Merlin-Enginner-Jacket.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_url` varchar(255) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slide_url`, `position`) VALUES
(1, 'Slide Number 11', 'slide1.jpg', 'shop.php?cat=Women&subCat=T-shirts', 1),
(2, 'Editing Slide 12', 'slide2.jpg', 'shop.php?cat=Men&subCat=Jackets', 1),
(3, 'Slide Number 14', 'slide3.jpg', 'shop.php?cat=Men&subCat=T-Shirts', 1),
(4, 'Slide Number 14', 'slide4.jpg', 'shop.php?cat=Men&subCat=T-Shirts', 1),
(5, 'Slide Number 14', 'slide5.jpg', 'shop.php?cat=Women&subCat=T-shirts', 1),
(6, 'Slide Number 14', 'deal1.jpg', 'shop.php?cat=Men&subCat=Jackets', 2),
(7, 'Slide Number 14', 'deal2.jpg', 'shop.php?cat=Men&subCat=Pyjamas', 2),
(8, 'Slide Number 14', 'deal3.jpg', 'shop.php?cat=Women&subCat=T-shirts', 2);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(11) NOT NULL,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(1, 'Rules & Regulations', 'link_1', '<div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ut itaque quibusdam dolores modi natus. Enim earum laboriosam, quos error voluptatem fugiat eos? In maiores quia eligendi, ea aperiam voluptate.</div>'),
(2, 'Promo & Regulations', 'link_2', '<div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ut itaque quibusdam dolores modi natus. Enim earum laboriosam, quos error voluptatem fugiat eos? In maiores quia eligendi, ea aperiam voluptate.</div>'),
(3, 'Refund Condition Policy', 'link_3', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ut itaque quibusdam dolores modi natus. Enim earum laboriosam, quos error voluptatem fugiat eos? In maiores quia eligendi, ea aperiam voluptate.</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boxes_section`
--
ALTER TABLE `boxes_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `coupon_master`
--
ALTER TABLE `coupon_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boxes_section`
--
ALTER TABLE `boxes_section`
  MODIFY `box_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupon_master`
--
ALTER TABLE `coupon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
