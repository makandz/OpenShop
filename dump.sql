-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 03:57 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `token` varchar(500) NOT NULL,
  `ship` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first`, `last`, `email`, `phone`, `token`, `ship`) VALUES
(1, 'ewdf', 'fsdf', 'asdasa@hjdf.om', '348738732', '', 1),
(2, 'makan', 'doy', 'mKAN@mskm.com', '6479795800', '', 1),
(3, 'makan', 'doy', 'mKAN@mskm.com', '6479795804', '', 1),
(4, 'First', 'Name', 'email@mail.com', '6479795333', '', 0),
(5, 'dfjh', 'jkdhfkj', 'test@dfkj.com', '3487293872', 'EC-92H89435PP9364143', 0),
(6, 'Makan', 'Deyyyy', 'makan@gmail.com', '6473819301', 'EC-785581704W6883350', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `image`, `price`) VALUES
(1, 'Apples (4x)', 'This apple will surely please you, it is 100% full of Vitamin god I don\'t know, A?An apple is a sweet, edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', -1, 'apple.jpg', 299),
(2, 'Bananas (2x)', 'A banana is an edible fruit – botanically a berry – produced by several kinds of large herbaceous flowering plants in the genus Musa. In some countries, bananas used for cooking may be called \"plantains\", distinguishing them from dessert bananas.', 1021, 'banana.jpg', 399),
(3, 'Pineapple', 'The pineapple is a tropical plant with an edible multiple fruit consisting of coalesced berries, also called pineapples, and the most economically significant plant in the family Bromeliaceae.', 14, 'pineapple.jpg', 499),
(4, 'Oranges (4x)', 'this is for the lawyer services, my boys that are broke.\r\n\r\n\r\nbelieve it or not it really do be like that.', 120, 'orange.jpg', 249),
(5, 'Cucumbers (3x)', 'Cucumber is a widely cultivated plant in the gourd family, Cucurbitaceae. It is a creeping vine that bears cucumiform fruits that are used as vegetables. There are three main varieties of cucumber: slicing, pickling, and seedless. Within these varieties, several cultivars have been created.', 40, 'cucumber.jpg', 199),
(6, 'Watermelon', 'Citrullus lanatus is a plant species in the family Cucurbitaceae, a vine-like flowering plant originating in West Africa. It is cultivated for its fruit.', 200, 'watermelon.jpg', 1099),
(7, 'Strawberries (40x)', 'The garden strawberry is a widely grown hybrid species of the genus Fragaria, collectively known as the strawberries. It is cultivated worldwide for its fruit. The fruit is widely appreciated for its characteristic aroma, bright red color, juicy texture, and sweetness.', -1, 'strawberry.jpg', 594);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
