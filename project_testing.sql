-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 07:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_blocklist`
--

CREATE TABLE `admin_blocklist` (
  `id` int(11) NOT NULL,
  `user_id` text COLLATE utf8_unicode_ci NOT NULL,
  `blocked_by` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_blocklist`
--

INSERT INTO `admin_blocklist` (`id`, `user_id`, `blocked_by`) VALUES
(7, 'User Default', 'Admin Default');

-- --------------------------------------------------------

--
-- Table structure for table `news_comment`
--

CREATE TABLE `news_comment` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_no` int(11) NOT NULL,
  `owner` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_comment`
--

INSERT INTO `news_comment` (`id`, `post_no`, `owner`, `date`, `detail`) VALUES
(10, 1, 'Orange', '2022-12-07', 'henlo\r\nnice'),
(13, 2, 'Orange', '2022-12-07', 'henlo'),
(20, 1, 'Admin Default', '2022-12-07', 'check'),
(23, 1, 'User Default', '2022-12-07', 'nice'),
(24, 1, 'User Default', '2022-12-07', 'nice'),
(25, 1, 'User Default', '2022-12-07', 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ward` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_testing_detail`
--

CREATE TABLE `product_testing_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `wax` text COLLATE utf8_unicode_ci NOT NULL,
  `fragrance` text COLLATE utf8_unicode_ci NOT NULL,
  `burning time` text COLLATE utf8_unicode_ci NOT NULL,
  `dimension` text COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_testing_detail`
--

INSERT INTO `product_testing_detail` (`id`, `name`, `price`, `wax`, `fragrance`, `burning time`, `dimension`, `weight`, `image`) VALUES
(1, 'Spiced Mint', 9.99, 'Top grade Soy wax that delivers a smokeless, consistent burn', 'Premium quality ingredients with natural essential oils ', '70-75 hours', '10cm x 5cm ', 400, './pictures/spiced_mint.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_testing_news`
--

CREATE TABLE `product_testing_news` (
  `id` int(11) UNSIGNED NOT NULL,
  `author` text COLLATE utf8_unicode_ci NOT NULL,
  `headline` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `like_count` int(11) NOT NULL DEFAULT 0,
  `dislike_count` int(11) NOT NULL DEFAULT 0,
  `comment_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_testing_news`
--

INSERT INTO `product_testing_news` (`id`, `author`, `headline`, `date`, `image`, `detail`, `like_count`, `dislike_count`, `comment_count`) VALUES
(1, 'Orange', 'Fragrant candle', '2022-12-07', './pictures/candle.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget cursus nunc, eu maximus enim. Suspendisse ligula quam, ultricies ac ligula sed, porttitor finibus libero. Fusce faucibus lacus eros, eu porta diam faucibus quis. Sed venenatis pretium metus, eu pellentesque augue facilisis sed. Praesent eu enim imperdiet, porta erat et, molestie augue. In ac condimentum justo, nec vestibulum eros. Ut eget convallis elit. Praesent consectetur id dolor ut tincidunt. Nulla lacinia lorem a cursus ultrices. Proin ipsum justo, vulputate ac pellentesque blandit, lacinia vel augue. Pellentesque a purus ultrices, interdum lorem quis, scelerisque nisl. Praesent interdum elementum magna auctor tempor. Phasellus a libero nec felis maximus auctor nec non urna.\r\n<br>\r\n<br>\r\n<br>\r\nNullam id dui vel tellus egestas blandit. Donec dignissim sapien non bibendum feugiat. Quisque convallis placerat efficitur. Mauris fringilla nec sem at tempus. Vestibulum ultrices sapien at risus fermentum, sit amet accumsan lectus lacinia. Pellentesque at sagittis libero. Morbi ut magna nec orci bibendum vestibulum ut a diam. Mauris ante ante, maximus et tortor eget, ultrices faucibus eros. Ut auctor turpis eu congue dignissim. Nam eros eros, scelerisque et consectetur id, gravida nec turpis. Etiam nec venenatis enim, eleifend dignissim libero. Donec rhoncus eros dolor, quis ullamcorper diam aliquet nec. Proin vel lectus tristique ipsum ultricies condimentum eget ac justo. Quisque orci orci, tempor nec posuere ut, facilisis vel est. Donec aliquam tortor eget velit hendrerit egestas eu sit amet augue. Aliquam ut lectus nisi.\r\n<br>\r\n<br>\r\n<br>\r\nSuspendisse potenti. In finibus auctor lorem et ultrices. Morbi euismod ex at est sagittis, nec pretium metus feugiat. Donec at lectus vel turpis pellentesque elementum sed id diam. Proin lorem nisl, fermentum vitae dolor in, consequat porta libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra pharetra tortor, vestibulum malesuada diam viverra commodo. Phasellus eget sem erat. Suspendisse eget nisi leo. Proin auctor ante a varius pretium. Duis lacinia, massa eget varius tincidunt, eros nunc commodo elit, at auctor tellus ipsum nec nunc. Nullam congue nisl a metus placerat, quis facilisis leo dapibus.\r\n<br>\r\n<br>\r\n<br>\r\nSed imperdiet elit laoreet nunc maximus semper nec eget nunc. Duis facilisis tempor est, in convallis elit sodales et. Curabitur mauris purus, sagittis convallis consequat nec, aliquet nec ante. Praesent porta, ipsum at euismod luctus, eros massa porttitor felis, vel euismod orci purus vitae arcu. Integer feugiat blandit eros eu venenatis. Vestibulum ultricies quis arcu sit amet aliquam. Suspendisse luctus ornare dapibus. Aliquam erat volutpat. Pellentesque ut dapibus quam. Integer non quam velit. Nam in varius justo. Sed id purus vel ante euismod accumsan.\r\n<br>\r\n<br>\r\n<br>\r\nDuis arcu ante, imperdiet a sem vel, luctus porta ex. In id vehicula nisl, at accumsan quam. Donec condimentum in nibh vel malesuada. Integer ut dapibus lacus, sit amet hendrerit dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae mauris congue, bibendum orci nec, suscipit massa. Nulla facilisi. Curabitur fermentum vel nunc in mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed vel sollicitudin ante, eu ultricies eros. In hac habitasse platea dictumst. Integer convallis egestas sodales. Morbi mattis auctor sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 1, 5),
(2, 'Orange', 'Fragrant candle', '2022-12-07', './pictures/candle.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget cursus nunc, eu maximus enim. Suspendisse ligula quam, ultricies ac ligula sed, porttitor finibus libero. Fusce faucibus lacus eros, eu porta diam faucibus quis. Sed venenatis pretium metus, eu pellentesque augue facilisis sed. Praesent eu enim imperdiet, porta erat et, molestie augue. In ac condimentum justo, nec vestibulum eros. Ut eget convallis elit. Praesent consectetur id dolor ut tincidunt. Nulla lacinia lorem a cursus ultrices. Proin ipsum justo, vulputate ac pellentesque blandit, lacinia vel augue. Pellentesque a purus ultrices, interdum lorem quis, scelerisque nisl. Praesent interdum elementum magna auctor tempor. Phasellus a libero nec felis maximus auctor nec non urna.\r\n<br>\r\n<br>\r\n<br>\r\nNullam id dui vel tellus egestas blandit. Donec dignissim sapien non bibendum feugiat. Quisque convallis placerat efficitur. Mauris fringilla nec sem at tempus. Vestibulum ultrices sapien at risus fermentum, sit amet accumsan lectus lacinia. Pellentesque at sagittis libero. Morbi ut magna nec orci bibendum vestibulum ut a diam. Mauris ante ante, maximus et tortor eget, ultrices faucibus eros. Ut auctor turpis eu congue dignissim. Nam eros eros, scelerisque et consectetur id, gravida nec turpis. Etiam nec venenatis enim, eleifend dignissim libero. Donec rhoncus eros dolor, quis ullamcorper diam aliquet nec. Proin vel lectus tristique ipsum ultricies condimentum eget ac justo. Quisque orci orci, tempor nec posuere ut, facilisis vel est. Donec aliquam tortor eget velit hendrerit egestas eu sit amet augue. Aliquam ut lectus nisi.\r\n<br>\r\n<br>\r\n<br>\r\nSuspendisse potenti. In finibus auctor lorem et ultrices. Morbi euismod ex at est sagittis, nec pretium metus feugiat. Donec at lectus vel turpis pellentesque elementum sed id diam. Proin lorem nisl, fermentum vitae dolor in, consequat porta libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra pharetra tortor, vestibulum malesuada diam viverra commodo. Phasellus eget sem erat. Suspendisse eget nisi leo. Proin auctor ante a varius pretium. Duis lacinia, massa eget varius tincidunt, eros nunc commodo elit, at auctor tellus ipsum nec nunc. Nullam congue nisl a metus placerat, quis facilisis leo dapibus.\r\n<br>\r\n<br>\r\n<br>\r\nSed imperdiet elit laoreet nunc maximus semper nec eget nunc. Duis facilisis tempor est, in convallis elit sodales et. Curabitur mauris purus, sagittis convallis consequat nec, aliquet nec ante. Praesent porta, ipsum at euismod luctus, eros massa porttitor felis, vel euismod orci purus vitae arcu. Integer feugiat blandit eros eu venenatis. Vestibulum ultricies quis arcu sit amet aliquam. Suspendisse luctus ornare dapibus. Aliquam erat volutpat. Pellentesque ut dapibus quam. Integer non quam velit. Nam in varius justo. Sed id purus vel ante euismod accumsan.\r\n<br>\r\n<br>\r\n<br>\r\nDuis arcu ante, imperdiet a sem vel, luctus porta ex. In id vehicula nisl, at accumsan quam. Donec condimentum in nibh vel malesuada. Integer ut dapibus lacus, sit amet hendrerit dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae mauris congue, bibendum orci nec, suscipit massa. Nulla facilisi. Curabitur fermentum vel nunc in mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed vel sollicitudin ante, eu ultricies eros. In hac habitasse platea dictumst. Integer convallis egestas sodales. Morbi mattis auctor sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 1, 1),
(3, 'Orange', 'Fragrant candle', '2022-12-07', './pictures/candle.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget cursus nunc, eu maximus enim. Suspendisse ligula quam, ultricies ac ligula sed, porttitor finibus libero. Fusce faucibus lacus eros, eu porta diam faucibus quis. Sed venenatis pretium metus, eu pellentesque augue facilisis sed. Praesent eu enim imperdiet, porta erat et, molestie augue. In ac condimentum justo, nec vestibulum eros. Ut eget convallis elit. Praesent consectetur id dolor ut tincidunt. Nulla lacinia lorem a cursus ultrices. Proin ipsum justo, vulputate ac pellentesque blandit, lacinia vel augue. Pellentesque a purus ultrices, interdum lorem quis, scelerisque nisl. Praesent interdum elementum magna auctor tempor. Phasellus a libero nec felis maximus auctor nec non urna.\r\n<br>\r\n<br>\r\n<br>\r\nNullam id dui vel tellus egestas blandit. Donec dignissim sapien non bibendum feugiat. Quisque convallis placerat efficitur. Mauris fringilla nec sem at tempus. Vestibulum ultrices sapien at risus fermentum, sit amet accumsan lectus lacinia. Pellentesque at sagittis libero. Morbi ut magna nec orci bibendum vestibulum ut a diam. Mauris ante ante, maximus et tortor eget, ultrices faucibus eros. Ut auctor turpis eu congue dignissim. Nam eros eros, scelerisque et consectetur id, gravida nec turpis. Etiam nec venenatis enim, eleifend dignissim libero. Donec rhoncus eros dolor, quis ullamcorper diam aliquet nec. Proin vel lectus tristique ipsum ultricies condimentum eget ac justo. Quisque orci orci, tempor nec posuere ut, facilisis vel est. Donec aliquam tortor eget velit hendrerit egestas eu sit amet augue. Aliquam ut lectus nisi.\r\n<br>\r\n<br>\r\n<br>\r\nSuspendisse potenti. In finibus auctor lorem et ultrices. Morbi euismod ex at est sagittis, nec pretium metus feugiat. Donec at lectus vel turpis pellentesque elementum sed id diam. Proin lorem nisl, fermentum vitae dolor in, consequat porta libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra pharetra tortor, vestibulum malesuada diam viverra commodo. Phasellus eget sem erat. Suspendisse eget nisi leo. Proin auctor ante a varius pretium. Duis lacinia, massa eget varius tincidunt, eros nunc commodo elit, at auctor tellus ipsum nec nunc. Nullam congue nisl a metus placerat, quis facilisis leo dapibus.\r\n<br>\r\n<br>\r\n<br>\r\nSed imperdiet elit laoreet nunc maximus semper nec eget nunc. Duis facilisis tempor est, in convallis elit sodales et. Curabitur mauris purus, sagittis convallis consequat nec, aliquet nec ante. Praesent porta, ipsum at euismod luctus, eros massa porttitor felis, vel euismod orci purus vitae arcu. Integer feugiat blandit eros eu venenatis. Vestibulum ultricies quis arcu sit amet aliquam. Suspendisse luctus ornare dapibus. Aliquam erat volutpat. Pellentesque ut dapibus quam. Integer non quam velit. Nam in varius justo. Sed id purus vel ante euismod accumsan.\r\n<br>\r\n<br>\r\n<br>\r\nDuis arcu ante, imperdiet a sem vel, luctus porta ex. In id vehicula nisl, at accumsan quam. Donec condimentum in nibh vel malesuada. Integer ut dapibus lacus, sit amet hendrerit dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae mauris congue, bibendum orci nec, suscipit massa. Nulla facilisi. Curabitur fermentum vel nunc in mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed vel sollicitudin ante, eu ultricies eros. In hac habitasse platea dictumst. Integer convallis egestas sodales. Morbi mattis auctor sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 1, 0),
(4, 'Orange', 'Fragrant candle', '2022-12-07', './pictures/candle.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget cursus nunc, eu maximus enim. Suspendisse ligula quam, ultricies ac ligula sed, porttitor finibus libero. Fusce faucibus lacus eros, eu porta diam faucibus quis. Sed venenatis pretium metus, eu pellentesque augue facilisis sed. Praesent eu enim imperdiet, porta erat et, molestie augue. In ac condimentum justo, nec vestibulum eros. Ut eget convallis elit. Praesent consectetur id dolor ut tincidunt. Nulla lacinia lorem a cursus ultrices. Proin ipsum justo, vulputate ac pellentesque blandit, lacinia vel augue. Pellentesque a purus ultrices, interdum lorem quis, scelerisque nisl. Praesent interdum elementum magna auctor tempor. Phasellus a libero nec felis maximus auctor nec non urna.\r\n<br>\r\n<br>\r\n<br>\r\nNullam id dui vel tellus egestas blandit. Donec dignissim sapien non bibendum feugiat. Quisque convallis placerat efficitur. Mauris fringilla nec sem at tempus. Vestibulum ultrices sapien at risus fermentum, sit amet accumsan lectus lacinia. Pellentesque at sagittis libero. Morbi ut magna nec orci bibendum vestibulum ut a diam. Mauris ante ante, maximus et tortor eget, ultrices faucibus eros. Ut auctor turpis eu congue dignissim. Nam eros eros, scelerisque et consectetur id, gravida nec turpis. Etiam nec venenatis enim, eleifend dignissim libero. Donec rhoncus eros dolor, quis ullamcorper diam aliquet nec. Proin vel lectus tristique ipsum ultricies condimentum eget ac justo. Quisque orci orci, tempor nec posuere ut, facilisis vel est. Donec aliquam tortor eget velit hendrerit egestas eu sit amet augue. Aliquam ut lectus nisi.\r\n<br>\r\n<br>\r\n<br>\r\nSuspendisse potenti. In finibus auctor lorem et ultrices. Morbi euismod ex at est sagittis, nec pretium metus feugiat. Donec at lectus vel turpis pellentesque elementum sed id diam. Proin lorem nisl, fermentum vitae dolor in, consequat porta libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra pharetra tortor, vestibulum malesuada diam viverra commodo. Phasellus eget sem erat. Suspendisse eget nisi leo. Proin auctor ante a varius pretium. Duis lacinia, massa eget varius tincidunt, eros nunc commodo elit, at auctor tellus ipsum nec nunc. Nullam congue nisl a metus placerat, quis facilisis leo dapibus.\r\n<br>\r\n<br>\r\n<br>\r\nSed imperdiet elit laoreet nunc maximus semper nec eget nunc. Duis facilisis tempor est, in convallis elit sodales et. Curabitur mauris purus, sagittis convallis consequat nec, aliquet nec ante. Praesent porta, ipsum at euismod luctus, eros massa porttitor felis, vel euismod orci purus vitae arcu. Integer feugiat blandit eros eu venenatis. Vestibulum ultricies quis arcu sit amet aliquam. Suspendisse luctus ornare dapibus. Aliquam erat volutpat. Pellentesque ut dapibus quam. Integer non quam velit. Nam in varius justo. Sed id purus vel ante euismod accumsan.\r\n<br>\r\n<br>\r\n<br>\r\nDuis arcu ante, imperdiet a sem vel, luctus porta ex. In id vehicula nisl, at accumsan quam. Donec condimentum in nibh vel malesuada. Integer ut dapibus lacus, sit amet hendrerit dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae mauris congue, bibendum orci nec, suscipit massa. Nulla facilisi. Curabitur fermentum vel nunc in mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed vel sollicitudin ante, eu ultricies eros. In hac habitasse platea dictumst. Integer convallis egestas sodales. Morbi mattis auctor sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp(),
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` text COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL COMMENT '0 => not logged in\r\n1 => highest privilege\r\n2 => normal user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `password`, `name`, `dob`, `address`, `phone_no`, `role`) VALUES
(1, 'admin@admin.com', 'Admin123', 'Admin Default', '2014-12-09', '1 Road 1', '0900000001', 1),
(2, 'user@user.com', 'User123', 'User Default', '2012-11-13', '2 Road 2', '0900000002', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_blocklist`
--
ALTER TABLE `admin_blocklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_comment`
--
ALTER TABLE `news_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_testing_detail`
--
ALTER TABLE `product_testing_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_testing_news`
--
ALTER TABLE `product_testing_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_blocklist`
--
ALTER TABLE `admin_blocklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news_comment`
--
ALTER TABLE `news_comment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_testing_detail`
--
ALTER TABLE `product_testing_detail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_testing_news`
--
ALTER TABLE `product_testing_news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
