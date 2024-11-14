-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 08:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gafcommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `callback`
--

CREATE TABLE `callback` (
  `id` int(11) NOT NULL,
  `header` varchar(225) NOT NULL,
  `message` varchar(225) NOT NULL,
  `receiver` varchar(225) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `callback`
--

INSERT INTO `callback` (`id`, `header`, `message`, `receiver`, `timestamp`) VALUES
(1, '0', 'Kindly reach me on 0556524653 so we talk about this product ', '3', '2024-11-10 12:20:01'),
(2, 'one stop manS dealership Requested a call back onIndian military trousers ', 'kindly reach me on 0556527328 so we talk about this product', '3', '2024-11-10 12:21:36'),
(3, 'one stop manS dealership Requested a call back on Indian military trousers ', 'kindly reach me on 0556527328 so we talk about this product\r\nkindly reach me on 0556527328 so we talk about this product\r\nkindly reach me on 0556527328 so we talk about this product', '3', '2024-11-10 12:22:42'),
(4, 'one stop manS dealership Requested a call back on Multipurpose bag', 'kindly reach me on ', '2', '2024-11-10 12:41:20'),
(5, 'One jeff auto parts  Requested a call back on inner only', 'hello serwaa where is the shop located ', '4', '2024-11-10 19:52:03'),
(6, 'One jeff auto parts  Requested a call back on gun hrt', 'i need this  reach me on 0244227845', '6', '2024-11-13 08:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `ngtchat`
--

CREATE TABLE `ngtchat` (
  `id` int(11) NOT NULL,
  `header` varchar(225) NOT NULL,
  `amount` varchar(225) NOT NULL,
  `message` varchar(225) NOT NULL,
  `receiver` varchar(225) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ngtchat`
--

INSERT INTO `ngtchat` (`id`, `header`, `amount`, `message`, `receiver`, `timestamp`) VALUES
(1, 'one stop manS dealership is requesting for a negotiation on sand wind jackets', 'Amount negotiated was250', 'hit me up bro', '4', '2024-11-10 13:39:38'),
(2, 'one stop manS dealership is requesting for a negotiation on sand wind jackets', 'Amount negotiated was 150', 'hello hit me up where ever youa re', '4', '2024-11-10 13:40:22'),
(3, 'serwaa baby products  is requesting for a negotiation on Complete drill uniform ', 'Amount negotiated was GHC 4500 on product Complete drill uniform  5000', 'kindly consider my negotiated amount, reach me on 0556524653', '3', '2024-11-10 20:36:05'),
(4, 'One jeff auto parts  is requesting for a negotiation on gun hrt', 'Amount negotiated was GHC 12 on product gun hrt 234', 'fdugiufufr7re7  ', '6', '2024-11-13 08:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `productimgs`
--

CREATE TABLE `productimgs` (
  `id` int(11) NOT NULL,
  `userid` varchar(225) NOT NULL,
  `productid` varchar(225) NOT NULL,
  `path` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `price` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productimgs`
--

INSERT INTO `productimgs` (`id`, `userid`, `productid`, `path`, `title`, `category`, `price`, `description`, `timestamp`) VALUES
(10, '3', '672fc97825638', '672fc9782563f17311850169mm.jpeg', '9mm Glock by Putin', 'Electronics', '200', '9mm Glock with reload up to 45 rounds, comes with free extra bullets and manuals for assembling.', '2024-11-09 20:43:36'),
(11, '3', '672fcae084e66', '672fcae084e771731185376ak47.jpeg', 'AK 47 Russian ', 'Electronics', '2500', 'AK47 russian lightweight made with close to 57 recoils in a minute. comes with preinstalled silencer and 500 bullets.', '2024-11-09 20:49:36'),
(12, '2', '672fcb4bf01c1', '672fcb4bf01ca1731185483bag.jpeg', 'Multipurpose bag', 'Clothing', '3000', 'Military bag for all kinds of hikes and drills. come with close to 50 storage capacities ', '2024-11-09 20:51:23'),
(13, '2', '672fcbaf61671', '672fcbaf616831731185583indian.jpeg', 'Indian military trousers ', 'Clothing', '200', 'Indian Military trousers with comfy cotton and slim fit properties. comes with free extra inner shirt ', '2024-11-09 20:53:03'),
(14, '2', '672ff3f1df707', '672ff3f1df7101731195889tanker.jpeg', 'tanker', 'Electronics', '300', 'hello world', '2024-11-09 23:44:49'),
(15, '4', '67305a0f80389', '67305a0f803b21731222031jacket.jpeg', 'sand wind jackets', 'Home Appliances', '500', 'sand wind jacket with bullet proof vest inbuilts', '2024-11-10 07:00:31'),
(16, '4', '67305c2d47a3d', '67305c2d47a4b1731222573boots.jpeg', 'tactical boots ', 'Clothing', '400', 'tactical boots for all military drills', '2024-11-10 07:09:33'),
(17, '3', '673064a0a5606', '673064a0a56111731224736boots.jpeg', 'Complete drill uniform ', 'Clothing', '5000', 'A complete military dress including cap, inner, outfits and boots. comes with free 9mm glock included with 50 rounds of bullets ', '2024-11-10 07:45:36'),
(18, '3', '67306720e8331', '67306720e87991731225376ak47.jpeg', 'Complete lethal ammunitions ', 'Food Stuffs', '1400', 'A complete lethal ammunition that produces deadly shots to victims. It all comes in a full customizable bullet frame with silencers ', '2024-11-10 07:56:16'),
(19, '3', '6730679941717', '6730679941af11731225497cap.jpeg', 'cooler uniform and caps', 'Clothing', '4022', 'a cooler uniform and a caps', '2024-11-10 07:58:17'),
(20, '3', '6730679941717', '6730679944f961731225497cooler.jpeg', 'cooler uniform and caps', 'Clothing', '4022', 'a cooler uniform and a caps', '2024-11-10 07:58:17'),
(21, '3', '67306868ceff1', '67306868cf50e1731225704biden.jpeg', 'full combo snipers', 'Clothing', '340', 'Full combo sniper with bullets ', '2024-11-10 08:01:44'),
(22, '3', '67306868ceff1', '67306868d270c1731225704glasses.jpeg', 'full combo snipers', 'Clothing', '340', 'Full combo sniper with bullets ', '2024-11-10 08:01:44'),
(23, '3', '67306868ceff1', '67306868d3cb61731225704sniper.jpeg', 'full combo snipers', 'Clothing', '340', 'Full combo sniper with bullets ', '2024-11-10 08:01:44'),
(24, '4', '67307fdf29bc5', '67307fdf2a08c1731231711inner.jpeg', 'inner only', 'Clothing', '200', 'inner top for soldiers only', '2024-11-10 09:41:51'),
(25, '6', '6731c56813722', '6731c5681394317313150489mm.jpeg', 'wertyuwertyu', 'Footwear', '220', 'ertyuiopoiuygfvbn', '2024-11-11 08:50:48'),
(26, '6', '6731c56813722', '6731c568154361731315048boots.jpeg', 'wertyuwertyu', 'Footwear', '220', 'ertyuiopoiuygfvbn', '2024-11-11 08:50:48'),
(27, '6', '6731c56813722', '6731c568160b71731315048cooler.jpeg', 'wertyuwertyu', 'Footwear', '220', 'ertyuiopoiuygfvbn', '2024-11-11 08:50:48'),
(28, '6', '6731c56813722', '6731c56816d7a1731315048full top.jpeg', 'wertyuwertyu', 'Footwear', '220', 'ertyuiopoiuygfvbn', '2024-11-11 08:50:48'),
(29, '6', '6731c7ebd946f', '6731c7ebd976e1731315691glasses.jpeg', 'gun hrt', 'Electronics', '234', 'swfwesgvd', '2024-11-11 09:01:31'),
(30, '1', '6731fb8ce41ab', '6731fb8ce429d17313289089mm.jpeg', 'One Thing', 'Electronics', '600', '3y3 etuo', '2024-11-11 12:41:48'),
(31, '1', '673469daa3f6d', '673469daa436f1731488218cooler.jpeg', 'ertyui', 'Clothing', '56', 'shirt', '2024-11-13 08:56:58'),
(32, '1', '673469daa3f6d', '673469daa60331731488218full top.jpeg', 'ertyui', 'Clothing', '56', 'shirt', '2024-11-13 08:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `userid` varchar(225) NOT NULL,
  `productid` varchar(225) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `userid`, `productid`, `timestamp`) VALUES
(1, '2', '672fcbaf61671', '2024-11-13 08:40:40'),
(2, '2', '672fcbaf61671', '2024-11-13 08:40:40'),
(3, '2', '672fcbaf61671', '2024-11-13 08:40:40'),
(4, '6', '6731c7ebd946f', '2024-11-13 09:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `telephone` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telephone`, `password`, `timestamp`) VALUES
(1, 'One jeff auto parts ', 'onejeffauto@gmail.com', '0556524653', 'c06db68e819be6ec3d26c6038d8e8d1f', '2024-11-09 22:20:06'),
(2, 'Maame beauty cosmetics', 'maame@gmail.com', '0556524633', 'c06db68e819be6ec3d26c6038d8e8d1f', '2024-11-09 22:20:06'),
(3, 'one stop manS dealership', 'onestop@gmail.com', '0556124655', 'c06db68e819be6ec3d26c6038d8e8d1f', '2024-11-09 22:20:06'),
(4, 'serwaa baby products ', 'serwaa@gmail.com', 'serwaa@gmail.com', 'c06db68e819be6ec3d26c6038d8e8d1f', '2024-11-09 22:20:06'),
(5, 'Kingdom Books and stationary ', 'kbas@gmail.com', '05565246522', 'c06db68e819be6ec3d26c6038d8e8d1f', '2024-11-09 22:20:06'),
(6, 'solomon', 'solomonrhek@gmail.com', '0502283304', '6eea9b7ef19179a06954edd0f6c05ceb', '2024-11-11 08:46:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `callback`
--
ALTER TABLE `callback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngtchat`
--
ALTER TABLE `ngtchat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productimgs`
--
ALTER TABLE `productimgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `callback`
--
ALTER TABLE `callback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ngtchat`
--
ALTER TABLE `ngtchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productimgs`
--
ALTER TABLE `productimgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
